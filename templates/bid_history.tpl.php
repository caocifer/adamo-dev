<?php
#################################################################
## MyPHPAuction v6.03															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<?php echo $bid_history_header; ?>
<?php echo $msg_changes_saved; ?>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="6" class="c3"><b><?php echo MSG_BID_HISTORY_FOR . ' ' . $item_details['name']; ?></b> </td>
  </tr>
  <tr class="c5">
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="125" height="1"></td>
    <?php if ($session->value('adminarea') == 'Active') { ?>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="125" height="1"></td>
      <?php } ?>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <?php if ($item_details['quantity'] > 1) { ?>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="180" height="1"></td>
      <?php } ?>
    <?php if ($item_details['owner_id'] == $session->value('user_id') && $setts['enable_bid_retraction']) { ?>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="200" height="1"></td>
      <?php } ?>
  </tr>
  <tr class="c4">
    <td><?php echo MSG_USERNAME; ?></td>
    <td width="125" align="center"><?php echo MSG_BID_AMOUNT; ?></td>
    <?php if ($session->value('adminarea') == 'Active') { ?>
        <td width="125" align="center"><?php echo MSG_PROXY_BID; ?></td>
      <?php } ?>
    <td align="center" width="150"><?php echo GMSG_DATE ?></td>
    <?php if ($item_details['quantity'] > 1) { ?>
        <td align="center" width="180"><?php echo MSG_QUANTITY_REQUESTED_AWARDED; ?></td>
      <?php } ?>
    <?php if ($item_details['owner_id'] == $session->value('user_id') && $setts['enable_bid_retraction']) { ?>
        <td align="center" width="200"><?php echo MSG_REMOVE_BIDS; ?></td>
      <?php } ?>
  </tr>

  <?php echo $bid_history_content; ?>
</table>
<p align="center" class="contentfont"><a href="<?php echo process_link('auction_details', array('auction_id' => $item_details['auction_id'])); ?>">
    <?php echo MSG_RETURN_TO_AUCTION_DETAILS_PAGE; ?></a></p>
