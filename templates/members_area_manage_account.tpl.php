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
<?php echo $header_selling_page; ?>
<?php echo $display_formcheck_errors; ?>
<SCRIPT LANGUAGE="JavaScript">
  function submit_form(form_name) {
    form_name.submit();
  }
</script>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="6" class="c7"><b><?php echo MSG_ACCOUNT_DETAILS; ?></b></td>
  </tr>
  <tr class="c5">
    <td width="20%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="30%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="20%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="30%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr class="c1">
    <td align="right"><b><?php echo GMSG_STATUS; ?></b></td>
    <td><?php echo $display_account_status; ?></td>
    <td align="right"><b><?php echo GMSG_REG_DATE; ?></b></td>
    <td><?php echo show_date($user_details['reg_date'], false); ?></td>
  </tr>
  <tr class="c1">
    <td align="right"><b><?php echo GMSG_PAYMENT_MODE; ?></b></td>
    <td><?php echo $display_payment_mode; ?></td>
    <?php if ($user_payment_mode == 2) { ?>
        <td align="right"><b><?php echo GMSG_BALANCE; ?></b></td>
        <td class="contentfont"><?php echo $display_balance_details; ?></td>
      <?php } ?>
  </tr>
  <?php if ($user_payment_mode == 2) { ?>
      <tr>
        <td></td>
        <td></td>
        <td align="right" class="c1"><b><?php echo GMSG_MAX_DEBIT; ?></b></td>
        <td class="c1"><?php echo $fees->display_amount($user_details['max_credit'], $setts['currency'], true); ?></td>
      </tr>
    <?php } ?>
  <?php if ($user_details['balance'] <= 0 && $user_payment_mode == 2 && $session->value('membersarea') == 'Active') { ?>
      <!-- credit account snippet -->
      <form action="fee_payment.php" method="GET">
        <input type="hidden" name="do" value="credit_account">
        <tr valign="top">
          <td></td>
          <td></td>
          <td colspan="2"><table class="border" width="100%" cellpadding="3" cellspacing="2">
              <tr>
                <td class="c3"><?php echo MSG_CREDIT_ACCOUNT; ?></td>
              </tr>
              <tr>
                <td class="c2" valign="middle" nowrap><?php echo $setts['currency']; ?>
                  <input type="text" name="credit_amount" value="" size="8">
                  <input type="submit" name="form_credit_acc_proceed" value="<?php echo GMSG_PROCEED; ?>" >
                  <img src="themes/<?php echo $setts['default_theme']; ?>/img/system/cards.gif" align="absmiddle" hspace="2" vspace="2"> 
                  <?php echo $payment_gateways_logos; ?></td>
              </tr>
            </table></td>
        </tr>
      </form>
    <?php } ?>
</table>
<?php if ($is_pending_gc > 0) { ?>
    <br>
    <table width="100%" cellpadding="3" cellspacing="1" class="errormessage">
      <tr class="contentfont">
        <td class="c3" align="center" colspan="5"><strong><?php echo MSG_PENDING_GC_PAYMENTS; ?></strong></td>
      </tr>
      <tr class="contentfont">
        <td width="100%"><b><?php echo GMSG_DESCRIPTION; ?></b></td>
        <td nowrap align="center"><b><?php echo MSG_PAYMENT_TO; ?></b></td>
        <td nowrap align="center"><strong><?php echo GMSG_AMOUNT; ?></strong></td>
        <td nowrap align="center"><strong><?php echo MSG_PAYMENT_DATE; ?></strong></td>
        <td nowrap align="center"><strong><?php echo MSG_PAYMENT_TYPE; ?></strong></td>
      </tr>
      <?php echo $pending_gc_transactions_content; ?>
    </table>
  <?php } ?>
<?php if ($page != 'summary') { ?>
    <br />
    <form action="" method="post" name="manage_account_form">
      <input type="hidden" name="operation" value="submit">
      <input type="hidden" name="refresh" value="1">
      <input type="hidden" name="page" value="account">
      <input type="hidden" name="section" value="management">
      <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
        <tr>
          <td colspan="2" class="c7"><b><?php echo MSG_PAYPAL_ADDRESS_OVERRIDE; ?></b></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
          <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_ADDRESS_OVERRIDE; ?></td> 
          <td><input name="paypal_address_override" type="checkbox" value="1" <?php echo ($user_details['paypal_address_override']) ? 'checked' : ''; ?>></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_ADDRESS_OVERRIDE_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_FIRST_NAME; ?></td> 
          <td><input name="paypal_first_name" type="text" value="<?php echo $user_details['paypal_first_name']; ?>" size="50" maxlength="32"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_FIRST_NAME_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_LAST_NAME; ?></td> 
          <td><input name="paypal_last_name" type="text" value="<?php echo $user_details['paypal_last_name']; ?>" size="50" maxlength="64"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_LAST_NAME_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_COUNTRY; ?></td> 
          <td><?php echo $countries_drop_down; ?></td> 
        </tr> 
        <tr class="contentfont"> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_COUNTRY_EXPL; ?></td> 
        </tr> 		
        <?php if (!in_array($user_details['paypal_country'], array('GB'))) { ?>
          <tr class="c1"> 
            <td><?php echo MSG_PAYPAL_STATE; ?></td> 
            <td><input name="paypal_state" type="text" value="<?php echo $user_details['paypal_state']; ?>" size="25"></td> 
          </tr> 
          <tr class="contentfont"> 
            <td></td> 
            <td class="c1"><?php echo MSG_PAYPAL_STATE_EXPL; ?></td> 
          </tr> 					
        <?php } ?>
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_ADDRESS1; ?></td> 
          <td><input name="paypal_address1" type="text" value="<?php echo $user_details['paypal_address1']; ?>" size="50" maxlength="100"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_ADDRESS1_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_ADDRESS2; ?></td> 
          <td><input name="paypal_address2" type="text" value="<?php echo $user_details['paypal_address2']; ?>" size="50" maxlength="100"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_ADDRESS2_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_CITY; ?></td> 
          <td><input name="paypal_city" type="text" value="<?php echo $user_details['paypal_city']; ?>" size="50" maxlength="100"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_CITY_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_ZIP; ?></td> 
          <td><input name="paypal_zip" type="text" value="<?php echo $user_details['paypal_zip']; ?>" size="25" maxlength="32"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_ZIP_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_PHONE_A; ?></td> 
          <td><input name="paypal_night_phone_a" type="text" value="<?php echo $user_details['paypal_night_phone_a']; ?>" size="10" maxlength="3"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_PHONE_A_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_PHONE_B; ?></td> 
          <td><input name="paypal_night_phone_b" type="text" value="<?php echo $user_details['paypal_night_phone_b']; ?>" size="25" maxlength="16"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_PHONE_B_EXPL; ?></td> 
        </tr> 					
        <tr class="c1"> 
          <td><?php echo MSG_PAYPAL_PHONE_C; ?></td> 
          <td><input name="paypal_night_phone_c" type="text" value="<?php echo $user_details['paypal_night_phone_c']; ?>" size="10" maxlength="4"></td> 
        </tr> 
        <tr> 
          <td></td> 
          <td class="c1"><?php echo MSG_PAYPAL_PHONE_C_EXPL; ?></td> 
        </tr> 					
      </table>
      <br>
      <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
        <?php if (!empty($display_direct_payment_methods)) { ?>
          <tr>
            <td colspan="2" class="c7"><b><?php echo MSG_DIRECT_PAYMENT_SETTINGS; ?></b></td>
          </tr>
        <?php } ?>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
          <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
        <?php echo $display_direct_payment_methods; ?>
        <tr>
          <td></td>
          <td><input name="form_register_proceed" type="submit" id="form_register_proceed" value="<?php echo $proceed_button; ?>" /></td>
        </tr>
      </table>
    </form>
  <?php } ?>
