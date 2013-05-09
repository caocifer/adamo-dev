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
<script language="javascript" src="../includes/main_functions.js" type="text/javascript"></script>
<script language="JavaScript">
  function submit_form(form_name) {
    form_name.operation.value = '';
    form_name.submit();
  }
</script>

<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="vouchers_management.php" method="post" name="form_tax">
    <input type="hidden" name="do" value="<?php echo $do; ?>" />
    <input type="hidden" name="voucher_id" value="<?php echo $voucher_details['voucher_id']; ?>" />
    <input type="hidden" name="voucher_type" value="<?php echo $voucher_type; ?>" />
    <input type="hidden" name="operation" value="submit" />
    <tr>
      <td colspan="2" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo $manage_box_title; ?></b></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_VOUCHER_NAME; ?></b></td>
      <td width="100%"><input type="text" name="voucher_name" value="<?php echo $voucher_details['voucher_name']; ?>" size="50" /></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_VOUCHER_TYPE; ?></b></td>
      <td width="100%"><?php echo $voucher_type; ?></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_VOUCHER_REDUCTION; ?></b></td>
      <td width="100%"><input type="text" name="voucher_reduction" value="<?php echo ($voucher_type == 'signup') ? '100' : $voucher_details['voucher_reduction']; ?>" size="8" <?php echo ($voucher_type == 'signup') ? 'readonly' : ''; ?> />%</td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td width="100%" class="explain" ><?php echo AMSG_VOUCHER_REDUCTION_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_START_DATE; ?></b></td>
      <td width="100%"><?php echo ($do == 'add_voucher') ? GMSG_NOW : show_date($voucher_details['reg_date']); ?></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo GMSG_DURATION; ?></b></td>
      <td width="100%"><input type="text" name="voucher_duration" value="<?php echo $voucher_details['voucher_duration']; ?>" size="8" /> <?php echo GMSG_DAYS; ?></td>
    </tr>
    <?php if ($do != 'add_voucher') { ?>
        <tr>
          <td nowrap></td>
          <td class="c1" width="100%"><?php echo GMSG_EXPIRES_ON; ?>: <b><?php echo show_date($voucher_details['exp_date']); ?></b></td>
        </tr>
      <?php } ?>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain" width="100%"><?php echo AMSG_VOUCHER_DURATION_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><b><?php echo AMSG_NB_OF_USES; ?></b></td>
      <td width="100%"><input type="text" name="nb_uses" value="<?php echo $voucher_details['nb_uses']; ?>" size="8" /></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain" width="100%"><?php echo AMSG_NB_OF_USES_EXPL; ?></td>
    </tr>
    <?php if ($voucher_type == 'setup') { ?>
        <tr class="c1">
          <td nowrap align="right"><b><?php echo AMSG_ASSIGNED_FEES; ?></b></td>
          <td width="100%"><?php echo $select_reduced_fees_boxes; ?></td>
        </tr>
      <?php } ?>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="form_tax_save" value="<?php echo AMSG_SAVE_CHANGES; ?>">
      </td>
    </tr>
  </form>
</table>