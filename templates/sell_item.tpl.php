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

<?php echo $sell_item_header; ?>
<?php echo $sell_item_header_menu; ?>
<br>
<?php echo $check_voucher_message; ?>
<?php echo $display_formcheck_errors; ?>

<?php if ($current_step != 'finish') { ?>
    <form action="sell_item.php" method="post" enctype="multipart/form-data" name="ad_create_form">
      <input type="hidden" name="current_step" value="<?php echo $current_step; ?>" >
      <input type="hidden" name="item_id" value="<?php echo $item_details['item_id']; ?>" >
      <input type="hidden" name="box_submit" value="0" >
      <input type="hidden" name="file_upload_type" value="" >
      <input type="hidden" name="file_upload_id" value="" >
      <input type="hidden" name="ad_type" value="<?php echo $item_details['ad_type']; ?>" >
      <input type="hidden" name="list_in" value="<?php echo $item_details['list_in']; ?>" >
      <input type="hidden" name="category_id" value="<?php echo $item_details['category_id']; ?>" >
      <input type="hidden" name="addl_category_id" value="<?php echo $item_details['addl_category_id']; ?>" >
      <input type="hidden" name="listing_type" value="<?php echo $item_details['listing_type']; ?>" >
      <input type="hidden" name="auction_type" value="<?php echo $item_details['auction_type']; ?>" >
      <input type="hidden" name="voucher_value" value="<?php echo $item_details['voucher_value']; ?>" >
      <input type="hidden" name="quantity" value="<?php echo $item_details['quantity']; ?>" >
      <input type="hidden" name="name" value="<?php echo $item_details['name']; ?>" >
      <input type="hidden" name="description" value="<?php echo $item_details['description']; ?>" >
      <input type="hidden" name="start_time" value="<?php echo $item_details['start_time']; ?>" >
      <input type="hidden" name="end_time" value="<?php echo $item_details['end_time']; ?>" >
      <input type="hidden" name="currency" value="<?php echo $item_details['currency']; ?>" >   
      <input type="hidden" name="start_price" value="<?php echo ($item_details['listing_type'] == 'buy_out') ? $item_details['buyout_price'] : $item_details['start_price']; ?>" >
      <input type="hidden" name="buyout_price" value="<?php echo $item_details['buyout_price']; ?>" >
      <input type="hidden" name="reserve_price" value="<?php echo $item_details['reserve_price']; ?>" >
      <input type="hidden" name="bid_increment_amount" value="<?php echo $item_details['bid_increment_amount']; ?>" >
      <input type="hidden" name="offer_min" value="<?php echo $item_details['offer_min']; ?>" >
      <input type="hidden" name="offer_max" value="<?php echo $item_details['offer_max']; ?>" >
      <?php if ($current_step != 'settings') { ?>
        <input type="hidden" name="apply_tax" value="<?php echo $item_details['apply_tax']; ?>" >
        <input type="hidden" name="is_bid_increment" value="<?php echo $item_details['is_bid_increment']; ?>" >
        <input type="hidden" name="is_reserve" value="<?php echo $item_details['is_reserve']; ?>" >
        <input type="hidden" name="is_buy_out" value="<?php echo ($item_details['listing_type'] == 'buy_out') ? 1 : $item_details['is_buy_out']; ?>" >
        <input type="hidden" name="is_offer" value="<?php echo $item_details['is_offer']; ?>" >
        <input type="hidden" name="hpfeat" value="<?php echo $item_details['hpfeat']; ?>" >
        <input type="hidden" name="catfeat" value="<?php echo $item_details['catfeat']; ?>" >
        <input type="hidden" name="bold" value="<?php echo $item_details['bold']; ?>" >
        <input type="hidden" name="hl" value="<?php echo $item_details['hl']; ?>" >
        <input type="hidden" name="hidden_bidding" value="<?php echo $item_details['hidden_bidding']; ?>" >
        <input type="hidden" name="enable_swap" value="<?php echo $item_details['enable_swap']; ?>" >
        <input type="hidden" name="is_auto_relist" value="<?php echo $item_details['is_auto_relist']; ?>" >
        <input type="hidden" name="auto_relist_bids" value="<?php echo $item_details['auto_relist_bids']; ?>" >
        <?php echo $hidden_custom_fields; ?>
      <?php } ?>
      <input type="hidden" name="country" value="<?php echo $item_details['country']; ?>" >
      <input type="hidden" name="state" value="<?php echo $item_details['state']; ?>" >
      <input type="hidden" name="zip_code" value="<?php echo $item_details['zip_code']; ?>" >

      <?php echo $media_upload_fields; ?>

      <?php if ($current_step != 'shipping') { ?>
        <input type="hidden" name="shipping_int" value="<?php echo $item_details['shipping_int']; ?>" >
        <input type="hidden" name="direct_payment" value="<?php echo $item_details['direct_payment']; ?>" >
        <input type="hidden" name="payment_methods" value="<?php echo $item_details['payment_methods']; ?>" >
      <?php } ?>
      <input type="hidden" name="shipping_method" value="<?php echo $item_details['shipping_method']; ?>" >
      <input type="hidden" name="postage_amount" value="<?php echo $item_details['postage_amount']; ?>" >
      <input type="hidden" name="insurance_amount" value="<?php echo $item_details['insurance_amount']; ?>" >
      <input type="hidden" name="shipping_details" value="<?php echo $item_details['shipping_details']; ?>" >
      <input type="hidden" name="type_service" value="<?php echo $item_details['type_service']; ?>" >

      <input type="hidden" name="start_time_type" value="<?php echo $item_details['start_time_type']; ?>" >
      <input type="hidden" name="end_time_type" value="<?php echo $item_details['end_time_type']; ?>" >
      <input type="hidden" name="duration" value="<?php echo $item_details['duration']; ?>" >
      <input type="hidden" name="poster_email" value="<?php echo $item_details['poster_email']; ?>" >
      <input type="hidden" name="poster_name" value="<?php echo $item_details['poster_name']; ?>" >
      <input type="hidden" name="poster_address" value="<?php echo $item_details['poster_address']; ?>" >
      <input type="hidden" name="poster_phone" value="<?php echo $item_details['poster_phone']; ?>" >
      <input type="hidden" name="auto_relist_nb" value="<?php echo $item_details['auto_relist_nb']; ?>" >
    <?php } ?>
  <?php echo $sell_item_page_content; ?>
  <?php if ($current_step != 'finish') { ?>
    </form>
    <pre>
      <?php var_dump(get_included_files()); ?></pre>
  <?php } ?>