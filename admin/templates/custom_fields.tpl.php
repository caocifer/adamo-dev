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
<?php echo $display_formcheck_errors; ?>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr>
    <td class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
        <?php echo strtoupper($subpage_title); ?>
      </b></td>
  </tr>
</table>
<?php echo $management_box; ?>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="custom_fields.php" method="post">
    <input type="hidden" name="page" value="<?php echo $page_handle; ?>" />
    <input type="hidden" name="do" value="save_settings_main" />
    <?php echo $custom_fields_page_content; ?>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>" <?php echo $disabled_button; ?> />
      </td>
    </tr>
  </form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
