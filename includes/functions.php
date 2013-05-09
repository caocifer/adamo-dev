﻿<?php
#################################################################
## MyPHPAuction v6.05															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  function header_redirect($redirect_url) {
    echo "<script>document.location.href='" . $redirect_url . "'</script>";
  }

  function check_pin($pin_generated, $pin_submitted) {
    return (substr(md5($pin_generated), 15, 8) == $pin_submitted) ? TRUE : FALSE;
  }

  function generate_pin($pin_submitted) {
    return substr(md5($pin_submitted), 15, 8);
  }

  function show_pin_image($full_pin, $generated_pin, $image_url = '') {
    ## create an image not a text for the pin
    $font = 6;
    $width = ImageFontWidth($font) * strlen($generated_pin);
    $height = ImageFontHeight($font);

    $im = @imagecreate($width, $height);
    $background_color = imagecolorallocate($im, 219, 239, 249); //cell background
    $text_color = imagecolorallocate($im, 0, 0, 0); //text color
    imagestring($im, $font, 0, 0, $generated_pin, $text_color);
    touch($image_url . 'uplimg/site_pin_' . $full_pin . '.jpg');
    imagejpeg($im, $image_url . 'uplimg/site_pin_' . $full_pin . '.jpg');

    $image_output = '<img src="' . $image_url . 'uplimg/site_pin_' . $full_pin . '.jpg">';

    imagedestroy($im);

    return $image_output;
  }

  function unlink_pin() {
    global $session;

    $path = (@IN_ADMIN == 1) ? '../' : '';

    if ($session->is_set('pin_value')) {
      @unlink($path . 'uplimg/site_pin_' . $session->value('pin_value') . '.jpg');
      $session->unregister('pin_value');
    }

    if ($session->is_set('admin_pin_value')) {
      @unlink($path . 'uplimg/site_pin_' . $session->value('admin_pin_value') . '.jpg');
      $session->unregister('admin_pin_value');
    }
  }

  function sanitize_var($value) {
    if (!is_numeric($value)) {
      $value = preg_replace("#[^A-Za-z0-9_ ]#", "", $value);
      //$value = ereg_replace("[^A-Za-z0-9_ ]", "", $value);
      // $value = eregi_replace('amp','and',$value);
      // $value = eregi_replace('quot','',$value);
      // $value = eregi_replace('039','',$value);
      // $value = eregi_replace(' ','-',$value);

      $value = preg_replace('/amp/i', 'and', $value);
      $value = preg_replace('/quot/i', '', $value);
      $value = preg_replace('/039/i', '', $value);
      $value = preg_replace('/ /i', '-', $value);
    }

    return $value;
  }

  function process_link($base_url, $var_array = NULL, $overwrite_amp = false) {
    global $setts;

    $ssl_url_simple = array('login', 'register');
    $ssl_url_enhanced = array('login', 'register', 'members_area', 'fee_payment');

    $amp = ($overwrite_amp) ? '_AND_' : '&';

    $ssl_url_array = ($setts['enable_enhanced_ssl']) ? $ssl_url_enhanced : $ssl_url_simple;

    (string) $output = NULL;

    $path = ($setts['is_ssl'] == 1 && (in_array($base_url, $ssl_url_array))) ? $setts['site_path_ssl'] : $setts['site_path'];

    if ($setts['is_mod_rewrite'] && $var_array) {
      if ($var_array) {
        while (list($key, $value) = each($var_array)) {
          $sanitized_value = sanitize_var($value);
          $output .= $sanitized_value . ',' . $key . ',';
        }
      }
      $output .= $base_url;
    }
    else {
      $output = $base_url . '.php';
      if ($var_array) {
        $output .= '?';
        while (list($key, $value) = each($var_array)) {
          $sanitized_value = sanitize_var($value);
          $output .= $key . '=' . $sanitized_value . $amp;
        }
        $output = substr($output, 0, ((-1) * strlen($amp)));
      }
    }

    return $path . $output;
  }

  function category_navigator($parent_id, $show_links = true, $show_category = true, $page_link = null, $additional_vars = null, $none_msg = null) {
    global $category_lang, $db;

    (string) $display_output = NULL;
    (int) $counter = 0;

    $none_msg = ($none_msg) ? $none_msg : GMSG_ALL_CATEGORIES;

    $page_link = ($page_link) ? $page_link : $_SERVER['PHP_SELF'];
    if ($parent_id > 0) {
      $root_id = $parent_id;
      while ($root_id > 0) {
        $row_category = $db->get_sql_row("SELECT category_id, name, parent_id FROM " . DB_PREFIX . "categories WHERE category_id=" . $root_id . " LIMIT 0,1");

        if ($counter == 0) {
          $display_output = $category_lang[$row_category['category_id']];
          $display_output = (!empty($display_output)) ? $display_output : $row_category['name'];
        }
        else if ($parent_id != $root_id) {
          $category_name = $category_lang[$row_category['category_id']];
          $category_name = (!empty($category_name)) ? $category_name : $row_category['name'];

          $display_output = (($show_links) ? '<a href="' . $page_link . '?parent_id=' . $row_category['category_id'] . '&name=' . $category_name . ((!empty($additional_vars)) ? ('&' . $additional_vars) : '') . '">' : '') . $category_name . (($show_links) ? '</a>' : '') . ' > ' . $display_output;
        }
        $counter++;
        $root_id = $row_category['parent_id'];
      }
      $display_output = (($show_links && $show_category) ? '<a href="' . $page_link . '?' . $additional_vars . '"><b> ' . GMSG_CATEGORY . ':</b></a> ' : '') . $display_output;
    }

    $display_output = (empty($display_output)) ? $none_msg : $display_output;

    return $display_output;
  }

  function http_post($server, $port, $url, $vars) {
    // get urlencoded vesion of $vars array
    (string) $urlencoded = null;

    foreach ($vars as $index => $value) {
      $urlencoded .= urlencode($index) . '=' . urlencode($value) . '&';
    }

    $urlencoded = substr($urlencoded, 0, -1);

    $headers = "POST " . $url . " HTTP/1.0\r\n" .
      "Content-Type: application/x-www-form-urlencoded\r\n" .
      "Content-Length: " . strlen($urlencoded) . "\r\n\r\n";

    $fp = fsockopen($server, $port, $errno, $errstr, 10);
    if ($log) {
      if (!$fp)
        fputs($fh, "ERROR: fsockopen failed.\r\nError no: " . $errno . " - " . $errstr . "\n");
      else
        fputs($fh, "Fsockopen success.\n");
    }

    fputs($fp, $headers);
    fputs($fp, $urlencoded);

    $ret = "";
    while (!feof($fp))
      $ret .= fgets($fp, 1024);

    fclose($fp);
    return $ret;
  }

  function paginate($start, $limit, $total, $file_path, $other_params) {
    (string) $display_output = null;

    $all_pages = ceil($total / $limit);

    $current_page = floor($start / $limit) + 1;

    if ($all_pages > 10) {
      $max_pages = ($all_pages > 9) ? 9 : $all_pages;

      if ($all_pages > 9) {
        if ($current_page >= 1 && $current_page <= $all_pages) {
          $display_output .= ($current_page > 4) ? ' ... ' : ' ';

          $min_pages = ($current_page > 4) ? $current_page : 5;
          $max_pages = ($current_page < $all_pages - 4) ? $current_page : $all_pages - 4;

          for ($i = $min_pages - 4; $i < $max_pages + 5; $i++) {
            $display_output .= display_link($file_path . '?start=' . (($i - 1) * $limit) . $other_params, $i, (($i == $current_page) ? false : true));
          }
          $display_output .= ($current_page < $all_pages - 4) ? ' ... ' : ' ';
        }
        else {
          $display_output .= ' ... ';
        }
      }
    }
    else {
      for ($i = 1; $i < $all_pages + 1; $i++) {
        $display_output .= display_link($file_path . '?start=' . (($i - 1) * $limit) . $other_params, $i, (($i == $current_page) ? false : true));
      }
    }

    if ($current_page > 1) {
      $display_output = '[<a href="' . $file_path . '?start=0' . $other_params . '">&lt;&lt;</a>] ' .
        '[<a href="' . $file_path . '?start=' . (($current_page - 2) * $limit) . $other_params . '">&lt;</a>] ' . $display_output;
    }

    if ($current_page < $all_pages) {
      $display_output .= ' [<a href="' . $file_path . '?start=' . ($current_page * $limit) . $other_params . '">&gt;</a>] ' .
        '[<a href="' . $file_path . '?start=' . (($all_pages - 1) * $limit) . $other_params . '">&gt;&gt;</a>]';
    }

    return $display_output;
  }

  function page_order($file_path, $order_field, $start, $limit, $other_params, $field_name = null) {
    (string) $display_output = null;

    $file_extension = (IN_ADMIN == 1) ? '../' : '';

    $display_output = '<a href="' . $file_path . '?start=' . $start . '&limit=' . $limit . $other_params . '
		&order_field=' . $order_field . '&order_type=ASC">' .
      '<img src="' . $file_extension . 'images/s_asc.png" align="absmiddle" border="0" alt="' . $field_name . ' ' . GMSG_ASCENDING . '"></a>' .
      '<a href="' . $file_path . '?start=' . $start . '&limit=' . $limit . $other_params . '
		&order_field=' . $order_field . '&order_type=DESC">' .
      '<img src="' . $file_extension . 'images/s_desc.png" align="absmiddle" border="0" alt="' . $field_name . ' ' . GMSG_DESCENDING . '"></a>';

    return $display_output;
  }

  function field_display($field_value, $output_false = '-', $output_true = null) {
    (string) $display_output = null;

    $display_output = ($field_value) ? (($output_true) ? $output_true : $field_value) : $output_false;

    return $display_output;
  }

  function display_pagination_results($start, $limit, $total) {
    (string) $display_output = null;

    $end = ($start + $limit > $total) ? $total : ($start + $limit);

    if ($total) {
      $start++;
    }

    $display_output = GMSG_DISPLAYING_RESULTS . ' <b>' . $start . ' - ' . $end . '</b> ' . GMSG_FROM_LOW . ' <b>' . $total . '</b>';

    return $display_output;
  }

  function display_link($link_url, $link_message, $active = true) {
    (string) $display_output = null;

    $display_output = ($active) ? '<a href="' . $link_url . '">' : '[ ';
    $display_output .= $link_message;
    $display_output .= ($active) ? '</a> ' : ' ] ';

    return $display_output;
  }

  function remove_spaces($input_variable) {
    $output_variable = str_replace(' ', '', $input_variable);

    return $output_variable;
  }

  /**
   * MyPHPAuction functions start here!
   */
  function list_skins($location = 'site', $drop_down = false, $selected_skin = null, $display_none = false, $dd_multiple = false) {
    (array) $output = null;
    (string) $display_output = null;

    $relative_path = ($location == 'site') ? '' : '../';

    $handle = opendir($relative_path . 'themes');

    while ($file = readdir($handle)) {
      if (!strstr($file, '[.]')) {
        $output[] = $file;
      }
    }

    closedir($handle);

    /**
     * this is an enhancement of the function, to create a drop down menu to select the skin
     * in the admin area
     */
    if ($drop_down) {
      $display_output = '<select name="default_theme' . (($dd_multiple) ? '[]' : '') . '"> ';

      if ($display_none) {
        $display_output .= '<option value="" selected>' . GMSG_DEFAULT . '</option> ';
      }

      foreach ($output as $value) {
        $display_output .= '<option value="' . $value . '" ' . (($value == $selected_skin) ? 'selected' : '') . '>' . $value . '</option> ';
      }

      $display_output .= '</select>';
    }
    return ($drop_down) ? $display_output : $output;
  }

  function list_languages($location = 'site', $drop_down = false, $selected_language = null, $show_flags = false) {
    global $db, $setts;
    (array) $output = null;
    (array) $language_flags = null;
    (string) $display_output = null;


    $relative_path = ($location == 'site') ? '' : '../';

    $handle = opendir($relative_path . 'language');

    while ($file = readdir($handle)) {
      if (!strstr($file, '[.]')) {
        $output[] = $file;
      }
    }

    closedir($handle);

    /**
     * this is an enhancement of the function, to create a drop down menu to select the language
     * in the admin area
     */
    if ($drop_down) {
      $display_output = '<select name="language"> ';

      foreach ($output as $value) {
        $display_output .= '<option value="' . $value . '" ' . (($value == $selected_language) ? 'selected' : '') . '>' . $value . '</option> ';
      }

      $display_output .= '</select>';
    }
    else if ($show_flags) {
      if ($setts['user_lang']) {
        foreach ($output as $value) {
          $language_flags[] = '<a href="' . process_link('index', array('change_language' => $value)) . '"><img src="themes/' . $setts['default_theme'] . '/img/' . $value . '.gif" border="0" alt="' . $value . '"></a>';
        }

        $display_output = $db->implode_array($language_flags, ' &nbsp; ');
      }
    }
    return ($drop_down || $show_flags) ? $display_output : $output;
  }

  function timezones_drop_down($selected_value = null) {
    global $db, $setts;

    (string) $display_output = null;

    $selected_value = (!empty($selected_value)) ? $selected_value : $setts['time_offset'];

    $display_output = '<select name="time_zone"> ';

    $sql_select_timezones = $db->query("SELECT value, caption FROM
		" . DB_PREFIX . "timesettings");

    while ($time_zone = $db->fetch_array($sql_select_timezones)) {
      $display_output .= '<option value="' . $time_zone['value'] . '" ' . (($time_zone['value'] == $selected_value) ? 'selected' : '') . '>' . $time_zone['caption'] . '</option> ';
    }

    $display_output .= '</select>';

    return $display_output;
  }

## this function will be used to save email and language files in admin

  function save_file($file_name, $file_content) {
    global $db;

    (string) $display_output = null;

    $file_content = $db->add_special_chars($file_content);

    if (is_writable($file_name)) {
      $fp = fopen($file_name, 'w');

      if (!$fp) {
        $display_output = GMSG_CANNOT_OPEN_FILE . ' [ ' . $file_name . ' ]';
      }
      else if (!fwrite($fp, $file_content)) {
        $display_output = GMSG_FILE_NOT_EDITABLE . ' [ ' . $file_name . ' ]';
      }
      else {
        $display_output = GMSG_FILE_UPDATED . ' [ ' . $file_name . ' ]';
      }

      fclose($fp);
    }
    else {
      $display_output = GMSG_FILE_NOT_WRITABLE . ' [ ' . $file_name . ' ]';
    }

    return $display_output;
  }

  function categories_list($selected_category_id, $category_id = 0, $custom_fees = true) {
    global $db;

    (string) $display_output = null;

    $addl_query = ($custom_fees) ? " AND custom_fees=1" : '';

    $sql_select_categories = $db->query("SELECT category_id, name FROM " . DB_PREFIX . "categories WHERE
		parent_id=0 AND user_id=0" . $addl_query);

    $nb_categories = $db->num_rows($sql_select_categories);

    $display_output = '<select name="category_id"> ' .
      '<option value="0" selected>' . (($custom_fees) ? GMSG_DEFAULT : GMSG_ALL_CATEGORIES) . '</option> ';

    $display_output .= ($nb_categories) ? '<option value="0">' . GMSG_LIST_SEPARATOR . '</option>' : '';

    while ($category_details = $db->fetch_array($sql_select_categories)) {
      $display_output .= '<option value="' . $category_details['category_id'] . '" ' . (($category_details['category_id'] == $selected_category_id) ? 'selected' : '') . '>' . $category_details['name'] . '</option>';
    }

    $display_output .= '</select>';

    return $display_output;
  }

  function voucher_form($voucher_type, $voucher_value = null, $new_table = true) {
    global $db;
    (string) $display_output = null;

    $is_voucher = $db->count_rows('vouchers', "WHERE voucher_type='" . $voucher_type . "' AND
		(exp_date=0 OR exp_date>" . CURRENT_TIME . ") AND (uses_left>0 OR nb_uses=0)");

    if ($is_voucher) {
      $display_output = ($new_table) ? '<br><table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">' : '';
      $display_output .= '	<tr> ' .
        '		<td colspan="2" class="c3">' . GMSG_VOUCHER_SETTINGS . '</td> ' .
        '	</tr> ' .
        '	<tr class="c5"> ' .
        '		<td><img src="themes/' . $db->setts['default_theme'] . '/img/pixel.gif" width="1" height="1" /></td> ' .
        '		<td><img src="themes/' . $db->setts['default_theme'] . '/img/pixel.gif" width="1" height="1" /></td> ' .
        '	</tr> ' .
        '	<tr class="c1"> ' .
        '		<td width="150" align="right" class="contentfont">' . GMSG_VOUCHER_CODE . '</td> ' .
        '		<td><input name="voucher_value" type="text" class="contentfont" id="voucher_value" value="' . $voucher_value . '" size="40" /></td> ' .
        '	</tr> ' .
        '	<tr class="reguser"> ' .
        '		<td align="right" class="contentfont">&nbsp;</td> ' .
        '		<td>' . GMSG_VOUCHER_CODE_EXPL . '</td> ' .
        '	</tr> ';
      $display_output .= ($new_table) ? '</table>' : '';
    }

    return $display_output;
  }

  function terms_box($terms_type, $selected_value) {
    global $db;
    (string) $display_output = null;

    if ($terms_type == 'registration') {
      $new_table = true;
      $colspan = 2;
      $terms = array('enabled' => $db->layout['enable_reg_terms'], 'content' => $db->layout['reg_terms_content']);
      $agreement_msg = '<input type="checkbox" name="agree_terms" value="1" ' . (($selected_value) ? 'checked' : '') . '>' . GMSG_CLICK_TO_AGREE_TO_TERMS;
    }
    else if ($terms_type == 'auction_setup') {
      $new_table = false;
      $colspan = 3;
      $terms = array('enabled' => $db->layout['enable_auct_terms'], 'content' => $db->layout['auct_terms_content']);
      $agreement_msg = GMSG_AUCT_TERMS_AGREEMENT_EXPL;
    }

    if ($terms['enabled']) {
      if ($new_table) {
        $display_output = '<br><table width="100%" border="0" cellpadding="3" cellspacing="2" class="border"> ';
      }

      /*  $display_output .= '	<tr> ' .
        '		<td colspan="' . $colspan . '" class="c3">' . GMSG_TERMS_AND_CONDITIONS . '</td> ' .
        '	</tr> ' .
        '	<tr class="c5"> ' .
        '		<td><img src="themes/' . $db->setts['default_theme'] . '/img/pixel.gif" width="1" height="1" /></td> ' .
        '		<td colspan="' . ($colspan - 1) . '"><img src="themes/' . $db->setts['default_theme'] . '/img/pixel.gif" width="1" height="1" /></td> ' .
        '	</tr> ' .
        '	<tr class="c1"> ' .
        '		<td width="150" align="right" class="contentfont"></td> ' .
        '		<td colspan="' . ($colspan - 1) . '"><textarea name="terms_content" cols="50" rows="8" readonly class="smallfont" style="width: 100%; height: 200px;" />' . eregi_replace('<br>', "\n", $terms['content']) . '</textarea></td> ' .
        '	</tr> ' .
        '	<tr class="reguser"> ' .
        '		<td align="right" class="contentfont">&nbsp;</td> ' .
        '		<td colspan="' . ($colspan - 1) . '">' . $agreement_msg . '</td> ' .
        '	</tr> '; */
      $display_output .= '	<tr> ' .
        '		<td colspan="' . $colspan . '" class="c3">' . GMSG_TERMS_AND_CONDITIONS . '</td> ' .
        '	</tr> ' .
        '	<tr class="c5"> ' .
        '		<td><img src="themes/' . $db->setts['default_theme'] . '/img/pixel.gif" width="1" height="1" /></td> ' .
        '		<td colspan="' . ($colspan - 1) . '"><img src="themes/' . $db->setts['default_theme'] . '/img/pixel.gif" width="1" height="1" /></td> ' .
        '	</tr> ' .
        '	<tr class="c1"> ' .
        '		<td width="150" align="right" class="contentfont"></td> ' .
        '		<td colspan="' . ($colspan - 1) . '"><textarea name="terms_content" cols="50" rows="8" readonly class="smallfont" style="width: 100%; height: 200px;" />' . str_replace('/<br>/i', "\n", $terms['content']) . '</textarea></td> ' .
        '	</tr> ' .
        '	<tr class="reguser"> ' .
        '		<td align="right" class="contentfont">&nbsp;</td> ' .
        '		<td colspan="' . ($colspan - 1) . '">' . $agreement_msg . '</td> ' .
        '	</tr> ';
      if ($new_table) {
        $display_output .='</table>';
      }
    }

    return $display_output;
  }

  function title_resize($text) {
    global $db;
    (string) $display_output = null;

    $max_length = 15;

    $text = $db->add_special_chars($text);
    $text_words = explode(' ', $text);

    $nb_words = count($text_words);

    for ($i = 0; $i < $nb_words; $i++) {
      $display_output[] = (strlen($text_words[$i]) > $max_length) ? substr($text_words[$i], 0, $max_length - 3) . '... ' : $text_words[$i];
    }

    return $db->implode_array($display_output, ' ');
  }

  function online_users() {
    $data_file = 'online_users.txt';

    $session_time = 60; //time in **minutes** to consider someone online before removing them

    if (!file_exists($data_file)) {
      $fp = fopen($data_file, 'w+');
      fclose($fp);
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $users = array();
    $online_users = array();

    //get users part
    $fp = fopen($data_file, 'r');
    flock($fp, LOCK_SH);

    while (!feof($fp)) {
      $users[] = rtrim(fgets($fp, 32));
    }

    flock($fp, LOCK_UN);
    fclose($fp);


    //cleanup part
    $x = 0;
    $already_in = false;

    foreach ($users as $key => $data) {
      list(, $last_visit) = explode('|', $data);

      if (CURRENT_TIME - $last_visit >= $session_time * 60) {
        $users[$x] = '';
      }
      else {
        if (strpos($data, $ip) !== false) {
          $already_in = true;
          $users[$x] = $ip . '|' . time(); //update record
        }
      }
      $x++;
    }

    if ($already_in == false) {
      $users[] = $ip . '|' . time();
    }

    //write file
    $fp = fopen($data_file, 'w+');
    flock($fp, LOCK_EX);

    $nb_users = 0;
    foreach ($users as $user) {
      if (!empty($user)) {
        fwrite($fp, $user . "\r\n");
        $nb_users++;
      }
    }
    flock($fp, LOCK_UN);
    fclose($fp);

    return $nb_users;
  }

  function blocked_user($user_id, $owner_id) {
    global $db;

    $is_blocked = $db->count_rows('blocked_users', "WHERE
		user_id='" . intval($user_id) . "' AND owner_id='" . intval($owner_id) . "'");

    $output = ($is_blocked) ? true : false;

    return $output;
  }

  function block_reason($user_id, $owner_id) {
    global $db;

    $block_details = $db->get_sql_row("SELECT b.*, u.username FROM " . DB_PREFIX . "blocked_users b
		LEFT JOIN " . DB_PREFIX . "users u ON u.user_id=b.user_id WHERE
		b.user_id='" . $user_id . "' AND b.owner_id='" . $owner_id . "'");

    $block_message = '<p class="errormessage">' . MSG_BLOCKED_USER_MSG .
      (($block_details['show_reason']) ? '<br><b>' . MSG_REASON . '</b>: ' . $block_details['block_reason'] : '') . '</p>';

    return $block_message;
  }

  function check_banned($banned_address, $address_type) {
    global $db;
    $output = array('result' => false, 'display' => null);

    $is_banned = $db->count_rows('banned', "WHERE banned_address='" . $banned_address . "' AND address_type='" . $address_type . "'");

    if ($is_banned) {
      $output['result'] = true;

      $output['display'] = '<p class="errormessage" align="center">' . MSG_BANNED_EXPL_A . ' <b>' .
        (($address_type == 1) ? MSG_IP_ADDRESS : MSG_EMAIL_ADDRESS) . '</b> ' . MSG_BANNED_EXPL_B . '</p>';
    }

    return $output;
  }

  function meta_tags($base_url, $parent_id, $auction_id, $wanted_ad_id) {
    global $db, $category_lang, $setts;
    (array) $output = null;
    (array) $subcats_array = null;

    if (stristr($base_url, 'auction_details.php')) {
      $item_details = $db->get_sql_row("SELECT auction_id, name, end_time, category_id FROM " . DB_PREFIX . "auctions WHERE
			auction_id='" . $auction_id . "'");

      $parent_id = $item_details['category_id'];
    }
    else if (stristr($base_url, 'wanted_details.php')) {
      $item_details = $db->get_sql_row("SELECT wanted_ad_id, name, end_time, category_id FROM " . DB_PREFIX . "wanted_ads WHERE
			wanted_ad_id='" . $wanted_ad_id . "'");

      $parent_id = $item_details['category_id'];
    }

    if ($parent_id > 0) {
      $root_id = $parent_id;
      while ($root_id > 0) {
        $row_category = $db->get_sql_row("SELECT category_id, parent_id FROM " . DB_PREFIX . "categories WHERE category_id=" . $root_id . " LIMIT 0,1");
        $subcats_array[] = $category_lang[$row_category['category_id']];

        $root_id = $row_category['parent_id'];
      }

      $subcats_array = array_reverse($subcats_array);
    }

    /* now generate the title and meta tags */
    if (stristr($base_url, 'auction_details.php')) {
      $output['title'] = $db->add_special_chars($item_details['name']) . ' (' . MSG_AUCTION_ID . ': ' . $item_details['auction_id'] . ', ' .
        GMSG_END_TIME . ': ' . show_date($item_details['end_time']) . ') - ' . $setts['sitename'];

      $output['meta_tags'] = '<meta name="description" content="' . MSG_MTT_FIND . ' ' . $db->add_special_chars($item_details['name']) . ' ' .
        MSG_MTT_IN_THE . ' ' . $db->add_special_chars($db->implode_array($subcats_array, ' - ')) . ' ' . MSG_MTT_CATEGORY_ON . ' ' . $setts['sitename'] . '"> ' .
        '<meta name="keywords" content="' . $db->add_special_chars($item_details['name']) . ', ' . $db->add_special_chars($db->implode_array($subcats_array, ', ')) . ', ' .
        $setts['sitename'] . '"> ';
    }
    else if (stristr($base_url, 'wanted_details.php')) {
      $output['title'] = $db->add_special_chars($item_details['name']) . ' (' . MSG_WANTED_AD_ID . ': ' . $item_details['wanted_ad_id'] . ', ' .
        GMSG_END_TIME . ': ' . show_date($item_details['end_time']) . ') - ' . $setts['sitename'];

      $output['meta_tags'] = '<meta name="description" content="' . MSG_MTT_FIND . ' ' . $db->add_special_chars($item_details['name']) . ' ' .
        MSG_MTT_IN_THE . ' ' . $db->add_special_chars($db->implode_array($subcats_array, ' - ')) . ' ' . MSG_MTT_CATEGORY_ON . ' ' . $setts['sitename'] . '"> ' .
        '<meta name="keywords" content="' . $db->add_special_chars($item_details['name']) . ', ' . $db->add_special_chars($db->implode_array($subcats_array, ', ')) . ', ' .
        $setts['sitename'] . '"> ';
    }
    else if (stristr($base_url, 'categories.php')) {
      $output['title'] = ((is_array($subcats_array)) ? $db->add_special_chars($db->implode_array($subcats_array, ' - ')) . ' - ' : '') . $setts['sitename'];

      $main_category_id = $db->main_category($parent_id);
      $category_details = $db->get_sql_row("SELECT meta_description, meta_keywords FROM " . DB_PREFIX . "categories WHERE
			category_id='" . $main_category_id . "'");

      if (!empty($category_details['meta_description']) && !empty($category_details['meta_keywords'])) {
        $output['meta_tags'] = '<meta name="description" content="' . $db->add_special_chars($category_details['meta_description']) . '"> ' .
          '<meta name="keywords" content="' . $db->add_special_chars($category_details['meta_keywords']) . '"> ';
      }
      else {
        $output['meta_tags'] = $db->add_special_chars($setts['metatags']);
      }
    }
    else {
      $output['title'] = $setts['sitename'];

      $output['meta_tags'] = $db->add_special_chars($setts['metatags']);
    }

    return $output;
  }

  function remove_cache_img() {
    global $fileExtension;

    $cache_directory = $fileExtension . 'cache/';
    $time_limit = 60 * 60 * 24; ## one day

    $cache_dir = opendir($cache_directory);

    while ($file = readdir($cache_dir)) {
      if ($file != '..' && $file != '.' && $file != '' && $file != 'index.htm') {
        $filestats = array();
        $filestats = stat($cache_directory . $file);

        if (($filestats[10] + $time_limit) < CURRENT_TIME) {
          @unlink($cache_directory . $file);
        }
      }
    }

    closedir($cache_dir);
    clearstatcache();
  }

  function user_pics($user_id, $reputation_only = false) {
    global $db, $setts, $fileExtension;
    (string) $display_output = null;

    $user_details = $db->get_sql_row("SELECT enable_aboutme_page, shop_active, seller_verified, enable_profile_page FROM " . DB_PREFIX . "users WHERE user_id='" . $user_id . "'");

    $positive_reputation = $db->count_rows('reputation', "WHERE user_id='" . $user_id . "' AND reputation_rate IN (4,5) AND submitted=1");
    $negative_reputation = $db->count_rows('reputation', "WHERE user_id='" . $user_id . "' AND reputation_rate IN (1,2) AND submitted=1");

    $reputation_rating = $positive_reputation - $negative_reputation;
    $reputation_rating_link = '<span class="contentfont"><a href="' . $fileExtension . 'user_reputation.php?user_id=' . $user_id . '">' . $reputation_rating . '</a></span>';

    if ($reputation_rating < 1) {
      $display_output = ' (' . $reputation_rating_link . ') ';
    }
    else if ($reputation_rating >= 1 && $reputation_rating < 10) {
      $display_output = ' (' . $reputation_rating_link . ') <img align=absmiddle src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/yellow_star.gif" border="0">';
    }
    else if ($reputation_rating >= 10 && $reputation_rating < 50) {
      $display_output = ' (' . $reputation_rating_link . ') <img align=absmiddle src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/green_star.gif" border="0">';
    }
    else if ($reputation_rating >= 50 && $reputation_rating < 100) {
      $display_output = ' (' . $reputation_rating_link . ') <img align=absmiddle src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/blue_star.gif" border="0">';
    }
    else if ($reputation_rating >= 100 && $reputation_rating < 200) {
      $display_output = ' (' . $reputation_rating_link . ') <img align=absmiddle src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/red_star.gif" border="0">';
    }
    else if ($reputation_rating >= 200) {
      $display_output = ' (' . $reputation_rating_link . ') <img align=absmiddle src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/gold_star.gif" border="0">';
    }

    if (!$reputation_only) {
      if ($user_details['seller_verified']) {
        $display_output .= ' <img align=absmiddle src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/verified.gif" border="0" alt="' . GMSG_VERIFIED_SELLER . '">';
      }

      if ($user_details['enable_aboutme_page']) {
        $display_output .= ' <a href="' . $fileExtension . 'about_me.php?user_id=' . $user_id . '"><img src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/about_me.gif" border="0" align="absmiddle"></a>';
      }

      if ($user_details['shop_active']) {
        $display_output .= ' <a href="' . $fileExtension . 'shop.php?user_id=' . $user_id . '"><img src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/25store.gif" border="0" align=absmiddle></a>';
      }

      if ($user_details['enable_profile_page'] && $setts['enable_profile_page']) {
        $display_output .= ' <a href="' . $fileExtension . 'profile.php?user_id=' . $user_id . '"><img src="' . $fileExtension . 'themes/' . $setts['default_theme'] . '/img/system/profile.gif" border="0" align=absmiddle alt="' . MSG_VIEW_MEMBER_PROFILE . '"></a>';
      }
    }

    return $display_output;
  }

  /**
   * below are all the category counters related functions 
   */
  function auction_counter($category_id, $operation = 'add', $auction_id = 0) {
    global $db;

    $can_add = ($category_id) ? true : false;

    if ($auction_id) {
      $list_in = $db->get_sql_field("SELECT list_in FROM " . DB_PREFIX . "auctions WHERE auction_id='" . $auction_id . "'", 'list_in');
      $can_add = ($list_in == 'store') ? false : $can_add;
    }

    if ($can_add) {
      $root_id = $category_id;

      while ($root_id > 0) {
        $db->query("UPDATE " . DB_PREFIX . "categories SET 
				items_counter=items_counter" . (($operation == 'add') ? '+' : '-') . "1 WHERE category_id='" . $root_id . "'");

        $root_id = $db->get_sql_field("SELECT parent_id FROM " . DB_PREFIX . "categories WHERE category_id=" . $root_id, 'parent_id');
      }
    }
  }

  function wanted_counter($category_id, $operation = 'add') {
    global $db;

    $can_add = ($category_id) ? true : false;

    if ($can_add) {
      $root_id = $category_id;

      while ($root_id > 0) {
        $db->query("UPDATE " . DB_PREFIX . "categories SET 
				wanted_counter=wanted_counter" . (($operation == 'add') ? '+' : '-') . "1 WHERE category_id='" . $root_id . "'");

        $root_id = $db->get_sql_field("SELECT parent_id FROM " . DB_PREFIX . "categories WHERE category_id=" . $root_id, 'parent_id');
      }
    }
  }

  function user_counter($user_id, $operation = 'add') {
    global $db;

    $cnt_active = ($operation == 'add') ? 0 : 1;

    $sql_select_auctions = $db->query("SELECT auction_id, category_id, addl_category_id FROM " . DB_PREFIX . "auctions WHERE 
		owner_id='" . $user_id . "' AND active=" . $cnt_active . " AND approved=1 AND closed=0 AND deleted!=1 AND list_in!='store'");

    while ($item_details = $db->fetch_array($sql_select_auctions)) {
      auction_counter($item_details['category_id'], $operation, $item_details['auction_id']);
      auction_counter($item_details['addl_category_id'], $operation, $item_details['auction_id']);
    }

    $sql_select_wa = $db->query("SELECT category_id, addl_category_id FROM " . DB_PREFIX . "wanted_ads WHERE 
		owner_id='" . $user_id . "' AND active=" . $cnt_active . " AND closed=0 AND deleted!=1");

    while ($item_details = $db->fetch_array($sql_select_wa)) {
      wanted_counter($item_details['category_id'], $operation);
      wanted_counter($item_details['addl_category_id'], $operation);
    }
  }

  function user_account_management($user_id, $active) {
    global $db;

    $operation = ($active == 1) ? 'add' : 'remove';

    ## if the activation is done through the admin, the payment_status flag will always be set to confirmed so the account_payment 
    ## issue doesnt come into play anymore
    $db->query("UPDATE " . DB_PREFIX . "users SET active=" . $active . ", payment_status='confirmed' WHERE user_id='" . $user_id . "'");

    user_counter($user_id, $operation);
    $db->query("UPDATE " . DB_PREFIX . "auctions SET active=" . $active . " WHERE owner_id='" . $user_id . "'");
    $db->query("UPDATE " . DB_PREFIX . "wanted_ads SET active=" . $active . " WHERE owner_id='" . $user_id . "'");
  }

  function send_mail($to, $subject, $text_message, $from_email, $html_message = null, $from_name = null, $send = true) {
    global $setts, $current_version;

    if ($send) {
      ## set date
      $tz = date('Z');
      $tzs = ($tz < 0) ? '-' : '+';
      $tz = abs($tz);
      $tz = ($tz / 3600) * 100 + ($tz % 3600) / 60;
      $mail_date = sprintf('%s %s%04d', date('D, j M Y H:i:s'), $tzs, $tz);

      $uniq_id = md5(uniqid(time()));

      ## create the message body
      $html_message = ($html_message) ? $html_message : $text_message;

      $html_msg = "<!--\n" . $text_message . "\n-->\n" .
        "<html><body><img src=\"" . SITE_PATH . "images/myphpauction.gif\"><p>" . EMAIL_FONT . $html_message . "</body></html>";

      $from_name = ($from_name) ? $from_name : $from_email;
      switch ($setts['mailer']) {
        case 'sendmail': ## send through the UNIX Sendmail function
          ## create header
          $header = "Date: " . $mail_date . "\n" .
            "Return-Path: " . $from_email . "\n" .
            "To: " . $to . "\n" .
            "From: " . $from_name . " <" . $from_email . ">\n" .
            (($setts['enable_bcc']) ? "Bcc: " . $setts['admin_email'] . "\n" : "") .
            "Reply-to: " . $from_email . "\n" .
            "Subject: " . $subject . "\n" .
            sprintf("Message-ID: <%s@%s>%s", $uniq_id, $_SERVER['SERVER_NAME'], "\n") .
            "X-Priority: 3\n" .
            "X-Mailer: MyPHPAuction/Sendmail [version " . $current_version . "]\n" .
            "MIME-Version: 1.0\n" .
            "Content-Transfer-Encoding: 7bit\n" .
            sprintf("Content-Type: %s; charset=\"%s\"", "text/html", "utf-8") .
            "\n\n";

          if ($from_email) {
            $output = sprintf("%s -oi -f %s -t", $setts['sendmail_path'], $from_email);
          }
          else {
            $output = sprintf("%s -oi -t", $setts['sendmail_path']);
          }

          if (!@$mail = popen($output, "w")) {
            echo GMSG_COULDNT_EXECUTE . ': ' . $setts['sendmail_path'];
          }

          fputs($mail, $header);
          fputs($mail, $html_msg);

          $result = pclose($mail) >> 8 & 0xFF;

          if ($result != 0) {
            echo GMSG_COULDNT_EXECUTE . ': ' . $setts['sendmail_path'];
          }
          break;

        case 'mail':
          ## send through the PHP mail() function
          ## create header
          $boundary[1] = "b1_" . $uniq_id;
          $boundary[2] = "b2_" . $uniq_id;

          $header = "Date: " . $mail_date . "\n" .
            "Return-Path: " . $from_email . "\n" .
            "From: " . $from_name . " <" . $from_email . ">\n" .
            (($setts['enable_bcc']) ? "Bcc: " . $setts['admin_email'] . "\n" : "") .
            "Reply-to: " . $from_email . "\n" .
            sprintf("Message-ID: <%s@%s>%s", $uniq_id, $_SERVER['SERVER_NAME'], "\n") .
            "X-Priority: 3\n" .
            "X-Mailer: MyPHPAuction/Sendmail [version " . $current_version . "]\n" .
            "MIME-Version: 1.0\n" .
            "Content-Transfer-Encoding: 7bit\n" .
            sprintf("Content-Type: %s; charset=\"%s\"", "text/html", "utf-8") .
            $params = sprintf("-oi -f %s", $from_email);

          if (strlen(ini_get('safe_mode')) < 1) {
            $old_from = ini_get('sendmail_from');
            ini_set("sendmail_from", $from_email);
            $result = @mail($to, $subject, $html_msg, $header, $params);
          }
          else {
            $result = @mail($to, $subject, $html_msg, $header);
          }

          if (isset($old_from)) {
            ini_set("sendmail_from", $old_from);
          }

          if (!$result) {
            echo GMSG_MAIL_SENDING_FAILED;
          }

          //echo '<br>' . $html_msg;
          break;
      }
    }
  }

  function suspend_debit_users() {
    global $db, $fees, $setts, $session, $parent_dir;
    (array) $addl_query = null;
    $remove_session = false;

    if ($setts['suspend_over_bal_users']) {
      $addl_query[] = "balance>max_credit"; // suspend if max_credit is exceeded

      if ($setts['account_mode_personal'] == 1) {
        $addl_query[] = "payment_mode=2"; // personal mode, only suspend users that have account mode enabled
      }

      $query = $db->implode_array($addl_query, ' AND ');

      if ($setts['account_mode'] == 2 || $setts['account_mode_personal'] == 1) {
        $sql_select_users = $db->query("SELECT user_id FROM " . DB_PREFIX . "users WHERE 
				active=1 AND " . $query);

        while ($user_details = $db->fetch_array($sql_select_users)) {
          user_account_management($user_details['user_id'], 0);

          $mail_input_id = $user_details['user_id'];
          include ($parent_dir . 'language/' . $setts['site_lang'] . '/mails/exceeded_balance_user_notification.php');
          if ($session->value('user_id') == $user_details['user_id']) {
            $remove_session = true;
          }
        }
      }
    }

    return $remove_session;
  }

  function last_char($value, $char = ',') {
    $value = trim($value);
    $last_char = substr($value, -1);

    $value = ($last_char == $char) ? substr($value, 0, -1) : $value;

    return $value;
  }

  function paypal_countries_list() {
    $output = array(
      'UNITED KINGDOM' => 'GB',
      'UNITED STATES' => 'US',
      'CANADA' => 'CA',
      'AUSTRALIA' => 'AU',
      'AFGHANISTAN' => 'AF',
      'ALAND ISLANDS' => 'AX',
      'ALBANIA' => 'AL',
      'ALGERIA' => 'DZ',
      'AMERICAN SAMOA' => 'AS',
      'ANDORRA' => 'AD',
      'ANGOLA' => 'AO',
      'ANGUILLA' => 'AI',
      'ANTARCTICA' => 'AQ',
      'ANTIGUA AND BARBUDA' => 'AG',
      'ARGENTINA' => 'AR',
      'ARMENIA' => 'AM',
      'ARUBA' => 'AW',
      'AUSTRIA' => 'AT',
      'AZERBAIJAN' => 'AZ',
      'BAHAMAS' => 'BS',
      'BAHRAIN' => 'BH',
      'BANGLADESH' => 'BD',
      'BARBADOS' => 'BB',
      'BELARUS' => 'BY',
      'BELGIUM' => 'BE',
      'BELIZE' => 'BZ',
      'BENIN' => 'BJ',
      'BERMUDA' => 'BM',
      'BHUTAN' => 'BT',
      'BOLIVIA' => 'BO',
      'BOSNIA AND HERZEGOVINA' => 'BA',
      'BOTSWANA' => 'BW',
      'BOUVET ISLAND' => 'BV',
      'BRAZIL' => 'BR',
      'BRITISH INDIAN OCEAN TERRITORY' => 'IO',
      'BRUNEI DARUSSALAM' => 'BN',
      'BULGARIA' => 'BG',
      'BURKINA FASO' => 'BF',
      'BURUNDI' => 'BI',
      'CAMBODIA' => 'KH',
      'CAMEROON' => 'CM',
      'CAPE VERDE' => 'CV',
      'CAYMAN ISLANDS' => 'KY',
      'CENTRAL AFRICAN REPUBLIC' => 'CF',
      'CHAD' => 'TD',
      'CHILE' => 'CL',
      'CHINA' => 'CN',
      'CHRISTMAS ISLAND' => 'CX',
      'COCOS (KEELING) ISLANDS' => 'CC',
      'COLOMBIA' => 'CO',
      'COMOROS' => 'KM',
      'CONGO' => 'CG',
      'CONGO, THE DEMOCRATIC REPUBLIC OF THE' => 'CD',
      'COOK ISLANDS' => 'CK',
      'COSTA RICA' => 'CR',
      'CÔTE D\'IVOIRE' => 'CI',
      'CROATIA' => 'HR',
      'CUBA' => 'CU',
      'CYPRUS' => 'CY',
      'CZECH REPUBLIC' => 'CZ',
      'DENMARK' => 'DK',
      'DJIBOUTI' => 'DJ',
      'DOMINICA' => 'DM',
      'DOMINICAN REPUBLIC' => 'DO',
      'ECUADOR' => 'EC',
      'EGYPT' => 'EG',
      'EL SALVADOR' => 'SV',
      'EQUATORIAL GUINEA' => 'GQ',
      'ERITREA' => 'ER',
      'ESTONIA' => 'EE',
      'ETHIOPIA' => 'ET',
      'FALKLAND ISLANDS (MALVINAS)' => 'FK',
      'FAROE ISLANDS' => 'FO',
      'FIJI' => 'FJ',
      'FINLAND' => 'FI',
      'FRANCE' => 'FR',
      'FRENCH GUIANA' => 'GF',
      'FRENCH POLYNESIA' => 'PF',
      'FRENCH SOUTHERN TERRITORIES' => 'TF',
      'GABON' => 'GA',
      'GAMBIA' => 'GM',
      'GEORGIA' => 'GE',
      'GERMANY' => 'DE',
      'GHANA' => 'GH',
      'GIBRALTAR' => 'GI',
      'GREECE' => 'GR',
      'GREENLAND' => 'GL',
      'GRENADA' => 'GD',
      'GUADELOUPE' => 'GP',
      'GUAM' => 'GU',
      'GUATEMALA' => 'GT',
      'GUERNSEY' => 'GG',
      'GUINEA' => 'GN',
      'GUINEA-BISSAU' => 'GW',
      'GUYANA' => 'GY',
      'HAITI' => 'HT',
      'HEARD ISLAND AND MCDONALD ISLANDS' => 'HM',
      'HOLY SEE (VATICAN CITY STATE)' => 'VA',
      'HONDURAS' => 'HN',
      'HONG KONG' => 'HK',
      'HUNGARY' => 'HU',
      'ICELAND' => 'IS',
      'INDIA' => 'IN',
      'INDONESIA' => 'ID',
      'IRAN, ISLAMIC REPUBLIC OF' => 'IR',
      'IRAQ' => 'IQ',
      'IRELAND' => 'IE',
      'ISLE OF MAN' => 'IM',
      'ISRAEL' => 'IL',
      'ITALY' => 'IT',
      'JAMAICA' => 'JM',
      'JAPAN' => 'JP',
      'JERSEY' => 'JE',
      'JORDAN' => 'JO',
      'KAZAKHSTAN' => 'KZ',
      'KENYA' => 'KE',
      'KIRIBATI' => 'KI',
      'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF' => 'KP',
      'KOREA, REPUBLIC OF' => 'KR',
      'KUWAIT' => 'KW',
      'KYRGYZSTAN' => 'KG',
      'LAO PEOPLE\'S DEMOCRATIC REPUBLIC' => 'LA',
      'LATVIA' => 'LV',
      'LEBANON' => 'LB',
      'LESOTHO' => 'LS',
      'LIBERIA' => 'LR',
      'LIBYAN ARAB JAMAHIRIYA' => 'LY',
      'LIECHTENSTEIN' => 'LI',
      'LITHUANIA' => 'LT',
      'LUXEMBOURG' => 'LU',
      'MACAO' => 'MO',
      'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF' => 'MK',
      'MADAGASCAR' => 'MG',
      'MALAWI' => 'MW',
      'MALAYSIA' => 'MY',
      'MALDIVES' => 'MV',
      'MALI' => 'ML',
      'MALTA' => 'MT',
      'MARSHALL ISLANDS' => 'MH',
      'MARTINIQUE' => 'MQ',
      'MAURITANIA' => 'MR',
      'MAURITIUS' => 'MU',
      'MAYOTTE' => 'YT',
      'MEXICO' => 'MX',
      'MICRONESIA, FEDERATED STATES OF' => 'FM',
      'MOLDOVA, REPUBLIC OF' => 'MD',
      'MONACO' => 'MC',
      'MONGOLIA' => 'MN',
      'MONTENEGRO' => 'ME',
      'MONTSERRAT' => 'MS',
      'MOROCCO' => 'MA',
      'MOZAMBIQUE' => 'MZ',
      'MYANMAR' => 'MM',
      'NAMIBIA' => 'NA',
      'NAURU' => 'NR',
      'NEPAL' => 'NP',
      'NETHERLANDS' => 'NL',
      'NETHERLANDS ANTILLES' => 'AN',
      'NEW CALEDONIA' => 'NC',
      'NEW ZEALAND' => 'NZ',
      'NICARAGUA' => 'NI',
      'NIGER' => 'NE',
      'NIGERIA' => 'NG',
      'NIUE' => 'NU',
      'NORFOLK ISLAND' => 'NF',
      'NORTHERN MARIANA ISLANDS' => 'MP',
      'NORWAY' => 'NO',
      'OMAN' => 'OM',
      'PAKISTAN' => 'PK',
      'PALAU' => 'PW',
      'PALESTINIAN TERRITORY, OCCUPIED' => 'PS',
      'PANAMA' => 'PA',
      'PAPUA NEW GUINEA' => 'PG',
      'PARAGUAY' => 'PY',
      'PERU' => 'PE',
      'PHILIPPINES' => 'PH',
      'PITCAIRN' => 'PN',
      'POLAND' => 'PL',
      'PORTUGAL' => 'PT',
      'PUERTO RICO' => 'PR',
      'QATAR' => 'QA',
      'RÉUNION' => 'RE',
      'ROMANIA' => 'RO',
      'RUSSIAN FEDERATION' => 'RU',
      'RWANDA' => 'RW',
      'SAINT BARTHÉLEMY' => 'BL',
      'SAINT HELENA' => 'SH',
      'SAINT KITTS AND NEVIS' => 'KN',
      'SAINT LUCIA' => 'LC',
      'SAINT MARTIN' => 'MF',
      'SAINT PIERRE AND MIQUELON' => 'PM',
      'SAINT VINCENT AND THE GRENADINES' => 'VC',
      'SAMOA' => 'WS',
      'SAN MARINO' => 'SM',
      'SAO TOME AND PRINCIPE' => 'ST',
      'SAUDI ARABIA' => 'SA',
      'SENEGAL' => 'SN',
      'SERBIA' => 'RS',
      'SEYCHELLES' => 'SC',
      'SIERRA LEONE' => 'SL',
      'SINGAPORE' => 'SG',
      'SLOVAKIA' => 'SK',
      'SLOVENIA' => 'SI',
      'SOLOMON ISLANDS' => 'SB',
      'SOMALIA' => 'SO',
      'SOUTH AFRICA' => 'ZA',
      'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS' => 'GS',
      'SPAIN' => 'ES',
      'SRI LANKA' => 'LK',
      'SUDAN' => 'SD',
      'SURINAME' => 'SR',
      'SVALBARD AND JAN MAYEN' => 'SJ',
      'SWAZILAND' => 'SZ',
      'SWEDEN' => 'SE',
      'SWITZERLAND' => 'CH',
      'SYRIAN ARAB REPUBLIC' => 'SY',
      'TAIWAN, PROVINCE OF CHINA' => 'TW',
      'TAJIKISTAN' => 'TJ',
      'TANZANIA, UNITED REPUBLIC OF' => 'TZ',
      'THAILAND' => 'TH',
      'TIMOR-LESTE' => 'TL',
      'TOGO' => 'TG',
      'TOKELAU' => 'TK',
      'TONGA' => 'TO',
      'TRINIDAD AND TOBAGO' => 'TT',
      'TUNISIA' => 'TN',
      'TURKEY' => 'TR',
      'TURKMENISTAN' => 'TM',
      'TURKS AND CAICOS ISLANDS' => 'TC',
      'TUVALU' => 'TV',
      'UGANDA' => 'UG',
      'UKRAINE' => 'UA',
      'UNITED ARAB EMIRATES' => 'AE',
      'UNITED STATES MINOR OUTLYING ISLANDS' => 'UM',
      'URUGUAY' => 'UY',
      'UZBEKISTAN' => 'UZ',
      'VANUATU' => 'VU',
      'VENEZUELA' => 'VE',
      'VIET NAM' => 'VN',
      'VIRGIN ISLANDS, BRITISH' => 'VG',
      'VIRGIN ISLANDS, U.S.' => 'VI',
      'WALLIS AND FUTUNA' => 'WF',
      'WESTERN SAHARA' => 'EH',
      'YEMEN' => 'YE',
      'ZAMBIA' => 'ZM',
      'ZIMBABWE' => 'ZW'
    );

    return $output;
  }

  function paypal_countries_drop_down($selected_country, $form_name = 'manage_account_form') {
    (string) $display_output = null;

    $countries_array = paypal_countries_list();

    $display_output = '<select name="paypal_country" onchange="submit_form(' . $form_name . ')"> ';
    foreach ($countries_array as $key => $value) {
      $display_output .= '<option value="' . $value . '" ' . (($value == $selected_country) ? 'selected' : '') . '>' . $key . '</option> ';
    }
    $display_output .= '</select>';

    return $display_output;
  }

  function optimize_search_string($keywords) {
    //$output = eregi_replace(' ', ' +', $keywords);
    $output = preg_replace('/ /i', ' +', $keywords);

    return $output;
  }

  function get_server_load() {
    $output = GMSG_NA;
    $os = strtolower(PHP_OS);

    if (strpos($os, "win") === false) {
      if (@file_exists("/proc/loadavg")) {
        $load = @file_get_contents("/proc/loadavg");
        $load = @explode(' ', $load);

        $output = $load[0];
      }
      else if (@function_exists("shell_exec")) {
        $load = @explode(' ', `uptime`);
        $output = $load[count($load) - 1];
      }
    }

    return ($output > 0) ? $output : GMSG_NA;
  }

  function get_slide_url() {
    $dir = '/home/adamo/public_html/themes/red/nivo_slider/images';
    $allFiles = scandir($dir);
    $files = array_diff($allFiles, array('.', '..'));
    return $files;
  }

  function get_home_cat() {
    global $db;
    $sql = "SELECT category_id, name FROM " . DB_PREFIX . "categories WHERE parent_id=0 ORDER BY order_id ASC, name ASC LIMIT 10";
    $sql_select_home_cats = $db->query($sql);
    $x = 0;
    $home_cats_list = array();
    while ($result = $db->fetch_array($sql_select_home_cats)) {
      $home_cats_list[$x]['cat_id'] = $result['category_id'];
      $home_cats_list[$x]['name'] = $result['name'];
      $x++;
    };
    return $home_cats_list;
  }

// lay cat ra menu trai
  function get_home_sub_cat($parent_id) {
    global $db;
    $sql = "SELECT category_id, name FROM " . DB_PREFIX . "categories WHERE parent_id=" . $parent_id . " ORDER BY order_id ASC, name ASC";
    $sql_select_home_sub_cats = $db->query($sql);
    $x = 0;
    $home_sub_cats_list = array();
    while ($result = $db->fetch_array($sql_select_home_sub_cats)) {
      $home_sub_cats_list[$x]['cat_id'] = $result['category_id'];
      $home_sub_cats_list[$x]['name'] = $result['name'];
      $x++;
    };
    return $home_sub_cats_list;
  }

  function get_tab_sub_cats($cats) {
    global $db;
    $cats2 = array();
    for ($i = 0; $i < count($cats); $i++) {
      $subcat = $db->query("SELECT category_id FROM " . DB_PREFIX . "categories WHERE parent_id=" . $cats[$i] . " ORDER BY order_id ASC, name ASC");
      $x = 0;
      $key = $cats[$i];
      while ($result = $db->fetch_array($subcat)) {
        $cats2[$key][$x] = $result['category_id'];
        $x++;
      }
    }
    return $cats2;
  }

  function get_tab_sub_cats2($cats) {
    global $db;
    $cats3 = array();
    foreach ($cats as $key => $value) {
      for ($i = 0; $i < count($cats[$key]); $i++) {
        $id = intval($cats[$key][$i]);
        $subcat = $db->query("SELECT category_id FROM " . DB_PREFIX . "categories WHERE parent_id=" . $id . " ORDER BY name ASC");
        $x = 0;
        $key2 = $cats[$key][$i];
        $cats3[$key][$key2] = array(0);
        while ($result = $db->fetch_array($subcat)) {
          $key3 = $result['category_id'];
          $cats3[$key][$key2][$key3] = 0;
          $x++;
        }
      }
    }
    return $cats3;
  }

  function array_keys_multi(array $array) {
    $keys = array();

    foreach ($array as $key => $value) {
      $keys[] = $key;

      if (is_array($array[$key])) {
        $keys = array_merge($keys, array_keys_multi($array[$key]));
      }
    }

    return $keys;
  }

  function remove_zero(array $array) {
    foreach ($array as $array_key => $array_item) {
      if ($array[$array_key] == 0) {
        unset($array[$array_key]);
      }
    }
    return $array;
  }

  function get_all_subcats(array $cat) {
    $cats2 = get_tab_sub_cats($cat);
    $cats3 = get_tab_sub_cats2($cats2);
    $x = 0;
    foreach ($cat as $k => $v) {
      $keys[$v] = array($v);
      $subkeys = array_keys_multi($cats3[$v]);
      $cat_tabs = remove_zero(array_merge($keys[$v], $subkeys));
      $x++;
    }
    return $cat_tabs;
  }

  function get_cat_name(array $cats) {
    $cats_list = implode(',', $cats);
    global $db;
    $sql = "SELECT category_id, name FROM " . DB_PREFIX . "categories WHERE category_id in (" . $cats_list . ") ORDER BY order_id ASC, name ASC";
    $rows = $db->query($sql);
    $categories = array();
    while ($result = $db->fetch_array($rows)) {
      $key = $result['category_id'];
      $categories[$key] = $result['name'];
    }
    return $categories;
  }

  function get_total_pages(array $sub_cats) {
    $sub_cats_list = implode(',', $sub_cats);
    global $db;
    $sql = "SELECT " . DB_PREFIX . "auctions.name, " . DB_PREFIX . "auctions.auction_id, start_price, buyout_price, max_bid, listing_type, owner_id, media_url, " . DB_PREFIX . "users.username 
	FROM " . DB_PREFIX . "auctions 
	INNER JOIN " . DB_PREFIX . "auction_media ON " . DB_PREFIX . "auctions.auction_id = " . DB_PREFIX . "auction_media.auction_id 
	INNER JOIN " . DB_PREFIX . "users ON " . DB_PREFIX . "users.user_id = " . DB_PREFIX . "auctions.owner_id
	WHERE category_id in (" . $sub_cats_list . ") AND hpfeat=1 AND " . DB_PREFIX . "auctions.approved=1 AND closed=0 group by auction_id ORDER BY auction_id DESC";
    $rows = $db->query($sql);
    $total_pages = 0;
    while ($result = $db->fetch_array($rows)) {
      $total_pages++;
    }
    return $total_pages;
  }

  function get_tab_products(array $sub_cats, $start, $limit) {
    $sub_cats_list = implode(',', $sub_cats);
    global $db;
    $sql = "SELECT " . DB_PREFIX . "auctions.name, " . DB_PREFIX . "auctions.auction_id, start_price, buyout_price, max_bid, listing_type, owner_id, media_url, " . DB_PREFIX . "users.username 
	FROM " . DB_PREFIX . "auctions 
	INNER JOIN " . DB_PREFIX . "auction_media ON " . DB_PREFIX . "auctions.auction_id = " . DB_PREFIX . "auction_media.auction_id 
	INNER JOIN " . DB_PREFIX . "users ON " . DB_PREFIX . "users.user_id = " . DB_PREFIX . "auctions.owner_id
	WHERE category_id in (" . $sub_cats_list . ") AND hpfeat=1 AND " . DB_PREFIX . "auctions.approved=1 AND closed=0 group by auction_id ORDER BY auction_id DESC LIMIT " . $start . "," . $limit . "";
    $rows = $db->query($sql);
    $i = 0;
    while ($result = $db->fetch_array($rows)) {
      $products[$i]['name'] = $result['name'];
      $products[$i]['auction_id'] = $result['auction_id'];
      $products[$i]['start_price'] = $result['start_price'];
      $products[$i]['buyout_price'] = $result['buyout_price'];
      $products[$i]['max_bid'] = $result['max_bid'];
      $products[$i]['listing_type'] = $result['listing_type'];
      $products[$i]['media_url'] = $result['media_url'];
      $products[$i]['username'] = $result['username'];
      $products[$i]['owner_id'] = $result['owner_id'];
      $i++;
    }

    return $products;
  }
?>