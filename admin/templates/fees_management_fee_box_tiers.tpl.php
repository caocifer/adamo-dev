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
<table width="100%" border="0" cellspacing="3" cellpadding="3" class="fside">
  <form action="fees_management.php" method="post">
    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
    <input type="hidden" name="fee_column" value="<?php echo $fee_column; ?>">
    <input type="hidden" name="operation" value="submit" />
    <input type="hidden" name="tiers" value="1" />
    <tr class="c3">
      <td colspan="5"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo $fee_box_title; ?></b></td>
    </tr>
    <?php if ($fee_column == 'endauction') { ?>
        <tr class="c2">
          <td><?php echo AMSG_ENDAUCTION_FEE_APPLIES; ?></td>
          <td colspan="4"><input type="radio" name="value" value="s" <?php echo ($fee['endauction_fee_applies'] == 's') ? 'checked' : ''; ?>> <?php echo GMSG_SELLER; ?>
            <input type="radio" name="value" value="b" <?php echo ($fee['endauction_fee_applies'] == 'b') ? 'checked' : ''; ?>> <?php echo GMSG_BUYER; ?>
          </td>
        </tr>
      <?php } ?>
    <tr class="c4">
      <td width="120"><?php echo GMSG_FROM; ?> [ <?php echo $setts['currency']; ?> ]</td>
      <td width="120"><?php echo GMSG_TO; ?> [ <?php echo $setts['currency']; ?> ]</td>
      <td width="120"><?php echo GMSG_AMOUNT; ?> [ <?php echo $setts['currency']; ?> ]</td>
      <td><?php echo GMSG_FEE_TYPE; ?></td>
      <td width="70" align="center"><?php echo AMSG_DELETE; ?></td>
    </tr>
    <?php echo $fees_tiers_content; ?>
    <tr class="c4">
      <td><?php echo AMSG_ADD_TIER; ?></td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr class="c1">
      <td><input name="new_fee_from" type="text" id="new_fee_from" size="9"></td>
      <td><input name="new_fee_to" type="text" id="new_fee_to" size="9"></td>
      <td><input name="new_fee_amount" type="text" id="new_fee_amount" size="9"></td>
      <td><select name="new_calc_type" id="new_calc_type">
          <option value="flat" selected><?php echo GMSG_FLAT; ?></option>
          <option value="percent"><?php echo GMSG_PERCENT; ?></option>
        </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" align="center"><input type="submit" name="form_submit_fee" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
    </tr>
  </form>
</table>
