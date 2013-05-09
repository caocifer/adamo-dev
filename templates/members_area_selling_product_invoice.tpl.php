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
    <td class="c7"><b><?php echo ($edit_invoice) ? MSG_EDIT_PRODUCT_INVOICE : MSG_SEND_PRODUCT_INVOICE; ?></b></td>
  </tr>
  <tr>
    <td class="membmenu"><?php echo MSG_BUYER_USERNAME; ?>
      : <b><?php echo $user_details['username']; ?></b></td>
  </tr>
  <tr>
    <td class="c4"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <?php if (!empty($product_invoice_content)) { ?>
      <tr>
        <td align="center"><table width="90%" border="0" cellpadding="3" cellspacing="2" class="border">
            <form action="members_area.php?page=selling&section=sold" method="post">
              <input type="hidden" name="buyer_id" value="<?php echo $user_details['user_id']; ?>">
              <?php if (!$edit_invoice) { ?>
                <tr>
                  <td colspan="8"><b><?php echo MSG_SELECT_PRODUCTS; ?></b></td>
                </tr>
              <?php } ?>
              <tr class="membmenu">
                <td></td>
                <td><?php echo MSG_AUCTION_ID; ?></td>
                <td><?php echo MSG_ITEM_TITLE; ?></td>
                <td align="center"><?php echo MSG_WINNING_BID; ?></td>
                <td align="center"><?php echo GMSG_QUANTITY; ?></td>
                <td align="center"><?php echo MSG_POSTAGE; ?></td>
                <td align="center"><?php echo MSG_INSURANCE; ?></td>
              </tr>
              <tr class="c5">
                <td></td>
                <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
                <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
                <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
                <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
                <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="120" height="1"></td>
                <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="120" height="1"></td>
              </tr>
              <?php echo $product_invoice_content; ?>
              <tr class="membmenu">
                <td colspan="8" align="center" class="contentfont"><input type="submit" name="form_send_invoice" value="<?php echo GMSG_PROCEED; ?>" /></td>
              </tr>

            </form>
          </table></td>
      </tr>
    <?php }
    else {
      ?>
      <tr>
        <td align="center"><?php echo MSG_NO_ITEMS_INVOICE; ?></td>
      </tr>
  <?php } ?>
</table>
