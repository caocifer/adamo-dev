<?php
#################################################################
## MyPHPAuction v6.04															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<html>
  <head>
    <title>
      <?php echo $setts['sitename']; ?> 
      <?php echo AMSG_ADMIN_AREA ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG_CODEPAGE; ?>">
  </head>
  <link href="style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="main.js"></script>
  <script language=JavaScript src='../scripts/innovaeditor.js'></script>
</head><body leftmargin="8" topmargin="20" bgcolor="#ffffff">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom: 1px solid #777777; background-image: url(images/bg_head.gif); background-repeat: repeat-x; background-position: bottom;">
    <tr valign="top">
      <td height="67"><img src="images/adminlogo.gif"></td>
      <td><div><img src="images/admin_txt.gif"></div>
        <div align="center" class="version">current version:
          <?php echo $current_version; ?>
        </div></td>
      <td width="100%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr align="center" valign="top">
            <td width="14%"><a href="index.php"><img src="images/admin_home.gif" border="0"></a>
              <div style="icontext">Admin Home</div></td>
            <td width="14%"><a href="../index.php" target="_blank"><img src="images/site_home.gif" border="0"></a>
              <div style="icontext">Site Home</div></td>
            <?php /* ?>  <!-- <td width="14%"><a href="http://www.myphpauction.com/client/support/" target="_blank"><img src="images/support.gif" border="0"></a>
                <div style="icontext">
                <?php echo AMSG_SUPPORT_DESK;?>
                </div></td>
                <td width="14%"><a href="http://www.myphpauction.com/client/manuals/manual.pdf" target="_blank"><img src="images/manual.gif" border="0"></a>
                <div style="icontext">
                <?php echo AMSG_PPB_MANUAL;?>
                </div></td>--><?php */ ?>
            <td width="14%"><a href="accounting.php"><img src="images/account.gif" border="0"></a>
              <div style="icontext">
                <?php echo AMSG_ACCOUNTING; ?>
              </div></td>
            <td width="30%" align="right" style="padding-right: 15px;"><a href="index.php?option=logout"><img src="images/logout.gif" border="0"></a>
              <div style="icontext">Logout&nbsp;</div></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <div><img src="images/pixel.gif" border="0" width="1" height="7"></div>
  <table width="100%" border="0" cellspacing="4" cellpadding="0">
    <tr>
      <td width="220" valign="top"><?php echo $admin_left_menu; ?>
        <div><img src="images/pixel.gif" border="0" width="220" height="1"></div></td>
      <td width="10"><img src="images/pixel.gif" height="1" width="10"></td>
      <td  valign="top" width="100%"><?php echo $updated_categories_message; ?>
