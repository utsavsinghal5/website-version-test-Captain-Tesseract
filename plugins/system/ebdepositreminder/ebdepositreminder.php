<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

class plgSystemEBDepositReminder extends JPlugin
{
	/**
	 * Database object.
	 *
	 * @var    JDatabaseDriver
	 */
	protected $db;

	public function __construct(&$subject, $config = [])
	{
		if (!file_exists(JPATH_ROOT . '/components/com_eventbooking/eventbooking.php'))
		{
			return;
		}

		parent::__construct($subject, $config);
	}


	public function onAfterRespond()
	{
		$bccEmail                = $this->params->get('bcc_email', '');
		$lastRun                 = (int) $this->params->get('last_run', 0);
		$numberDays              = (int) $this->params->get('number_days', 7);
		$numberEmailSendEachTime = (int) $this->params->get('number_registrants', 0);
		$now                     = time();
		$cacheTime               = 1200; // 60 minutes

		if (($now - $lastRun) < $cacheTime)
		{
			return;
		}

		//Store last run time
		$query = $this->db->getQuery(true);
		$this->params->set('last_run', $now);
		$params = $this->params->toString();
		$query->clear();
		$query->update('#__extensions')
			->set('params=' . $this->db->quote($params))
			->where('`element`="ebdepositreminder"')
			->where('`folder`="system"');

		try
		{
			// Lock the tables to prevent multiple plugin executions causing a race condition
			$this->db->lockTable('#__extensions');
		}
		catch (Exception $e)
		{
			// If we can't lock the tables it's too risk continuing execution
			return;
		}

		try
		{
			// Update the plugin parameters
			$result = $this->db->setQuery($query)->execute();
			$this->clearCacheGroups(['com_plugins'], [0, 1]);
		}
		catch (Exception $exc)
		{
			// If we failed to execite
			$this->db->unlockTables();
			$result = false;
		}
		try
		{
			// Unlock the tables after writing
			$this->db->unlockTables();
		}
		catch (Exception $e)
		{
			// If we can't lock the tables assume we have somehow failed
			$result = false;
		}
		// Abort on failure
		if (!$result)
		{
			return;
		}

		// Require library + register autoloader
		require_once JPATH_ADMINISTRATOR . '/components/com_eventbooking/libraries/rad/bootstrap.php';

		EventbookingHelper::callOverridableHelperMethod('Mail', 'sendDepositReminder', [$numberDays, $numberEmailSendEachTime, $bccEmail]);

		return true;
	}

	/**
	 * Clears cache groups. We use it to clear the plugins cache after we update the last run timestamp.
	 *
	 * @param   array  $clearGroups   The cache groups to clean
	 * @param   array  $cacheClients  The cache clients (site, admin) to clean
	 *
	 * @return  void
	 *
	 * @since   2.0.4
	 */
	private function clearCacheGroups(array $clearGroups, array $cacheClients = [0, 1])
	{
		$conf = JFactory::getConfig();
		foreach ($clearGroups as $group)
		{
			foreach ($cacheClients as $client_id)
			{
				try
				{
					$options = [
						'defaultgroup' => $group,
						'cachebase'    => ($client_id) ? JPATH_ADMINISTRATOR . '/cache' :
							$conf->get('cache_path', JPATH_SITE . '/cache'),
					];
					$cache   = JCache::getInstance('callback', $options);
					$cache->clean();
				}
				catch (Exception $e)
				{
					// Ignore it
				}
			}
		}
	}
}
