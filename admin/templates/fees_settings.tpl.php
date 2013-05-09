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
<div class="mainhead"><img src="images/fees.gif" align="absmiddle"> <?php echo $header_section; ?></div>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="3" cellpadding="3" class="fside">
  <form name="form_fees_settings" action="fees_settings.php" method="post">
    <tr>
      <td colspan="2" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo strtoupper($subpage_title); ?> / <?php echo AMSG_FEES_AND_ACCMODE_SETTS; ?></b></td>
    </tr>
    <tr class="c1">
      <td nowrap="nowrap" align="right"><b><?php echo AMSG_CHOOSE_PAYMENT_OPTION; ?></b>: </td>
      <td width="100%"><input type="radio" name="account_mode" value="2" <?php echo ($row_settings['account_mode'] == 2) ? 'checked' : ''; ?>>
        <?php echo AMSG_ACCOUNT_MODE; ?>
        <br>
        <input type="radio" name="account_mode" value="1" <?php echo ($row_settings['account_mode'] == 1) ? 'checked' : ''; ?>>
        <?php echo AMSG_LIVE_PAYMENT_MODE; ?>
      </td>
    </tr>
    <tr class="c2">
      <td nowrap="nowrap" align="right"><b><?php echo AMSG_ACC_MODE_TYPE; ?></b>: </td>
      <td><input type="radio" name="account_mode_personal" value="0" <?php echo ($row_settings['account_mode_personal'] == 0) ? 'checked' : ''; ?>>
        <?php echo AMSG_GLOBAL; ?>
        <br>
        <input type="radio" name="account_mode_personal" value="1" <?php echo ($row_settings['account_mode_personal'] == 1) ? 'checked' : ''; ?>>
        <?php echo AMSG_PERSONAL; ?>
      </td>
    </tr>
    <tr class="c1">
      <td nowrap="nowrap" align="right"><b><?php echo AMSG_DEFAULT_ACC_MODE; ?></b>: </td>
      <td><input type="radio" name="init_acc_type" value="1" <?php echo ($row_settings['init_acc_type'] == 1) ? 'checked' : ''; ?>>
        <?php echo AMSG_LIVE_PAYMENT_MODE; ?>
        <br>
        <input type="radio" name="init_acc_type" value="2" <?php echo ($row_settings['init_acc_type'] == 2) ? 'checked' : ''; ?>>
        <?php echo AMSG_ACCOUNT_MODE; ?>
      </td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_FEES_MAIN_MESSAGE; ?></td>
    </tr>
    <?php if ($row_settings['account_mode'] == 2) { ?>
        <tr class="c4">
          <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <?php echo AMSG_ACC_INIT_MAIN_MSG; ?></td>
        </tr>
        <tr class="c1">
          <td nowrap="nowrap" align="right"><b><?php echo AMSG_SIGNUP_CREDIT; ?></b>:</td>
          <td><?php echo $setts['currency']; ?>
            <input name="init_credit" type="text" id="init_credit" value="<?php echo $row_settings['init_credit']; ?>" size="20"></td>
        </tr>
        <tr class="c2">
          <td nowrap="nowrap" align="right"><b><?php echo AMSG_MAXIMUM_DEBIT; ?></b>:</td>
          <td><?php echo $setts['currency']; ?>
            <input name="max_credit" type="text" id="max_credit" value="<?php echo $row_settings['max_credit']; ?>" size="20">
            <input type="checkbox" name="reset_sitewide" value="1"> <?php echo AMSG_RESET_SITEWIDE; ?>
          </td>
        </tr>
        <tr>
          <td class="explain" align="right"><img src="images/info.gif"></td>
          <td class="explain"><?php echo AMSG_MAXIMUM_DEBIT_EXPL; ?></td>
        </tr>
        <tr class="c1">
          <td nowrap="nowrap" align="right"><b><?php echo AMSG_MIN_INVOICE_VALUES; ?></b>: </td>
          <td><?php echo $setts['currency']; ?>
            <input name="min_invoice_value" type="text" id="min_invoice_value" value="<?php echo $row_settings['min_invoice_value']; ?>" size="20">
          </td>
        </tr>
      <?php }
      else {
        ?>
        <input name="init_credit" type="hidden" value="<?php echo $row_settings['init_credit']; ?>">
        <input name="max_credit" type="hidden" value="<?php echo $row_settings['max_credit']; ?>">
        <input name="min_invoice_value" type="hidden" value="<?php echo $row_settings['min_invoice_value']; ?>">
  <?php } ?>
    <tr class="c4">
      <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b><?php echo AMSG_SUSPEND_OVER_BAL_USERS; ?></b></td>
    </tr>
    <tr class="c1">
      <td nowrap="nowrap" align="right"><b><?php echo AMSG_SUSPEND_ACCOUNTS; ?></b>: </td>
      <td><input type="radio" name="suspend_over_bal_users" value="1" <?php echo (($row_settings['suspend_over_bal_users'] == "1") ? "checked" : ""); ?>>
        <?php echo GMSG_YES; ?>
        <input type="radio" name="suspend_over_bal_users" value="0" <?php echo (($row_settings['suspend_over_bal_users'] == "0") ? "checked" : ""); ?>>
<?php echo GMSG_NO; ?>
      </td>
    </tr>
    <tr>
      <td class="explain" align="right"><img src="images/info.gif"></td>
      <td class="explain"><?php echo AMSG_SUSPEND_OVER_BAL_USERS_NOTE; ?></td>
    </tr>
    <tr class="">
      <td colspan="2" align="center"><input type="submit" name="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
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