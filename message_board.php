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
  include_once ('includes/class_messaging.php');

  if (!$session->value('user_id') && $session->value('adminarea') != 'Active') {
    header_redirect('login.php');
  }
  else {
    require ('global_header.php');

    $template->set('members_area_header', header7(MSG_MESSAGE_BOARD));

    $msg = new messaging();
    $msg->setts = &$setts; ## MyPHPAuction 2009 delete messages - admin feature only!
    if ($_REQUEST['do'] == 'delete' && $session->value('adminarea') == 'Active') {
      $db->query("DELETE FROM " . DB_PREFIX . "messaging WHERE message_id='" . intval($_REQUEST['message_id']) . "'");
      $template->set('msg_changes_saved', '<p align="center">' . MSG_MESSAGE_DELETED . '</p>');
    }

    $topic_id = 0;

    (string) $message_title = null;
    (string) $contact_details = null;
    (string) $message_board_content = null;
    (string) $addl_query_winner = null;
    (string) $addl_query_msg = null;

    $can_display = false;

    if (!empty($_REQUEST['topic_id'])) {
      $topic_id = intval($_REQUEST['topic_id']);
    }

    if (!empty($_REQUEST['winner_id'])) {## MyPHPAuction 2009 successful sale
      if ($session->value('adminarea') != 'Active') {
        $addl_query_winner = " AND (w.seller_id='" . $session->value('user_id') . "' OR w.buyer_id='" . $session->value('user_id') . "')";
      }

      $winner_details = $db->get_sql_row("SELECT w.*, a.name FROM " . DB_PREFIX . "winners w
			LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=w.auction_id WHERE
			w.winner_id='" . intval($_REQUEST['winner_id']) . "'" . $addl_query_winner);

      if ($winner_details['winner_id'] > 0) {
        $item = new item();
        $item->setts = &$setts;
        $item->layout = &$layout;

        $item_details = $db->get_sql_row("SELECT * FROM " . DB_PREFIX . "auctions WHERE
				auction_id='" . $winner_details['auction_id'] . "'");

        $can_display = true;

        $msg_details = array('message_handle' => '3', 'auction_id' => $winner_details['auction_id'], 'name' => $winner_details['name']);

        $message_title = $msg->message_subject($msg_details);
        $message_handle = 3;

        //$topic_id = ($winner_details['messaging_topic_id'] > 0) ? $winner_details['messaging_topic_id'] : $topic_id;

        if ($winner_details['seller_id'] == $session->value('user_id')) {
          $contact_details = '<tr class="c4"> ' .
            '	<td colspan="2">' . MSG_BUYER_CONTACT_DETAILS . '</td> ' .
            '</tr>';
          $user_id = $winner_details['buyer_id'];
        }
        else if ($winner_details['buyer_id'] == $session->value('user_id')) {
          $contact_details = '<tr class="c4"> ' .
            '	<td colspan="2">' . MSG_SELLER_CONTACT_DETAILS . '</td> ' .
            '</tr>';
          $user_id = $winner_details['seller_id'];
        }

        $direct_payment_box = $item->direct_payment_box($item_details, $session->value('user_id'), $winner_details['winner_id']);
        $template->set('direct_payment_box', $direct_payment_box[0]);

        if ($winner_details['bid_amount'] < 0) { ## in case we had a swap we show the swap details
          $swap_description = $db->get_sql_field("SELECT description FROM " . DB_PREFIX . "swaps WHERE
					winner_id='" . $winner_details['winner_id'] . "'", 'description');
          $template->set('swap_description', $swap_description);
        }

        if ($user_id > 0) {
          $user_details = $db->get_sql_row("SELECT u.email, u.name, u.address, u.city, u.zip_code, u.phone,
					c.name AS country_name, s.name AS state_name, u.state FROM " . DB_PREFIX . "users u
					LEFT JOIN " . DB_PREFIX . "countries s ON u.state=s.id
					LEFT JOIN " . DB_PREFIX . "countries c ON u.country=c.id WHERE u.user_id=" . $user_id);

          $user = new user();

          $contact_details .= '<tr class="c1"> ' .
            '	<td align="right"><b>' . MSG_FULL_NAME . '</b></td> ' .
            '	<td>' . $user_details['name'] . '</td> ' .
            '</tr> ' .
            '<tr class="c1"> ' .
            '	<td align="right"><b>' . MSG_FULL_ADDRESS . '</b></td> ' .
            '	<td>' . $user->full_address($user_details) . '</td> ' .
            '</tr> ';
          if ($setts['enable_display_phone']) {
            $contact_details .= '<tr class="c1"> ' .
              '	<td align="right"><b>' . MSG_PHONE . '</b></td> ' .
              '	<td>' . $user_details['phone'] . '</td> ' .
              '</tr> ';
          }
          $contact_details .= '<tr class="c1"> ' .
            '	<td align="right"><b>' . MSG_EMAIL_ADDRESS . '</b></td> ' .
            '	<td>' . $user_details['email'] . '</td> ' .
            '</tr> ';
        }
      }
    }

    ## now we will save an added message, depending on what setts we have
    if (isset($_REQUEST['add_message'])) {
      if ($topic_id > 0) {
        $msg->reply($topic_id, $session->value('user_id'), '', $_REQUEST['message']);
      }
      else if ($_REQUEST['message_handle'] == 3) {
        $topic_id = $msg->new_topic($winner_details['auction_id'], $session->value('user_id'), $user_id, 0, '', $_REQUEST['message'], 3, $winner_details['winner_id']);
      }

      header_redirect('message_board.php?option=message_added&topic_id=' . $topic_id);
    }

    if ($_REQUEST['option'] == 'message_added') {
      ## at the moment we cannot create new topics unless a winner message
      $msg_changes_saved = '<p align="center">' . MSG_MSG_ADDED_SUCCESS . '</p>';
      $template->set('msg_changes_saved', $msg_changes_saved);
    }

    if ($session->value('adminarea') != 'Active') {
      $addl_query_msg = "  AND ((m.sender_id='" . $session->value('user_id') . "' AND m.sender_deleted=0) OR
			(m.receiver_id='" . $session->value('user_id') . "' AND m.receiver_deleted=0))";
    }

    $sql_select_messages = $db->query("SELECT m.*, a.name, s.username AS sender_username, w.name AS wanted_name 
		FROM " . DB_PREFIX . "messaging m
		LEFT JOIN " . DB_PREFIX . "users s ON s.user_id=m.sender_id
		LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=m.auction_id 
		LEFT JOIN " . DB_PREFIX . "wanted_ads w ON w.wanted_ad_id=m.wanted_ad_id WHERE
		m.topic_id='" . $topic_id . "' " . $addl_query_msg . " ORDER BY m.reg_date DESC");

    while ($message_details = $db->fetch_array($sql_select_messages)) {
      $background = ($counter++ % 2) ? 'c1' : 'c2';

      $can_display = true;
      if (empty($message_title)) {
        $message_handle = $message_details['message_handle'];
        $message_title = $msg->message_subject($message_details);
        $admin_message = $message_details['admin_message'];
      }

      $additional_vars = '&topic_id=' . $topic_id . '&winner_id=' . intval($_REQUEST['winner_id']);

      $message_board_content .= '<tr class="' . $background . '"> ' .
        '	<td align="center" rowspan="2">' . (($message_details['admin_message']) ? GMSG_SITE_ADMIN : $message_details['sender_username']) . '</td> ' .
        '	<td class="contentfont">' . show_date($message_details['reg_date']) . ' &nbsp; ' .
        (($session->value('adminarea') == 'Active') ? '[ <a href="message_board.php?do=delete&message_id=' . $message_details['message_id'] . $additional_vars . '" onclick="return confirm(\'' . MSG_DELETE_CONFIRM . '\');">' . MSG_DELETE_MESSAGE . '</a> ]' : '') . '</td> ' .
        '</tr> ' .
        '<tr class="' . $background . '"> ' .
        '	<td>' . $message_details['message_content'] . '</td> ' .
        '</tr> ';
    }

    if ($can_display) {
      $msg->mark_read($session->value('user_id'), $topic_id, 0, $message_handle);

      $template->set('session', $session);
      $template->set('message_title', $message_title);
      $template->set('admin_message', $admin_message);
      $template->set('contact_details', $contact_details);
      $template->set('topic_id', $topic_id);
      $template->set('message_board_content', $message_board_content);
      $template_output .= $template->process('message_board.tpl.php');
    }
    else {
      $template->set('message_header', header5(MSG_ERROR));
      $template->set('message_content', '<p align="center">' . MSG_ERROR_CREATING_MSG_BOARD . '</p>');
      $template_output .= $template->process('single_message.tpl.php');
    }

    include_once ('global_footer.php');

    echo $template_output;
  }
?>