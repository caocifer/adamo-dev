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
<?php echo $buy_out_success_message; ?>

<table width="100%" border="0" cellpadding="3" cellspacing="2">
  <tr class="c4">
    <td align="right"><strong>
        <?php echo MSG_ITEM_TITLE; ?>
      </strong></td>
    <td><strong>
        <?php echo $item_details['name']; ?>
      </strong></td>
  </tr>
  <tr class="c4">
    <td></td>
    <td></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><strong>
        <?php echo MSG_BUYOUT_PRICE; ?>
      </strong></td>
    <td><?php echo $fees->display_amount($item_details['buyout_price'], $item_details['currency']); ?></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><strong>
        <?php echo MSG_QUANTITY_PURCHASED; ?>
      </strong></td>
    <td><?php echo $quantity; ?></td>
  </tr>
  <tr class="c4">
    <td></td>
    <td></td>
  </tr>
</table>
<?php if (!empty($direct_payment_box)) { ?>
    <br>
    <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
      <tr height="21">
        <td colspan="5" class="c4"><strong>
            <?php echo MSG_DIRECT_PAYMENT; ?>
          </strong></td>
      </tr>
      <tr>
        <td colspan="5" class="c5"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td colspan="5" class="border"><?php echo $direct_payment_box; ?></td>
      </tr>
    </table>
  <?php } ?>
