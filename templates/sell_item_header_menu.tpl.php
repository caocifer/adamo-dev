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

<table width="100%" border="0" cellpadding="3" cellspacing="2" class="sellsteptab">
  <tr align="center">
    <td class="selldigit" width="<?php echo $header_menu_cell_width; ?>">1</td>
    <td class="selldigit" width="<?php echo $header_menu_cell_width; ?>">2</td>
    <td class="selldigit" width="<?php echo $header_menu_cell_width; ?>">3</td>
    <td class="selldigit" width="<?php echo $header_menu_cell_width; ?>">4</td>
    <td class="selldigit" width="<?php echo $header_menu_cell_width; ?>">5</td>
    <?php if ($ad_steps > 5) { ?>
        <td class="selldigit" width="<?php echo $header_menu_cell_width; ?>">6</td>
      <?php } ?>
    <?php if ($ad_steps > 6) { ?>
        <td class="selldigit" width="<?php echo $header_menu_cell_width; ?>">7</td>
      <?php } ?>
  </tr>
  <tr align="center">
    <td class="<?php echo ($sale_step == 'main_category') ? 'sell1' : 'sell2'; ?>"><?php echo MSG_MAIN_CATEGORY; ?></td>
    <?php if ($setts['enable_addl_category']) { ?>
        <td class="<?php echo ($sale_step == 'addl_category') ? 'sell1' : 'sell2'; ?>"><?php echo MSG_ADDL_CATEGORY; ?></td>
      <?php } ?>
    <td class="<?php echo ($sale_step == 'details') ? 'sell1' : 'sell2'; ?>"><?php echo MSG_ITEM_DETAILS; ?></td>
    <td class="<?php echo ($sale_step == 'settings') ? 'sell1' : 'sell2'; ?>"><?php echo MSG_ITEM_SETTINGS; ?></td>
    <td class="<?php echo ($sale_step == 'shipping') ? 'sell1' : 'sell2'; ?>"><?php echo MSG_SHIPPING_PAYMENT; ?></td>
    <td class="<?php echo ($sale_step == 'preview') ? 'sell1' : 'sell2'; ?>"><?php echo MSG_PREVIEW; ?></td>
    <td class="<?php echo ($sale_step == 'finish') ? 'sell1' : 'sell2'; ?>"><?php echo MSG_FINISH; ?></td>
  </tr>
</table>