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
<?php echo $make_offer_success_message; ?>

<table width="100%" border="0" cellpadding="3" cellspacing="2">
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
        <?php echo MSG_OFFER_AMOUNT; ?>
      </strong></td>
    <td><?php echo $fees->display_amount($amount, $item_details['currency']); ?></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><strong>
        <?php echo GMSG_QUANTITY; ?>
      </strong></td>
    <td><?php echo $quantity; ?></td>
  </tr>
  <tr class="c4">
    <td></td>
    <td></td>
  </tr>
</table>