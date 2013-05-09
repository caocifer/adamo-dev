<?php
#################################################################
## MyPHPAuction [ custom file ]											##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
## Retail Mod - IP Logger													##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<table width="100%" border="0" cellspacing="3" cellpadding="3" class="border">
  <tr class="c3">
    <td align="center" colspan="3"><b><?php echo AMSG_IP_HISTORY; ?> - [ <?php echo $username; ?> ]</b></td>
  </tr>
  <tr class="c4">
    <td align="center"><b><?php echo AMSG_IP_ADDRESS; ?></b></td>
    <td width="33%" align="center"><b><?php echo GMSG_START_TIME; ?></b></td>
    <td width="33%" align="center"><b><?php echo GMSG_END_TIME; ?></b></td>
  </tr>
  <?php echo $ip_history_table_content; ?>
</table>
