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
    <td colspan="6" class="sellingtitle"><b><?php echo MSG_SELLING_TOTALS; ?></b></td>
  </tr>
  <tr class="c1">
    <td><?php echo MSG_MM_SOLD_ITEMS; ?>: <b><?php echo $nb_sold_items; ?></b></td>
    <td><?php echo MSG_MM_OPEN; ?>: <b><?php echo $nb_open_items; ?></b></td>
    <td><?php echo MSG_MM_ITEMS_WITH_BIDS; ?>: <b><?php echo $nb_items_bids; ?></b></td>
    <td><?php echo MSG_MM_SCHEDULED; ?>: <b><?php echo $nb_scheduled_items; ?></b></td>
    <td><?php echo MSG_MM_CLOSED; ?>: <b><?php echo $nb_closed_items; ?></b></td>
    <td><?php echo MSG_MM_DRAFTS; ?>: <b><?php echo $nb_drafts; ?></b></td>
  </tr>
</table>
