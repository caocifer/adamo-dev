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

<div class="mainhead"><img src="images/user.gif" align="absmiddle">
  <?php echo $header_section; ?>
</div>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr class="c3">
    <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
        <?php echo strtoupper($subpage_title); ?>
      </b></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr>
    <td colspan="8" class="c3" align="center"><b>
        <?php echo AMSG_VIEW_BIDS_PLACED_BY; ?>
        [
        <?php echo $username; ?>
        ] </b></td>
  </tr>
  <tr>
    <td colspan="8" align="center"><?php echo $query_results_message; ?></td>
  </tr>
  <tr class="c4">
    <td width="70"><?php echo MSG_AUCTION_ID; ?>
      <br>
      <?php echo $page_order_auction_id; ?></td>
    <td><?php echo MSG_ITEM_TITLE; ?></td>
    <td width="100" align="center"><?php echo MSG_BID_AMOUNT; ?>
      <br>
      <?php echo $page_order_bid_amount; ?></td>
    <td align="center" width="150"><?php echo GMSG_DATE ?>
      <br>
      <?php echo $page_order_bid_date; ?></td>
    <td align="center" width="60"><?php echo GMSG_QUANTITY; ?></td>
    <td align="center" width="60"><?php echo AMSG_BID_STATUS; ?></td>
    <td align="center" width="60"><?php echo AMSG_AUCTION_STATUS; ?></td>
    <td align="center" width="200"><?php echo MSG_REMOVE_BIDS; ?></td>
  </tr>
  <?php echo $bid_history_content; ?>
  <tr>
    <td colspan="8" align="center"><?php echo $pagination; ?></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
