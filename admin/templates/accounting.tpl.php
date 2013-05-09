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
<SCRIPT LANGUAGE="JavaScript" SRC="../includes/calendar.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">document.write(getCalendarStyles());</SCRIPT>
<div class="mainhead"><img src="images/fees.gif" align="absmiddle"> <?php echo $header_section; ?></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr>
    <td colspan="4" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo $subpage_title; ?></b></td>
  </tr>
  <form action="accounting.php" method="POST" name="account_overview_form">
    <input type="hidden" name="do" value="display_accounting">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <?php if ($user_id > 0) { ?>
        <tr>
          <td width="150" align="right"><b><?php echo AMSG_ACCOUNT_HISTORY_FOR; ?></b></td>
          <td><?php echo $db->get_sql_field("SELECT username FROM " . DB_PREFIX . "users WHERE user_id='" . $user_id . "'", 'username'); ?></td>
        </tr>
      <?php } ?>
    <tr class="c1">
      <td width="150" align="right"><b>
          <?php echo AMSG_CHOOSE_VIEW; ?>
        </b></td>
      <td><input type="radio" name="level" value="3" <?php echo ($level == 3) ? 'checked' : ''; ?>> <?php echo AMSG_MONTHLY; ?>
        <input type="radio" name="level" value="2" <?php echo ($level == 2) ? 'checked' : ''; ?>> <?php echo AMSG_WEEKLY; ?>
        <input type="radio" name="level" value="1" <?php echo ($level == 1) ? 'checked' : ''; ?>> <?php echo AMSG_DAILY; ?>
        <input type="radio" name="level" value="0" <?php echo ($level == 0) ? 'checked' : ''; ?>> <?php echo GMSG_ALL; ?>
      </td>
    </tr>
    <tr class="c2">
      <td align="right"><b>
          <?php echo AMSG_SELECT_PERIOD; ?>
        </b></td>
      <td><?php echo $start_date_box; ?>
        -
        <?php echo $end_date_box; ?></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="form_display_history" value="<?php echo GMSG_PROCEED; ?>"></td>
    </tr>
  </form>
</table>
<?php if ($show_history_table) { ?>
    <table width="100%"  border="0" cellspacing="3" cellpadding="3" class="fside">
      <tr>
        <td><table width="100%"  border="0" cellspacing="1" cellpadding="3">
            <tr>
              <td class="c4"><?php echo AMSG_USER_DETAILS; ?></td>
              <td class="c4" align="center"><?php echo MSG_ITEM_ID; ?></td>
              <td class="c4"><?php echo MSG_INVOICE_NAME; ?></td>
              <td class="c4" align="center"><?php echo GMSG_DATE; ?></td>
              <td class="c4" align="center"><?php echo GMSG_AMOUNT; ?></td>
              <!--<td align="center"><?php echo GMSG_BALANCE; ?></td>-->
            </tr>
            <?php echo $history_table_content; ?>
            <tr>
              <td colspan="5" align="right" class="c4"><?php echo AMSG_TOTAL_INVOICED; ?>: <?php echo $total_invoiced; ?>
                | <?php echo AMSG_TOTAL_PAID; ?>: <?php echo $total_paid; ?></td>
            </tr>
            <?php if ($nb_invoices > 0) { ?>
              <tr>
                <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
              </tr>
            <?php } ?>
          </table></td>
      </tr>
    </table>
  <?php } ?>
<?php if ($show_views_table) { ?>
    <table width="100%"  border="0" cellspacing="3" cellpadding="3" class="fside">
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="3" class="c1">
            <tr>
              <td class="c4"><?php echo AMSG_TIME_PERIOD; ?></td>
              <td align="center" class="c4"><?php echo AMSG_TOTAL_INVOICED; ?></td>
            </tr>
            <?php echo $views_table_content; ?>
          </table></td>
      </tr>
    </table>
  <?php } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
