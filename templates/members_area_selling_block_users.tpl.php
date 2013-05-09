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
<?php echo ($block_add_user_content) ? $block_add_user_content . '<br>' : ''; ?>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="4" class="c7"><b><?php echo MSG_MM_BLOCK_USERS; ?></b>
    </td>
  </tr>
  <tr>
    <td class="membmenu"><?php echo MSG_USERNAME; ?></td>
    <td class="membmenu"><?php echo MSG_BLOCK_REASON; ?></td>
    <td class="membmenu" align="center"><?php echo MSG_SHOW_REASON; ?></td>
    <td class="membmenu" align="center" class="contentfont"><?php echo GMSG_OPTIONS; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="120" height="1"></td>
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="135" height="1"></td>
  </tr>
  <?php echo $blocked_users_content; ?>
  <?php if ($nb_items > 0) { ?>
      <tr>
        <td colspan="4" align="center" class="contentfont"><?php echo $pagination; ?></td>
      </tr>
    <?php } ?>
  <tr class="c4">
    <td colspan="4"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="contentfont">
    <td colspan="4">[ <a href="members_area.php?page=selling&section=block_users&do=add_user"><?php echo MSG_ADD_USER; ?></a> ]</td>
  </tr>
</table>

