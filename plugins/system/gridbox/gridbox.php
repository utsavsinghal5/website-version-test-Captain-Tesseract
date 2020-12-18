<?php
/**
* @package   Gridbox
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

jimport( 'joomla.plugin.plugin' );
jimport('joomla.filesystem.file');
 
class plgSystemGridbox extends JPlugin
{
    public $cache;
    public $performance;

    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        $app = JFactory::getApplication();
        if ($app->isSite()) {
            $path = JPATH_ROOT . '/components/com_gridbox/helpers/gridbox.php';
            JLoader::register('gridboxHelper', $path);
            $this->performance = gridboxHelper::getPerformance();
            if ($this->performance->page_cache == 1) {
                $options = array(
                    'defaultgroup' => 'gridbox',
                    'browsercache' => $this->performance->browser_cache,
                    'caching'      => false,
                );
                $this->cache = JCache::getInstance('page', $options);
            }
        }
    }

    protected function getCacheKey()
    {
        static $key;

        if (!$key) {
            $parts[] = JUri::getInstance()->toString();
            $key = md5(serialize($parts));
        }

        return $key;
    }

    public function onUserAfterLogin($options)
    {
        $app = JFactory::getApplication();
        if ($app->isAdmin()) {
            setcookie('gridbox_username', $options['user']->username, 0, '/');
        }
    }

    public function checkCommentsURL($url, $regex, $table, $hash)
    {
        preg_match_all($regex, $url, $matches, PREG_SET_ORDER);
        if (!empty($matches)) {
            $id = $matches[0][1] * 1;
            gridboxHelper::setCommentURL($id, $table, $hash);
        }
    }

    public function checkURI()
    {
        $url = $_SERVER['REQUEST_URI'];
        $this->checkCommentsURL($url, '/commentID-+(\d+)/', '#__gridbox_comments', '#commentID-');
        $this->checkCommentsURL($url, '/reviewID-+(\d+)/', '#__gridbox_reviews', '#reviewID-');
    }

    public function onAfterInitialise()
    {

        $this->checkURI();
        $dispatcher = JEventDispatcher::getInstance();
        $dispatcher->detach($this);
        $dispatcher->attach($this);
    }    

    public function onAfterRoute()
    {
        $app = JFactory::getApplication();
        $doc = JFactory::getDocument();
        $pageTitle = $doc->getTitle();
        $view = $app->input->getCmd('view', '');
        $option = $app->input->getCmd('option', '');
        $id = $app->input->get('id', 0, 'int');
        $user = JFactory::getUser();
        if ($app->isSite()) {
            gridboxHelper::checkGridboxLoginData();
            if ($doc->getType() == 'html' && $option == 'com_gridbox' && $view == 'system') {
                $params = gridboxHelper::getSystemParams($id);
            }
            if ($doc->getType() == 'html' && $option == 'com_gridbox' && $view == 'system' && $params->type == 'thank-you-page') {
                gridboxHelper::setOrder();
            }
            if ($doc->getType() == 'html' && strpos($pageTitle, 'Gridbox Editor') === false && $view != 'gridbox'
                && $this->performance->page_cache == 1 && $user->get('guest')) {
                JPluginHelper::importPlugin('pagecache');
                $results = JEventDispatcher::getInstance()->trigger('onPageCacheSetCaching');
                $caching = !in_array(false, $results, true);
                if ($caching && $app->input->getMethod() == 'GET') {
                    $this->cache->setCaching(true);
                }
                $data = $this->cache->get($this->getCacheKey(), 'gridbox');
                if ($data !== false) {
                    $app->setBody($data);
                    echo $app->toString();
                    if (JDEBUG) {
                        JProfiler::getInstance('Application')->mark('afterCache');
                    }
                    $app->close();
                }
            }
            if ($option == 'com_gridbox') {
                $view = $app->input->getCmd('view', '');
                $db = JFactory::getDbo();
                if ($view == 'blog' || $view == 'page' || $view == 'gridbox' || $view == 'system') {
                    $blog = false;
                    $edit_type = $app->input->get('edit_type', '', 'string');
                    if ($view == 'blog' || $edit_type == 'blog' || $edit_type == 'post-layout') {
                        $blog = true;
                    } else if ($view == 'system') {
                        $edit_type = 'system';
                    }
                    if ($view == 'blog') {
                        $id = $app->input->get('app');
                    }
                    $theme = gridboxHelper::getTheme($id, $blog, $edit_type);
                } else if ($view == 'account') {
                    $system = gridboxHelper::getSystemParamsByType('checkout');
                    $theme = gridboxHelper::getTheme($system->id, false, 'system');
                } else {
                    $theme = 0;
                }
                $params = gridboxHelper::getThemeParams($theme);
                if ($view == 'account') {
                    $params->id = $theme;
                }
                $app->setTemplate('gridbox', $params);
            }
        }
    }

    public function onBeforeRender()
    {
        $dispatcher = JEventDispatcher::getInstance();
        $dispatcher->detach($this);
        $dispatcher->attach($this);
    }

    public function onAfterRender()
    {
        $app = JFactory::getApplication();
        $doc = JFactory::getDocument();
        $view = $app->input->get('view');
        $option = $app->input->get('option');
        $pageTitle = $doc->getTitle();
        if ($app->isAdmin() && $doc->getType() == 'html' && $option == 'com_gridbox') {
            $sidebar = $app->input->cookie->get('gridbox-sidebar', '', 'string');
            if ($sidebar == 'visible') {
                $html = $app->getBody();
                $html = str_replace('<body', '<body data-sidebar="visible"', $html);
                $app->setBody($html);
            }
        }
        if ($app->isSite() && $doc->getType() == 'html') {
            $html = $app->getBody();
            $str = gridboxHelper::checkMeta();
            $html = str_replace('</head>', $str.'</head>', $html);
            $app->setBody($html);
        }
        if ($app->isSite() && $doc->getType() == 'html' && strpos($pageTitle, 'Gridbox Editor') === false && $view != 'gridbox') {
            $email_encryption = $this->performance->email_encryption;
            if ($email_encryption == 1) {
                $body = $app->getBody();
                if (strpos($body, '@') !== false) {
                    $body = $this->EncryptEmails($body);
                    $app->setBody($body);
                }
            }
        }
        if ($app->isSite() && $doc->getType() == 'html' && strpos($pageTitle, 'Gridbox Editor') === false
            && $option == 'com_gridbox' && $view == 'page') {
            $body = $app->getBody();
            if (strpos($body, 'ba-item-star-rating') || strpos($body, 'ba-item-reviews')) {
                $body = gridboxHelper::setMicrodata($body);
                $app->setBody($body);
            }
        }
        if ($app->isSite() && $doc->getType() == 'html' && strpos($pageTitle, 'Gridbox Editor') === false && $view != 'gridbox') {
            $body = $app->getBody();
            $icons = gridboxHelper::checkIconsLibrary($body);
            if (!empty($icons)) {
                $body = str_replace('</head>', $icons.'</head>', $body);
            }
            $str = gridboxHelper::initItems($body);
            if (!empty($str)) {
                $body = str_replace('</head>', $str."</head>", $body);
            }
            if (!empty($icons) || !empty($str)) {
                $app->setBody($body);
            }
        }
        if ($app->isSite() && $doc->getType() == 'html' && strpos($pageTitle, 'Gridbox Editor') === false && $view != 'gridbox') {
            if ($option == 'com_gridbox' && ($this->performance->compress_css == 1 || $this->performance->compress_js == 1
                    || $this->performance->compress_html == 1 || $this->performance->compress_images == 1
                    || $this->performance->adaptive_images == 1 || $this->performance->defer_loading == 1
                    || $this->performance->images_lazy_load == 1 || $this->performance->enable_canonical == 1)) {
                $body = $app->getBody();
                $body = gridboxHelper::compressGridbox($body);
                $app->setBody($body);
            }
        }
        JEventDispatcher::getInstance()->trigger('onAfterRenderGridbox');
        if ($app->isSite() && $doc->getType() == 'html' && strpos($pageTitle, 'Gridbox Editor') === false && $view != 'gridbox') {
            $user = JFactory::getUser();
            if ($this->performance->page_cache == 1 && $user->get('guest')) {
                $data = $app->toString();
                $data = str_replace('<html ', '<html data-cached="true" ', $data);
                $this->cache->store($data, $this->getCacheKey(), 'gridbox');
            }
        }
    }

    public function getPattern($link, $html)
    {
        $pattern = '~(?:<a ([^>]*)href\s*=\s*"mailto:'.$link.'"([^>]*))>'.$html.'</a>~i';

        return $pattern;
    }

    public function addEmailAttributes($email, $before, $after)
    {
        if ($before !== '') {
            $before = str_replace("'", "\'", $before);
            $email = str_replace(".innerHTML += '<a '", ".innerHTML += '<a {$before}'", $email);
        }
        if ($after !== '') {
            $after = str_replace("'", "\'", $after);
            $email = str_replace("'\'>'", "'\'{$after}>'", $email);
        }

        return $email;
    }

    public function EncryptEmails($html)
    {
        $regEmail = '([\w\.\'\-\+]+\@(?:[a-z0-9\.\-]+\.)+(?:[a-zA-Z0-9\-]{2,10}))';
        $regEmailLink = $regEmail.'([?&][\x20-\x7f][^"<>]+)';
        $regText = '((?:[\x20-\x7f]|[\xA1-\xFF]|[\xC2-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF4][\x80-\xBF]{3})[^<>]+)';
        $regImage = '(<img[^>]+>)';
        $regTextSpan = '(<span[^>]+>|<span>|<strong>|<strong><span[^>]+>|<strong><span>)'.$regText.'(</span>|</strong>|</span></strong>)';
        $regEmailSpan = '(<span[^>]+>|<span>|<strong>|<strong><span[^>]+>|<strong><span>)'.$regEmail.'(</span>|</strong>|</span></strong>)';
        $pattern = $this->getPattern($regEmail, $regEmail);
        $pattern = str_replace('"mailto:', '"http://mce_host([\x20-\x7f][^<>]+/)', $pattern);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[3][0];
            $emailText = $matches[5][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText);
            $replacement = $this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]);
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regText);
        $pattern = str_replace('"mailto:', '"http://mce_host([\x20-\x7f][^<>]+/)', $pattern);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[3][0];
            $emailText = $matches[5][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = $this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]);
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regEmail);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0];
            $emailText = $matches[4][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText);
            $replacement = $this->addEmailAttributes($replacement, $matches[1][0], $matches[3][0]);
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regEmailSpan);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0];
            $emailText = $matches[4][0] . $matches[5][0] . $matches[6][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[3][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regTextSpan);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0];
            $emailText = $matches[4][0] . addslashes($matches[5][0]) . $matches[6][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[3][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regText);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0];
            $emailText = addslashes($matches[4][0]);
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = $this->addEmailAttributes($replacement, $matches[1][0], $matches[3][0]);
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regImage);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0];
            $emailText = $matches[4][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[3][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regImage.$regEmail);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0];
            $emailText = $matches[4][0] . $matches[5][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[3][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmail, $regImage.$regText);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0];
            $emailText = $matches[4][0] . addslashes($matches[5][0]);
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[3][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmailLink, $regEmail);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0] . $matches[3][0];
            $emailText = $matches[5][0];
            $email = str_replace('&amp;', '&', $email);
            $replacement = JHtml::_('email.cloak', $email, true, $emailText);
            $replacement = $this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]);
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmailLink, $regText);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0] . $matches[3][0];
            $emailText = addslashes($matches[5][0]);
            $email = str_replace('&amp;', '&', $email);
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = $this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]);
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmailLink, $regEmailSpan);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0] . $matches[3][0];
            $emailText = $matches[5][0] . $matches[6][0] . $matches[7][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmailLink, $regTextSpan);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[2][0] . $matches[3][0];
            $emailText = $matches[5][0] . addslashes($matches[6][0]) . $matches[7][0];
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmailLink, $regImage);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[1][0] . $matches[2][0] . $matches[3][0];
            $emailText = $matches[5][0];
            $email = str_replace('&amp;', '&', $email);
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmailLink, $regImage.$regEmail);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[1][0] . $matches[2][0] . $matches[3][0];
            $emailText = $matches[4][0] . $matches[5][0] . $matches[6][0];
            $email = str_replace('&amp;', '&', $email);
            $replacement = JHtml::_('email.cloak', $email, true, $emailText);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = $this->getPattern($regEmailLink, $regImage . $regText);
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[1][0] . $matches[2][0] . $matches[3][0];
            $emailText = $matches[4][0] . $matches[5][0] . addslashes($matches[6][0]);
            $email = str_replace('&amp;', '&', $email);
            $replacement = JHtml::_('email.cloak', $email, true, $emailText, 0);
            $replacement = html_entity_decode($this->addEmailAttributes($replacement, $matches[1][0], $matches[4][0]));
            $html = substr_replace($html, $replacement, $matches[0][1], strlen($matches[0][0]));
        }
        $pattern = '~(?![^<>]*>)'.$regEmail.'~i';
        while (preg_match($pattern, $html, $matches, PREG_OFFSET_CAPTURE)) {
            $email = $matches[1][0];
            $replacement = JHtml::_('email.cloak', $email, false);
            $html = substr_replace($html, $replacement, $matches[1][1], strlen($email));
        }

        return $html;
    }
}