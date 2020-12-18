<?php
/**
 * @package            Joomla
 * @subpackage         Event Booking
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2020 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;
use Joomla\Utilities\ArrayHelper;

class EventbookingHelperOverrideRegistration extends EventbookingHelperRegistration
{
    public static function buildTags($row, $form, $event, $config, $loadCss = true)
    {
        $app     = JFactory::getApplication();
        $db      = JFactory::getDbo();
        $query   = $db->getQuery(true);
        $siteUrl = EventbookingHelper::getSiteUrl();

        $task = $app->input->getCmd('task');

        if ($app->isClient('administrator') || ($task == 'payment_confirm' && !$app->input->get->getInt('Itemid')))
        {
            $Itemid = EventbookingHelper::getItemid();
        }
        else
        {
            $Itemid = JFactory::getApplication()->input->getInt('Itemid', 0) ?: EventbookingHelper::getItemid();
        }

        $fieldSuffix = EventbookingHelper::getFieldSuffix($row->language);

        $replaces = static::buildEventTags($event, $config, $row, $Itemid);

        // Event information
        if ($config->multiple_booking)
        {
            $query->select('event_id')
                ->from('#__eb_registrants')
                ->where("(id = $row->id OR cart_id = $row->id)")
                ->order('id');
            $db->setQuery($query);
            $eventIds = $db->loadColumn();

            $query->clear()
                ->select($db->quoteName('title' . $fieldSuffix, 'title'))
                ->from('#__eb_events')
                ->where('id IN (' . implode(',', $eventIds) . ')')
                ->order('FIND_IN_SET(id, "' . implode(',', $eventIds) . '")');

            $db->setQuery($query);
            $replaces['event_title'] = implode(', ', $db->loadColumn());
        }

        $replaces['couponCode']         = $replaces['coupon_code'] = '';
        $replaces['username']           = '';
        $replaces['TICKET_TYPES']       = '';
        $replaces['TICKET_TYPES_TABLE'] = '';
        $replaces['TICKET_TYPE']        = '';
        $replaces['user_id']            = $row->user_id;
        $replaces['name']               = trim($row->first_name . ' ' . $row->last_name);

        // Form fields
        $fields = $form->getFields();

        foreach ($fields as $field)
        {
            if ($field->hideOnDisplay)
            {
                $fieldValue = '';
            }
            else
            {
                if (is_string($field->value) && is_array(json_decode($field->value)))
                {
                    $fieldValue = implode(', ', json_decode($field->value));
                }
                elseif ($field->type == 'Heading')
                {
                    $fieldValue = $field->title;
                }
                elseif ($field->type == 'Message')
                {
                    $fieldValue = $field->description;
                }
                else
                {
                    $fieldValue = $field->value;
                }
            }

            if ($fieldValue && $field->type == 'Date')
            {
                $date = JFactory::getDate($fieldValue);

                if ($date)
                {
                    $dateFormat = $config->date_field_format ? $config->date_field_format : '%Y-%m-%d';
                    $dateFormat = str_replace('%', '', $dateFormat);
                    $fieldValue = $date->format($dateFormat);
                }
            }

            $replaces[$field->name] = $fieldValue;
        }

        // Add support for group members name tags
        if ($row->is_group_billing)
        {
            $groupMembersNames = [];

            $query->clear()
                ->select('first_name, last_name')
                ->from('#__eb_registrants')
                ->where('group_id = ' . $row->id)
                ->order('id');
            $db->setQuery($query);
            $rowMembers = $db->loadObjectList();

            foreach ($rowMembers as $rowMember)
            {
                $groupMembersNames[] = trim($rowMember->first_name . ' ' . $rowMember->last_name);
            }
        }
        else
        {
            $groupMembersNames = [trim($row->first_name . ' ' . $row->last_name)];
        }

        $replaces['group_members_names'] = implode(', ', $groupMembersNames);

        if ($row->coupon_id)
        {
            $query->clear()
                ->select('a.code')
                ->from('#__eb_coupons AS a')
                ->where('a.id=' . (int) $row->coupon_id);
            $db->setQuery($query);
            $replaces['coupon_code'] = $replaces['couponCode'] = $db->loadResult();
        }

        if ($row->user_id)
        {
            $query->clear()
                ->select('username')
                ->from('#__users')
                ->where('id = ' . $row->user_id);
            $db->setQuery($query);
            $replaces['username'] = $db->loadResult();
        }

        if ($config->multiple_booking)
        {
            //Amount calculation
            $query->clear()
                ->select('SUM(total_amount)')
                ->from('#__eb_registrants')
                ->where("(id = $row->id OR cart_id = $row->id)");
            $db->setQuery($query);
            $totalAmount = $db->loadResult();

            $query->clear('select')
                ->select('SUM(tax_amount)');
            $db->setQuery($query);
            $taxAmount = $db->loadResult();

            $query->clear('select')
                ->select('SUM(payment_processing_fee)');
            $db->setQuery($query);
            $paymentProcessingFee = $db->loadResult();

            $query->clear('select')
                ->select('SUM(discount_amount)');
            $db->setQuery($query);
            $discountAmount = $db->loadResult();

            $query->clear('select')
                ->select('SUM(late_fee)');
            $db->setQuery($query);
            $lateFee = $db->loadResult();

            $amount = $totalAmount - $discountAmount + $paymentProcessingFee + $taxAmount + $lateFee;

            if ($row->payment_status == 1)
            {
                $depositAmount = 0;
                $dueAmount     = 0;
            }
            else
            {
                $query->clear('select')
                    ->select('SUM(deposit_amount)');
                $db->setQuery($query);
                $depositAmount = $db->loadResult();

                $dueAmount = $amount - $depositAmount;
            }

            $replaces['total_amount']                = EventbookingHelperOverrideHelper::formatCurrencyDashboard($totalAmount, $config, $event->currency_symbol);
            $replaces['total_amount_minus_discount'] = EventbookingHelperOverrideHelper::formatCurrencyDashboard($totalAmount - $discountAmount, $config, $event->currency_symbol);
            $replaces['tax_amount']                  = EventbookingHelperOverrideHelper::formatCurrencyDashboard($taxAmount, $config, $event->currency_symbol);
            $replaces['discount_amount']             = EventbookingHelperOverrideHelper::formatCurrencyDashboard($discountAmount, $config, $event->currency_symbol);
            $replaces['late_fee']                    = EventbookingHelperOverrideHelper::formatCurrencyDashboard($lateFee, $config, $event->currency_symbol);
            $replaces['payment_processing_fee']      = EventbookingHelperOverrideHelper::formatCurrencyDashboard($paymentProcessingFee, $config, $event->currency_symbol);
            $replaces['amount']                      = EventbookingHelperOverrideHelper::formatCurrencyDashboard($amount, $config, $event->currency_symbol);
            $replaces['deposit_amount']              = EventbookingHelperOverrideHelper::formatCurrencyDashboard($depositAmount, $config, $event->currency_symbol);
            $replaces['due_amount']                  = EventbookingHelperOverrideHelper::formatCurrencyDashboard($dueAmount, $config, $event->currency_symbol);

            $replaces['amt_total_amount']           = $totalAmount;
            $replaces['amt_tax_amount']             = $taxAmount;
            $replaces['amt_discount_amount']        = $discountAmount;
            $replaces['amt_late_fee']               = $lateFee;
            $replaces['amt_amount']                 = $amount;
            $replaces['amt_payment_processing_fee'] = $paymentProcessingFee;
            $replaces['amt_deposit_amount']         = $depositAmount;
            $replaces['amt_due_amount']             = $dueAmount;

            // Auto coupon code
            $query->clear()
                ->select('auto_coupon_coupon_id')
                ->from('#__eb_registrants')
                ->where('(id = ' . $row->id . ' OR cart_id = ' . $row->id . ')')
                ->where('auto_coupon_coupon_id > 0');
            $db->setQuery($query);
            $couponIds = $db->loadColumn();

            if (count($couponIds))
            {
                $query->clear()
                    ->select($db->quoteName('code'))
                    ->from('#__eb_coupons')
                    ->where('id IN (' . implode(',', $couponIds) . ')');
                $db->setQuery($query);
                $replaces['AUTO_COUPON_CODES'] = implode(', ', $db->loadColumn());
            }
            else
            {
                $replaces['AUTO_COUPON_CODES'] = '';
            }
        }
        else
        {
            $replaces['total_amount']                = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->total_amount, $config, $event->currency_symbol);
            $replaces['total_amount_minus_discount'] = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->total_amount - $row->discount_amount, $config, $event->currency_symbol);
            $replaces['tax_amount']                  = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->tax_amount, $config, $event->currency_symbol);
            $replaces['discount_amount']             = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->discount_amount, $config, $event->currency_symbol);
            $replaces['late_fee']                    = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->late_fee, $config, $event->currency_symbol);
            $replaces['payment_processing_fee']      = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->payment_processing_fee, $config, $event->currency_symbol);
            $replaces['amount']                      = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->amount, $config, $event->currency_symbol);

            $replaces['total_amount_without_currency']           = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->total_amount, $config);
            $replaces['tax_amount_without_currency']             = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->tax_amount, $config);
            $replaces['discount_amount_without_currency']        = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->discount_amount, $config);
            $replaces['late_fee_without_currency']               = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->late_fee, $config);
            $replaces['payment_processing_fee_without_currency'] = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->payment_processing_fee, $config);
            $replaces['amount_without_currency']                 = EventbookingHelperOverrideHelper::formatCurrencyDashboard($row->amount, $config);

            if ($row->payment_status == 1)
            {
                $depositAmount = 0;
                $dueAmount     = 0;
            }
            else
            {
                $depositAmount = $row->deposit_amount;
                $dueAmount     = $row->amount - $row->deposit_amount;
            }

            $replaces['deposit_amount']                  = EventbookingHelperOverrideHelper::formatCurrencyDashboard($depositAmount, $config, $event->currency_symbol);
            $replaces['due_amount']                      = EventbookingHelperOverrideHelper::formatCurrencyDashboard($dueAmount, $config, $event->currency_symbol);
            $replaces['deposit_amount_without_currency'] = EventbookingHelperOverrideHelper::formatCurrencyDashboard($depositAmount, $config);
            $replaces['due_amount_without_currency']     = EventbookingHelperOverrideHelper::formatCurrencyDashboard($dueAmount, $config);

            // Ticket Types
            if ($event->has_multiple_ticket_types)
            {
                $query->clear()
                    ->select('id, title')
                    ->from('#__eb_ticket_types')
                    ->where('event_id = ' . $event->id);
                $db->setQuery($query);
                $ticketTypes = $db->loadObjectList('id');

                $query->clear()
                    ->select('ticket_type_id, quantity')
                    ->from('#__eb_registrant_tickets')
                    ->where('registrant_id = ' . $row->id);
                $db->setQuery($query);
                $registrantTickets = $db->loadObjectList();


                $ticketsOutput = [];

                foreach ($registrantTickets as $registrantTicket)
                {
                    $ticketsOutput[]         = JText::_($ticketTypes[$registrantTicket->ticket_type_id]->title) . ': ' . $registrantTicket->quantity;
                    $replaces['TICKET_TYPE'] = JText::_($ticketTypes[$registrantTicket->ticket_type_id]->title);
                }

                $replaces['TICKET_TYPES'] = implode(', ', $ticketsOutput);

                $query->clear()
                    ->select('a.*, b.quantity')
                    ->from('#__eb_ticket_types AS a')
                    ->innerJoin('#__eb_registrant_tickets AS b ON a.id = ticket_type_id')
                    ->where('b.registrant_id = ' . $row->id);
                $db->setQuery($query);
                $replaces['TICKET_TYPES_TABLE'] = EventbookingHelperHtml::loadCommonLayout('emailtemplates/tickettypes.php', ['ticketTypes' => $db->loadObjectList(), 'eventId' => $row->event_id]);
            }
        }

        $rate                          = EventbookingHelper::callOverridableHelperMethod('Registration', 'getRegistrationRate', [$row->event_id, $row->number_registrants]);
        $replaces['registration_rate'] = EventbookingHelperOverrideHelper::formatCurrencyDashboard($rate, $config, $event->currency_symbol);


        // Registration record related tags
        $replaces['number_registrants'] = $row->number_registrants;
        $replaces['invoice_number']     = EventbookingHelper::callOverridableHelperMethod('Helper', 'formatInvoiceNumber', [$row->invoice_number, $config, $row]);
        $replaces['transaction_id']     = $row->transaction_id;
        $replaces['registration_code']  = $row->registration_code;
        $replaces['id']                 = $row->id;
        $replaces['registrant_id']      = $row->id;
        $replaces['date']               = JHtml::_('date', 'Now', $config->date_format);

        if ($row->payment_date != $db->getNullDate())
        {
            $replaces['payment_date'] = JHtml::_('date', $row->payment_date, $config->date_format);;
        }
        else
        {
            $replaces['payment_date'] = '';
        }

        if ($row->register_date != $db->getNullDate())
        {
            $replaces['register_date']      = JHtml::_('date', $row->register_date, $config->date_format);
            $replaces['register_date_time'] = JHtml::_('date', $row->register_date, $config->date_format . ' H:i:s');
        }
        else
        {
            $replaces['register_date']      = '';
            $replaces['register_date_time'] = '';
        }

        $method = EventbookingHelperPayments::loadPaymentMethod($row->payment_method);

        if ($method)
        {
            $replaces['payment_method'] = JText::_($method->title);
        }
        else
        {
            $replaces['payment_method'] = '';
        }

        // Registration detail tags
        $replaces['registration_detail'] = static::getEmailContent($config, $row, $loadCss, $form);

        // Cancel link

        if ($event->enable_cancel_registration)
        {
            $replaces['cancel_registration_link'] = $siteUrl . 'index.php?option=com_eventbooking&task=cancel_registration_confirm&cancel_code=' . $row->registration_code . '&Itemid=' . $Itemid;
        }
        else
        {
            $replaces['cancel_registration_link'] = '';
        }

        if ($config->activate_deposit_feature)
        {
            $replaces['deposit_payment_link'] = $siteUrl . 'index.php?order_number=' . $row->registration_code . '&option=com_eventbooking&view=payment&Itemid=' . $Itemid;
        }
        else
        {
            $replaces['deposit_payment_link'] = '';
        }

        $replaces['download_certificate_link'] = $siteUrl . 'index.php?option=com_eventbooking&task=registrant.download_certificate&download_code=' . $row->registration_code . '&Itemid=' . $Itemid;
        $replaces['download_ticket_link']      = $siteUrl . 'index.php?option=com_eventbooking&task=registrant.download_ticket&download_code=' . $row->registration_code . '&Itemid=' . $Itemid;

        // Make sure if a custom field is not available, the used tag would be empty
        $query->clear()
            ->select('*')
            ->from('#__eb_fields')
            ->where('published = 1');
        $db->setQuery($query);
        $allFields = $db->loadObjectList();

        foreach ($allFields as $field)
        {
            if (!isset($replaces[$field->name]))
            {
                if ($field->is_core)
                {
                    $replaces[$field->name] = $row->{$field->name};
                }
                else
                {
                    $replaces[$field->name] = '';
                }
            }
        }

        if (!isset($replaces['name']))
        {
            $replaces['name'] = trim($row->first_name . ' ' . $row->last_name);
        }

        // Registration status tag
        switch ($row->published)
        {
            case 0 :
                $replaces['REGISTRATION_STATUS'] = JText::_('EB_PENDING');
                break;
            case 1 :
                $replaces['REGISTRATION_STATUS'] = JText::_('EB_PAID');
                break;
            case 2 :
                $replaces['REGISTRATION_STATUS'] = JText::_('EB_CANCELLED');
                break;
            case 3:
                $replaces['REGISTRATION_STATUS'] = JText::_('EB_WAITING_LIST');
                break;
            default:
                $replaces['REGISTRATION_STATUS'] = '';
                break;
        }

        if ($row->payment_status == 0)
        {
            $replaces['PAYMENT_STATUS'] = JText::_('EB_PARTIAL_PAYMENT');
        }
        elseif ($row->payment_status == 2)
        {
            $replaces['PAYMENT_STATUS'] = JText::_('EB_DEPOSIT_PAID');
        }
        else
        {
            $replaces['PAYMENT_STATUS'] = JText::_('EB_FULL_PAYMENT');
        }

        // Auto coupon
        $replaces['AUTO_COUPON_CODE'] = '';

        if ($row->auto_coupon_coupon_id > 0)
        {
            $query->clear()
                ->select($db->quoteName('code'))
                ->from('#__eb_coupons')
                ->where('id = ' . $row->auto_coupon_coupon_id);
            $db->setQuery($query);
            $replaces['AUTO_COUPON_CODE'] = $db->loadResult();
        }

        $replaces['published']      = $row->published;
        $replaces['payment_status'] = $row->payment_status;

        // Subscribe to newsletter
        if ($row->subscribe_newsletter)
        {
            $replaces['SUBSCRIBE_NEWSLETTER'] = JText::_('EB_SUBSCRIBED_TO_NEWSLETTER');
        }
        else
        {
            $replaces['SUBSCRIBE_NEWSLETTER'] = JText::_('EB_DO_NOT_SUBSCRIBE_TO_NEWSLETTER');
        }


        if ($event->collect_member_information === '')
        {
            $collectMemberInformation = $config->collect_member_information;
        }
        else
        {
            $collectMemberInformation = $event->collect_member_information;
        }

        // Group members tag
        if ($row->is_group_billing && $collectMemberInformation)
        {
            $query->clear()
                ->select('*')
                ->from('#__eb_registrants')
                ->where('group_id = ' . $row->id)
                ->order('id');
            $db->setQuery($query);
            $rowMembers                = $db->loadObjectList();
            $memberFormFields          = EventbookingHelperRegistration::getFormFields($row->event_id, 2, $row->language, $row->user_id);
            $replaces['group_members'] = EventbookingHelperHtml::loadCommonLayout('emailtemplates/tmpl/email_group_members.php', ['rowMembers' => $rowMembers, 'rowFields' => $memberFormFields]);
        }
        else
        {
            $replaces['group_members'] = '';
        }

        if (static::isEUVatTaxRulesEnabled())
        {
            $replaces['tax_rate'] = $row->tax_rate;
        }
        else
        {
            $replaces['tax_rate'] = $event->tax_rate;
        }

        if (is_string($row->params) && is_array(json_decode($row->params, true)))
        {
            $params = json_decode($row->params, true);

            foreach ($params as $key => $value)
            {
                if (!array_key_exists($key, $replaces))
                {
                    $replaces[$key] = $value;
                }
            }
        }

        return $replaces;
    }

    public static function buildEventTags($event, $config, $row = null, $Itemid = 0)
    {
        $replaces   = [];
        $siteUrl    = EventbookingHelper::getSiteUrl();
        $nullDate   = JFactory::getDbo()->getNullDate();
        $timeFormat = $config->event_time_format ?: 'g:i a';

        $replaces['event_id']    = $event->id;
        $replaces['event_title'] = $event->title;
        $replaces['alias']       = $event->alias;
        $replaces['price_text']  = $event->price_text;

        if ($event->event_date == EB_TBC_DATE)
        {
            $replaces['event_date']      = JText::_('EB_TBC');
            $replaces['event_date_date'] = JText::_('EB_TBC');
            $replaces['event_date_time'] = JText::_('EB_TBC');
        }
        else
        {
            $replaces['event_date']      = JHtml::_('date', $event->event_date, $config->event_date_format, null);
            $replaces['event_date_date'] = JHtml::_('date', $event->event_date, $config->date_format, null);
            $replaces['event_date_time'] = JHtml::_('date', $event->event_date, $timeFormat, null);
        }

        if ($event->event_end_date != $nullDate)
        {
            $replaces['event_end_date']      = JHtml::_('date', $event->event_end_date, $config->event_date_format, null);
            $replaces['event_end_date_date'] = JHtml::_('date', $event->event_end_date, $config->date_format, null);
            $replaces['event_end_date_time'] = JHtml::_('date', $event->event_end_date, $timeFormat, null);
        }
        else
        {
            $replaces['event_end_date']      = '';
            $replaces['event_end_date_date'] = '';
            $replaces['event_end_date_time'] = '';
        }

        $replaces['short_description'] = $event->short_description;
        $replaces['description']       = $event->description;
        $replaces['event_capacity']    = $event->event_capacity;

        if (property_exists($event, 'total_registrants'))
        {
            $replaces['total_registrants'] = $event->total_registrants;

            if ($event->event_capacity > 0)
            {
                $replaces['available_place'] = $event->event_capacity - $event->total_registrants;
            }
            else
            {
                $replaces['available_place'] = '';
            }
        }

        $replaces['individual_price'] = EventbookingHelperOverrideHelper::formatCurrencyDashboard($event->individual_price, $config, $event->currency_symbol);

        if ($event->location_id > 0)
        {
            $rowLocation = EventbookingHelperDatabase::getLocation($event->location_id);

            $locationInformation = [];

            if ($rowLocation->address)
            {
                $locationInformation[] = $rowLocation->address;
            }

            $locationLink = $siteUrl . 'index.php?option=com_eventbooking&view=map&location_id=' . $rowLocation->id . '&Itemid=' . $Itemid;

            if (count($locationInformation))
            {
                $locationName = $rowLocation->name . ' (' . implode(', ', $locationInformation) . ')';
            }
            else
            {
                $locationName = $rowLocation->name;
            }

            $replaces['location']              = '<a href="' . $locationLink . '">' . $locationName . '</a>';
            $replaces['location_name_address'] = $locationName;
            $replaces['location_name']         = $rowLocation->name;
            $replaces['location_city']         = $rowLocation->city;
            $replaces['location_state']        = $rowLocation->state;
            $replaces['location_address']      = $rowLocation->address;
            $replaces['location_description']  = $rowLocation->description;
        }
        else
        {
            $replaces['location']              = '';
            $replaces['location_name']         = '';
            $replaces['location']              = '';
            $replaces['location_name_address'] = '';
            $replaces['location_name']         = '';
            $replaces['location_city']         = '';
            $replaces['location_state']        = '';
            $replaces['location_address']      = '';
            $replaces['location_description']  = '';
        }

        if ($config->event_custom_field && file_exists(JPATH_ROOT . '/components/com_eventbooking/fields.xml'))
        {
            EventbookingHelperData::prepareCustomFieldsData([$event]);

            foreach ($event->paramData as $customFieldName => $param)
            {
                $replaces[strtoupper($customFieldName)] = $param['value'];
            }
        }

        // Speakers
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('*')
            ->from('#__eb_speakers')
            ->where('event_id = ' . $event->id)
            ->order('ordering');
        $db->setQuery($query);
        $rowSpeakers = $db->loadObjectList();

        $speakerNames = [];

        foreach ($rowSpeakers as $rowSpeaker)
        {
            $replaces['speaker_' . $rowSpeaker->id] = $rowSpeaker->name;
            $speakerNames[]                         = $rowSpeaker->name;
        }

        $replaces['speakers'] = implode(', ', $speakerNames);

        if (!$Itemid)
        {
            $Itemid = EventbookingHelper::getItemid();
        }

        if (JFactory::getApplication()->isClient('site'))
        {
            $replaces['event_link']    = JUri::getInstance()->toString(['scheme', 'user', 'pass', 'host']) . JRoute::_(EventbookingHelperRoute::getEventRoute($event->id, 0, $Itemid));
            $replaces['category_link'] = JUri::getInstance()->toString(['scheme', 'user', 'pass', 'host']) . JRoute::_(EventbookingHelperRoute::getCategoryRoute($event->main_category_id, $Itemid));
        }
        else
        {
            $replaces['event_link']    = $siteUrl . EventbookingHelperRoute::getEventRoute($event->id, 0, EventbookingHelper::getItemid());
            $replaces['category_link'] = $siteUrl . EventbookingHelperRoute::getCategoryRoute($event->main_category_id, EventbookingHelper::getItemid());
        }


        if ($row && is_object($row))
        {
            $fieldSuffix = EventbookingHelper::getFieldSuffix($row->language);
        }
        else
        {
            $fieldSuffix = EventbookingHelper::getFieldSuffix();
        }

        $query->clear()
            ->select('a.id, a.name, a.description')
            ->from('#__eb_categories AS a')
            ->innerJoin('#__eb_event_categories AS b ON a.id = b.category_id')
            ->where('b.event_id = ' . $event->id)
            ->order('b.id');

        if ($fieldSuffix)
        {
            EventbookingHelperDatabase::getMultilingualFields($query, ['a.name', 'a.description'], $fieldSuffix);
        }

        $db->setQuery($query);
        $categories    = $db->loadObjectList();
        $categoryNames = [];

        foreach ($categories as $category)
        {
            $categoryNames[] = $category->name;

            if ($category->id == $event->main_category_id)
            {
                $replaces['main_category_name'] = $category->name;
            }
        }

        $replaces['category_name'] = implode(', ', $categoryNames);

        if ($event->created_by > 0)
        {
            $creator = JFactory::getUser($event->created_by);
        }

        if (!empty($creator->id))
        {
            $replaces['event_creator_name']     = $creator->name;
            $replaces['event_creator_username'] = $creator->username;
            $replaces['event_creator_email']    = $creator->email;
            $replaces['event_creator_id']       = $creator->id;
        }
        else
        {
            $replaces['event_creator_name']     = '';
            $replaces['event_creator_username'] = '';
            $replaces['event_creator_email']    = '';
            $replaces['event_creator_id']       = '';
        }

        return $replaces;
    }
}