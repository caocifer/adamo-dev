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
<script language="javascript">
  function checkEmail() {
    if (document.registration_form.email_check.value == document.registration_form.email.value)
      document.registration_form.email_img.style.display = "inline";
    else
      document.registration_form.email_img.style.display = "none";
  }

  function checkPass() {
    if (document.registration_form.password.value == document.registration_form.password2.value)
      document.registration_form.pass_img.style.display = "inline";
    else
      document.registration_form.pass_img.style.display = "none";
  }

  function form_submit() {
    document.registration_form.operation.value = '';
    document.registration_form.edit_refresh.value = '1';
    document.registration_form.submit();
  }

  function copy_email_value() {
    document.registration_form.email_check.value = document.registration_form.email.value;
  }

  function copy_password_value() {
    document.registration_form.password2.value = document.registration_form.password.value;
  }

</script>
<?php echo $header_registration_message; ?>
<br>
<?php echo $banned_email_output; ?>
<?php echo $display_formcheck_errors; ?>
<?php echo $check_voucher_message; ?>

<form action="<?php echo $register_post_url; ?>" method="post" name="registration_form">
  <input type="hidden" name="operation" value="submit">
  <input type="hidden" name="do" value="<?php echo $do; ?>">
  <input type="hidden" name="user_id" value="<?php echo $user_details['user_id']; ?>">
  <input type="hidden" name="edit_refresh" value="0">
  <input type="hidden" name="generated_pin" value="<?php echo $generated_pin; ?>">
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td colspan="2" class="c3"><?php echo MSG_MAIN_DETAILS; ?></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_REGISTER_AS; ?></td>
      <td class="contentfont">
        <input name="tax_account_type" type="radio" value="0" onclick="form_submit();" checked />
        <?php echo GMSG_INDIVIDUAL; ?>
        <input name="tax_account_type" type="radio" value="1" onclick="form_submit();" <?php echo ($user_details['tax_account_type']) ? 'checked' : ''; ?> />
        <?php echo GMSG_BUSINESS; ?></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_REGISTER_AS_DESC; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_FULL_NAME; ?></td>
      <td class="contentfont"><input name="name" type="text" id="name" value="<?php echo $user_details['name']; ?>" size="40" /></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_FULL_NAME_EXPL; ?></td>
    </tr>
    <?php if ($user_details['tax_account_type']) { ?>
        <tr class="c1">
          <td align="right" class="contentfont"><?php echo MSG_COMPANY_NAME; ?></td>
          <td class="contentfont"><input name="tax_company_name" type="text" class="contentfont" id="tax_company_name" value="<?php echo $user_details['tax_company_name']; ?>" size="40" /></td>
        </tr>
        <tr class="reguser">
          <td align="right" class="contentfont">&nbsp;</td>
          <td><?php echo MSG_COMPANY_NAME_DESC; ?></td>
        </tr>
      <?php } ?>
    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_ADDRESS; ?></td>
      <td class="contentfont"><input name="address" type="text" id="address" value="<?php echo $user_details['address']; ?>" size="40" /></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_ADDRESS_EXPL; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_CITY; ?></td>
      <td class="contentfont"><input name="city" type="text" id="city" value="<?php echo $user_details['city']; ?>" size="25" /></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_CITY_EXPL; ?></td>
    </tr>
  </table>
  <br />
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">

    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
    </tr>

    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_PHONE; ?></td>
      <td class="contentfont">
        <?php if ($edit_user == 1) { ?>
            <input name="phone" type="text" id="phone" value="<?php echo $user_details['phone']; ?>" size="25" />
          <?php }
          else {
            ?>
            <input name="phone_b" type="text" id="phone_b" value="<?php echo $user_details['phone_b']; ?>" size="25" />
  <?php } ?></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_PHONE_EXPL; ?></td>
    </tr>
  </table>
<?php echo $birthdate_box; ?>
  <br />
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td colspan="2" class="c3"><?php echo MSG_USER_ACCOUNT_DETAILS; ?></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_EMAIL_ADDRESS; ?>
      </td>
      <td class="contentfont"><input name="email" type="text" class="contentfont" id="email" value="<?php echo $user_details['email']; ?>" size="40" maxlength="120" <?php echo (IN_ADMIN == 1) ? 'onchange="copy_email_value();"' : ''; ?> /></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_EMAIL_EXPLANATION; ?></td>
    </tr>
    <tr class="c1">
      <td align="right" class="contentfont"><?php echo MSG_RETYPE_EMAIL; ?></td>
      <td class="contentfont"><input name="email_check" type="text" class="contentfont" id="email_check" value="<?php echo $email_check_value; ?>" size="40" maxlength="120" onkeyup="checkEmail();">
        <img src="<?php echo $path_relative; ?>themes/<?php echo $setts['default_theme']; ?>/img/system/check_img.gif" id="email_img" align="absmiddle" style="display:none;" /></td>
    </tr>
    <tr class="c4">
      <td></td>
      <td></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_SUBSCRIBE_TO_NEWSLETTER; ?>
      </td>
      <td class="contentfont"><input name="newsletter" type="checkbox" class="newsletter" id="email" value="1" <?php echo ($user_details['newsletter']) ? 'checked' : ''; ?> /></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right" class="contentfont"><?php echo MSG_CREATE_USERNAME; ?></td>
      <td class="contentfont"><input name="username" type="text" id="username" value="<?php echo $user_details['username']; ?>" size="40" maxlength="30" <?php echo $edit_disabled; ?> /></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_USERNAME_EXPLANATION; ?></td>
    </tr>
    <tr class="c1">
      <td align="right" class="contentfont"><?php echo MSG_CREATE_PASS; ?>
      </td>
      <td class="contentfont"><input name="password" type="password" class="contentfont" id="password" size="40" maxlength="20" <?php echo (IN_ADMIN == 1) ? 'onchange="copy_password_value();"' : ''; ?> /></td>
    </tr>
    <tr class="reguser">
      <td>&nbsp;</td>
      <td><?php echo MSG_PASSWORD_EXPLANATION; ?></td>
    </tr>
    <tr class="c1">
      <td align="right" class="contentfont"><?php echo MSG_VERIFY_PASS; ?></td>
      <td class="contentfont"><input name="password2" type="password"  id="password2" size="40" maxlength="20" onkeyup="checkPass();" />
        <img src="<?php echo $path_relative; ?>themes/<?php echo $setts['default_theme']; ?>/img/system/check_img.gif" id="pass_img" align="absmiddle" style="display:none;" /></td>
    </tr>
  </table>
  <?php echo $custom_sections_table; ?>
<?php if (IN_ADMIN == 1) { ?>
      <br />
      <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
        <tr>
          <td colspan="2" class="c3"><?php echo AMSG_PAYMENT_SETTINGS; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right" class="contentfont"><?php echo AMSG_PAYMENT_MODE; ?></td>
          <td class="contentfont"><input type="radio" name="payment_mode" value="2" <?php echo ($user_details['payment_mode'] == 2) ? 'checked' : ''; ?>>
            <?php echo GMSG_ACCOUNT; ?>
            <input type="radio" name="payment_mode" value="1" <?php echo ($user_details['payment_mode'] == 1) ? 'checked' : ''; ?>>
        <?php echo GMSG_LIVE; ?></td>
        </tr>
    <?php if ($user_details['payment_mode'] == 2) { ?>
          <tr class="reguser">
            <td>&nbsp;</td>
            <td><?php echo AMSG_PAYMENT_MODE_EXPL; ?></td>
          </tr>
          <tr class="c1">
            <td align="right" class="contentfont"><?php echo AMSG_ACCOUNT_BALANCE; ?>
            </td>
            <td class="contentfont"><?php echo $setts['currency']; ?> <input name="balance" value="<?php echo abs($user_details['balance']); ?>" size="8">
              <select name="balance_type">
                <option value="-1" selected><?php echo GMSG_CREDIT; ?></option>
                <option value="1" <?php echo ($user_details['balance'] > 0) ? 'selected' : ''; ?> ><?php echo GMSG_DEBIT; ?></option>
              </select> </td>
          </tr>
          <tr class="reguser">
            <td>&nbsp;</td>
            <td><?php echo AMSG_ACCOUNT_BALANCE_EXPL; ?></td>
          </tr>
          <tr class="c1">
            <td align="right" class="contentfont"><?php echo GMSG_MAX_DEBIT; ?></td>
            <td class="contentfont"><?php echo $setts['currency']; ?> <input name="max_credit" value="<?php echo abs($user_details['max_credit']); ?>" size="8"></td>
          </tr>
          <tr class="reguser">
            <td>&nbsp;</td>
            <td><?php echo AMSG_MAX_DEBIT_EXPL; ?></td>
          </tr>
      <?php } ?>
      </table>
    <?php } ?>
<?php if ($setts['enable_tax']) { ?>
      <br />
      <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
        <tr>
          <td colspan="2" class="c3"><?php echo MSG_TAX_SETTINGS; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right" class="contentfont"><?php echo MSG_TAX_REG_NUMBER; ?></td>
          <td><input name="tax_reg_number" type="text" class="contentfont" id="tax_reg_number" value="<?php echo $user_details['tax_reg_number']; ?>" size="40" /></td>
        </tr>
        <tr class="reguser">
          <td align="right" class="contentfont">&nbsp;</td>
          <td><?php echo MSG_TAX_REG_NUMBER_DESC; ?></td>
        </tr>
      </table>
    <?php } ?>
<?php if (IN_ADMIN != 1 && !$edit_user) { ?>
      <br />
      <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right" class="contentfont"><?php echo MSG_REG_PIN; ?></td>
          <td><?php echo $pin_image_output; ?></td>
        </tr>
        <tr class="reguser">
          <td align="right" class="contentfont">&nbsp;</td>
          <td><?php echo MSG_REG_PIN_EXPL; ?></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right" class="contentfont"><?php echo MSG_CONF_PIN; ?></td>
          <td><input name="pin_value" type="text" class="contentfont" id="pin_value" value="" size="20" /></td>
        </tr>
      </table>
    <?php } ?>
<?php if (!empty($display_direct_payment_methods)) { ?>
      <br>
      <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
        <tr>
          <td colspan="2" class="c3"><?php echo MSG_DIRECT_PAYMENT_SETTINGS; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
          <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
      <?php echo $display_direct_payment_methods; ?>
      </table>
    <?php } ?>

  <?php echo $signup_voucher_box; ?>
<?php echo $registration_terms_box; ?>
  <br />
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td width="150" class="contentfont"><input name="form_register_proceed" type="submit" id="form_register_proceed" value="<?php echo $proceed_button; ?>" />
      </td>
      <td class="contentfont">&nbsp;</td>
    </tr>
  </table>
</form>
