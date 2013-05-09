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
  <form action="bid.php" method="post">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <input type="hidden" name="auction_id" value="<?php echo $item_details['auction_id']; ?>">
    <tr>
      <td class="contentfont"><table width="100%" border="0" cellpadding="3" cellspacing="2">
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
                <?php echo MSG_YOUR_BID; ?></strong></td>
            <td><?php echo $item_details['currency']; ?>
              <input name="max_bid" type="text" id="max_bid" value="<?php echo $max_bid; ?>" size="15" onkeypress="return noenter()"></td>
          </tr>
          <?php if ($item_details['auction_type'] == 'dutch') { ?>
              <tr class="c1">
                <td align="right"><strong>
                    <?php echo GMSG_QUANTITY; ?>
                  </strong></td>
                <td valign="top"><input name="quantity" type="text" id="quantity" value="<?php echo $quantity; ?>" size="8"></td>
              </tr>
            <?php } ?>
          <tr class="c1">
            <td align="right"><strong>
                <?php echo MSG_MINIMUM_BID; ?>
              </strong></td>
            <td><?php echo $fees->display_amount($minimum_bid, $item_details['currency']); ?></td>
          </tr>
          <tr class="c4">
            <td></td>
            <td></td>
          </tr>
          <tr class="c1">
            <td width="150" align="right"><?php echo MSG_SHIPPING_CONDITIONS; ?></td>
            <td><?php echo ($item_details['shipping_method'] == 1) ? MSG_BUYER_PAYS_SHIPPING : MSG_SELLER_PAYS_SHIPPING; ?></td>
          </tr>
          <?php if ($item_details['shipping_int'] == 1) { ?>
              <tr>
                <td>&nbsp;</td>
                <td><?php echo MSG_SELLER_SHIPS_INT; ?></td>
              </tr>
            <?php } ?>
          <?php if ($setts['enable_shipping_costs']) { ?>
              <tr class="c1">
                <td width="150" align="right"><?php echo MSG_POSTAGE; ?></td>
                <td><?php echo $fees->display_amount($item_details['postage_amount'], $item_details['currency']); ?></td>
              </tr>
              <tr class="c1">
                <td width="150" align="right"><?php echo MSG_INSURANCE; ?></td>
                <td><?php echo $fees->display_amount($item_details['insurance_amount'], $item_details['currency']); ?></td>
              </tr>
              <tr class="c1">
                <td width="150" align="right"><?php echo MSG_SHIP_METHOD; ?></td>
                <td><?php echo $item_details['type_service']; ?></td>
              </tr>
            <?php } ?>
          <tr class="c4">
            <td></td>
            <td></td>
          </tr>
          <?php if ($item_details['direct_payment']) { ?>
              <tr class="c1">
                <td width="150" align="right"><b><?php echo MSG_DIRECT_PAYMENT; ?></b></td>
                <td><?php echo $direct_payment_methods_display; ?></td>
              </tr>
              <tr class="c4">
                <td></td>
                <td></td>
              </tr>
            <?php } ?>
          <?php if ($item_details['payment_methods']) { ?>
              <tr class="c1">
                <td width="150" align="right"><b><?php echo MSG_OFFLINE_PAYMENT; ?></b></td>
                <td><?php echo $offline_payment_methods_display; ?></td>
              </tr>
              <tr class="c4">
                <td></td>
                <td></td>
              </tr>
            <?php } ?>
          <?php if ($auction_tax['apply']) { ?>
              <tr class="c1">
                <td align="right" valign="top"><b>
                    <?php echo $auction_tax['tax_name'] ?></b></td>
                <td><?php echo $auction_tax['display_buyer_purchase']; ?></td>
              </tr>
              <tr class="c4">
                <td></td>
                <td></td>
              </tr>
            <?php } ?>
          <?php if ($item_details['hidden_bidding']) { ?>
              <tr>
                <td colspan="2" class="redfont"><?php echo MSG_HIDDEN_BIDDING_WARNING; ?></td>
              </tr>
              <tr class="c4">
                <td></td>
                <td></td>
              </tr>
            <?php } ?>
          <tr>
            <td width="150"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
            <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="2" class="errormessage">
          <tr>
            <td width="150" align="center"><input name="form_place_bid" type="submit" id="form_place_bid" value="<?php echo MSG_PLACE_BID; ?>">
            </td>
            <td><?php echo MSG_CONFIRM_BID_TERMS; ?></td>
          </tr>
        </table>
        <div><b><?php echo MSG_CONFIRM_BID_AGREEMENT; ?></b></div>
      </td>
   	</tr>
  </form>
</table>
