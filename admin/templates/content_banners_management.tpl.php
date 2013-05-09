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

<div class="mainhead"><img src="images/content.gif" align="absmiddle">
  <?php echo $header_section; ?>
</div>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<?php echo $management_box; ?>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr>
    <td colspan="4" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
        <?php echo $subpage_title; ?>
      </b></td>
  </tr>
  <tr class="c4">
    <td><?php echo AMSG_BANNER_PREVIEW; ?></td>
    <td width="200" align="center"><?php echo AMSG_DETAILS; ?></td>
    <td width="150" align="center"><?php echo AMSG_OPTIONS; ?></td>
  </tr>
  <?php echo $banners_management_content; ?>
  <tr>
    <td colspan="4">[ <a href="content_banners_management.php?do=add_banner"><?php echo AMSG_ADD_BANNER; ?></a> ] </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
