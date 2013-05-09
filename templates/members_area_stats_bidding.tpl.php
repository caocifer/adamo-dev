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

<table border="0" cellspacing="2" cellpadding="3" class="border">
  <tr>
    <td colspan="3" class="buyingtitle"><b><?php echo MSG_BIDDING_TOTALS; ?></b></td>
  </tr>
  <tr class="c1">
    <td><?php echo MSG_MM_WON_ITEMS; ?>: <b><?php echo $nb_won_items; ?></b></td>
    <td><?php echo MSG_MM_CURRENT_BIDS; ?>: <b><?php echo $nb_current_bids; ?></b></td>
    <td><?php echo MSG_ACTIVE_BIDS; ?>: <b><?php echo $nb_winning; ?></b></td>
  </tr>
</table>
