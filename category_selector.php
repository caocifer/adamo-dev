<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  session_start();

  define('IN_SITE', 1);

  include_once ('includes/global.php');

  if ($session->value('membersarea') != 'Active' && $session->value('adminarea') != 'Active') {
    $template_output .= '<p align="center" class="contentfont">' . GMSG_ACCESS_DENIED . '</p>';
  }
  else {
    $page_title = GMSG_MODIFY . ' ' . (($_GET['cat'] == 'category') ? MSG_MAIN_CATEGORY : MSG_ADDL_CATEGORY);
    $template->set('page_title', $page_title);

    $template->set('form_name', $_GET['form_name']);
    $template->set('cat', $_GET['cat']);

    reset($categories_array);

    $category_selector_box = '<select name="cat" id="cat" class="contentfont" onChange="copyForm(cat);" size="15" onFocus="OnSelectFocus();"> ';

    $item_details = $db->get_sql_row("SELECT list_in, owner_id FROM " . DB_PREFIX . "auctions WHERE
		auction_id='" . intval($_GET['auction_id']) . "'");

    $owner_id = ($session->value('adminarea') == 'Active') ? $item_details['owner_id'] : $session->value('user_id');

    if ($_GET['cat'] == 'addl_category_id') {
      $category_selector_box .= '<option value="" selected>' . GMSG_NO_ADDL_CATEGORY . '</option>';
    }

    foreach ($categories_array as $key => $value) {
      list($category_name, $user_id) = $value;

      if ($user_id == 0 || ($_GET['form_name'] != 'wanted_manage' && $item_details['list_in'] == 'store' && $user_id == $owner_id)) {
        $category_selector_box .= '<option value="' . $key . '" ' . (($_GET['category_id'] == $key) ? 'selected' : '') . '>' . $category_name . '</option>';
      }
    }
    $category_selector_box .= '</select>';

    $template->set('category_selector_box', $category_selector_box);

    $template_output .= $template->process('category_selector.tpl.php');
  }
  echo $template_output;
?>
