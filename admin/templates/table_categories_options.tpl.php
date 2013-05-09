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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <SCRIPT LANGUAGE="JavaScript">
      function submit_form(form_name, file_type) {
        form_name.box_submit.value = "1";
        form_name.file_upload_type.value = file_type;
        form_name.submit();
      }

      function delete_media(form_name, file_type, file_id) {
        form_name.box_submit.value = "1";
        form_name.file_upload_type.value = file_type;
        form_name.file_upload_id.value = file_id;
        form_name.submit();
      }
    </SCRIPT>
  </head>

  <body>
    <?php if ($form_saved == 1) { ?>
        <p align="center" class="contentfont"><?php echo AMSG_CHANGES_SAVED; ?></p>
      <?php }
      else {
        ?>
        <form action="table_categories_options.php" method="post" name="form_category_options" enctype="multipart/form-data">
          <input type="hidden" name="operation" value="submit" />
          <input type="hidden" name="category_id" value="<?php echo $cat_details['category_id']; ?>" />

          <!-- media upload related fields -->
          <input type="hidden" name="box_submit" value="0" >
          <input type="hidden" name="file_upload_type" value="" >
          <input type="hidden" name="file_upload_id" value="" >
    <?php echo $media_upload_fields; ?>
          <table width="100%" border="0" cellpadding="3" cellspacing="3" class="border">
            <tr>
              <td colspan="3" class="c3"><b>
    <?php echo $page_title; ?>
                </b></td>
            </tr>
            <tr class="c5">
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
              <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
            </tr>
            <tr class="c1">
              <td width="150" align="right"><?php echo AMSG_HOVER_TITLE; ?></td>
              <td colspan="2"><input type="text" name="hover_title" size="25" value="<?php echo $cat_details['hover_title']; ?>"></td>
            </tr>
            <tr class="c1">
              <td width="150" align="right"><?php echo AMSG_META_DESCRIPTION; ?></td>
              <td colspan="2"><textarea name="meta_description" style="width=100%; height: 50px;"><?php echo $cat_details['meta_description']; ?></textarea></td>
            </tr>
            <tr class="c1">
              <td width="150" align="right"><?php echo AMSG_META_KEYWORDS; ?></td>
              <td colspan="2"><textarea name="meta_keywords" style="width=100%; height: 50px;"><?php echo $cat_details['meta_keywords']; ?></textarea></td>
            </tr>
    <?php echo $image_upload_manager; ?>
            <tr class="c4">
              <td align="center" colspan="3"><INPUT TYPE="submit" VALUE="<?php echo GMSG_PROCEED; ?>" name="form_submit_catopts"></td>
            </tr>
          </table>
        </form>
  <?php } ?>
  </body>
</html>
