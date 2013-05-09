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
    <td colspan="8" class="c7"><b><?php echo MSG_MM_WATCHED_ITEMS; ?></b> (<?php echo $nb_items; ?> <?php echo MSG_ITEMS; ?>)
    </td>
  </tr>
  <form action="" method="post" name="watched_items">
    <tr>
      <td class="membmenu"><?php echo MSG_AUCTION_ID; ?><br><?php echo $page_order_auction_id; ?></td>
      <td class="membmenu"><?php echo MSG_ITEM_TITLE; ?><br><?php echo $page_order_itemname; ?></td>
      <td class="membmenu" align="center"><?php echo GMSG_END_TIME; ?><br><?php echo $page_order_end_time; ?></td>
      <td class="membmenu contentfont" align="center" nowrap><?php echo GMSG_DELETE; ?>
        <br>
        [ <a href="javascript:void(0);" onclick="checkAll(document.watched_items['delete[]'], <?php echo $nb_items; ?>, true);"><?php echo GMSG_ALL; ?></a> |
        <a href="javascript:void(0);" onclick="checkAll(document.watched_items['delete[]'], <?php echo $nb_items; ?>, false);"><?php echo GMSG_NONE; ?></a> ]</td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
    </tr>
    <?php echo $watched_items_content; ?>
    <?php if ($nb_items > 0) { ?>
        <tr class="membmenu">
          <td colspan="8" align="center" class="contentfont"><input type="submit" name="form_watched_proceed" value="<?php echo GMSG_PROCEED; ?>" /></td>
        </tr>
        <tr>
          <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
        </tr>
      <?php } ?>
  </form>	
</table>

