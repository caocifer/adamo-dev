<?php
#################################################################
## MyPHPAuction v6.04															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('FRMCHK_AUCTION_FRIEND')) {
    die("Access Denied");
  }

  $fv = new formchecker;

  $fv->check_box($frmchk_details['name'], MSG_YOUR_NAME, array('field_empty'));
  $fv->check_box($frmchk_details['email'], MSG_YOUR_EMAIL_ADDRESS, array('field_empty', 'is_email_address'));
  $fv->check_box($frmchk_details['friend_name'], MSG_FRIENDS_NAME, array('field_empty'));
  $fv->check_box($frmchk_details['friend_email'], MSG_FRIENDS_EMAIL, array('field_empty', 'is_email_address'));
?>
