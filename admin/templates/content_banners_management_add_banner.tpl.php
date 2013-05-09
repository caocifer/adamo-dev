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
<script language="javascript" src="../includes/main_functions.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">
  function delete_media(form_name, file_type, file_id) {
    form_name.box_submit.value = "1";
    form_name.file_upload_type.value = file_type;
    form_name.file_upload_id.value = file_id;
    form_name.submit();
  }

  function submit_form(form_name, file_type) {
    form_name.box_submit.value = "1";
    form_name.file_upload_type.value = file_type;

    SelectOption(form_name.categories_id)

    form_name.submit();
  }

  function submit_form_b(form_name) {

    form_name.submit();
  }
</SCRIPT>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="content_banners_management.php" method="post" name="form_content_banners" enctype="multipart/form-data" onSubmit="SelectOption(this.categories_id)">
    <input type="hidden" name="do" value="<?php echo $do; ?>" />
    <input type="hidden" name="box_submit" value="0" >
    <input type="hidden" name="file_upload_type" value="" >
    <input type="hidden" name="file_upload_id" value="" >
    <input type="hidden" name="advert_id" value="<?php echo $advert_id; ?>" >
    <?php echo $media_upload_fields; ?>
    <tr>
      <td colspan="2" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo $manage_box_title; ?></b></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><b><?php echo AMSG_BANNER_TYPE; ?></b></td>
      <td>
        <?php
          if ($advert_type) {
            echo ($advert_type == 1) ? AMSG_CUSTOM_ADVERT : AMSG_CODE_ADVERT;
            ?>
            <input type="hidden" name="advert_type" value="<?php echo $advert_type; ?>">
          <?php }
          else {
            ?>
            <select name="advert_type" onchange="submit_form_b(form_content_banners);">
              <option value="0" selected><?php echo AMSG_SELECT_BANNER_TYPE; ?></option>
              <option value="1" <?php echo ($advert_type == 1) ? 'selected' : ''; ?>><?php echo AMSG_CUSTOM_ADVERT; ?></option>
              <option value="2" <?php echo ($advert_type == 2) ? 'selected' : ''; ?>><?php echo AMSG_CODE_ADVERT; ?></option>
            </select>
  <?php } ?></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_BANNER_TYPE_EXPL; ?></td>
    </tr>
<?php if ($advert_type) { ?>
        <tr class="c1">
          <td width="150" align="right"><b><?php echo AMSG_VIEWS_PURCHASED; ?></b></td>
          <td><input type="text" name="views_purchased" value="<?php echo $banner_details['views_purchased']; ?>" size="8"></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_VIEWS_PURCHASED_EXPL; ?></td>
        </tr>
    <?php if ($advert_type == 1) { ?>
          <tr class="c1">
            <td width="150" align="right"><?php echo AMSG_CLICKS_PURCHASED; ?></td>
            <td><input type="text" name="clicks_purchased" value="<?php echo $banner_details['clicks_purchased']; ?>" size="8"></td>
          </tr>
          <tr>
            <td class="explain" align="right"><img src="images/info.gif"></td>
            <td class="explain"><?php echo AMSG_CLICKS_PURCHASED_EXPL; ?></td>
          </tr>
    <?php } ?>
        <tr class="c1">
          <td width="150" align="right"><b><?php echo AMSG_DISPLAY_IN_CATEGORIES; ?></b></td>
          <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td width="45%"><b>[ <?php echo AMSG_ALL_CATEGORIES; ?> ]</b> </td>
                <td width="10%">&nbsp;</td>
                <td width="45%"><b>[ <?php echo AMSG_SELECTED_CATEGORIES; ?> ]</b> </td>
              </tr>
              <tr>
                <td><?php echo $all_categories_table; ?></td>
                <td align="center"><input type="button" name="Disable" value=" -&gt; " style="width: 50px;" onclick="MoveOption(this.form.all_categories, this.form.categories_id)" />
                  <br />
                  <br />
                  <input type="button" name="Enable" value=" &lt;- " style="width: 50px;" onclick="MoveOption(this.form.categories_id, this.form.all_categories)" /></td>
                <td><?php echo $selected_categories_table; ?></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_DISPLAY_IN_CATEGORIES_EXPL; ?></td>
        </tr>
    <?php if ($advert_type == 1) { // custom advert   ?>
          <tr class="c1">
            <td width="150" align="right"><b><?php echo AMSG_BANNER_IMAGE; ?></b></td>
            <td><?php echo $image_upload_manager; ?></td>
          </tr>
          <tr class="c1">
            <td width="150" align="right"><b><?php echo AMSG_BANNER_URL; ?></b></td>
            <td><input type="text" name="advert_url" value="<?php echo $banner_details['advert_url']; ?>" size="40"></td>
          </tr>
          <tr class="c1">
            <td width="150" align="right"><b><?php echo AMSG_TEXT_UNDER; ?></b></td>
            <td><input type="text" name="advert_text_under" value="<?php echo $banner_details['advert_text_under']; ?>" size="40"></td>
          </tr>
          <tr class="c1">
            <td width="150" align="right"><b><?php echo AMSG_ALT_TEXT; ?></b></td>
            <td><input type="text" name="advert_alt_text" value="<?php echo $banner_details['advert_alt_text']; ?>" size="40"></td>
          </tr>
    <?php }
    else if ($advert_type == 2) { // code advert 
      ?>
          <tr class="c1">
            <td align="right"><b><?php echo AMSG_ADVERT_CODE; ?></b></td>
            <td><textarea id="advert_code" name="advert_code" style="width: 100%; height: 150px; overflow: hidden;"><?php echo $db->add_special_chars($banner_details['advert_code']); ?></textarea></td>
          </tr>
        <?php } ?>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
        </tr>
  <?php } ?>
  </form>
</table>
<br />