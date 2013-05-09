<?php
#################################################################
## MyPHPAuction v6.05															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  session_start();

  define('IN_SITE', 1);

  include_once ('includes/global.php');
  include_once ('includes/class_formchecker.php');
  include_once ('includes/class_custom_field.php');
  include_once ('includes/class_user.php');
  include_once ('includes/class_fees.php');
  include_once ('includes/class_item.php');
  include_once ('includes/functions_item.php');
  include_once ('includes/class_shop.php');

  if ($session->value('membersarea') != 'Active') {
    if ($session->value('user_id')) /* user inactive - redirect to account management page */ {
      header_redirect('members_area.php?page=account&section_management');
    }
    else {
      header_redirect('login.php');
    }
  }
  else if (!$session->value('is_seller')) {
    header_redirect('members_area.php?page=selling');
  }
  else {
    require ('global_header.php');

    (array) $user_details = null;
    (string) $page_handle = 'auction';

    $start_time_id = 1;
    $end_time_id = 2;

    $item = new item();
    $item->setts = &$setts;
    $item->layout = &$layout;
    $item->edit_auction = true;

    $sell_item_header = '<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border"> ' .
      '<tr><td class="c3"><b>' . MSG_EDIT_AUCTION . '</b></td></tr></table>';

    /**
     * We create a temporary row in the items table for every ad that is made. If the ad is placed, this temporary row
     * will become the final ad row.
     */
    if ($session->value('user_id')) {
      $user_details = $db->get_sql_row("SELECT user_id, username, shop_account_id, shop_categories,
			shop_active, preferred_seller, reg_date, country, state, zip_code, balance,
			default_name, default_description, default_duration, default_hidden_bidding,
			default_enable_swap, default_shipping_method, default_shipping_int, default_postage_amount,
			default_insurance_amount, default_type_service, default_shipping_details, default_payment_methods FROM
			" . DB_PREFIX . "users WHERE user_id=" . $session->value('user_id'));

      $shop = new shop();
      $shop->setts = &$setts;
      $shop->user_id = $session->value('user_id');
    }

    $shop_status = $shop->shop_status($user_details, true);
    $template->set('shop_status', $shop_status);

    $setup_fee = new fees();
    $setup_fee->setts = &$setts;

    define('EDIT_AUCTION', 1);

    $frmchk_error = false;

    $custom_fld = new custom_field();
    $item_details = $db->get_sql_row("SELECT * FROM
		" . DB_PREFIX . "auctions WHERE auction_id='" . $_REQUEST['auction_id'] . "' AND owner_id=" . $session->value('user_id'));

    $start_time = $item_details['start_time']; ## MyPHPAuction 2009 set here the checkboxes
    $item_details = $item->edit_set_checkboxes($item_details);

    if ($_REQUEST['edit_option'] == 'new') {
      ## first we remove the auction media for any upload_in_progress = 1.
      $sql_select_media = $db->query("SELECT am.* FROM " . DB_PREFIX . "auction_media am, " . DB_PREFIX . "auctions a WHERE
			a.auction_id=am.auction_id AND a.owner_id='" . $session->value('user_id') . "' AND
			am.auction_id='" . $_REQUEST['auction_id'] . "' AND am.upload_in_progress=1");

      while ($media_details = $db->fetch_array($sql_select_media)) {
        $item_details['auction_id'] = $media_details['auction_id'];

        if ($media_details['media_type'] == 1) {
          $item_details['ad_image'][0] = $media_details['media_url'];
        }
        else {
          $item_details['ad_video'][0] = $media_details['media_url'];
        }

        $item->media_removal($item_details, $media_details['media_type'], 0);
      }
    }

    if ($_REQUEST['box_submit'] == 1 || isset($_REQUEST['form_edit_proceed'])) {
      $item_details = $_POST;
      $item_details['description'] = $db->rem_special_chars((($_POST['description_main']) ? $_POST['description_main'] : $item_details['description']));
      $item_details['start_time'] = ($item_details['start_time_type'] == 'now' || ($start_time < CURRENT_TIME)) ? $start_time : get_box_timestamp($item_details, $start_time_id);
      $item_details['end_time'] = ($item_details['end_time_type'] == 'duration') ? ($item_details['start_time'] + $item_details['duration'] * 86400) : get_box_timestamp($item_details, $end_time_id);
      $item_details['direct_payment'] = (count($_POST['payment_gateway'])) ? $db->implode_array($_POST['payment_gateway']) : $item_details['direct_payment'];
      $item_details['payment_methods'] = (count($_POST['payment_option'])) ? $db->implode_array($_POST['payment_option']) : $item_details['payment_methods'];
      $custom_fld->save_vars($_POST);

      $voucher_details = $item->check_voucher($item_details['voucher_value'], 'setup');

      if ($setts['enable_store_only_mode'] || $item_details['listing_type'] == 'buy_out') {
        $item_details['start_price'] = $item_details['buyout_price'];
      }

      $old_category_id = intval($_REQUEST['old_category_id']);
      $old_addl_category_id = intval($_REQUEST['old_addl_category_id']);
    }
    else {
      $custom_fld->save_edit_vars($_REQUEST['auction_id'], 'auction'); ## MyPHPAuction 2009 upload initial images
      $media_details = $item->get_media_values($_REQUEST['auction_id']);
      $item_details['ad_image'] = $media_details['ad_image'];
      $item_details['ad_video'] = $media_details['ad_video'];

      $old_category_id = $item_details['category_id'];
      $old_addl_category_id = $item_details['addl_category_id'];
    }

    $template->set('old_category_id', $old_category_id);
    $template->set('old_addl_category_id', $old_addl_category_id);

    if (isset($_REQUEST['form_edit_proceed'])) {
      define('FRMCHK_ITEM', 1);
      $frmchk_details = $item_details;

      include ('includes/procedure_frmchk_item.php'); /* Formchecker for user creation/edit */

      if ($fv->is_error()) {
        $template->set('display_formcheck_errors', $fv->display_errors());
        $frmchk_error = true;
      }
      else {
        $form_submitted = true;

        $template->set('message_header', $sell_item_header);

        if ($session->value('edit_refresh_id') == $item_details['auction_id']) {
          $template->set('message_content', '<p align="center" class="contentfont">' . MSG_DOUBLE_POST_ERROR . '</p>');
        }
        else {
          $old_category_id = intval($_REQUEST['old_category_id']);
          $old_addl_category_id = intval($_REQUEST['old_addl_category_id']);

          if ($old_category_id != $item_details['category_id']) {
            auction_counter($old_category_id, 'remove', $item_details['auction_id']);
            auction_counter($item_details['category_id'], 'add', $item_details['auction_id']);
          }
          if ($old_addl_category_id != $item_details['addl_category_id']) {
            auction_counter($old_addl_category_id, 'remove', $item_details['auction_id']);
            auction_counter($item_details['addl_category_id'], 'add', $item_details['auction_id']);
          }

          $setup_fee = new fees();
          $setup_fee->setts = &$setts;
          $setup_fee->edit_auction_id = $item_details['auction_id'];
          $setup_fee->edit_user_id = $session->value('user_id');

          $setup_fee->prepare_rollback($item_details['auction_id'], $session->value('user_id'));

          $setup_result = $setup_fee->setup($user_details, $item_details, $voucher_details); ## MyPHPAuction 2009 item update function call

          $item->edit_auction = true;
          $item->insert($item_details, $session->value('user_id'));

          $session->set('edit_refresh_id', $item_details['auction_id']);

          $edit_success_message = $setup_result['display'];
          $edit_success_message .= '<p align="center" class="contentfont">' .
            '[ <a href="auction_details.php?auction_id=' . $item_details['auction_id'] . '">' . MSG_VIEW_AUCTION . '</a> ] ' .
            '[ <a href="members_area.php?page=selling&section=open">' . MSG_EDIT_MORE_AUCTIONS . '</a> ]</p>';

          $template->set('message_content', $edit_success_message);
        }

        $template_output .= $template->process('single_message.tpl.php');
      }
    }

    if (!$form_submitted) {## MyPHPAuction 2009 <<BEGIN>> media upload sequence
      if (empty($_POST['file_upload_type'])) {
        $template->set('media_upload_fields', $item->upload_manager($item_details));
      }
      else if (is_numeric($_POST['file_upload_id'])) /* means we remove a file / media url */ {
        $media_upload = $item->media_removal($item_details, $item_details['file_upload_type'], $item_details['file_upload_id']);
        $media_upload_fields = $media_upload['display_output'];

        $item_details['ad_image'] = $media_upload['post_details']['ad_image'];
        $item_details['ad_video'] = $media_upload['post_details']['ad_video'];

        $template->set('media_upload_fields', $media_upload_fields);
      }
      else /* means we have a file upload */ {
        $media_upload = $item->media_upload($item_details, $item_details['file_upload_type'], $_FILES);
        $media_upload_fields = $media_upload['display_output'];

        $item_details['ad_image'] = $media_upload['post_details']['ad_image'];
        $item_details['ad_video'] = $media_upload['post_details']['ad_video'];

        $template->set('media_upload_fields', $media_upload_fields);
      }## MyPHPAuction 2009 <<END>> media upload sequence

      $template->set('auction_edit', 1);
      $template->set('do', $_REQUEST['do']);
      $template->set('item_details', $item_details);
      $template->set('user_details', $user_details);

      $template->set('sell_item_header', $sell_item_header);

      $template->set('post_url', 'edit_item.php');

      include_once('includes/page_edit_auction.php');

      $template_output .= $template->process('edit_auction.tpl.php');
    }

    include_once ('global_footer.php');

    echo $template_output;
  }
?>