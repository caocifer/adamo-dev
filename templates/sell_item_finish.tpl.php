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

<?php echo $sell_item_finish_content; ?>
<table border="0" cellspacing="2" cellpadding="3" align="center">
  <tr class="contentfont">
    <?php if ($show_list_similar) { ?>
        <td>[ <a href="<?php echo process_link('sell_item', array('option' => 'sell_similar', 'auction_id' => $item_details['auction_id'])); ?>"><?php echo MSG_LIST_SIMILAR; ?></a> ]</td>
      <?php } ?>
    <td>[ <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'open')); ?>"><?php echo MSG_RETURN_TO_MBAREA; ?></a> ]</td>
  </tr>
</table>

