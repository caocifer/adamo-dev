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

<div class="mainhead"><img src="images/enable.gif" align="absmiddle">
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
  <tr class="c3">
    <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
        <?php echo strtoupper($subpage_title); ?>
      </b></td>
  </tr>
  <form name="form_enable_disable" method="post" action="enable_disable.php" <?php echo ($page == 'auction_approval') ? 'onSubmit="SelectOption(this.categories_id)"' : ''; ?>>
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="table_name" value="<?php echo $table_name; ?>">
    <input type="hidden" name="field_name" value="<?php echo $field_name; ?>">
    <tr class="c1">
      <td width="150" align="right"><?php echo $subpage_title; ?></td>
      <td><input name="field_value" type="checkbox" id="field_value" value="1" <?php echo ($setts_tmp[$field_name] || $layout_tmp[$field_name]) ? 'checked' : ''; ?>></td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_CLICK_TO_ENABLE_FEATURE; ?></td>
    </tr>
    <?php if ($page == 'hp_news_box') { ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_NB_NEWS_DISPLAYED; ?></td>
          <td><input name="d_news_nb" type="text" id="d_news_nb" value="<?php echo $layout_tmp['d_news_nb']; ?>" size="8"></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_NB_NEWS_DISPLAYED_EXPL; ?></td>
        </tr>
      <?php }
      else if ($page == 'buy_out_method') {
        ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_ALWAYS_SHOW_BUYOUT; ?></td>
          <td><input name="always_show_buyout" type="checkbox" id="field_value" value="1" <?php echo ($setts_tmp['always_show_buyout']) ? 'checked' : ''; ?>></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_ALWAYS_SHOW_BUYOUT_EXPL; ?></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_SHOW_MAKEOFFER_RANGE; ?></td>
          <td><input name="makeoffer_private" type="checkbox" id="makeoffer_private" value="1" <?php echo ($setts_tmp['makeoffer_private']) ? 'checked' : ''; ?>></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_SHOW_MAKEOFFER_RANGE_EXPL; ?></td>
        </tr>
      <?php }
      else if ($page == 'registration_terms') {
        ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_REG_TERMS_CONTENT; ?></td>
          <td><textarea name="reg_terms_content" style="width: 100%; height: 150px;"><?php echo eregi_replace('<br>', "\n", $layout_tmp['reg_terms_content']); ?></textarea></td>
        </tr>
  <?php }
  else if ($page == 'sellitem_terms') {
    ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_SELLITEM_TERMS_CONTENT; ?></td>
          <td><textarea name="auct_terms_content" style="width: 100%; height: 150px;"><?php echo eregi_replace('<br>', "\n", $layout_tmp['auct_terms_content']); ?></textarea></td>
        </tr>
  <?php }
  else if ($page == 'auction_sniping') {
    ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_SNIPING_DURATION; ?></td>
          <td><input name="sniping_duration" type="text" id="sniping_duration" value="<?php echo $setts_tmp['sniping_duration']; ?>" size="8">
    <?php echo GMSG_MINUTES; ?></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_SNIPING_DURATION_EXPL; ?></td>
        </tr>
  <?php }
  else if ($page == 'auction_approval') {
    ?>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_AUCT_APPROVAL_NOTE; ?></td>
        </tr>
    <?php if (!$setts['enable_auctions_approval']) { ?>
          <tr class="c1">
            <td align="right"><?php echo AMSG_USERS; ?></td>
            <td>[ <a href="list_site_users.php">
      <?php echo GMSG_SELECT; ?>
              </a> ]</td>
          </tr>
          <tr class="c2">
            <td align="right"><?php echo AMSG_CATEGORIES; ?></td>
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td width="45%">[
      <?php echo AMSG_ALL_CATEGORIES; ?>
                    ] </td>
                  <td width="10%">&nbsp;</td>
                  <td width="45%">[
      <?php echo AMSG_SELECTED_CATEGORIES; ?>
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
            <?php } ?>
          <?php }
          else if ($page == 'preferred_sellers') {
            ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_PREF_SELLER_EXP_DATE; ?></td>
          <td><input name="preferred_days" type="text" id="preferred_days" value="<?php echo $setts_tmp['preferred_days']; ?>" size="8">
    <?php echo GMSG_DAYS; ?></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_PREF_SELLER_EXP_DATE_EXPL; ?></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_REDUCTION; ?></td>
          <td><input name="pref_sellers_reduction" type="text" id="pref_sellers_reduction" value="<?php echo $setts_tmp['pref_sellers_reduction']; ?>" size="8">%</td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_REDUCTION_DESC; ?></td>
        </tr>
  <?php }
  else if ($page == 'change_duration') {
    ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_NEW_DURATION; ?></td>
          <td><input name="duration_change_days" type="text" id="duration_change_days" value="<?php echo $setts_tmp['duration_change_days']; ?>" size="8">
        <?php echo GMSG_DAYS; ?></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_NEW_DURATION_DESC; ?></td>
        </tr>
  <?php }
  else if ($page == 'seller_verification') {
    ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_SELLER_VERIF_MANDATORY; ?></td>
          <td><input name="seller_verification_mandatory" type="checkbox" id="seller_verification_mandatory" value="1" <?php echo ($setts_tmp['seller_verification_mandatory']) ? 'checked' : ''; ?>></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_SELLER_VERIF_MANDATORY_EXPL; ?></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_VERIFICATION_FEE; ?></td>
          <td><?php echo $setts['currency']; ?>
            <input name="verification_fee" type="text" id="verification_fee" value="<?php echo $fees_tmp['verification_fee']; ?>" size="8">,
        <?php echo AMSG_RECURRING_EVERY; ?>
            <input name="verification_recurring" type="text" id="verification_recurring" value="<?php echo $fees_tmp['verification_recurring']; ?>" size="8">
    <?php echo GMSG_DAYS; ?></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_VERIFICATION_FEE_EXPL; ?></td>
        </tr>
  <?php }
  else if ($page == 'seller_other_items') {
    ?>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_SELLER_OTHER_ITEMS_EXPL; ?></td>
        </tr>
  <?php }
  else if ($page == 'store_only_mode') {
    ?>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_ENABLE_STORE_ONLY_MODE_EXPL; ?></td>
        </tr>
      <?php }
      else if ($page == 'second_chance') {
        ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo AMSG_SELECT_INTERVAL; ?></td>
          <td><input name="second_chance_days" type="text" id="second_chance_days" value="<?php echo $setts_tmp['second_chance_days']; ?>" size="8">
    <?php echo GMSG_DAYS; ?></td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_SECOND_CHANCE_EXPL; ?></td>
        </tr>
  <?php } ?>
    <tr align="center">
      <td colspan="2"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
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
