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
<?php if ($print_view == 1) { ?>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="main.js"></script>
  <?php } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="3" class="fside">
  <tr>
    <td class="c3" style="padding: 3px;"><b>
        <?php echo AMSG_USER_DETAILS; ?>
      </b>
      <?php echo $user_details_print_link; ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" class="border">
        <tr>
          <td colspan="2" class="c4"><?php echo MSG_MAIN_DETAILS; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
        </tr>
        <tr class="c2">
          <td width="150" align="right" class="contentfont"><?php echo MSG_FULL_NAME; ?></td>
          <td class="contentfont"><?php echo $user_details['name']; ?></td>
        </tr>
        <tr class="c1">
          <td align="right" class="contentfont"><?php echo MSG_FULL_ADDRESS; ?></td>
          <td class="contentfont"><?php echo $user_full_address; ?></td>
        </tr>
        <tr class="c2">
          <td align="right" class="contentfont"><?php echo MSG_PHONE; ?></td>
          <td class="contentfont"><?php echo $user_details['phone']; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
        <tr class="c2">
          <td align="right" class="contentfont"><?php echo MSG_DATE_OF_BIRTH; ?></td>
          <td class="contentfont"><?php echo $user_birthdate; ?></td>
        </tr>
        <tr>
          <td colspan="2" class="c4"><?php echo MSG_USER_ACCOUNT_DETAILS; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
        <tr class="c2">
          <td align="right" class="contentfont"><?php echo MSG_USERNAME; ?></td>
          <td class="contentfont"><?php echo $user_details['username']; ?></td>
        </tr>
        <tr class="c1">
          <td align="right" class="contentfont"><?php echo MSG_EMAIL_ADDRESS; ?>
          </td>
          <td class="contentfont"><?php echo $user_details['email']; ?></td>
        </tr>
        <?php if ($setts['enable_tax']) { ?>
            <tr>
              <td colspan="2" class="c4"><?php echo MSG_TAX_SETTINGS; ?></td>
            </tr>
            <tr class="c5">
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1" /></td>
            </tr>
            <tr class="c2">
              <td align="right" class="contentfont"><?php echo MSG_REGISTERED_AS; ?></td>
              <td class="contentfont"><?php echo $tax_account_type; ?></td>
            </tr>
            <?php if ($user_details['tax_account_type']) { ?>
              <tr class="c2">
                <td align="right" class="contentfont"><?php echo MSG_COMPANY_NAME; ?></td>
                <td class="contentfont"><?php echo field_display($user_details['tax_company_name']); ?></td>
              </tr>
            <?php } ?>
            <tr class="c1">
              <td align="right" class="contentfont"><?php echo MSG_TAX_REG_NUMBER; ?></td>
              <td><?php echo field_display($user_details['tax_reg_number']); ?></td>
            </tr>
          <?php } ?>
      </table>
      <?php echo $custom_sections_table; ?>
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" class="border">
        <tr class="c4">
          <td align="center" colspan="3"><b><?php echo AMSG_IP_ADDRESS_HISTORY; ?></b></td>
        </tr>
        <tr class="c3">
          <td align="center"><b><?php echo AMSG_IP_ADDRESS; ?></b></td>
          <td width="30%" align="center"><b><?php echo GMSG_START_TIME; ?></b></td>
          <td width="30%" align="center"><b><?php echo GMSG_END_TIME; ?></b></td>
        </tr>
        <?php echo $ip_address_history_content; ?>
      </table></td>
  </tr>
</table>
