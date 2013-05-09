<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="2"><img src="images/i_tables.gif" border="0"></td>
    <td width="100%"><img src="images/pixel.gif" height="24" width="1"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" align="right" background="images/bg_part.gif" class="head"><?php echo $header_section; ?>
      /
      <?php echo $subpage_title; ?></td>
    <td><img src="images/end_part.gif"></td>
  </tr>
</table>
<br>
<?php echo $display_formcheck_errors; ?>
<?php echo $msg_changes_saved; ?>
<?php echo $management_box; ?>
<form action="table_user_accounts.php" method="post">
  <table width="100%" border="0" cellpadding="3" cellspacing="3" class="border">
    <tr>
      <td colspan="47" class="c3"><b>
          <?php echo AMSG_CURRENT_ACC_TYPES; ?>
        </b></td>
    </tr>
    <tr class="c4">
      <td width="130"><?php echo AMSG_ACCOUNT_NAME; ?></td>
      <td><?php echo AMSG_DESCRIPTION; ?></td>
      <td width="70" align="center"><?php echo GMSG_PRICE; ?></td>
      <td width="70" align="center"><?php echo GMSG_RECURRING; ?></td>
      <td width="60" align="center"><?php echo AMSG_ACTIVE; ?></td>
      <td width="120" align="center"><?php echo AMSG_OPTIONS; ?></td>
    </tr>
    <?php echo $user_accounts_content; ?>
    <tr>
      <td colspan="7">[ <a href="table_user_accounts.php?do=add_account"><?php echo AMSG_ADD_USER_ACCOUNT; ?></a> ]</td>
    </tr>
    <tr>
      <td colspan="7" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>" <?php echo $disabled_button; ?>></td>
    </tr>
  </table>
</form>
