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
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="8" class="c7"><b><?php echo MSG_MM_SOLD_ITEMS; ?></b> (<?php echo $nb_items; ?> <?php echo MSG_ITEMS; ?>)
    </td>
  </tr>
  <tr valign="top">
    <td class="membmenu">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr valign="top">
          <td><?php echo MSG_AUCTION_ID; ?><br><?php echo $page_order_auction_id; ?></td>
          <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
          <td><?php echo MSG_ITEM_TITLE; ?><br><?php echo $page_order_itemname; ?></td>
        </tr>
      </table></td>
    <td class="membmenu" align="center"><?php echo MSG_WINNING_BID; ?><br><?php echo $page_order_bid_amount; ?></td>
    <td class="membmenu" align="center"><?php echo GMSG_QUANTITY; ?><br><?php echo $page_order_quantity; ?></td>
    <td class="membmenu" align="center"><?php echo MSG_CONTACT_INFO; ?></td>
    <td class="membmenu" align="center">
      <table>
        <tr valign="top">
          <td><?php echo MSG_PURCHASE_DATE; ?><br><?php echo $page_order_purchase_date; ?></td>
          <td> / </td>
          <td><?php echo MSG_STATUS; ?></td>
        </tr>
      </table></td>
    <td align="center" class="membmenu"><?php echo GMSG_OPTIONS; ?></td>
  </tr>
  <tr class="c5">
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="200" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="175" height="1"></td>
  </tr>
  <?php echo $sold_auctions_content; ?>
  <?php if ($nb_items > 0) { ?>
      <tr>
        <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
      </tr>
    <?php } ?>
</table>

