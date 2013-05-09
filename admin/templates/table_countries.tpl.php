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

<div class="mainhead"><img src="images/tables.gif" align="absmiddle">
  <?php echo $header_section; ?>
</div>
<?php echo $linkable_tables_box; ?>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="table_countries.php" method="post">
    <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">
    <tr class="c3">
      <td><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
          <?php echo strtoupper($subpage_title); ?>
        </b></td>
    </tr>
    <tr>
      <td><img src="images/info.gif" align="absmiddle" vspace="5" hspace="5">
        <?php echo AMSG_STATES_NOTE; ?></td>
    </tr>
    <?php echo $state_header_message; ?>
    <tr valign="top">
      <td align="center"><table width="100%" border="0" cellpadding="2" cellspacing="1">
          <tr class="c4">
            <td width="20">&nbsp;</td>
            <td><?php echo AMSG_COUNTRY_NAME; ?></td>
            <td width="80" align="center"><?php echo GMSG_ORDER; ?></td>
            <td width="80" align="center"><?php echo AMSG_DELETE; ?></td>
          </tr>
          <?php echo $countries_page_content; ?>
        </table></td>
    </tr>
    <tr class="c2">
      <td style="padding: 3px;" class="border"><b>
          <?php echo ($parent_id) ? ADD_STATE : AMSG_ADD_COUNTRY; ?>
        </b>
        <input name="new_name" type="text" id="new_name" size="60"></td>
    </tr>
    <tr>
      <td align="center" style="padding: 3px;"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
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
