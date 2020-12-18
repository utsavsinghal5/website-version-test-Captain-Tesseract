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
$doc->setGenerator('Powered by Website Builder Gridbox');
$this->language = $doc->language;
$this->direction = $doc->direction;
$option = $app->input->get('option', '', 'string');
$view = $app->input->get('view', '', 'string');
if ($option == 'com_gridbox' && $view == 'editor') {
    $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/gridbox.css');
    $doc->addStyleSheet('//fonts.googleapis.com/css?family=Roboto:300,400,500,700');
    $doc->addScript(JUri::root(true) . '/media/jui/js/jquery.min.js');
    $doc->addScript(JUri::root(true) . '/media/jui/js/bootstrap.min.js');
    JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<jdoc:include type="head" />
</head>
<body class="contentpane modal <?php echo $option; ?>">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
</body>
</html>
<?php
} else {
JLoader::register('gridboxHelper', JPATH_ROOT . '/components/com_gridbox/helpers/gridbox.php');
$system = gridboxHelper::getSystemParamsByType('offline');
gridboxHelper::checkSystemTheme($system->id);
gridboxHelper::setBreakpoints();
gridboxHelper::checkResponsive();
gridboxHelper::checkGridboxLanguage();
$aboutUs = gridboxHelper::aboutUs();
$id = gridboxHelper::getTheme($system->id, false, 'system');
$data = array('id' => $system->id, 'theme' => $id, 'edit_type' => 'system');
$page = new stdClass();
$page->option = 'com_gridbox';
$page->view = 'page';
$page->id = $system->id;
$data['page'] = $page;
$this->params = gridboxHelper::getThemeParams($id);
$params = $this->params->get('params');
$item = gridboxHelper::getSystemParams($system->id);
$item->html = gridboxHelper::checkModules($item->html, $item->items);
gridboxHelper::checkMoreScripts($item->html);
gridboxHelper::prepareParentFonts($params);
gridboxHelper::checkSystemCss($system->id);
$time = $this->params->get('time', '');
if (!empty($time)) {
    $time = '?'.$time;
}
$fonts = '{}';
$fonts = gridboxHelper::prepareFonts($fonts, 'com_gridbox', $system->id, 'system');
$style = gridboxHelper::checkCustom($id, 'page', $time);
$website = gridboxHelper::getWebsiteCode();
$doc->addScript(JUri::root() . 'media/jui/js/jquery.min.js');
$doc->addScript(JUri::root() . 'media/jui/js/bootstrap.min.js');
$doc->addScriptDeclaration("var JUri = '".JUri::root()."';");
$doc->addScript($this->baseurl . '/templates/gridbox/js/gridbox.js?'.$aboutUs->version);
$doc->addScriptDeclaration("var themeData = ".json_encode($data).";");
$doc->addStyleSheet($this->baseurl . '/templates/gridbox/css/gridbox.css?'.$aboutUs->version);
$doc->addStyleSheet($this->baseurl . '/templates/gridbox/css/storage/responsive.css'.$time);
$doc->addStyleSheet(JUri::root().'templates/gridbox/css/storage/style-'.$id.'.css'.$time);
$doc->addStyleSheet(JUri::root().'templates/gridbox/css/storage/offline.css'.$time);
if (!empty($fonts)) {
    $doc->addStyleSheet($fonts);
}
$breakpoints = json_encode(gridboxHelper::$breakpoints);
$disable_responsive = gridboxHelper::$website->disable_responsive == 1 ? 'true' : 'false';
$doc->addScriptDeclaration("var breakpoints = ".$breakpoints.";");
$doc->addScriptDeclaration("var menuBreakpoint = ".gridboxHelper::$menuBreakpoint.";");
$doc->addScriptDeclaration("var disableResponsive = ".$disable_responsive.", gridboxVersion = '".$aboutUs->version."';");
$getItemsUrl = 'index.php?option=com_gridbox&task=editor.getItems&id='.$data['id'].'&theme='.$data['theme'].'&edit_type=system';
$getItemsUrl .= '&view='.$data['page']->view.'&'.str_replace('?', '', $time);
$doc->addScript(JUri::root().$getItemsUrl);
$stylesheets = gridboxHelper::returnSystemStyle($doc);

gridboxHelper::createFavicon();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"
    dir="<?php echo $this->direction; ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $item->title; ?></title>
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
    if ($this->direction == 'rtl') { ?>
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/media/jui/css/bootstrap-rtl.css" type="text/css" />
<?php
    }
?>
    <link href="<?php echo $this->baseurl; ?>/templates/gridbox/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<?php
    echo $stylesheets;
    echo "\n".$website->header_code; 
    echo $style."\n";
?>
</head>
<body class="com_gridbox page">
    <div class="ba-overlay"></div>
    <div class="body">
        <div class="row-fluid main-body">
            <div class="span12">
<?php
if (JFactory::getUser()->authorise('core.edit', 'com_gridbox')) {
?>
            <a class="edit-page-btn" target="_blank"
               href="<?php echo JUri::root().'index.php?option=com_gridbox&view=editor&edit_type=system&tmpl=component&id='.$system->id; ?>">
               <i class="zmdi zmdi-settings"></i>
               <p class="edit-page"><?php echo JText::_('EDIT_PAGE'); ?></p>
            </a>
<?php
}
            echo $item->html;
?>
            </div>
        </div>
    </div>
<?php
if ($params->desktop->background->type == 'video') {
?>
    <div class="ba-video-background global-video-bg"></div>
<?php
}
?>
<?php
echo $website->body_code."\n";
?>
</body>
</html>
<?php
}