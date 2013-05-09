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
<div class="mainhead"><img src="images/cat.gif" align="absmiddle"> <?php echo $header_section; ?></div>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="table_suggested_categories.php" method="post">
    <tr>
      <td class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo AMSG_VIEW_SUGGESTED_CATEGORIES; ?></b></td>
    </tr>
    <tr valign="top">
      <td align="center">
        <table width="100%" border="0" cellpadding="3" cellspacing="1">
          <tr class="c4">
            <td width="120"><?php echo AMSG_USERNAME; ?></td>
            <td><?php echo AMSG_DESCRIPTION; ?></td>
            <td width="150" align="center"><?php echo AMSG_DATE_ADDED; ?></td>
            <td width="80" align="center"><?php echo AMSG_DELETE; ?></td>
          </tr>
          <?php echo $suggested_categories_page_content; ?>
        </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
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