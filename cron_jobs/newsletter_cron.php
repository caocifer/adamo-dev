<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  session_start();

  define('IN_ADMIN', 1);

  include_once ('../includes/global.php');

  $sql_select_recipients = $db->query("SELECT r.recipient_id, r.username, r.email, n.newsletter_subject, 
	n.newsletter_content FROM " . DB_PREFIX . "newsletter_recipients r 
	LEFT JOIN " . DB_PREFIX . "newsletters n ON n.newsletter_id=r.newsletter_id 
	WHERE r.newsletter_id>0 LIMIT 0,50");

  (array) $delete_array = null;

  while ($recipient_details = $db->fetch_array($sql_select_recipients)) {
    send_mail($recipient_details['email'], $db->add_special_chars($recipient_details['newsletter_subject']), '', $setts['admin_email'], $db->add_special_chars($recipient_details['newsletter_content']), null, true);

    $delete_array[] = $recipient_details['recipient_id'];
  }

  if (count($delete_array) > 0) {
    $db->query("DELETE FROM " . DB_PREFIX . "newsletter_recipients WHERE recipient_id IN (" . $db->implode_array($delete_array) . ")");
  }
?>