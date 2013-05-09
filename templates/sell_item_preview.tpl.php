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
    <td colspan="3">Auction Preview</td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <td colspan="2" width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td colspan="3" style="padding-left: 50px; padding-right: 50px;"><?php echo $auction_details_page; ?></td>
  </tr>
  <?php echo $auction_fees_box; ?>
  <?php echo $auction_terms_box; ?>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><?php echo nav_btns_position(true, true); ?></td>
  </tr>
</table>
<br>
