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
<SCRIPT LANGUAGE="JavaScript" SRC="includes/calendar.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">document.write(getCalendarStyles());</SCRIPT>

<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="6" class="c7"><b>
        <?php echo MSG_MM_ACCOUNT_HISTORY; ?>
      </b></td>
  </tr>
  <tr class="c5">
    <td width="20%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="30%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="20%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="30%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td align="right"><b>
        <?php echo GMSG_STATUS; ?>
      </b></td>
    <td><?php echo $display_account_status; ?></td>
    <td align="right"><b>
        <?php echo GMSG_REG_DATE; ?>
      </b></td>
    <td><?php echo show_date($user_details['reg_date'], false); ?></td>
  </tr>
  <tr class="c1">
    <td align="right"><b>
        <?php echo GMSG_PAYMENT_MODE; ?>
      </b></td>
    <td><?php echo $display_payment_mode; ?></td>
    <?php if ($user_details['payment_mode'] == 2) { ?>
        <td align="right"><b>
            <?php echo GMSG_BALANCE; ?>
          </b></td>
        <td class="contentfont"><?php echo $display_balance_details; ?></td>
      <?php } ?>
  </tr>
  <?php if ($user_details['payment_mode'] == 2) { ?>
      <tr>
        <td></td>
        <td></td>
        <td align="right" class="c1"><b>
            <?php echo GMSG_MAX_DEBIT; ?>
          </b></td>
        <td class="c1"><?php echo fees_main::display_amount($user_details['max_credit'], $setts['currency'], true); ?></td>
      </tr>
    <?php } ?>
</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <form action="members_area.php?page=account&section=history" method="POST" name="account_history_form">
    <tr class="c1">
      <td align="center"><b>
          <?php echo MSG_SELECT_PERIOD; ?>
          :</b>
        <?php echo $start_date_box; ?>
        -
        <?php echo $end_date_box; ?>
        <input type="submit" name="form_display_history" value="<?php echo GMSG_PROCEED; ?>"></td>
    </tr>
  </form>
</table>
<?php if ($show_history_table) { ?>
    <br>
    <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
      <tr>
        <td class="membmenu" align="center"><?php echo MSG_ITEM_ID; ?></td>
        <td class="membmenu"><?php echo MSG_INVOICE_NAME; ?></td>
        <td class="membmenu" align="center"><?php echo MSG_INVOICE_TYPE; ?></td>
        <td class="membmenu" align="center"><?php echo GMSG_DATE; ?></td>
        <td class="membmenu" align="center"><?php echo GMSG_AMOUNT; ?></td>
        <!--<td align="center"><?php echo GMSG_BALANCE; ?></td>-->
      </tr>
      <tr class="c5">
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
        <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
        <!--<td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="125" height="1"></td>-->
      </tr>
      <?php echo $history_table_content; ?>
      <?php if ($nb_invoices > 0) { ?>
        <tr>
          <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
        </tr>
      <?php } ?>
    </table>
  <?php } ?>
