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
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="6" class="c7"><b><?php echo MSG_MM_MY_REPUTATION; ?></b> (<?php echo $nb_items; ?> <?php echo strtolower(MSG_COMMENTS); ?>)
    </td>
  </tr>
  <tr>
    <td class="membmenu" align="center"><?php echo MSG_FROM; ?></td>
    <td class="membmenu" align="center"><?php echo MSG_RATE; ?></td>
    <td class="membmenu" align="center"><?php echo GMSG_DATE; ?></td>
    <td class="membmenu"><?php echo MSG_REVIEW; ?></td>
    <td class="membmenu" align="center"><?php echo MSG_DETAILS; ?></td>
    <td class="membmenu" align="center" class="contentfont"><?php echo MSG_TYPE; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="130" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="140" height="1"></td>
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
  </tr>
  <?php echo $reputation_received_content; ?>
  <?php if ($nb_items > 0) { ?>
      <tr>
        <td colspan="6" align="center" class="contentfont"><?php echo $pagination; ?></td>
      </tr>
    <?php } ?>
</table>

