<?php
#################################################################
## MyPHPAuction v6.04															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<script language="Javascript">
<!--
  function checkAll(field, array_len, check) {
    if (array_len == 1) {
      field.checked = check;
    } else {
      for (i = 0; i < array_len; i++)
        field[i].checked = check;
    }
  }
  -- ></script>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="8" class="c7"><b><?php echo MSG_MM_KEYWORDS_WATCH; ?></b> (<?php echo $nb_items; ?> <?php echo MSG_KEYWORDS; ?>)
    </td>
  </tr>
  <tr>
    <td colspan="8" class="contentfont">[ <a href="members_area.php?page=bidding&section=keywords_watch&option=add_keyword"><?php echo MSG_ADD_KEYWORD; ?></a> ]
    </td>
  </tr>
  <form action="" method="post" name="keywords_watch">
    <?php if ($option == 'add_keyword') { ?>
        <tr class="c1">
          <td align="right"><?php echo MSG_KEYWORD; ?></td>
          <td colspan="2"><input type="text" name="keyword" value="" size="50"></td>
        </tr>
        <tr class="membmenu">
          <td align="right"></td>
          <td colspan="2"><input type="submit" name="form_keywords_watch_add_keyword" value="<?php echo MSG_ADD_KEYWORD; ?>" /></td>
        </tr>
      <?php } ?>
    <tr>
      <td class="membmenu" colspan="2"><?php echo MSG_KEYWORD; ?><br><?php echo $page_order_keyword; ?></td>
      <td class="membmenu contentfont" align="center"><?php echo GMSG_DELETE; ?>
        <br>
        [ <a href="javascript:void(0);" onclick="checkAll(document.keywords_watch['delete[]'], <?php echo $nb_items; ?>, true);"><?php echo GMSG_ALL; ?></a> |
        <a href="javascript:void(0);" onclick="checkAll(document.keywords_watch['delete[]'], <?php echo $nb_items; ?>, false);"><?php echo GMSG_NONE; ?></a> ]</td>
    </tr>
    <tr class="c5">
      <td width="150"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
    </tr>
    <?php echo $keywords_watch_content; ?>
    <?php if ($nb_items > 0) { ?>
        <tr class="membmenu">
          <td colspan="8" align="center" class="contentfont"><input type="submit" name="form_keywords_watch_proceed" value="<?php echo GMSG_PROCEED; ?>" <?php echo ($option == 'keyword') ? 'disabled' : ''; ?> /></td>
        </tr>
        <tr>
          <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
        </tr>
      <?php } ?>
  </form>	
</table>

