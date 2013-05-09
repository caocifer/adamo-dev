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
<SCRIPT LANGUAGE="JavaScript" SRC="<?php echo (IN_ADMIN == 1) ? '../' : ''; ?>includes/calendar.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">document.write(getCalendarStyles());</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
  function submit_form(form_name, file_type) {
    form_name.box_submit.value = "1";
    form_name.file_upload_type.value = file_type;
    form_name.onsubmit();
    form_name.submit();
  }

  function delete_media(form_name, file_type, file_id) {
    form_name.box_submit.value = "1";
    form_name.file_upload_type.value = file_type;
    form_name.file_upload_id.value = file_id;
    form_name.onsubmit();
    form_name.submit();
  }

  myPopup = '';

  function openPopup(url) {
    myPopup = window.open(url, 'popupWindow', 'width=750,height=480,scrollbars=yes,status=yes ');
    if (!myPopup.opener)
      myPopup.opener = self;
  }
</SCRIPT>
<?php echo $sell_item_header; ?>
<br>
<?php echo $check_voucher_message; ?>
<?php echo $display_formcheck_errors; ?>

<form action="<?php echo $post_url; ?>" method="post" enctype="multipart/form-data" name="ad_create_form">
  <input type="hidden" name="do" value="<?php echo $do; ?>" >
  <input type="hidden" name="box_submit" value="0" >
  <input type="hidden" name="file_upload_type" value="" >
  <input type="hidden" name="file_upload_id" value="" >
  <input type="hidden" name="auction_id" value="<?php echo $item_details['auction_id']; ?>" >
  <input type="hidden" name="owner_id" value="<?php echo $item_details['owner_id']; ?>" >
  <input type="hidden" name="category_id" value="<?php echo $item_details['category_id']; ?>">
  <input type="hidden" name="addl_category_id" value="<?php echo $item_details['addl_category_id']; ?>">
  <input type="hidden" name="old_category_id" value="<?php echo $old_category_id; ?>">
  <input type="hidden" name="old_addl_category_id" value="<?php echo $old_addl_category_id; ?>">
  <?php if ($item_details['listing_type'] == 'buy_out') { ?>
      <input type="hidden" name="start_price" value="<?php echo $item_details['start_price']; ?>">
    <?php } ?>
  <!--
  <input type="hidden" name="direct_payments" value="<?php echo $item_details['direct_payments']; ?>">
  <input type="hidden" name="payment_methods" value="<?php echo $item_details['payment_methods']; ?>">
  -->
  <?php echo $media_upload_fields; ?>
  <?php if (IN_ADMIN == 1) { ?>
      <input type="hidden" name="status" value="<?php echo $form_details['status']; ?>">
      <input type="hidden" name="start" value="<?php echo $form_details['start']; ?>">
      <input type="hidden" name="order_field" value="<?php echo $form_details['order_field']; ?>">
      <input type="hidden" name="order_type" value="<?php echo $form_details['order_type']; ?>">
      <input type="hidden" name="src_auction_id" value="<?php echo $form_details['src_auction_id'] ?>">
      <input type="hidden" name="keywords" value="<?php echo $form_details['keywords']; ?>">
    <?php } ?>
  <?php if ($user_details['shop_active']) { ?>
      <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
        <tr class="c4">
          <td colspan="3"><?php echo MSG_LIST_IN; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
          <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
        <?php if (!$setts['enable_store_only_mode']) { ?>
          <tr class="c1">
            <td width="150" align="right"><?php echo MSG_LIST_IN; ?></td>
            <td><input type="radio" name="list_in" value="auction" <?php echo ($item_details['list_in'] == 'auction') ? 'checked' : ''; ?> <?php echo ($item_details['list_in'] == 'store') ? 'disabled' : ''; ?>></td>
            <td width="100%"><?php echo GMSG_SITE; ?></td>
          </tr>
          <tr>
            <td width="150" align="right"></td>
            <td class="c1"><input type="radio" name="list_in" value="store" <?php echo ($item_details['list_in'] == 'store') ? 'checked' : (($shop_status['remaining_items'] <= 0 && $item_details['list_in'] == 'auction') ? 'disabled' : ''); ?>></td>
            <td class="c1" width="100%"><?php echo GMSG_SHOP; ?></td>
          </tr>
        <?php } ?>
        <tr>
          <?php if (!$setts['enable_store_only_mode']) { ?>
            <td width="150" align="right"></td>
          <?php }
          else {
            ?>
            <td width="150" align="right"><?php echo MSG_LIST_IN; ?></td>
    <?php } ?>
          <td class="c1"><input type="radio" name="list_in" value="both" <?php echo ($item_details['list_in'] == 'both') ? 'checked' : (($shop_status['remaining_items'] <= 0 && $item_details['list_in'] == 'auction') ? 'disabled' : ''); ?> <?php echo ($item_details['list_in'] == 'store') ? 'disabled' : ''; ?>></td>
          <td class="c1" width="100%"><?php echo GMSG_BOTH; ?></td>
        </tr>
      </table>
      <br>
    <?php } ?>
<?php echo $edit_auction_content; ?>
  <br />
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td width="150" class="contentfont"><input name="form_edit_proceed" type="submit" id="form_edit_proceed" value="<?php echo GMSG_PROCEED; ?>" />
      </td>
      <td class="contentfont">&nbsp;</td>
    </tr>
  </table>
</form>