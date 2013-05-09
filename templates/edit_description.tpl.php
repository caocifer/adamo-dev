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
<?php echo $sell_item_header; ?>
<br>
<form action="<?php echo $post_url; ?>" method="post" enctype="multipart/form-data" name="ad_create_form">
  <input type="hidden" name="do" value="<?php echo $do; ?>" >
  <input type="hidden" name="auction_id" value="<?php echo $item_details['auction_id']; ?>" >
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_EDIT_DESCRIPTION; ?></td>
      <td><textarea id="description_main" name="description_main" style="width: 400px; height: 200px; overflow: hidden;"></textarea>
        <?php echo $item_description_editor; ?>
      </td>
    </tr>
    <tr class="reguser">
      <td></td>
      <td><?php echo MSG_EDIT_ITEM_DESC_EXPL; ?></td>
    </tr>
  </table>
  <br />
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td width="150" class="contentfont"><input name="form_edit_proceed" type="submit" id="form_edit_proceed" value="<?php echo GMSG_PROCEED; ?>" />
      </td>
      <td class="contentfont">&nbsp;</td>
    </tr>
  </table>
</form>
