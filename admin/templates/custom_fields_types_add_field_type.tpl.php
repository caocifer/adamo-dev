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
<script language="JavaScript">
  function submit_form(form_name) {
    form_name.operation.value = '';
    form_name.submit();
  }
</script>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="custom_fields_types.php" method="post" name="form_custom_box">
    <input type="hidden" name="page" value="<?php echo $page_handle; ?>" />
    <input type="hidden" name="do" value="<?php echo $do; ?>" />
    <input type="hidden" name="type_id" value="<?php echo $box_details['type_id']; ?>" />
    <input type="hidden" name="operation" value="submit" />
    <tr>
      <td colspan="2" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo $manage_box_title; ?></b></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_BOX_HANDLE; ?></b></td>
      <td width="100%"><input type="text" name="box_name" value="<?php echo $box_details['box_name']; ?>" size="50" /></td>
    </tr>
    <tr class="c2">
      <td nowrap align="right"><b><?php echo AMSG_BOX_TYPE; ?></b></td>
      <td width="100%"><?php echo $box_types_list_menu; ?></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_LINK_TO_TABLE; ?></b></td>
      <td width="100%"><?php echo $linkable_tables_list_menu; ?></td>
    </tr>
    <tr class="c2">
      <td nowrap align="right"><b><?php echo AMSG_TABLE_FIELDS; ?></b></td>
      <td width="100%"><?php echo $linked_table_fields; ?></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_BOX_VALUE_CODE; ?></b></td>
      <td width="100%"><textarea name="box_value_code" style=" width: 350px; height: 75px;"><?php echo $box_details['box_value_code']; ?></textarea></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_BOX_VALUE_CODE_EXPLANATION; ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="form_special_box" value="<?php echo AMSG_SAVE_CHANGES; ?>">
      </td>
    </tr>
  </form>
</table>