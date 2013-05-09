<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('FRMCHK_ITEM')) {
    die("Access Denied");
  }

  $fv = new formchecker;

  $fv->check_box($frmchk_details['reputation_content'], MSG_COMMENTS, array('field_empty', 'field_html'));

## now check the custom boxes
  $fv->check_custom_fields($frmchk_details);
?>
