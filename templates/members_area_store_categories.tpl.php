<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<script language="javascript" src="includes/main_functions.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">
  function submit_form_b(form_name) {

    form_name.submit();
  }
</SCRIPT>

<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td class="c7" colspan="2"><b>
        <?php echo MSG_MM_CUSTOM_CATS; ?>
      </b></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo MSG_STORE_CUSTOM_CATEGORIES_EXPL; ?></td>
  </tr>
  <form name="form_store_setup" action="members_area.php" method="POST" onSubmit="SelectOption(this.categories_id)">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="section" value="<?php echo $section; ?>">
    <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">
    <tr valign="top">
      <td align="center" colspan="2"><table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
          <tr>
            <td colspan="4" class="c3"><b>
                <?php echo $category_navigator; ?>
              </b></td>
          </tr>
          <tr class="c4">
            <td width="20">&nbsp;</td>
            <td><?php echo GMSG_NAME; ?></td>
            <td width="80" align="center"><?php echo MSG_ORDER_ID; ?></td>
            <td width="60" align="center"><?php echo MSG_DELETE; ?></td>
          </tr>
          <?php echo $categories_page_content; ?>
          <tr class="c4">
            <td>&nbsp;</td>
            <td><?php echo MSG_ADD_CATEGORY; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php echo $add_category_content; ?>
          <tr class="c5">
            <td colspan="4"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
          </tr>
          <tr valign="top">
            <td align="center" style="padding: 3px;" colspan="4"><input type="submit" name="form_save_settings" value="<?php echo MSG_SAVE_CHANGES; ?>">
              &nbsp;
              &nbsp;
              <input name="form_generate_subcategories" type="submit" value="<?php echo MSG_GENERATE_CATEGORIES; ?>"></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td colspan="2"><?php echo MSG_STORE_CATEGORIES_EXPL; ?></td>
    </tr>
    <tr class="c4">
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td align="right" nowrap><?php echo MSG_STORE_CATEGORIES; ?></td>
      <td width="100%"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="45%">[
              <?php echo MSG_ALL_CATEGORIES; ?>
              ] </td>
            <td width="10%">&nbsp;</td>
            <td width="45%">[
              <?php echo MSG_SELECTED_CATEGORIES; ?>
              ] </td>
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
    <tr class="c4">
      <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="form_shop_save" value="<?php echo GMSG_PROCEED; ?>" /></td>
    </tr>
  </form>
</table>
