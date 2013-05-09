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
  function previewPic(sel) {
    document.preview_pic.src = "store_templates/images/" + sel.options[sel.selectedIndex].value + ".jpg?<?php echo rand(2, 9999); ?>";
  }
</SCRIPT>
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
</SCRIPT>
<br>
<form name="form_store_setup" action="members_area.php?page=store&section=setup" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="box_submit" value="0" >
  <input type="hidden" name="file_upload_type" value="" >
  <input type="hidden" name="file_upload_id" value="" >
  <input type="hidden" name="shop_template_id" value="<?php echo $user_details['shop_template_id']; ?>" >
  <?php echo $media_upload_fields; ?>
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td colspan="2" class="c7"><b><?php echo MSG_MM_MAIN_SETTINGS; ?></b></td>
    </tr>	
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
    </tr>
    <?php if ($display_formcheck_errors) { ?>
        <tr>
          <td colspan="2"><?php echo $display_formcheck_errors; ?></td>
        </tr>	
      <?php } ?>
    <tr class="c1">
      <td align="right"><?php echo MSG_STORE_NAME; ?></td>
      <td><input type="text" name="shop_name" size="40" value="<?php echo $user_details['shop_name']; ?>"></td>
    </tr>		
    <tr class="c1">
      <td align="right"><?php echo MSG_STORE_DESCRIPTION; ?></td>
      <td><textarea id="shop_mainpage" name="shop_mainpage" style="width: 400px; height: 200px; overflow: hidden;"><?php echo $user_details['shop_mainpage']; ?></textarea>
        <script>
  var oEdit_1 = new InnovaEditor("oEdit_1");
  oEdit_1.width = "100%";//You can also use %, for example: oEdit1.width="100%"
  oEdit_1.height = 250;
  oEdit_1.REPLACE("shop_mainpage");//Specify the id of the textarea here
        </script></td>
    </tr>
    <tr class="c1">
      <td align="right"><?php echo MSG_STORE_META_KEYWORDS; ?></td>
      <td><textarea id="shop_metatags" name="shop_metatags" style="width: 400px; height: 100px;"><?php echo $user_details['shop_metatags']; ?></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo MSG_STORE_META_KEYWORDS_EXPL; ?></td>
    </tr>
    <tr>
      <td class="c7" colspan="2"><b><?php echo MSG_STORE_LOGO; ?></b></td>
    </tr>	
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
    </tr>
    <tr class="c1">
      <td align="right"><?php echo MSG_CHOOSE_STORE_LOGO; ?></td>
      <td><?php echo $image_upload_manager; ?></td>
    </tr>
    <tr>
      <td class="c7" colspan="2"><b><?php echo MSG_STORE_DESIGNS; ?></b></td>
    </tr>	
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
    </tr>
    <tr class="c1">
      <td align="right"><?php echo MSG_SELECT_DESIGN; ?></td>
      <td><?php echo $store_templates_drop_down; ?></td>
    </tr>
    <tr class="c4">
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="form_shop_save" value="<?php echo GMSG_PROCEED; ?>" /></td>
    </tr>
  </table>
</form>
