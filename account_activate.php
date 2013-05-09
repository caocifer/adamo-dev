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
  include_once ('includes/class_fees.php');

  include_once ('global_header.php');

  $template->set('message_header', header5(MSG_USER_ACCOUNT_CONFIRMATION));

  $user_id = intval($_REQUEST['user_id']);
  $username = $db->rem_special_chars($_REQUEST['username']);

  $signup_fee = new fees();
  $signup_fee->setts = &$setts;

  $signup_result = $signup_fee->signup($user_id);

  $is_user = $db->count_rows('users', "WHERE user_id=" . $user_id . " AND username='" . $username . "' AND mail_activated=0");

  if ($is_user && !$signup_result['amount'] && $setts['signup_settings'] == 1) {
    $db->query("UPDATE " . DB_PREFIX . "users SET active=1, approved=1, mail_activated=1, payment_status='confirmed' WHERE 
		user_id=" . $user_id);

    $template->set('message_content', '<div align="center" class="errormessage">' . MSG_ACC_ACTIVATE_SUCCESS . '</div>');
  }
  else {
    $template->set('message_content', '<div align="center" class="errormessage">' . MSG_ACC_ACTIVATE_FAILURE . '</div>');
  }

  $template_output .= $template->process('single_message.tpl.php');

  include_once ('global_footer.php');

  echo $template_output;
?>