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

<table width="100%" border="0" cellpadding="3" cellspacing="2">
  <tr class="c4">
    <td colspan="3"><?php echo MSG_LIST_IN; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><input type="radio" name="list_in" value="auction" <?php echo ($item_details['list_in'] == 'auction') ? 'checked' : ''; ?>></td>
    <td><b>
        <?php echo GMSG_SITE; ?>
      </b></td>
  </tr>
  <tr class="reguser">
    <td></td>
    <td><?php echo MSG_LIST_IN_SITE_EXPL; ?></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><input type="radio" name="list_in" value="store" <?php echo ($item_details['list_in'] == 'store') ? 'checked' : ''; ?>></td>
    <td><b>
        <?php echo GMSG_SHOP; ?>
      </b></td>
  </tr>
  <tr class="reguser">
    <td></td>
    <td><?php echo MSG_LIST_IN_SHOP_EXPL; ?></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><input type="radio" name="list_in" value="both" <?php echo ($item_details['list_in'] == 'both') ? 'checked' : ''; ?>></td>
    <td><b>
        <?php echo GMSG_BOTH; ?>
      </b></td>
  </tr>
  <tr class="reguser">
    <td></td>
    <td><?php echo MSG_LIST_IN_BOTH_EXPL; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td></td>
    <td><?php echo nav_btns_position(); ?></td>
  </tr>
</table>
<br>
