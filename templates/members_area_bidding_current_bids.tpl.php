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
    <td colspan="8" class="c7"><?php echo ($page == 'summary') ? '<b>' . MSG_LAST_FIVE_BIDS . '</b>' : '<b>' . MSG_MM_CURRENT_BIDS . '</b> (' . $nb_bids . ' ' . MSG_BIDS . ')'; ?></td>
  </tr>
  <tr>
    <td class="membmenu" align="center"><?php echo MSG_PICTURE; ?></td>
    <td class="membmenu"><?php echo MSG_AUCTION_ID; ?>
      <br>
      <?php echo $page_order_auction_id; ?></td>
    <td class="membmenu"><?php echo MSG_ITEM_TITLE; ?>
      <br>
      <?php echo $page_order_itemname; ?></td>
    <td class="membmenu" align="center"><?php echo MSG_BID_AMOUNT; ?>
      <br>
      <?php echo $page_order_bid_amount; ?></td>
    <td class="membmenu" align="center"><?php echo MSG_PROXY_BID; ?>
      <br>
      <?php echo $page_order_bid_proxy; ?></td>
    <td class="membmenu" align="center"><?php echo GMSG_DATE; ?>
      <br>
      <?php echo $page_order_bid_date; ?></td>
    <td class="membmenu" align="center"><?php echo GMSG_STATUS; ?></td>
    <td class="membmenu" align="center"><?php echo GMSG_OPTIONS; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="120" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="120" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="120" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="140" height="1"></td>
  </tr>
  <?php echo $current_bids_content; ?>
  <?php if ($nb_bids > 0) { ?>
      <tr>
        <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
      </tr>
    <?php } ?>
</table>
