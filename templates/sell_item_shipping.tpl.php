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

<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr class="c4">
    <td colspan="3"><?php echo MSG_SHIPPING_DETAILS; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><?php echo MSG_SHIPPING_CONDITIONS; ?></td>
    <td nowrap><input type="radio" name="shipping_method" value="1" checked /></td>
    <td width="100%"><?php echo MSG_BUYER_PAYS_SHIPPING; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="c2" nowrap><input type="radio" name="shipping_method" value="2" <?php echo ($item_details['shipping_method'] == 2) ? 'checked' : ''; ?> /></td>
    <td class="c2"><?php echo MSG_SELLER_PAYS_SHIPPING; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="c1" nowrap><input type="checkbox" name="shipping_int" value="1" <?php echo ($item_details['shipping_int'] == 1) ? 'checked' : ''; ?> /></td>
    <td class="c1"><?php echo MSG_SELLER_SHIPS_INT; ?></td>
  </tr>
  <tr class="reguser">
    <td>&nbsp;</td>
    <td colspan="2"><?php echo MSG_SHIPPING_CONDITIONS_EXPL; ?></td>
  </tr>
  <?php if ($setts['enable_shipping_costs']) { ?>
      <tr class="c1">
        <td width="150" align="right"><?php echo MSG_POSTAGE; ?></td>
        <td nowrap colspan="2"><?php echo $item_details['currency']; ?>
          <input type="text" name="postage_amount" value="<?php echo $item_details['postage_amount']; ?>" size="8"></td>
      </tr>
      <tr class="reguser">
        <td>&nbsp;</td>
        <td colspan="2"><?php echo MSG_POSTAGE_EXPL; ?></td>
      </tr>
      <tr class="c1">
        <td width="150" align="right"><?php echo MSG_INSURANCE; ?></td>
        <td nowrap colspan="2"><?php echo $item_details['currency']; ?>
          <input type="text" name="insurance_amount" value="<?php echo $item_details['insurance_amount']; ?>" size="8"></td>
      </tr>
      <tr class="reguser">
        <td>&nbsp;</td>
        <td colspan="2"><?php echo MSG_INSURANCE_EXPL; ?></td>
      </tr>
      <tr class="c1">
        <td width="150" align="right"><?php echo MSG_SHIPPING_DETAILS; ?></td>
        <td nowrap colspan="2"><textarea name="shipping_details" style="width: 350px; height: 100px;"><?php echo $item_details['shipping_details']; ?></textarea></td>
      </tr>
      <tr class="reguser">
        <td>&nbsp;</td>
        <td colspan="2"><?php echo MSG_SHIPPING_DETAILS_EXPL; ?></td>
      </tr>
      <tr class="c1">
        <td width="150" align="right"><?php echo MSG_SHIP_METHOD; ?></td>
        <td nowrap colspan="2"><?php echo $shipping_methods_drop_down; ?></td>
      </tr>
      <tr class="reguser">
        <td>&nbsp;</td>
        <td colspan="2"><?php echo MSG_SHIP_METHOD_EXPL; ?></td>
      </tr>
    <?php } ?>
  <tr class="c4">
    <td colspan="3"><?php echo MSG_DIRECT_PAYMENT; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><?php echo MSG_DIRECT_PAYMENT_METHODS; ?></td>
    <td nowrap colspan="2"><?php echo $direct_payment_table; ?></td>
  </tr>
  <tr class="reguser">
    <td>&nbsp;</td>
    <td colspan="2"><?php echo MSG_DIRECT_PAYMENT_METHODS_EXPL; ?></td>
  </tr>
  <tr class="c4">
    <td colspan="3"><?php echo MSG_OFFLINE_PAYMENT; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"></td>
    <td nowrap colspan="2"><?php echo $offline_payment_table; ?></td>
  </tr>
  <tr class="reguser">
    <td>&nbsp;</td>
    <td colspan="2"><?php echo MSG_OFFLINE_PAYMENT_METHODS_EXPL; ?></td>
  </tr>
  <?php if ($auction_edit != 1) { ?>
      <tr class="c5">
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2"><?php echo nav_btns_position(); ?></td>
      </tr>
    <?php } ?>
</table>
<br>
