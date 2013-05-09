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
<br>
<form action="" method="post" name="prefilled_fields_form">
  <input type="hidden" name="operation" value="submit">
  <input type="hidden" name="do" value="<?php echo $do; ?>">
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td colspan="6" class="c7"><b><?php echo MSG_MM_PREFILLED_FIELDS; ?></b></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_ITEM_TITLE; ?></td>
      <td colspan="2"><input name="default_name" type="text" id="default_name" value="<?php echo $prefilled_fields['default_name']; ?>" size="60" maxlength="255" /></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_ITEM_DESCRIPTION; ?></td>
      <td colspan="2"><textarea id="description_main" name="description_main" style="width: 400px; height: 200px; overflow: hidden;"><?php echo $prefilled_fields['default_description']; ?></textarea>
        <?php echo $item_description_editor; ?>
      </td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_CURRENCY; ?></td>
      <td colspan="2"><?php echo $currency_drop_down; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo GMSG_DURATION; ?></td>
      <td colspan="2"><?php echo $duration_drop_down; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_PRIVATE_AUCTION; ?></td>
      <td colspan="2"><input type="checkbox" name="default_hidden_bidding" value="1" <?php echo ($prefilled_fields['default_hidden_bidding'] == 1) ? 'checked' : ''; ?>/></td>
    </tr>
    <?php if ($setts['enable_swaps']) { ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_ACCEPT_SWAP; ?></td>
          <td colspan="2"><input type="checkbox" name="default_enable_swap" value="1" <?php echo ($prefilled_fields['default_enable_swap'] == 1) ? 'checked' : ''; ?>/></td>
        </tr>
      <?php } ?>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_SHIPPING_CONDITIONS; ?></td>
      <td nowrap><input type="radio" name="default_shipping_method" value="1" <?php echo ($prefilled_fields['default_shipping_method'] == 1) ? 'checked' : ''; ?>  /></td>
      <td width="100%"><?php echo MSG_BUYER_PAYS_SHIPPING; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="c2" nowrap><input type="radio" name="default_shipping_method" value="2" <?php echo ($prefilled_fields['default_shipping_method'] == 2) ? 'checked' : ''; ?> /></td>
      <td class="c2"><?php echo MSG_SELLER_PAYS_SHIPPING; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="c1" nowrap><input type="checkbox" name="default_shipping_int" value="1" <?php echo ($prefilled_fields['default_shipping_int'] == 1) ? 'checked' : ''; ?> /></td>
      <td class="c1"><?php echo MSG_SELLER_SHIPS_INT; ?></td>
    </tr>
    <?php if ($setts['enable_shipping_costs']) { ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_POSTAGE; ?></td>
          <td nowrap colspan="2"><input type="text" name="default_postage_amount" value="<?php echo $prefilled_fields['default_postage_amount']; ?>" size="8"></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_INSURANCE; ?></td>
          <td nowrap colspan="2"><input type="text" name="default_insurance_amount" value="<?php echo $prefilled_fields['default_insurance_amount']; ?>" size="8"></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_SHIPPING_DETAILS; ?></td>
          <td nowrap colspan="2"><textarea name="default_shipping_details" style="width: 350px; height: 100px;"><?php echo $prefilled_fields['default_shipping_details']; ?></textarea></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_SHIP_METHOD; ?></td>
          <td nowrap colspan="2"><?php echo $shipping_methods_drop_down; ?></td>
        </tr>
      <?php } ?>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_DIRECT_PAYMENT_METHODS; ?></td>
      <td nowrap colspan="2"><?php echo $direct_payment_table; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_OFFLINE_PAYMENT; ?></td>
      <td nowrap colspan="2"><?php echo $offline_payment_table; ?></td>
    </tr>
    <tr>
      <td colspan="6" class="c4"><?php echo MSG_GLOBAL_SETTINGS; ?>
      </td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_ACCEPT_PUBLIC_Q; ?></td>
      <td colspan="2"><input type="checkbox" name="default_public_questions" value="1" <?php echo ($prefilled_fields['default_public_questions'] == 1) ? 'checked' : ''; ?>/></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_NEW_BID_EMAIL_NOTIF; ?></td>
      <td colspan="2"><input type="checkbox" name="default_bid_placed_email" value="1" <?php echo ($prefilled_fields['default_bid_placed_email'] == 1) ? 'checked' : ''; ?>/></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><input name="form_save_settings" type="submit" id="form_save_settings" value="<?php echo GMSG_PROCEED; ?>" /></td>
    </tr>
  </table>
</form>
