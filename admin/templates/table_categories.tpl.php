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
<script language="javascript">
  function popUp(URL) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=2,location=0,statusbar=1,menubar=0,resizable=0,width=550,height=395,left = 80,top = 80');");
  }
</script>
<div class="mainhead"><img src="images/cat.gif" align="absmiddle"> <?php echo AMSG_CATEGORIES; ?></div>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="table_categories.php" method="post">
    <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">
    <tr class="c3">
      <td><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo strtoupper(AMSG_CATEGORIES_MANAGEMENT); ?></b></td>
    </tr>
    <tr valign="top">
      <td style="padding: 3px;" nowrap><img src="images/a.gif" align="absmiddle" hspace="2" vspace="1"> <b><?php echo $category_navigator; ?></a></td>
    </tr>
    <tr valign="top">
      <td align="center"><table width="100%" border="0" cellpadding="3" cellspacing="1">
          <tr class="c4">
            <td width="20">&nbsp;</td>
            <td><?php echo AMSG_NAME; ?></td>
            <td width="80" align="center"><?php echo AMSG_ORDER_ID; ?></td>
            <?php if ($parent_id == 0) { ?>
                <td width="150" align="center"><?php echo GMSG_CUSTOM_SKIN; ?></td>
                <td width="60" align="center"><?php echo AMSG_MIN_AGE_YEARS; ?></td>
                <td width="60" align="center"><?php echo AMSG_INDIVIDUAL_FEES; ?></td>
              <?php } ?>
            <td width="60" align="center"><?php echo AMSG_HIDDEN; ?></td>
            <td width="60" align="center"><?php echo AMSG_DELETE; ?></td>
          </tr>
          <?php echo $categories_page_content; ?>
          <tr class="c4">
            <td>&nbsp;</td>
            <td><?php echo AMSG_ADD_CATEGORY; ?></td>
            <td align="center">&nbsp;</td>
            <?php if ($parent_id == 0) { ?>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
              <?php } ?>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php echo $add_category_content; ?>
        </table></td>
    </tr>
    <tr valign="top">
      <td align="center" style="padding: 3px;"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>">
        &nbsp;
        &nbsp;
        <input name="form_generate_subcategories" type="submit" value="<?php echo AMSG_GENERATE_CATEGORIES; ?>"></td>
    </tr>
    <tr valign="top" class="c1">
      <td><img src="images/info.gif" align="absmiddle"> <?php echo AMSG_CATEGORIES_GENERATE_NOTE; ?></td>
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