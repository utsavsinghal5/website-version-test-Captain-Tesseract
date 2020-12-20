<?php
/**
* @package   Gridbox template
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$generator = $doc->getMetaData('generator');
if ($generator == 'Joomla! - Open Source Content Management') {
    $doc->setGenerator('Powered by Website Builder Gridbox');
}
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$menus = $app->getMenu('site');
$menu = $menus->getActive();
$edit_type = $app->input->get('edit_type', '');
$pageType = '';
$system = $edit_type == true;
$blog = false;
if ($view == 'blog' || $edit_type == 'blog' || $edit_type == 'post-layout') {
    $blog = true;
}
$pageclass = '';
$id = 0;
if (is_object($menu)) {
    $pageclass = $menu->params->get('pageclass_sfx');
    $id = $menu->template_style_id;
} else {
    $lang = JFactory::getLanguage()->getTag();
    $default = $menus->getDefault($lang);
    $id = $default->template_style_id;
}
JLoader::register('gridboxHelper', JPATH_ROOT.'/components/com_gridbox/helpers/gridbox.php');
gridboxHelper::setBreakpoints();
gridboxHelper::checkResponsive();
gridboxHelper::checkGridboxLanguage();
$aboutUs = gridboxHelper::aboutUs();
if ($option == 'com_gridbox') {
    $gridboxId = $app->input->get('id', 0, 'int');
    $pageType = gridboxHelper::getPageType($gridboxId, $view, $edit_type);
    if ($pageType == 'blog') {
        $pageclass .= ' blog-post-editor';
    } else if (!empty($pageType) && $pageType != 'single') {
        $pageclass .= ' blog-post-editor gridbox-apps-editor';
    }
    if ($view == 'blog') {
        $gridboxId = $app->input->get('app');
    } else if ($view == 'system') {
        $edit_type = 'system';
    } else {
        $pageclass .= ' '.gridboxHelper::getPageClass($gridboxId);
    }
    if (!empty($gridboxId)) {
        $id = gridboxHelper::getTheme($gridboxId, $blog, $edit_type);
    }
}
$paramsId = $this->params->get('id', 0, 'int');
if (isset($this->params->id)) {
    $paramsId = $this->params->id;
}
if (!empty($paramsId)) {
    $id = $paramsId;
}
if ($id == 0) {
    $id = gridboxHelper::getValidId();
}
if (isset($gridboxId)) {
    $data = array('id' => $gridboxId, 'theme' => $id);
} else {
    $data = array('id' => 0, 'theme' => $id);
}
$page = new stdClass();
$page->option = $app->input->getCmd('option', 'option');
$page->view = $app->input->getCmd('view', 'view');
$page->id = isset($gridboxId) ? $gridboxId : $app->input->getCmd('id', 'id');
$data['page'] = $page;
if (!isset($gridboxId) && $page->view != 'account') {
    $this->params = gridboxHelper::getThemeParams($id);
}
$params = $this->params->get('params');
$suffix = $params->suffix;
$pageclass .= !empty($pageclass) ? ' '.$suffix : $suffix;
gridboxHelper::prepareParentFonts($params);
$systemType = '';
if (isset($gridboxId)) {
    if ($edit_type == 'system') {
        $systemType = gridboxHelper::checkSystemCss($gridboxId);
    } else if ($view == 'page' || ($view == 'gridbox' && !$blog)) {
        gridboxHelper::checkPageCss($gridboxId);
    } else if ($view == 'account') {
        gridboxHelper::checkAccountCss();
    } else if ($edit_type == 'post-layout') {
        gridboxHelper::checkPostCss($gridboxId);
    } else if ($blog) {
        gridboxHelper::checkAppCss($gridboxId);
    }
}
if ($systemType == 'checkout' && gridboxHelper::$store->checkout->login && empty($user->id)) {
    $pageclass .= ' ba-visible-checkout-authentication';
}
$time = $this->params->get('time', '');
if (!empty($time)) {
    $time = '?'.$time;
}
$footer = $this->params->get('footer');
$header = $this->params->get('header');
$layout = $this->params->get('layout');
$fonts = $this->params->get('fonts');
$fonts = gridboxHelper::prepareFonts($fonts, $option, $app->input->get('id', 0, 'int'), $edit_type);
$website = gridboxHelper::getWebsiteCode();
$footer->html = gridboxHelper::checkModules($footer->html, $footer->items);
$header->html = gridboxHelper::checkModules($header->html, $header->items);
gridboxHelper::checkMoreScripts($footer->html);
gridboxHelper::checkMoreScripts($header->html);
$doc->addScript(JUri::root(true).'/media/jui/js/jquery.min.js');
$doc->addScript(JUri::root(true).'/media/jui/js/bootstrap.min.js');
$prop = array();
$attr = array('async' => true);
$doc->addScript(JUri::root().'index.php?option=com_gridbox&task=editor.loadModule&module=gridboxLanguage&'.$aboutUs->version, $prop, $attr);
$pageTitle = $doc->getTitle();
if ($view != 'gridbox' || strpos($pageTitle, 'Gridbox Editor') === false) {
    $doc->addScript($this->baseurl . '/templates/gridbox/js/gridbox.js?'.$aboutUs->version);
} else {
    $doc->addScriptDeclaration("
        console.log = function(){
            return false;
        };
    ");
}
$getItemsUrl = 'index.php?option=com_gridbox&task=editor.getItems&id='.$data['id'].'&theme='.$data['theme'].'&edit_type='.$edit_type;
$getItemsUrl .= '&view='.$data['page']->view.'&menuitem='.$menu->id.'&'.str_replace('?', '', $time);
$initItems = $this->baseurl.'/components/com_gridbox/libraries/modules/initItems.js?'.$aboutUs->version;
$doc->addScript($this->baseurl.'/'.$getItemsUrl);
$doc->addStyleSheet($this->baseurl.'/templates/gridbox/css/gridbox.css?'.$aboutUs->version);
$doc->addStyleSheet($this->baseurl.'/templates/gridbox/css/storage/responsive.css'.$time);
$doc->addStyleSheet(JUri::root().'templates/gridbox/css/storage/style-'.$id.'.css'.$time);
if (!empty($fonts)) {
    $doc->addStyleSheet($fonts);
}
$breakpoints = json_encode(gridboxHelper::$breakpoints);
$disable_responsive = gridboxHelper::$website->disable_responsive == 1 ? 'true' : 'false';
$style = gridboxHelper::checkCustom($id, $view, $time);
gridboxHelper::createFavicon();

?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $this->language; ?>"
    dir="<?php echo $this->direction; ?>">
<head>
<?php
    if (!(bool)gridboxHelper::$website->disable_responsive) {
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
    } else {
?>
    <meta name="viewport" content="width=device-width">
<?php
    }
?>
    <jdoc:include type="head" />
    <?php if ($this->direction == 'rtl') { ?>
        <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/media/jui/css/bootstrap-rtl.css" type="text/css" />
    <?php } ?>
<?php
    if ($view != 'gridbox' || strpos($pageTitle, 'Gridbox Editor') === false) {
        echo "\n".$website->header_code;
    }
?>
<?php
    echo $style."\n";
?>
    <script type="text/javascript">
        var JUri = '<?php echo JUri::root(); ?>',
            breakpoints = <?php echo $breakpoints; ?>,
            menuBreakpoint = '<?php echo gridboxHelper::$menuBreakpoint; ?>' * 1,
            disableResponsive = <?php echo $disable_responsive; ?>,
            gridboxVersion = '<?php echo $aboutUs->version; ?>',
            themeData = <?php echo json_encode($data); ?>;
    </script>
    <script src="//code.tidio.co/ljob6emduh2atta3lcfmlz47hlrtr8ut.js" async></script>
</head>
<body class="<?php echo $option. ' '. $view . ' ' .htmlspecialchars(trim($pageclass)); ?>">
<?php
    if ($view != 'gridbox' || strpos($pageTitle, 'Gridbox Editor') === false) {
        gridboxHelper::checkPreloader();
    }
?>
<?php
$unsubscribe = $app->input->cookie->get('gridbox-comments-unsubscribe', '', 'string');
if (($view != 'gridbox' || strpos($pageTitle, 'Gridbox Editor') === false) && $unsubscribe != '') {
    gridboxHelper::setcookie('gridbox-comments-unsubscribe', '', time() - 3600);
?>
<div class="ba-comments-modal ba-comment-unsubscribed-dialog visible-comments-dialog">
    <div class="ba-comments-modal-body">
        <span class="ba-comments-modal-title"><?php echo JText::_('UNSUBSCRIBE_TITLE'); ?></span>
        <p class="ba-comments-modal-text"><?php echo JText::_('SUCCESSFULLY_UNSUBSCRIBED'); ?></p>
        <div class="ba-comments-modal-footer">
            <span class="ba-btn red-btn ba-btn-primary"><?php echo JText::_('CLOSE'); ?></span>
        </div>
    </div>
    <div class="ba-comments-modal-backdrop"></div>
</div>
<?php
}
?>
    <div class="ba-overlay"></div>
<?php
if (empty($pageType) || $pageType == 'single') {
?>
    <header class="header <?php echo $layout; ?>">
        <?php echo $header->html; ?>
<?php
    if ($view == 'gridbox') {
?>
        <div class="page-layout">
            <span>header</span>
        </div>
<?php
    }
?>
    </header>
<?php
}
?>
    <div class="body">
<?php
if (!$system && ($this->countModules('top-a') || $this->countModules('top-b')
    || $this->countModules('top-c') || $this->countModules('top-d'))) {
?>
            <div class="row-fluid ba-container top">
                <div class="span3">
                    <jdoc:include type="modules" name="top-a" style="Gridboxhtml" />
                </div>
                <div class="span3">
                    <jdoc:include type="modules" name="top-b" style="Gridboxhtml" />
                </div>
                <div class="span3">
                    <jdoc:include type="modules" name="top-c" style="Gridboxhtml" />
                </div>
                 <div class="span3">
                    <jdoc:include type="modules" name="top-d" style="Gridboxhtml" />
                </div>
            </div>
<?php
}
?>

<?php
if (!$system && ($this->countModules('feature-a') || $this->countModules('feature-b') || $this->countModules('feature-c'))) {
?>
            <div class="row-fluid ba-container feature-top">
                <div class="span4">
                    <jdoc:include type="modules" name="feature-a" style="Gridboxhtml" />
                </div>
                <div class="span4">
                    <jdoc:include type="modules" name="feature-b" style="Gridboxhtml" />
                </div>
                <div class="span4">
                    <jdoc:include type="modules" name="feature-c" style="Gridboxhtml" />
                </div>
            </div>
<?php
}
?>

<?php
if (!$system && ($this->countModules('showcase-a') || $this->countModules('showcase-b'))) {
?>
            <div class="row-fluid ba-container showcase-top">
                <div class="span6">
                    <jdoc:include type="modules" name="showcase-a" style="Gridboxhtml" />
                </div>
                <div class="span6">
                    <jdoc:include type="modules" name="showcase-b" style="Gridboxhtml" />
                </div>
            </div>
<?php
}
?>

<?php
if (!$system && $this->countModules('breadcrumbs')) {
?>
            <div class="row-fluid ba-container">
                <div class="span12">
                    <div class="breadcrumbs">
                        <jdoc:include type="modules" name="breadcrumbs" style="Gridboxhtml" />
                    </div>
                </div>
            </div>
<?php
}
?>

        <div class="row-fluid main-body">
<?php
if (!$system && $this->countModules('sidebar-a')) {
?>
                <div class="sidebar-left span3">
                    <jdoc:include type="modules" name="sidebar-a" style="Gridboxhtml" />
                </div>
<?php
}
if (!$system && ($this->countModules('sidebar-a') && $this->countModules('sidebar-b'))) {
    $span = 'span6';
} else if (!$system && ($this->countModules('sidebar-a') || $this->countModules('sidebar-b'))) {
    $span = 'span9';
} else {
    $span = 'span12';
}
?>

            <div class="<?php echo $span; ?>">
                <jdoc:include type="message"/>
                <jdoc:include type="component"/>
            </div>

<?php
if (!$system && $this->countModules('sidebar-b')) {
?>
                <div class="sidebar-right span3">
                    <jdoc:include type="modules" name="sidebar-b" style="Gridboxhtml" />
                </div>
<?php
}
?>
        </div>

<?php
if (!$system && ($this->countModules('banner-a') || $this->countModules('banner-b') || $this->countModules('banner-c'))) {
?>
            <div class="row-fluid ba-container feature-bottom">
                <div class="span4">
                    <jdoc:include type="modules" name="banner-a" style="Gridboxhtml" />
                </div>
                <div class="span4">
                    <jdoc:include type="modules" name="banner-b" style="Gridboxhtml" />
                </div>
                <div class="span4">
                    <jdoc:include type="modules" name="banner-c" style="Gridboxhtml" />
                </div>
            </div>
<?php
}
?>

<?php
if (!$system && ($this->countModules('box-a') || $this->countModules('box-b')
    || $this->countModules('box-c') || $this->countModules('box-d'))) {
?>
            <div class="row-fluid ba-container bottom">
                <div class="span3">
                    <jdoc:include type="modules" name="box-a" style="Gridboxhtml" />
                </div>
                <div class="span3">
                    <jdoc:include type="modules" name="box-b" style="Gridboxhtml" />
                </div>
                <div class="span3">
                    <jdoc:include type="modules" name="box-c" style="Gridboxhtml" />
                </div>
                 <div class="span3">
                    <jdoc:include type="modules" name="box-d" style="Gridboxhtml" />
                </div>
            </div>
<?php
}
?>

<?php
if (!$system && ($this->countModules('bottom-a') || $this->countModules('bottom-b'))) {
?>
            <div class="row-fluid ba-container showcase-bottom">
                <div class="span6">
                    <jdoc:include type="modules" name="bottom-a" style="Gridboxhtml" />
                </div>
                <div class="span6">
                    <jdoc:include type="modules" name="bottom-b" style="Gridboxhtml" />
                </div>
            </div>
<?php
}
?>
<?php
    if ($view == 'gridbox' && (empty($pageType) || $pageType == 'single')) {
?>
        <div class="page-layout">
            <span>content</span>
        </div>
<?php
    }
?>
    </div>
<?php
if (empty($pageType) || $pageType == 'single') {
?>
    <footer class="footer">
        <?php echo $footer->html; ?>
<?php
    if ($view == 'gridbox') {
?>
        <div class="page-layout">
            <span>footer</span>
        </div>
<?php
    }
?>
    </footer>
<?php
}
?>
<?php
if ($params->desktop->background->type == 'video') {
?>
    <div class="ba-video-background global-video-bg"></div>
<?php
}
?>
<?php
if (!$system && $this->countModules('debug')) {
?>
    <jdoc:include type="modules" name="debug" style="Gridboxhtml" />
<?php
}
?>
<?php
if ($view != 'gridbox' || strpos($pageTitle, 'Gridbox Editor') === false) {
    echo $website->body_code."\n";
}
?>
</body>
</html>