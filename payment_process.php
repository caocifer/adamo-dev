<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  session_start();

  define('IN_SITE', 1);

  include_once ('includes/global.php'); ## MyPHPAuction 2009 we need to figure out what payment gateway is used somehow## MyPHPAuction 2009 then depending on each payment gateway, we process the variables returned.## MyPHPAuction 2009 then we save the information, all info is the same for every gateway
?>