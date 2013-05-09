<?php
#################################################################
## MyPHPAuction v6.02															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<?php echo (IS_SHOP == 1) ? $shop_header : $header_browse_auctions . ((IS_CATEGORIES != 1) ? '<br>' : ''); ?>
<?php echo (IS_CATEGORIES == 1) ? $categories_header : ''; ?>

<table width="100%" border="0" cellpadding="3" cellspacing="2" class="<?php echo (IS_SHOP == 1 || IS_CATEGORIES == 1) ? '' : 'border'; ?>">
  <form action="compare_items.php" method="POST">
    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
    <tr class="<?php echo (IS_SHOP == 1) ? 'c1_shop' : 'membmenu'; ?>" valign="top">
      <td align="center"></td>
      <td align="center"><input type="submit" name="form_compare_items" value="<?php echo MSG_COMPARE; ?>"></td>
      <td><?php echo MSG_ITEM_TITLE; ?><br><?php echo $page_order_itemname; ?></td>
      <td align="center"><?php echo MSG_START_BID; ?><br><?php echo $page_order_start_price; ?></td>
      <td align="center"><?php echo MSG_MAX_BID; ?><br><?php echo $page_order_max_bid; ?></td>
      <td align="center"><?php echo MSG_NR_BIDS; ?><br><?php echo $page_order_nb_bids; ?></td>
      <td align="center"><?php echo MSG_ENDS; ?><br><?php echo $page_order_end_time; ?></td>
    </tr>
    <tr class="<?php echo (IS_SHOP == 1) ? 'c5_shop' : 'c5'; ?>">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="15" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="90" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="50" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
    </tr>
    <?php echo $browse_auctions_content; ?>
    <?php if ($nb_items > 0) { ?>
        <tr>
          <td colspan="7" align="center" class="contentfont"><?php echo $pagination; ?></td>
        </tr>
      <?php } ?>
  </form>
</table>

<?php echo (IS_SHOP == 1) ? $shop_footer : ''; ?>
<?php echo (IS_CATEGORIES == 1) ? $categories_footer : ''; ?>

