<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
// no direct access
defined('_JEXEC') or die;

class EventbookingModelPlugin extends RADModelAdmin
{
	/**
	 * Instantiate the model.
	 *
	 * @param   array  $config  configuration data for the model
	 */
	public function __construct($config)
	{
		$config['table'] = '#__eb_payment_plugins';

		parent::__construct($config);
	}

	/**
	 * Pre-process data, store plugins param in JSON format
	 *
	 * @param   EventbookingTablePlugin  $row
	 * @param   RADInput                 $input
	 * @param   bool                     $isNew
	 */
	protected function beforeStore($row, $input, $isNew)
	{
		$params = $input->get('params', [], 'array');

		if (is_array($params))
		{
			for ($i = 0, $n = count($params); $i < $n; $i++)
			{
				if (!is_string($params[$i]))
				{
					continue;
				}

				$params[$i] = trim($params[$i]);
			}

			$params = json_encode($params);
		}
		else
		{
			$params = null;
		}

		$input->set('params', $params);
	}

	/**
	 * Install a payment plugin from given package
	 *
	 * @param $plugin
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function install($plugin)
	{
		$db = $this->getDbo();

		if ($plugin['error'] || $plugin['size'] < 1)
		{
			throw new Exception(JText::_('Upload plugin package error'));
		}

		$tmpPath = JFactory::getConfig()->get('tmp_path');

		if (!JFolder::exists($tmpPath))
		{
			$tmpPath = JPATH_ROOT . '/tmp';
		}

		$destinationDir = $tmpPath . '/' . $plugin['name'];

		$uploaded = JFile::upload($plugin['tmp_name'], $destinationDir, false, true);

		if (!$uploaded)
		{
			throw new Exception(JText::_('Upload plugin package'));
		}

		// Temporary folder to extract the archive into
		$tmpDir     = uniqid('install_');
		$extractDir = JPath::clean(dirname($destinationDir) . '/' . $tmpDir);

		if (EventbookingHelper::isJoomla4())
		{
			$archive = new Joomla\Archive\Archive(['tmp_path' => JFactory::getConfig()->get('tmp_path')]);
			$result  = $archive->extract($destinationDir, $extractDir);
		}
		else
		{
			$result = JArchive::extract($destinationDir, $extractDir);
		}

		if (!$result)
		{
			throw new Exception(JText::_('Could not extract plugin package'));
		}

		$dirList = array_merge(JFolder::files($extractDir, ''), JFolder::folders($extractDir, ''));

		if (count($dirList) == 1)
		{
			if (JFolder::exists($extractDir . '/' . $dirList[0]))
			{
				$extractDir = JPath::clean($extractDir . '/' . $dirList[0]);
			}
		}

		//Now, search for xml file
		$xmlFiles = JFolder::files($extractDir, '.xml$', 1, true);

		if (empty($xmlFiles))
		{
			throw new Exception(JText::_('Could not find xml file in the package'));
		}

		$file = $xmlFiles[0];
		$root = simplexml_load_file($file);

		if ($root->getName() !== 'install')
		{
			throw new Exception(JText::_('Invalid xml file for payment plugin installation function'));
		}

		$row          = $this->getTable();
		$name         = (string) $root->name;
		$title        = (string) $root->title;
		$author       = (string) $root->author;
		$creationDate = (string) $root->creationDate;
		$copyright    = (string) $root->copyright;
		$license      = (string) $root->license;
		$authorEmail  = (string) $root->authorEmail;
		$authorUrl    = (string) $root->authorUrl;
		$version      = (string) $root->version;
		$description  = (string) $root->description;

		$query = $db->getQuery(true);
		$query->select('id')
			->from('#__eb_payment_plugins')
			->where('name="' . $name . '"');
		$db->setQuery($query);
		$pluginId = (int) $db->loadResult();

		if ($pluginId)
		{
			$row->load($pluginId);
			$row->name          = $name;
			$row->author        = $author;
			$row->creation_date = $creationDate;
			$row->copyright     = $copyright;
			$row->license       = $license;
			$row->author_email  = $authorEmail;
			$row->author_url    = $authorUrl;
			$row->version       = $version;
			$row->description   = $description;
		}
		else
		{
			$row->name          = $name;
			$row->title         = $title;
			$row->author        = $author;
			$row->creation_date = $creationDate;
			$row->copyright     = $copyright;
			$row->license       = $license;
			$row->author_email  = $authorEmail;
			$row->author_url    = $authorUrl;
			$row->version       = $version;
			$row->description   = $description;
			$row->published     = 0;
			$row->ordering      = $row->getNextOrder('published=1');
		}

		$row->store();

		$pluginDir = JPATH_ROOT . '/components/com_eventbooking/payments';
		JFile::move($file, $pluginDir . '/' . basename($file));
		$files = $root->files->children();

		for ($i = 0, $n = count($files); $i < $n; $i++)
		{
			$file = $files[$i];

			if ($file->getName() == 'filename')
			{
				$fileName = $file;
				JFile::copy($extractDir . '/' . $fileName, $pluginDir . '/' . $fileName);
			}
			elseif ($file->getName() == 'folder')
			{
				$folderName = $file;

				if (JFolder::exists($extractDir . '/' . $folderName))
				{
					if (JFolder::exists($pluginDir . '/' . $folderName))
					{
						JFolder::delete($pluginDir . '/' . $folderName);
					}

					JFolder::move($extractDir . '/' . $folderName, $pluginDir . '/' . $folderName);
				}
			}
		}

		JFolder::delete($extractDir);

		return true;
	}

	/**
	 * Uninstall a payment plugin
	 *
	 * @param   int  $id
	 *
	 * @return boolean
	 */
	public function uninstall($id)
	{
		$row = $this->getTable();
		$row->load($id);
		$name         = $row->name;
		$pluginFolder = JPATH_ROOT . '/components/com_eventbooking/payments';
		$file         = $pluginFolder . '/' . $name . '.xml';
		if (!JFile::exists($file))
		{
			$row->delete();

			return true;
		}
		$root      = JFactory::getXML($file);
		$files     = $root->files->children();
		$pluginDir = JPATH_ROOT . '/components/com_eventbooking/payments';
		for ($i = 0, $n = count($files); $i < $n; $i++)
		{
			$file = $files[$i];
			if ($file->getName() == 'filename')
			{
				$fileName = $file;
				if (JFile::exists($pluginDir . '/' . $fileName))
				{
					JFile::delete($pluginDir . '/' . $fileName);
				}
			}
			elseif ($file->getName() == 'folder')
			{
				$folderName = $file;
				if ($folderName)
				{
					if (JFolder::exists($pluginDir . '/' . $folderName))
					{
						JFolder::delete($pluginDir . '/' . $folderName);
					}
				}
			}
		}
		$files          = $root->languages->children();
		$languageFolder = JPATH_ROOT . '/language';
		for ($i = 0, $n = count($files); $i < $n; $i++)
		{
			$fileName          = $files[$i];
			$pos               = strpos($fileName, '.');
			$languageSubFolder = substr($fileName, 0, $pos);
			if (JFile::exists($languageFolder . '/' . $languageSubFolder . '/' . $fileName))
			{
				JFile::delete($languageFolder . '/' . $languageSubFolder . '/' . $fileName);
			}
		}
		JFile::delete($pluginFolder . '/' . $name . '.xml');
		$row->delete();

		return true;
	}
}
