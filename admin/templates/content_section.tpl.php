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

<div class="mainhead"><img src="images/content.gif" align="absmiddle">
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
<?php echo $management_box; ?>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="content_section.php" method="post">
    <input type="hidden" name="page" value="<?php echo $page_handle; ?>" />
    <tr class="c3">
      <td colspan="4"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
          <?php echo strtoupper($subpage_title); ?>
        </b></td>
    </tr>
    <tr class="c4">
      <td><?php echo AMSG_TOPIC_NAME; ?></td>
      <?php if (in_array($page_handle, $custom_section_pages_ordering)) { ?>
          <td width="100" align="center"><?php echo GMSG_ORDER; ?></td>
        <?php } ?>
      <td width="150" align="center"><?php echo AMSG_DATE_ADDED; ?></td>
      <td width="150" align="center"><?php echo AMSG_OPTIONS; ?></td>
    </tr>
    <?php echo $content_pages_content; ?>
    <tr>
      <td colspan="4">[ <a href="content_section.php?do=add_topic&page=<?php echo $page_handle; ?>">
          <?php echo AMSG_ADD_TOPIC; ?>
        </a> ] </td>
    </tr>
    <?php if (in_array($page_handle, $custom_section_pages_ordering)) { ?>
        <tr>
          <td colspan="4" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>" <?php echo $disabled_button; ?>></td>
        </tr>
      <?php } ?>
  </form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
