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
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="custom_fields.php" method="post">
    <input type="hidden" name="page" value="<?php echo $page_handle; ?>" />
    <input type="hidden" name="do" value="<?php echo $do; ?>"  />
    <input type="hidden" name="section_id" value="<?php echo $section_id; ?>"  />
    <input type="hidden" name="operation" value="submit" />
    <tr>
      <td colspan="2" class="c4"><b><?php echo $manage_section_title; ?></b></td>
    </tr>
    <tr class="c1">
      <td nowrap><?php echo AMSG_SECTION_NAME; ?></td>
      <td width="100%"><input type="text" name="section_name" value="<?php echo $section_details['section_name']; ?>" size="50" /> <input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
    </tr>
  </form>
</table>