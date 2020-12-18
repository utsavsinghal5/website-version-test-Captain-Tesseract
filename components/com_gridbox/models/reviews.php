<?php
/**
* @package   Gridbox
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

class gridboxModelReviews extends JModelItem
{
    public function getTable($type = 'Fonts', $prefix = 'gridboxTable', $config = array()) 
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function moderatorBanUser($id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('email, ip')
            ->from('#__gridbox_reviews')
            ->where('id = '.$id);
        $db->setQuery($query);
        $user = $db->loadObject();
        if (!empty($user->email)) {
            $flag = $this->checkCommentUserBanStatus($user->email, '#__gridbox_reviews_banned_emails', 'email');
            if (!$flag) {
                $obj = new stdClass();
                $obj->email = $user->email;
                $db->insertObject('#__gridbox_reviews_banned_emails', $obj);
            }
        }
        if (!empty($user->ip)) {
            $flag = $this->checkCommentUserBanStatus($user->ip, '#__gridbox_reviews_banned_ip', 'ip');
            if (!$flag) {
                $obj = new stdClass();
                $obj->ip = $user->ip;
                $db->insertObject('#__gridbox_reviews_banned_ip', $obj);
            }
        }
        if (empty($user->email) && empty($user->ip)) {
            $msg = JText::_('USER_CANNOT_BE_BANNED');
        } else {
            $msg = JText::_('SUCCESSFULLY_BANNED');
        }

        return $msg;
    }

    public function checkCommentUserBanStatus($value, $table, $key)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('id')
            ->from($table)
            ->where($key.' = '.$db->quote($value));
        $db->setQuery($query);
        $result = $db->loadResult();

        return $result;
    }

    public function moderatorApprove($id)
    {
        $db = JFactory::getDbo();
        $obj = new stdClass();
        $obj->id = $id;
        $obj->status = 'approved';
        $db->updateObject('#__gridbox_reviews', $obj, 'id');
    }

    public function moderatorSpam($id)
    {
        $db = JFactory::getDbo();
        $obj = new stdClass();
        $obj->id = $id;
        $obj->status = 'spam';
        $db->updateObject('#__gridbox_reviews', $obj, 'id');
    }

    public function checkUserPermission($user, $id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('user_type, user_id')
            ->from('#__gridbox_reviews')
            ->where('id = '.$id);
        $db->setQuery($query);
        $obj = $db->loadObject();

        return $obj->user_type != 'guest' && $obj->user_type == $user->type && $obj->user_id == $user->id;
    }

    public function deleteComment($id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->delete('#__gridbox_reviews')
            ->where('id = '.$id);
        $db->setQuery($query)
            ->execute();
        $query = $db->getQuery(true)
            ->select('*')
            ->from('#__gridbox_reviews_attachments')
            ->where('comment_id = '.$id);
        $db->setQuery($query);
        $files = $db->loadObjectList();
        foreach ($files as $file) {
            gridboxHelper::removeTmpReviewsAttachment($file->id, $file->filename);
        }
        $query = $db->getQuery(true)
            ->delete('#__gridbox_reviews_likes_map')
            ->where('comment_id = '.$id);
        $db->setQuery($query)
            ->execute();
        $query = $db->getQuery(true)
            ->select('id')
            ->from('#__gridbox_reviews')
            ->where('parent = '.$id);
        $db->setQuery($query);
        $childs = $db->loadObjectList();
        foreach ($childs as $key => $child) {
            $this->deleteComment($child->id);
        }
    }

    public function getCommentLikeStatus($id)
    {
        $db = JFactory::getDbo();
        $ip = $_SERVER['REMOTE_ADDR'];
        $query = $db->getQuery(true)
            ->select('status')
            ->from('#__gridbox_reviews_likes_map')
            ->where('ip = '.$db->quote($ip))
            ->where('comment_id = '.$id);
        $db->setQuery($query);
        $status = $db->loadResult();

        return $status;
    }

    public function setLikes($id, $action)
    {
        $db = JFactory::getDbo();
        $ip = $_SERVER['REMOTE_ADDR'];
        $query = $db->getQuery(true)
            ->select('*')
            ->from('#__gridbox_reviews_likes_map')
            ->where('comment_id = '.$id)
            ->where('ip = '.$db->quote($ip));
        $db->setQuery($query);
        $user = $db->loadObject();
        if (!$user) {
            $fields = array(
                $db->quoteName($action).' = '.$db->quoteName($action).'+1'
            );
            $user = new stdClass();
            $user->comment_id = $id;
            $user->ip = $ip;
            $user->status = $action;
            $db->insertObject('#__gridbox_reviews_likes_map', $user);
        } else {
            if ($action == $user->status) {
                $fields = array(
                    $db->quoteName($action).' = '.$db->quoteName($action).'-1'
                );
                $query = $db->getQuery(true)
                    ->delete('#__gridbox_reviews_likes_map')
                    ->where('id = '.$user->id);
                $db->setQuery($query)
                    ->execute();
            } else {
                $fields = array(
                    $db->quoteName($user->status).' = '.$db->quoteName($user->status).'-1',
                    $db->quoteName($action).' = '.$db->quoteName($action).'+1'
                );
                $user->status = $action;
                $db->updateObject('#__gridbox_reviews_likes_map', $user, 'id');
            }
        }
        $query = $db->getQuery(true)
            ->update('#__gridbox_reviews')
            ->set($fields)
            ->where('id = '.$id);
        $db->setQuery($query)
            ->execute();
        $query = $db->getQuery(true)
            ->select('likes, dislikes')
            ->from('#__gridbox_reviews')
            ->where('id = '.$id);
        $db->setQuery($query);
        $obj = $db->loadObject();
        $obj->status = $this->getCommentLikeStatus($id);
        $str = json_encode($obj);
        echo $str;
    }

    public function checkUserReviews($user, $page_id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('COUNT(id)')
            ->from('#__gridbox_reviews')
            ->where('parent = 0')
            ->where('page_id = '.$page_id)
            ->where('ip = '.$db->quote($ip));
        $db->setQuery($query);
        $count = $db->loadResult();
        if ($count == 0) {
            $query = $db->getQuery(true)
                ->select('COUNT(id)')
                ->from('#__gridbox_reviews')
                ->where('parent = 0')
                ->where('page_id = '.$page_id)
                ->where('user_type = '.$db->quote($user->type))
                ->where('user_id = '.$db->quote($user->id));
            if ($user->type == 'guest') {
                $query->where('name = '.$db->quote($user->name))
                    ->where('email = '.$db->quote($user->email));
            }
            $db->setQuery($query);
            $count = $db->loadResult();
        }

        return $count > 0;
    }

    public function sendCommentMesssage($data)
    {
        $db = JFactory::getDbo();
        $ip = $_SERVER['REMOTE_ADDR'];
        $jtext = $data->parent == 0 ? JText::_('REVIEW_SUCCESSFULY_POSTED') : JText::_('COMMENT_SUCCESSFULY_POSTED');
        $spam = $this->checkBanLists($data->email, $ip, $data->message);
        if ($spam && gridboxHelper::$website->reviews_auto_deleting_spam == 1) {
            $jtext = $data->parent == 0 ? JText::_('REVIEW_MARKED_SPAM_DELETED') : JText::_('COMMENT_MARKED_SPAM_DELETED');
            foreach ($data->files as $file) {
                gridboxHelper::removeTmpReviewsAttachment($file->id, $file->filename);
            }
        } else {
            $obj = new stdClass();
            $obj->name = $data->name;
            $obj->email = $data->email;
            $obj->message = $data->message;
            $obj->rating = $data->rating;
            $obj->avatar = $data->avatar;
            $obj->user_type = $data->user_type;
            $obj->user_id = $data->user_id;
            gridboxHelper::setReviewsModerators();
            $moderators = gridboxHelper::$reviewsModerators;
            if ($data->type == 'edit') {
                $obj->status = 'approved';
                $obj->id = $data->id;
            } else {
                $obj->status = gridboxHelper::$website->reviews_premoderation == 1 ? 'pending' : 'approved';
                if ($obj->user_type == 'user' && in_array($obj->user_id * 1, $moderators)) {
                    $obj->status = 'approved';
                }
                if (gridboxHelper::$website->reviews_email_notifications == 0) {
                    $obj->user_notification = 1;
                    $obj->admin_notification = 1;
                } else if (gridboxHelper::$website->reviews_user_notifications == 0) {
                    $obj->user_notification = 1;
                }
                $obj->date = date("Y-m-d H:i:s");
                $obj->parent = $data->parent;
            }
            $obj->status = $spam ? 'spam' : $obj->status;
            if ($obj->status == 'pending') {
                $jtext = $data->parent == 0 ? JText::_('REVIEW_AWAITING_MODERATION') : JText::_('COMMENT_AWAITING_MODERATION');
            } else if ($obj->status == 'spam') {
                $jtext = $data->parent == 0 ? JText::_('REVIEW_MARKED_SPAM') : JText::_('COMMENT_MARKED_SPAM');
            }
            $obj->page_id = $data->page_id;
            if (gridboxHelper::$website->reviews_ip_tracking == 1) {
                $obj->ip = $ip;
            }
            if ($data->type == 'edit') {
                $db->updateObject('#__gridbox_reviews', $obj, 'id');
                $id = $obj->id;
            } else {
                $db->insertObject('#__gridbox_reviews', $obj);
                $id = $db->insertid();
            }
            foreach ($data->files as $file) {
                $file->comment_id = $id;
                $db->updateObject('#__gridbox_reviews_attachments', $file, 'id');
            }
        }

        return $jtext;
    }

    public function sendCommentsEmails()
    {
        if (gridboxHelper::$website->reviews_email_notifications == 1) {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->select('id')
                ->from('#__gridbox_reviews')
                ->where('admin_notification = 0');
            $db->setQuery($query);
            $array = $db->loadObjectList();
            foreach ($array as $value) {
                $this->sendModeratorEmail($value->id);
            }
            $query = $db->getQuery(true)
                ->select('id, parent')
                ->from('#__gridbox_reviews')
                ->where('user_notification = 0')
                ->where('parent <> 0')
                ->where('status = '.$db->quote('approved'));
            $db->setQuery($query);
            $array = $db->loadObjectList();
            foreach ($array as $value) {
                if (gridboxHelper::$website->reviews_user_notifications == 1) {
                    $this->sendReplyEmail($value->id);
                }
            }
        }
    }

    public function checkUserUnsubscribe($email)
    {
        if (!empty($email)) {
            $db = JFactory::getDbo();
            $hash = md5(strtolower(trim($email)));
            $query = $db->getQuery(true)
                ->select('COUNT(id)')
                ->from('#__gridbox_reviews_unsubscribed_users')
                ->where('user = '.$db->quote($hash));
            $db->setQuery($query);
            $count = $db->loadResult();
            $flag = $count == 0;
        } else {
            $flag = false;
        }

        return $flag;
    }

    public function unsubscribe($key)
    {
        if (!empty($key)) {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->select('COUNT(id)')
                ->from('#__gridbox_reviews_unsubscribed_users')
                ->where('user = '.$db->quote($key));
            $db->setQuery($query);
            $count = $db->loadResult();
            if ($count == 0) {
                $obj = new stdClass();
                $obj->user = $key;
                $db->insertObject('#__gridbox_reviews_unsubscribed_users', $obj);
            }
        }
    }

    public function sendReplyEmail($id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('c.*, p.title, pc.email as recipient')
            ->from('#__gridbox_reviews AS c')
            ->where('c.id = '.$id)
            ->leftJoin('`#__gridbox_pages` AS p ON '.$db->quoteName('p.id').' = '.$db->quoteName('c.page_id'))
            ->leftJoin('`#__gridbox_reviews` AS pc ON '.$db->quoteName('pc.id').' = '.$db->quoteName('c.parent'));
        $db->setQuery($query);
        $data = $db->loadObject();
        $flag = $this->checkUserUnsubscribe($data->recipient);
        if ($data->user_notification == 0 && !empty($data->recipient) && $flag) {
            $query = $db->getQuery(true)
                ->update('#__gridbox_reviews')
                ->set(array('user_notification = 1'))
                ->where('id = '.$id);
            $db->setQuery($query)
                ->execute();
            $mailer = JFactory::getMailer();
            $config = JFactory::getConfig();
            $sender = array($config->get('mailfrom'), $config->get('fromname'));
            $recipients = array($data->recipient);
            $query = $db->getQuery(true)
                ->select('*')
                ->from('#__gridbox_reviews_attachments')
                ->where('comment_id = '.$id);
            $db->setQuery($query);
            $files = $db->loadObjectList();
            if (!empty($files)) {
                $attachment = array();
                foreach ($files as $file) {
                    $attachment[] = JPATH_ROOT.'/components/com_gridbox/assets/uploads/reviews/'.$file->filename;
                }
                $mailer->addAttachment($attachment);
            }
            if (empty($data->avatar)) {
                $avatar = gridboxHelper::getReviewsUserAvatar($data->email);
            } else {
                $avatar = $data->avatar;
            }
            $hash = md5(strtolower(trim($data->recipient)));
            $unsubscribe = JUri::root().'index.php?task=reviews.unsubscribe&key='.$hash;
            $message = str_replace("\n", '<br>', $data->message);
            $date = gridboxHelper::getPostDate($data->date);
            $subject = JText::_('NEW_REPLY_TO_REVIEW_ON').' '.$data->title;
            $mailer->isHTML(true);
            $mailer->Encoding = 'base64';
            include(JPATH_ROOT.'/components/com_gridbox/views/layout/patterns/reviews/reviews-reply-email-pattern.php');
            $mailer->setSender($sender);
            $mailer->setSubject($subject);
            $mailer->addRecipient($recipients);
            $mailer->setBody($out);
            $mailer->Send();
        }
    }

    public function sendModeratorEmail($id)
    {
        gridboxHelper::setReviewsModerators();
        $moderators = gridboxHelper::$reviewsModerators;
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('c.*, p.title')
            ->from('#__gridbox_reviews AS c')
            ->where('c.id = '.$id)
            ->leftJoin('`#__gridbox_pages` AS p ON '.$db->quoteName('p.id').' = '.$db->quoteName('c.page_id'));
        $db->setQuery($query);
        $data = $db->loadObject();
        if ($data->admin_notification == 0) {
            $query = $db->getQuery(true)
                ->update('#__gridbox_reviews')
                ->set(array('admin_notification = 1'))
                ->where('id = '.$id);
            $db->setQuery($query)
                ->execute();
        }
        if (!empty($moderators) && $data->admin_notification == 0) {
            $mailer = JFactory::getMailer();
            $config = JFactory::getConfig();
            $sender = array($config->get('mailfrom'), $config->get('fromname'));
            $recipients = array();
            foreach ($moderators as $moderator) {
                $query = $db->getQuery(true)
                    ->select('email')
                    ->from('#__users')
                    ->where('id = '.$moderator);
                $db->setQuery($query);
                $email = $db->loadResult();
                if ($email != $data->email) {
                    $recipients[] = $email;
                }
            }
            if (!empty($recipients)) {
                $query = $db->getQuery(true)
                    ->select('*')
                    ->from('#__gridbox_reviews_attachments')
                    ->where('comment_id = '.$id);
                $db->setQuery($query);
                $files = $db->loadObjectList();
                if (!empty($files)) {
                    $attachment = array();
                    foreach ($files as $file) {
                        $attachment[] = JPATH_ROOT.'/components/com_gridbox/assets/uploads/reviews/'.$file->filename;
                    }
                    $mailer->addAttachment($attachment);
                }
                if (empty($data->avatar)) {
                    $avatar = gridboxHelper::getReviewsUserAvatar($data->email);
                } else {
                    $avatar = $data->avatar;
                }
                $message = str_replace("\n", '<br>', $data->message);
                $date = gridboxHelper::getPostDate($data->date);
                $subject = $data->parent == 0 ? JText::_('NEW_REVIEW_POSTED_ON') : JText::_('NEW_COMMENT_POSTED_ON').' '.$data->title;
                $mailer->isHTML(true);
                $mailer->Encoding = 'base64';
                include(JPATH_ROOT.'/components/com_gridbox/views/layout/patterns/reviews/reviews-moderator-email-pattern.php');
                $mailer->setSender($sender);
                $mailer->setSubject($subject);
                $mailer->addRecipient($recipients);
                $mailer->setBody($out);
                $mailer->Send();
            }
        }
    }

    public function sendReportEmail($id)
    {
        gridboxHelper::setReviewsModerators();
        $moderators = gridboxHelper::$reviewsModerators;
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('c.*, p.title')
            ->from('#__gridbox_reviews AS c')
            ->where('c.id = '.$id)
            ->leftJoin('`#__gridbox_pages` AS p ON '.$db->quoteName('p.id').' = '.$db->quoteName('c.page_id'));
        $db->setQuery($query);
        $data = $db->loadObject();
        if (!empty($moderators)) {
            $mailer = JFactory::getMailer();
            $config = JFactory::getConfig();
            $sender = array($config->get('mailfrom'), $config->get('fromname'));
            $recipients = array();
            foreach ($moderators as $moderator) {
                $query = $db->getQuery(true)
                    ->select('email')
                    ->from('#__users')
                    ->where('id = '.$moderator);
                $db->setQuery($query);
                $email = $db->loadResult();
                if ($email != $data->email) {
                    $recipients[] = $email;
                }
            }
            if (!empty($recipients)) {
                $query = $db->getQuery(true)
                    ->select('*')
                    ->from('#__gridbox_reviews_attachments')
                    ->where('comment_id = '.$id);
                $db->setQuery($query);
                $files = $db->loadObjectList();
                if (!empty($files)) {
                    $attachment = array();
                    foreach ($files as $file) {
                        $attachment[] = JPATH_ROOT.'/components/com_gridbox/assets/uploads/reviews/'.$file->filename;
                    }
                    $mailer->addAttachment($attachment);
                }
                if (empty($data->avatar)) {
                    $avatar = gridboxHelper::getReviewsUserAvatar($data->email);
                } else {
                    $avatar = $data->avatar;
                }
                $message = str_replace("\n", '<br>', $data->message);
                $date = gridboxHelper::getPostDate($data->date);
                $subject = JText::_('COMMENT_FLAGGED_SPAM_ABUSIVE_ON').' '.$data->title;
                $mailer->isHTML(true);
                $mailer->Encoding = 'base64';
                include(JPATH_ROOT.'/components/com_gridbox/views/layout/patterns/reviews/reviews-report-email-pattern.php');
                $mailer->setSender($sender);
                $mailer->setSubject($subject);
                $mailer->addRecipient($recipients);
                $mailer->setBody($out);
                $mailer->Send();
            }
        }
    }

    public function checkBanLists($email, $ip, $message)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('id')
            ->from('#__gridbox_reviews_banned_emails')
            ->where('email = '.$db->quote($email));
        $db->setQuery($query);
        $result = $db->loadResult();
        if ($result) {

            return true;
        }
        $query = $db->getQuery(true)
            ->select('id')
            ->from('#__gridbox_reviews_banned_ip')
            ->where('ip = '.$db->quote($ip));
        $db->setQuery($query);
        $result = $db->loadResult();
        if ($result) {

            return true;
        }
        $query = $db->getQuery(true)
            ->select('*')
            ->from('#__gridbox_reviews_banned_words');
        $db->setQuery($query);
        $words = $db->loadObjectList();
        $flag = false;
        $mb_message = mb_strtolower($message);
        $wordsArray = array();
        foreach ($words as $obj) {
            $wordsArray[] = mb_strtolower($obj->word);
        }
        if (!empty($wordsArray)) {
            $wordsStr = implode('|', $wordsArray);
            $regexp = '/(?i)(\s|,|\.|^)('.$wordsStr.')(\s|,|\.|$)/';
            preg_match_all($regexp, $mb_message, $matches, PREG_SET_ORDER);
            $flag = !empty($matches);
        }
        if (gridboxHelper::$website->reviews_block_links == 1 && !$flag) {
            $flag = preg_match('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $message);
        }

        return $flag;
    }

    public function uploadAttachmentFile($file, $type)
    {
        $obj = new stdClass();
        if (gridboxHelper::$website->reviews_enable_attachment == 1 && isset($file['error']) && $file['error'] == 0) {
            if ($type == 'image') {
                $str = 'gif,jpg,jpeg,png,svg,webp';
            } else {
                $str = str_replace(' ', '', gridboxHelper::$website->attachment_types);
            }
            $types = explode(',', $str);
            $ext = strtolower(JFile::getExt($file['name']));
            if (gridboxHelper::$website->reviews_attachment_size * 1000 > $file['size'] && in_array($ext, $types)) {
                $dir = JPATH_ROOT.'/components/com_gridbox/assets/uploads/reviews/';
                if (!JFolder::exists($dir)) {
                    JFolder::create($dir);
                }
                $name = str_replace('.'.$ext, '', $file['name']);
                $fileName = gridboxHelper::replace($name);
                $fileName = JFile::makeSafe($fileName);
                $name = str_replace('-', '', $fileName);
                $name = str_replace('.', '', $name);
                if ($name == '') {
                    $fileName = date("Y-m-d-H-i-s").'.'.$ext;
                }
                $i = 2;
                $name = $fileName;
                while (JFile::exists($dir.$name.'.'.$ext)) {
                    $name = $fileName.'-'.($i++);
                }
                $fileName = $name.'.'.$ext;
                JFile::upload($file['tmp_name'], $dir.$fileName);
                $obj = $this->addAttachmentFile($file['name'], $fileName, $type);
            }
        }

        return $obj;
    }

    public function addAttachmentFile($name, $filename, $type)
    {
        $db = JFactory::getDbo();
        $obj = new stdClass();
        $obj->comment_id = 0;
        $obj->name = $name;
        $obj->filename = $filename;
        $obj->type = $type;
        $obj->date = date("Y-m-d-H-i-s");
        $db->insertObject('#__gridbox_reviews_attachments', $obj);
        $obj->id = $db->insertid();

        return $obj;
    }
}
