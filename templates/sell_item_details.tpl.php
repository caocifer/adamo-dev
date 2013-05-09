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
<SCRIPT LANGUAGE="JavaScript">
  function submit_form(form_name, file_type) {
    form_name.box_submit.value = "1";
    form_name.file_upload_type.value = file_type;
    form_name.submit();
  }
</SCRIPT>
<table width="100%" border="0" cellpadding="3" cellspacing="2">
  <tr class="c4">
    <td colspan="2" class="cat_explain_message"><?php echo MSG_ITEM_DETAILS; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><?php echo MSG_CHOOSE_LISTING_TYPE; ?></td>
    <td><select name="listing_type" onChange = "submit_form(ad_create_form, '');">
        <option value="full" selected><?php echo MSG_FULL_LISTING; ?></option>
        <option value="quick" <?php echo ($item_details['listing_type'] == 'quick') ? 'selected' : ''; ?>><?php echo MSG_QUICK_LISTING; ?></option>
        <?php if ($setts['buyout_process'] == 1) { ?>
            <option value="buy_out" <?php echo ($item_details['listing_type'] == 'buy_out') ? 'selected' : ''; ?>><?php echo MSG_BUY_OUT_ITEM; ?></option>
          <?php } ?>
      </select></td>
  </tr>
  <tr class="reguser">
    <td>&nbsp;</td>
    <td><?php echo ($setts['buyout_process'] == 1) ? MSG_CHOOSE_LISTING_TYPE_BUYOUT_EXPL : MSG_CHOOSE_LISTING_TYPE_EXPL; ?></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><?php echo MSG_ITEM_TITLE; ?></td>
    <td><input name="name" type="text" id="name" value="<?php echo $item_details['name']; ?>" size="60" maxlength="255" /></td>
  </tr>
  <tr class="reguser">
    <td>&nbsp;</td>
    <td><?php echo MSG_ITEM_TITLE_EXPL; ?></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"><?php echo MSG_ITEM_DESCRIPTION; ?></td>
    <td><textarea id="description_main" name="description_main" style="width: 400px; height: 200px; overflow: hidden;"><?php echo $item_details['description']; ?></textarea>
      <?php echo $item_description_editor; ?>
    </td>
  </tr>
  <tr class="reguser">
    <td></td>
    <td><?php echo MSG_ITEM_DESC_EXPL; ?></td>
  </tr>
  <tr class="c4">
    <td colspan="2"><?php echo MSG_MAIN_CATEGORY; ?></td>
  </tr>
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td width="150" align="right"></td>
    <td class="contentfont"><?php echo $main_category_display; ?>
      <?php if ($auction_edit == 1) { ?>
          [ <a href="javascript:;"  onClick="openPopup('<?php echo SITE_PATH; ?>category_selector.php?cat=category_id&category_id=<?php echo $item_details['category_id']; ?>&auction_id=<?php echo $item_details['auction_id']; ?>&form_name=ad_create_form')">
            <?php echo GMSG_MODIFY; ?></a> ]
        <?php } ?></td>
  </tr>
  <?php if ($auction_edit == 1) { ?>
      <tr class="reguser">
        <td></td>
        <td><?php echo MSG_CATEGORY_CHANGE_NOTE; ?></td>
      </tr>
    <?php } ?>
  <?php if ($setts['enable_addl_category'] && ($item_details['addl_category_id'] || $auction_edit == 1)) { ?>
      <tr class="c4">
        <td colspan="2"><?php echo MSG_ADDL_CATEGORY; ?></td>
      </tr>
      <tr class="c5">
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
      <tr class="c1">
        <td width="150" align="right"></td>
        <td class="contentfont"><?php echo $addl_category_display; ?>
          <?php if ($auction_edit == 1) { ?>
            [ <a href="javascript:;"  onClick="openPopup('<?php echo SITE_PATH; ?>category_selector.php?cat=addl_category_id&category_id=<?php echo $item_details['addl_category_id']; ?>&auction_id=<?php echo $item_details['auction_id']; ?>&form_name=ad_create_form')">
              <?php echo GMSG_MODIFY; ?></a> ]
          <?php } ?></td>
      </tr>
    <?php } ?>
  <?php echo $setup_voucher_box; ?>
  <?php if ($auction_edit != 1) { ?>
      <tr class="c5">
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td></td>
        <td><?php echo nav_btns_position(); ?></td>
      </tr>
    <?php } ?>
</table>
<br>
