<?php
#################################################################
## MyPHPAuction v6.02															##
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
    form_name.onsubmit();
    form_name.submit();
  }

  function delete_media(form_name, file_type, file_id) {
    form_name.box_submit.value = "1";
    form_name.file_upload_type.value = file_type;
    form_name.file_upload_id.value = file_id;
    form_name.onsubmit();
    form_name.submit();
  }

  myPopup = '';

  function openPopup(url) {
    myPopup = window.open(url, 'popupWindow', 'width=750,height=480,scrollbars=yes,status=yes ');
    if (!myPopup.opener)
      myPopup.opener = self;
  }
</SCRIPT>
<?php echo $sell_item_header; ?>
<br>
<?php echo $display_formcheck_errors; ?>

<form action="<?php echo $post_url; ?>" method="post" enctype="multipart/form-data" name="ad_create_form">
  <input type="hidden" name="do" value="<?php echo $do; ?>" >
  <input type="hidden" name="box_submit" value="0" >
  <input type="hidden" name="file_upload_type" value="" >
  <input type="hidden" name="file_upload_id" value="" >
  <input type="hidden" name="wanted_ad_id" value="<?php echo $item_details['wanted_ad_id']; ?>" >
  <input type="hidden" name="category_id" value="<?php echo $item_details['category_id']; ?>">
  <input type="hidden" name="addl_category_id" value="<?php echo $item_details['addl_category_id']; ?>">
  <input type="hidden" name="old_category_id" value="<?php echo $old_category_id; ?>">
  <input type="hidden" name="old_addl_category_id" value="<?php echo $old_addl_category_id; ?>">
  <input type="hidden" name="start_time" value="<?php echo $item_details['start_time']; ?>">
  <?php echo $media_upload_fields; ?>
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr class="c4">
      <td colspan="3"><?php echo MSG_MAIN_CATEGORY; ?></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"></td>
      <td class="contentfont" colspan="2"><?php echo $main_category_display; ?>
        [ <a href="javascript:;"  onClick="openPopup('<?php echo SITE_PATH; ?>category_selector.php?cat=category_id&category_id=<?php echo $item_details['category_id']; ?>&auction_id=<?php echo $item_details['auction_id']; ?>&form_name=ad_create_form')">
          <?php echo GMSG_MODIFY; ?></a> ]</td>
    </tr>
    <tr class="reguser">
      <td></td>
      <td colspan="2"><?php echo MSG_CATEGORY_CHANGE_NOTE; ?></td>
    </tr>
    <tr class="c4">
      <td colspan="3"><?php echo MSG_ADDL_CATEGORY; ?></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"></td>
      <td class="contentfont" colspan="2"><?php echo $addl_category_display; ?>
        [ <a href="javascript:;"  onClick="openPopup('<?php echo SITE_PATH; ?>category_selector.php?cat=addl_category_id&category_id=<?php echo $item_details['addl_category_id']; ?>&auction_id=<?php echo $item_details['auction_id']; ?>&form_name=ad_create_form')">
          <?php echo GMSG_MODIFY; ?></a> ]</td>
    </tr>
    <tr class="c4">
      <td colspan="3"><?php echo MSG_ITEM_DETAILS; ?></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_ITEM_TITLE; ?></td>
      <td colspan="2"><input name="name" type="text" id="name" value="<?php echo $item_details['name']; ?>" size="60" maxlength="255" /></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td colspan="2"><?php echo MSG_ITEM_TITLE_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_ITEM_DESCRIPTION; ?></td>
      <td colspan="2"><textarea id="description_main" name="description_main" style="width: 400px; height: 200px; overflow: hidden;"><?php echo $item_details['description']; ?></textarea>
        <script>
  var oEdit_1 = new InnovaEditor("oEdit_1");
  oEdit_1.width = "100%";//You can also use %, for example: oEdit1.width="100%"
  oEdit_1.height = 250;
  oEdit_1.REPLACE("description_main");//Specify the id of the textarea here
        </script></td>
    </tr>
    <tr class="reguser">
      <td></td>
      <td colspan="2"><?php echo MSG_ITEM_DESC_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo GMSG_DURATION; ?></td>
      <td colspan="2"><?php echo $duration_drop_down; ?></td>
    </tr>
    <tr class="reguser">
      <td></td>
      <td colspan="2"><?php echo MSG_DURATION_EXPL; ?></td>
    </tr>
    <?php echo $custom_sections_table; ?>

    <?php echo ($setts['max_images'] > 0) ? $image_upload_manager : ''; ?>
    <tr class="c4">
      <td colspan="3"><?php echo MSG_LOCATION; ?></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_COUNTRY; ?> </td>
      <td colspan="2"><?php echo $country_dropdown; ?></td>
    </tr>
    <tr class="c2">
      <td width="150" align="right"><?php echo MSG_STATE; ?> </td>
      <td colspan="2"><?php echo $state_box; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_ZIP_CODE; ?> </td>
      <td colspan="2"><input type="text" name="zip_code" value="<?php echo $item_details['zip_code']; ?>" size="25" /></td>
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