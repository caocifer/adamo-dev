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
    <td rowspan="2" class="c1"><img align=absmiddle src="themes/<?php echo $setts['default_theme']; ?>/img/system/verified.gif" border="0"></td>
    <td colspan="2" class="buyingtitle"><b><?php echo MSG_SELLER_STATUS; ?></b></td>
  </tr>
  <tr>
    <td><?php echo ($seller_details['seller_verified']) ? '<b>' . MSG_VERIFIED . '</b>' : '<span style="color: red; ">' . MSG_NOT_VERIFIED . '</span>'; ?></td>      
    <?php if (!$seller_details['seller_verified']) { ?>
        <td nowrap class="contentfont">[ <a href="fee_payment.php?do=seller_verification"><?php echo MSG_GET_VERIFIED; ?></a> ]</td>
      <?php } ?>
  </tr>
</table>