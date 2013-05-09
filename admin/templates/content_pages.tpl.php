<?php
#################################################################
## MyPHPAuction v6.05															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<form action="content_pages.php" method="post" name="form_content_pages">
  <input type="hidden" name="do" value="<?php echo $do; ?>" />
  <input type="hidden" name="page_id" value="<?php echo $page_id; ?>" />
  <input type="hidden" name="page" value="<?php echo $page_handle; ?>" />
  <input type="hidden" name="field_name" value="<?php echo $field_name; ?>">
  <input type="hidden" name="operation" value="submit" />
  <div class="mainhead"><img src="images/tables.gif" align="absmiddle">
    <?php echo $header_section; ?>
  </div>
  <?php echo $msg_changes_saved; ?>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
      <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
      <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
    <tr>
      <td colspan="3" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
          <?php echo strtoupper($subpage_title); ?>
        </b></td>
    </tr>
    <tr class="c1">
      <td align="right" nowrap><?php echo AMSG_ENABLE_PAGE; ?></td>
      <td><input name="field_value" type="checkbox" id="field_value" value="1" <?php echo ($layout_tmp[$field_name]) ? 'checked' : ''; ?>></td>
    </tr>
    <?php
      foreach ($languages as $value) {
        $sql_select_topic = $db->query("SELECT * FROM " . DB_PREFIX . "content_pages WHERE
      		page_id='" . $page_id . "' AND topic_lang='" . $value . "' AND page_handle='" . $page_handle . "'");

        $is_topic = $db->num_rows($sql_select_topic);

        (array) $row_topic = null;

        if ($is_topic)
          $row_topic = $db->fetch_array($sql_select_topic);
        ?>
        <tr class="c4">
          <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2">
            <?php echo GMSG_LANGUAGE; ?>
            : <b>
              <?php echo $value; ?>
            </b></td>
        </tr>
        <tr class="c1">
          <td nowrap align="right"><b>
              <?php echo AMSG_ENTER_CONTENT; ?>
            </b></td>
          <td width="100%"><textarea id="topic_content_<?php echo $value; ?>" name="topic_content_<?php echo $value; ?>" style="width: 400px; height: 200px; overflow: hidden;"><?php echo $row_topic['topic_content']; ?></textarea>
            <script>
              var oEdit_<?php echo $value; ?> = new InnovaEditor("oEdit_<?php echo $value; ?>");
              oEdit_<?php echo $value; ?>.width = "100%";//You can also use %, for example: oEdit1.width="100%"
              oEdit_<?php echo $value; ?>.height = 250;
              oEdit_<?php echo $value; ?>.REPLACE("topic_content_<?php echo $value; ?>");//Specify the id of the textarea here
            </script></td>
        </tr>
      <?php } ?>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>">
      </td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
      <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
      <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
    </tr>
  </table>
</form>
