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

  function delete_media(form_name, file_type, file_id) {
    form_name.box_submit.value = "1";
    form_name.file_upload_type.value = file_type;
    form_name.file_upload_id.value = file_id;
    form_name.submit();
  }
</SCRIPT>
<div class="mainhead"><img src="images/general.gif" align="absmiddle"> <?php echo $header_section; ?></div>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
   	<td width="4"><img src="images/c1.gif" width="4" height="4"></td>
   	<td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
   	<td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form name="form_site_setup" method="post" action="site_setup.php" enctype="multipart/form-data">
    <input type="hidden" name="box_submit" value="0" >
    <input type="hidden" name="file_upload_type" value="" >
    <input type="hidden" name="file_upload_id" value="" >
    <?php echo $media_upload_fields; ?>
    <tr class="c3">
      <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo strtoupper($subpage_title); ?></b></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><b><?php echo AMSG_SITE_NAME; ?></b></td>
      <td><input name="sitename" type="text" id="sitename" value="<?php echo $setts_tmp['sitename']; ?>" size="50"></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_SITE_NAME_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_SITE_URL; ?></b></td>
      <td><input name="site_path" type="text" id="site_path" value="<?php echo $setts_tmp['site_path']; ?>" size="50"></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_SITE_URL_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_ADMIN_EMAIL; ?></b></td>
      <td><input name="admin_email" type="text" id="admin_email" value="<?php echo $setts_tmp['admin_email']; ?>" size="50"></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_ADMIN_EMAIL_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_CHOOSE_MAILER; ?></b></td>
      <td><select name="mailer">
          <option value="mail" <?php echo ($setts_tmp['mailer'] == 'mail') ? 'selected' : ''; ?>>mail</option>
          <option value="sendmail" <?php echo ($setts_tmp['mailer'] == 'sendmail') ? 'selected' : ''; ?>>sendmail</option>
        </select></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_MAILER_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_SENDMAIL_PATH; ?></b></td>
      <td><input name="sendmail_path" type="text" id="sendmail_path" value="<?php echo $setts_tmp['sendmail_path']; ?>" size="50"></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_SENDMAIL_PATH_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_CHOOSE_SITE_SKIN; ?></b></td>
      <td><?php echo $site_skins_dropdown; ?> &nbsp;
        [ <?php echo AMSG_CURRENT_SKIN; ?> :
        <b><?php echo $setts_tmp['default_theme']; ?></b> ]</td>
    </tr>
    <tr class="c1">
      <td></td>
      <td><input type="checkbox" name="enable_hpfeat_desc" value="1" <?php echo ($setts_tmp['enable_hpfeat_desc'] == 1) ? "checked" : ""; ?>>
        <?php echo AMSG_HPFEAT_DESC_EXPL; ?></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_CHOOSE_SITE_SKIN_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_CHOOSE_SITE_LOGO; ?></b></td>
      <td><?php echo $image_upload_manager; ?></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_CHOOSE_SITE_LOGO_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_CHOOSE_DEFAULT_LANG; ?></b></td>
      <td><?php echo $languages_dropdown; ?> &nbsp;
        [ <?php echo AMSG_CURRENT_LANG; ?> :
        <b><?php echo $setts_tmp['site_lang']; ?></b> ]</td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_CHOOSE_DEFAULT_LANG_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td align="right"><b><?php echo AMSG_MAINTENANCE_MODE; ?></b></td>
      <td><input type="radio" name="maintenance_mode" value="1" checked>
        <?php echo GMSG_YES; ?>
        <input type="radio" name="maintenance_mode" value="0" <?php echo ($setts_tmp['maintenance_mode'] == 0) ? 'checked' : ''; ?>>
        <?php echo GMSG_NO; ?></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_MAINTENANCE_MODE_EXPL; ?></td>
    </tr>
    <tr align="center">
      <td colspan="2" valign="top"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
    </tr>
  </form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>