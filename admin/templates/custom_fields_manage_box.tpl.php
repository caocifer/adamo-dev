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
  <form action="custom_fields.php" method="post" name="form_custom_box">
    <input type="hidden" name="page" value="<?php echo $page_handle; ?>" />
    <input type="hidden" name="do" value="<?php echo $do; ?>" />
    <input type="hidden" name="box_id" value="<?php echo $box_details['box_id']; ?>" />
    <input type="hidden" name="operation" value="submit" />
    <tr>
      <td colspan="2" align="center" class="c3"><b><?php echo $manage_box_title; ?></b></td>
    </tr>
    <tr class="c1">
      <td nowrap><?php echo AMSG_BOX_NAME; ?></td>
      <td width="100%"><input type="text" name="box_name" value="<?php echo $box_details['box_name']; ?>" size="50" /> <?php echo AMSG_OPTIONAL_FIELD; ?></td>
    </tr>
    <tr class="c2">
      <td nowrap><?php echo AMSG_BOX_TYPE; ?></td>
      <td width="100%"><?php echo $box_types_list_menu; ?></td>
    </tr>
    <tr class="c1">
      <td nowrap><?php echo AMSG_BOX_VALUE; ?></td>
      <td width="100%"><?php echo $box_type_listing; ?></td>
    </tr>
    <tr class="c2">
      <td nowrap><?php echo AMSG_FIELD_NAME; ?></td>
      <td width="100%"><?php echo $fields_list_menu; ?></td>
    </tr>
    <tr class="c1">
      <td nowrap><?php echo AMSG_MANDATORY; ?></td>
      <td width="100%"><input name="mandatory" type="radio" value="1" <?php echo (($box_details['mandatory']) ? 'checked' : ''); ?> />  <?php echo GMSG_YES; ?>
        <input name="mandatory" type="radio" value="0" <?php echo (($box_details['mandatory']) ? '' : 'checked'); ?> />  <?php echo GMSG_NO; ?></td>
    </tr>
    <?php if ($page_handle == 'auction') { //custom field search can only be enabled for custom auction fields  ?> 
        <tr class="c2">
          <td nowrap><?php echo AMSG_SEARCHABLE; ?></td>
          <td width="100%"><input name="box_searchable" type="radio" value="1" <?php echo (($box_details['box_searchable']) ? 'checked' : ''); ?> />  <?php echo GMSG_YES; ?>
            <input name="box_searchable" type="radio" value="0" <?php echo (($box_details['box_searchable']) ? '' : 'checked'); ?> />  <?php echo GMSG_NO; ?></td>
        </tr>
      <?php } ?>
    <tr class="c1">
      <td nowrap><?php echo AMSG_FORMCHECK_FUNCTIONS; ?></td>
      <td width="100%"><?php echo $display_formcheck_functions; ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php echo AMSG_BOX_VALUES_EXPLANATION; ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>">
      </td>
    </tr>
  </form>
</table>
