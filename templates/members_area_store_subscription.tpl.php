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
<SCRIPT LANGUAGE="JavaScript">
  function previewPic(sel) {
    document.preview_pic.src = "store_templates/images/" + sel.options[sel.selectedIndex].value + ".jpg?<?php echo rand(2, 9999); ?>";
  }
</SCRIPT>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="4" class="c7"><b>
        <?php echo MSG_MM_STORE; ?>
        -
        <?php echo MSG_MM_MAIN_SETTINGS; ?>
      </b></td>
  </tr>
  <tr class="c5">
    <td colspan="4"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td colspan="4" class="membmenu"><b><?php echo MSG_STORE_STATUS; ?></b>:
      <?php echo $shop_status['display']; ?></td>
  </tr>
  <tr class="c1">
    <td align="right"><b><?php echo MSG_ACCOUNT_TYPE; ?></b></td>
    <td class="contentfont"><b><?php echo $shop_status['account_type']; ?></b> 
      <?php echo ($user_details['shop_account_id'] > 0) ? '[ <a href="fee_payment.php?do=store_subscription_payment">Renew Subscription</a> ]' : ''; ?> </td>
    <td align="right"><b><?php echo MSG_LAST_SUBSCR_PAYMENT; ?></b></td>
    <td><?php echo show_date($user_details['shop_last_payment']); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $shop_status['shop_description']; ?></td>
    <td align="right" class="c1"><b><?php echo MSG_NEXT_SUBSCR_PAYMENT; ?></b></td>
    <td class="c1"><?php echo show_date($user_details['shop_next_payment']); ?></td>
  </tr>
  <tr class="c5">
    <td width="20%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="30%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="20%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    <td width="30%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <?php if ($shop_status['enabled'] && $shop_status['account_id']) { ?>
      <tr class="c1">
        <td align="right"><?php echo MSG_TOTAL_ITEMS; ?></td>
        <td class="contentfont"><b><?php echo $shop_status['total_items']; ?></b></td>
        <td align="right"><?php echo MSG_REMAINING_ITEMS; ?></td>
        <td><b><?php echo $shop_status['remaining_items']; ?></b></td>
      </tr>
    <?php } ?>
</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td colspan="2" class="c7"><b><?php echo MSG_MM_MAIN_SETTINGS; ?></b></td>
  </tr>	
  <tr class="c5">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
  </tr>
  <?php if ($display_formcheck_errors) { ?>
      <tr>
        <td colspan="2">
          <?php echo $display_formcheck_errors; ?>
          <blockquote class="contentfont"><?php echo MSG_PLEASE_CLICK_HERE_TO_FILL_STORE_FIELDS; ?></blockquote></td>
      </tr>	
    <?php } ?>
  <?php if ($user_details['shop_active'] && !$user_details['shop_account_id']) { ?>
      <tr>
        <td colspan="2"><?php echo MSG_STORE_DEFAULT_ACC_EXPL; ?></td>
      </tr>	
      <tr class="c4">
        <td colspan="2"></td>
      </tr>	
    <?php } ?>
  <form action="members_area.php?page=store&section=subscription" method="POST">
    <tr class="c1">
      <td align="right"><b><?php echo MSG_ENABLE_STORE; ?></b></td>
      <td><input name="shop_active" type="checkbox" id="shop_active" value="1" <?php echo ($user_details['shop_active']) ? 'checked' : ''; ?>></td>
    </tr>
    <?php echo $list_store_subscriptions; ?>      
    <tr class="c4">
      <td colspan="2"></td>
    </tr>    
    <tr>
      <td colspan="2"><input type="submit" name="form_shop_save" value="<?php echo GMSG_PROCEED; ?>" onclick="return confirm('<?php echo MSG_CHANGE_STORE_SUBSCR_CONFIRM; ?>');" /></td>
    </tr>
  </form>
</table>
