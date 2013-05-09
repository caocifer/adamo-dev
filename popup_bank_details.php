<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  session_start();

  define('IN_SITE', 1);

  include_once ('includes/global.php');

  include_once ('includes/class_messaging.php');

  $item_details = $db->get_sql_row("SELECT auction_id, owner_id, bank_details FROM
	" . DB_PREFIX . "auctions WHERE auction_id='" . $_REQUEST['auction_id'] . "'");

  if (isset($_POST['form_save_bank_details']) && $item_details['owner_id'] == $session->value('user_id')) {
    $db->query("UPDATE " . DB_PREFIX . "auctions SET bank_details='" . $db->rem_special_chars($_POST['message_content']) . "' WHERE
		owner_id='" . $session->value('user_id') . "' AND auction_id='" . $item_details['auction_id'] . "'");

    $template->set('msg_changes_saved', '<p align="center" class="style1">' . MSG_CHANGES_SAVED . '</p>');
    $item_details['bank_details'] = $_POST['message_content'];

    $mail_input_id = $item_details['auction_id'];
    include('language/' . $setts['site_lang'] . '/mails/bank_details_buyer_notification.php');
  }

  $template->set('can_edit', (($item_details['owner_id'] == $session->value('user_id')) ? 1 : 0));
  $template->set('auction_id', $item_details['auction_id']);
  $template->set('message_title', ((empty($item_details['bank_details'])) ? MSG_SEND_BANK_DETAILS : MSG_VIEW_BANK_DETAILS));
  $template->set('message_content', $item_details['bank_details']);

  $template_output = $template->process('popup_bank_details.tpl.php');

  echo $template_output;
?>