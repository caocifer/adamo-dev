<?php
#################################################################
## MyPHPAuction v6.05															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="8" class="c7"><b><?php echo MSG_MM_SENT_MESSAGES; ?></b> (<?php echo $nb_messages; ?> <?php echo MSG_MESSAGES; ?>)
    </td>
  </tr>
  <tr>
    <td class="membmenu" nowrap><?php echo MSG_TO; ?> <?php echo $page_order_receiver_username; ?></td>
    <td class="membmenu"><?php echo MSG_SUBJECT; ?></td>
    <td class="membmenu" align="center" nowrap><?php echo GMSG_DATE; ?> <?php echo $page_order_reg_date; ?></td>
    <td class="membmenu" align="center" nowrap><?php echo GMSG_OPTIONS; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <?php echo $sent_messages_content; ?>
  <?php if ($nb_messages > 0) { ?>
      <tr>
        <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
      </tr>
    <?php } ?>
</table>

