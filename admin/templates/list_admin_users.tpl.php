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

<div class="mainhead"><img src="images/user.gif" align="absmiddle">
  <?php echo $header_section; ?>
</div>
<?php echo $msg_changes_saved; ?>
<?php echo $display_formcheck_errors; ?>
<?php echo $management_box; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr class="c3">
    <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
        <?php echo strtoupper($subpage_title); ?>
      </b></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr class="c4">
    <td><?php echo AMSG_USERNAME; ?></td>
    <td width="150" align="center"><?php echo AMSG_CREATED; ?></td>
    <td width="150" align="center"><?php echo AMSG_LAST_LOGIN; ?></td>
    <td width="90" align="center"><?php echo GMSG_LEVEL; ?></td>
    <td width="150" align="center"><?php echo AMSG_OPTIONS; ?></td>
  </tr>
  <?php echo $admin_users_content; ?>
  <tr>
    <td colspan="5">[ <a href="list_admin_users.php?do=add_user"><?php echo AMSG_ADD_ADMIN_USER; ?></a> ]</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
