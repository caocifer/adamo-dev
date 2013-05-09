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
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="2" class="c7"><?php echo MSG_VIEW_OFFERS_FOR; ?>
      <?php echo MSG_AUCTION_ID; ?>
      : <b>
        <?php echo $item_details['auction_id']; ?>
      </b> - <b>
        <?php echo $item_details['name']; ?>
      </b></td>
  </tr>
  <tr>
    <td colspan="2" class="c4"<img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <?php if ($item_details['auction_type'] == 'dutch') { ?>
      <tr class="c1">
        <td align="right"><strong>
            <?php echo MSG_AVAILABLE_QUANTITY; ?>
          </strong></td>
        <td valign="top"><?php echo $item_details['quantity']; ?></td>
      </tr>
    <?php } ?>
  <tr class="c1">
    <td align="right"><strong>
        <?php echo MSG_CURRENT_BID; ?>
      </strong></td>
    <td><?php echo $fees->display_amount($item_details['max_bid'], $item_details['currency']); ?></td>
  </tr>
  <tr class="c1">
    <td align="right"><strong>
        <?php echo MSG_NR_BIDS; ?>
      </strong></td>
    <td><?php echo $item_details['nb_bids']; ?></td>
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
  <tr class="c4">
    <td></td>
    <td></td>
  </tr>
  <?php if ($item_details['direct_payment']) { ?>
      <tr class="c1">
        <td width="150" align="right"><b>
            <?php echo MSG_DIRECT_PAYMENT; ?>
          </b></td>
        <td><?php echo $direct_payment_methods_display; ?></td>
      </tr>
      <tr class="c4">
        <td></td>
        <td></td>
      </tr>
    <?php } ?>
  <?php if ($item_details['payment_methods']) { ?>
      <tr class="c1">
        <td width="150" align="right"><b>
            <?php echo MSG_OFFLINE_PAYMENT; ?>
          </b></td>
        <td><?php echo $offline_payment_methods_display; ?></td>
      </tr>
      <tr class="c4">
        <td></td>
        <td></td>
      </tr>
    <?php } ?>
  <tr class="c5">
    <td width="150"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <?php if ($winning_bids_content) { ?>
      <tr class="c4">
        <td colspan="2"><?php echo MSG_WINNER_S; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="border">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="contentfont">
            <tr class="membmenu">
              <td><b><?php echo MSG_USERNAME; ?></b></td>
              <td width="80" align="center"><b><?php echo GMSG_QUANTITY; ?></b></td>
              <td width="100" align="center"><b><?php echo MSG_BID_AMOUNT; ?></b></td>
              <td width="150" align="center"><b><?php echo MSG_PURCHASE_DATE; ?></b></td>
              <td width="80" align="center"><b><?php echo MSG_STATUS; ?></b></td>
            </tr>
            <?php echo $winning_bids_content; ?>
          </table>
        </td>
      </tr>
    <?php } ?>      
  <?php if ($make_offer_content) { ?>
      <tr class="c4">
        <td colspan="2"><?php echo MSG_AUCTION_OFFERS; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="border">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="contentfont">
            <tr class="membmenu">
              <td><b><?php echo MSG_USERNAME; ?></b></td>
              <td width="80" align="center"><b><?php echo GMSG_QUANTITY; ?></b></td>
              <td width="100" align="center"><b><?php echo GMSG_AMOUNT; ?></b></td>
              <td width="120" align="center"><b><?php echo MSG_ACCEPTED; ?></b></td>
              <td width="180" align="center"><b><?php echo GMSG_OPTIONS; ?></b></td>
            </tr>
            <?php echo $make_offer_content; ?>
          </table>
        </td>
      </tr>
    <?php } ?>
  <?php if ($reserve_offer_content) { ?>
      <tr class="c4">
        <td colspan="2"><?php echo MSG_RESERVE_OFFERS; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="border">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="contentfont">
            <tr class="membmenu">
              <td><b><?php echo MSG_USERNAME; ?></b></td>
              <td width="80" align="center"><b><?php echo GMSG_QUANTITY; ?></b></td>
              <td width="100" align="center"><b><?php echo MSG_BID_AMOUNT; ?></b></td>
              <td width="120" align="center"><b><?php echo MSG_ACCEPTED; ?></b></td>
              <td width="180" align="center"><b><?php echo GMSG_OPTIONS; ?></b></td>
            </tr>
            <?php echo $reserve_offer_content; ?>
          </table>
        </td>
      </tr>
    <?php } ?>
  <?php if ($second_chance_content) { ?>
      <tr class="c4">
        <td colspan="2"><?php echo MSG_SECOND_CHANCE_PURCHASING; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="border">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="contentfont">
            <tr class="membmenu">
              <td><b><?php echo MSG_USERNAME; ?></b></td>
              <td width="80" align="center"><b><?php echo GMSG_QUANTITY; ?></b></td>
              <td width="100" align="center"><b><?php echo MSG_BID_AMOUNT; ?></b></td>
              <td width="180" align="center"><b><?php echo GMSG_OPTIONS; ?></b></td>
            </tr>
            <?php echo $second_chance_content; ?>
          </table>
        </td>
      </tr>
    <?php } ?>
  <?php if ($swap_offer_content) { ?>
      <tr class="c4">
        <td colspan="2"><?php echo MSG_SWAP_OFFERS; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="border">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="contentfont">
            <tr class="membmenu">
              <td width="150"><b><?php echo MSG_USERNAME; ?></b></td>
              <td width="80" align="center"><b><?php echo GMSG_QUANTITY; ?></b></td>
              <td align="center"><b><?php echo GMSG_DESCRIPTION; ?></b></td>
              <td width="120" align="center"><b><?php echo MSG_ACCEPTED; ?></b></td>
              <td width="180" align="center"><b><?php echo GMSG_OPTIONS; ?></b></td>
            </tr>
            <?php echo $swap_offer_content; ?>
          </table>
        </td>
      </tr>
    <?php } ?>
</table>
