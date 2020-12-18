<?php
/**
* @package   Gridbox
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/


defined('_JEXEC') or die;

use Joomla\Registry\Registry;
require_once JPATH_ADMINISTRATOR . '/components/com_finder/helpers/indexer/adapter.php';

class PlgFinderGridbox extends FinderIndexerAdapter
{
    protected $context = 'Gridbox';
    protected $extension = 'com_gridbox';
    protected $layout = 'page';
    protected $type_title = 'Page';
    protected $table = '#__gridbox_pages';
    protected $autoloadLanguage = true;

    protected function setup()
    {
        return true;
    }

    protected function getHref($id)
    {
        $url = 'index.php?option=com_gridbox&view=page&id='.$id;
        $app = JFactory::getApplication();
        $menus = $app->getMenu('site');
        $component = JComponentHelper::getComponent('com_gridbox');
        $attributes = array('component_id');
        $values = array($component->id);
        $items = $menus->getItems($attributes, $values);
        $itemId = null;
        foreach ($items as $item) {
            if (isset($item->query) && isset($item->query['view'])) {
                if ($item->query['view'] == 'page' && $item->query['id'] == $id) {
                    $itemId = '&Itemid=' . $item->id;
                    break;
                }
            }
        }
        if (!$itemId) {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->select('a.id, a.type, p.page_category')
                ->from('#__gridbox_pages AS p')
                ->where('p.id = '.$id)
                ->leftJoin('`#__gridbox_app` AS a ON p.app_id = a.id');
            $db->setQuery($query);
            $app = $db->loadObject();
            if (!empty($app->type) && $app->type != 'single') {
                $url = 'index.php?option=com_gridbox&view=page&blog='.$app->id;
                $url .= '&category='.$app->page_category.'&id='.$id;
                foreach ($items as $value) {
                    if (isset($value->query) && isset($value->query['id']) && isset($value->query['app'])
                        && $value->query['view'] == 'blog' && $value->query['app'] == $app->id
                        && $value->query['id'] == $app->page_category) {
                        $itemId = '&Itemid='.$value->id;
                        break;
                    }
                }
                if (empty($itemId)) {
                    foreach ($items as $value) {
                        if (isset($value->query) && isset($value->query['id']) && isset($value->query['app'])
                            && $value->query['view'] == 'blog' && $value->query['app'] == $app->id
                            && $value->query['id'] == 0) {
                            $itemId = '&Itemid='.$value->id;
                            break;
                        }
                    }
                }
                if (empty($itemId)) {
                    foreach ($items as $value) {
                        if (isset($value->query) && isset($value->query['id']) && isset($value->query['app']) &&
                            $value->query['view'] == 'blog' && $value->query['app'] == $app->id) {
                            $itemId = '&Itemid='.$value->id;
                            break;
                        }
                    }
                }
            }
        }
        if ($itemId) {
            foreach ($items as $item) {
                if ($item->home == 1) {
                    $itemId = '&Itemid='.$item->id;
                    break;
                }
            }
        }
        $url .= $itemId;

        return $url;
    }

    protected function index(FinderIndexerResult $item, $format = 'html')
    {
        $item->setLanguage();
        if (JComponentHelper::isEnabled($this->extension) == false) {
            return;
        }
        JLoader::register('gridboxHelper', JPATH_ROOT.'/components/com_gridbox/helpers/gridbox.php');
        $registry = new Registry;
        $registry->loadString($item->metadata);
        $item->metadata = $registry;
        $item->publish_start_date = $item->start_date;
        $item->summary = strip_tags($item->body);
        $item->body = FinderIndexerHelper::prepareContent($item->body, '');
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);
        include_once JPATH_ROOT.'/components/com_gridbox/libraries/php/phpQuery/phpQuery.php';
        $item->body = gridboxHelper::checkMainMenu($item->body);
        $doc = phpQuery::newDocument($item->body);
        $search = '.ba-edit-item, .ba-box-model, .empty-item, .column-info, .ba-column-resizer,';
        $search .= ' .ba-edit-wrapper, .empty-list, .ba-item-main-menu > .ba-menu-wrapper > .main-menu > .add-new-item';
        pq($search)->remove();
        $item->body = $doc->htmlOuter();
        $item->summary = strip_tags($item->body);
        $item->url = $this->getUrl($item->id, $this->extension, $this->layout);
        $item->route = $this->getHref($item->id);
        $item->path = FinderIndexerHelper::getContentPath($item->route);
        $title = $this->getItemMenuTitle($item->url);
        if (!empty($title) && $this->params->get('use_menu_title', true)) {
            $item->title = $title;
        }
        $item->addInstruction(FinderIndexer::META_CONTEXT, 'meta_title');
        $item->addInstruction(FinderIndexer::META_CONTEXT, 'metadesc');
        $item->addInstruction(FinderIndexer::META_CONTEXT, 'metakey');
        $item->state = $this->translateState($item->state, $item->cat_state);
        FinderIndexerHelper::getContentExtras($item);
        $this->indexer->index($item);
    }

    protected function getListQuery($query = null)
    {
        $db = JFactory::getDbo();
        $query = $query instanceof JDatabaseQuery ? $query : $db->getQuery(true)
            ->select('a.id, a.title, a.page_alias AS alias, a.params AS body')
            ->select('a.published AS state, a.created AS start_date')
            ->select('a.meta_title, a.meta_description AS metadesc, a.meta_keywords AS metakey, a.page_access AS access')
            ->where('`language` in (' . $db->quote(JFactory::getLanguage()->getTag()) . ',' . $db->quote('*') . ')')
            ->from('#__gridbox_pages AS a');

        return $query;
    }
}
