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

<form action="content_section.php" method="post" name="form_content_topics">
  <input type="hidden" name="do" value="<?php echo $do; ?>" />
  <input type="hidden" name="page_id" value="<?php echo $page_id; ?>" />
  <input type="hidden" name="page" value="<?php echo $page_handle; ?>" />
  <input type="hidden" name="operation" value="submit" />
  <table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
    <tr>
      <td colspan="2" align="center" class="c4"><?php echo $manage_box_title; ?></td>
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
        <tr class="c3">
          <td colspan="2"><?php echo GMSG_LANGUAGE; ?>
            : <b>
              <?php echo $value; ?>
            </b></td>
        </tr>
        <tr class="c1">
          <td nowrap align="right"><?php echo AMSG_TOPIC_NAME; ?></td>
          <td width="100%"><input type="text" name="topic_name_<?php echo $value; ?>" value="<?php echo $row_topic['topic_name']; ?>" size="50" /></td>
        </tr>
        <tr class="c1">
          <td nowrap align="right"><?php echo AMSG_TOPIC_CONTENT; ?></td>
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
      <td colspan="2" align="center"><input type="submit" name="form_content_save" value="<?php echo AMSG_SAVE_CHANGES; ?>">
      </td>
    </tr>
  </table>
</form>
