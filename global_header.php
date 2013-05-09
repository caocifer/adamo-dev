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

  $time_start = getmicrotime();
  $currentTime = time();

  include ('themes/' . $setts['default_theme'] . '/title.php');
  $template->change_path('themes/' . $setts['default_theme'] . '/templates/'); ## MyPHPAuction 2009 first generate the page title and meta tags.
  $meta_tags_details = meta_tags($_SERVER['PHP_SELF'], intval($_REQUEST['parent_id']), intval($_REQUEST['auction_id']), intval($_REQUEST['wanted_ad_id']));
  $template->set('page_title', $meta_tags_details['title']);

## we will add lightbox to the variable below to be applied automatically to all skins
  $page_meta_tags = $meta_tags_details['meta_tags'];

  if (stristr($_SERVER['PHP_SELF'], 'auction_details.php')) {
    $page_meta_tags .= '<script type="text/javascript" src="lightbox/js/prototype.js"></script> 
		<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script> 
		<script type="text/javascript" src="lightbox/js/lightbox.js"></script> 
		<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" /> ';
  }

  $template->set('page_meta_tags', $page_meta_tags); ## MyPHPAuction 2009 header buttons and cell width moved to <theme>/title.php

  $current_date = date(DATE_FORMAT, time() + (TIME_OFFSET * 3600));
  $template->set('current_date', $current_date);

  $current_time_display = date("F d, Y H:i:s", time() + (TIME_OFFSET * 3600));
  $template->set('current_time_display', $current_time_display);

  if ($setts['user_lang']) {
    $template->set('languages_list', list_languages('site', false, null, true));
  }## MyPHPAuction 2009 set members/login box
  $menu_box_header = header7(MSG_MEMBERS_AREA_TITLE . ' [<a title="show/hide" class="hidelayer" id="exp1102170142_link" href="javascript: void(0);" onclick="toggle(this, \'exp1102170142\');">&#8211;</a>]');
  $template->set('menu_box_header', $menu_box_header);

  $category_box_header = headercat(MSG_CATEGORIES . ' [<a title="show/hide" class="hidelayer" id="exp1102170166_link" href="javascript: void(0);" onclick="toggle(this, \'exp1102170166\');">&#8211;</a>]');
  $template->set('category_box_header', $category_box_header);

  (string) $category_box_content = null;

  reset($categories_array);

  $categories_browse_box = '<select name="parent_id" id="parent_id" class="contentfont" onChange="javascript:cat_browse_form.submit()"> ' .
    '<option value="" selected>' . MSG_CHOOSE_CATEGORY . '</option>';

  $sql_select_cats_header = $db->query("SELECT category_id, items_counter, hover_title FROM
	" . DB_PREFIX . "categories WHERE parent_id=0 AND hidden=0 AND user_id=0 ORDER BY order_id ASC, name ASC");

  $template->set('category_lang', $category_lang);

  while ($cats_header_details = $db->fetch_array($sql_select_cats_header)) {
    $category_link = process_link('categories', array('category' => $category_lang[$cats_header_details['category_id']], 'parent_id' => $cats_header_details['category_id']));

    $categories_browse_box .= '<option value="' . $cats_header_details['category_id'] . '" ' . (($cats_header_details['category_id'] == $_REQUEST['parent_id']) ? 'selected' : '') . '>' .
      $category_lang[$cats_header_details['category_id']] . '</option> ';
  }

  $categories_browse_box .= '<option value="">------------------------</option> ' .
    '<option value="0">' . MSG_ALL_CATEGORIES . '</option></select>';

  $template->set('categories_browse_box', $categories_browse_box);

  $sql_select_cats_list = $db->query("SELECT category_id, items_counter, hover_title FROM
	" . DB_PREFIX . "categories WHERE parent_id=0 AND hidden=0 AND user_id=0 ORDER BY order_id ASC, name ASC");

  $template->set('sql_select_cats_list', $sql_select_cats_list);

  $category_box_content = $template->process('header_categories_box.tpl.php');
  $template->set('category_box_content', $category_box_content);

  (string) $menu_box_content = NULL;

  if (!$session->value('user_id') && $layout['d_login_box'] && $setts['is_ssl'] != 1) {
    $template->set('redirect', $db->rem_special_chars($_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']));

    $menu_box_content = $template->process('header_login_box.tpl.php');
    $template->set('menu_box_content', $menu_box_content);
  }
  else if (!$session->value('user_id') && $layout['d_login_box'] && $setts['is_ssl'] == 1) {
    $menu_box_content = '<p align="center" class="contentfont">[ <a href="' . process_link('login') . '"><strong>' . MSG_LOGIN_SECURELY . '</strong></a> ]</p>';
    $template->set('menu_box_content', $menu_box_content);
  }
  else if ($session->value('user_id')) {
    $template->set('member_active', $session->value('membersarea'));
    $template->set('member_username', $session->value('username'));

    $is_announcements = $db->count_rows('content_pages', "WHERE MATCH (topic_lang) AGAINST
		('" . $session->value('site_lang') . "*' IN BOOLEAN MODE) AND page_handle='announcements'");

    if ($is_announcements) {
      (string) $announcements_content = null;

      $template->set('is_announcements', 1);

      $announcements_box_header = header6(MSG_ANNOUNCEMENTS . ' [<a title="show/hide" class="hidelayer" id="exp1102170555_link" href="javascript: void(0);" onclick="toggle(this, \'exp1102170555\');">&#8211;</a>]');
      $template->set('announcements_box_header', $announcements_box_header);

      $sql_select_announcements = $db->query("SELECT topic_id, topic_name, reg_date FROM " . DB_PREFIX . "content_pages WHERE
			MATCH (topic_lang) AGAINST	('" . $session->value('site_lang') . "*' IN BOOLEAN MODE) AND
			page_handle='announcements' ORDER BY topic_id DESC LIMIT 0,5");

      while ($announcement_details = $db->fetch_array($sql_select_announcements)) {
        $announcement_content .= '<tr> ' .
          '	<td class="c2"><img src="themes/' . $setts['default_theme'] . '/img/arrow.gif" width="8" height="8" hspace="4"></td> ' .
          '	<td width="100%" class="c2 smallfont"><b>' . show_date($announcement_details['reg_date'], false) . '</b></td> ' .
          '</tr> ' .
          '<tr class="contentfont"> ' .
          '	<td></td> ' .
          '	<td><a href="' . process_link('content_pages', array('page' => 'announcements', 'topic_id' => $announcement_details['topic_id'])) . '"> ' .
          '		' . $announcement_details['topic_name'] . '</a></td> ' .
          '</tr>';
      }
      $template->set('announcement_content', $announcement_content);

      $announcements_box_content = $template->process('header_announcements_box.tpl.php');
      $template->set('announcements_box_content', $announcements_box_content);
    }

    $menu_box_content = $template->process('header_members_menu.tpl.php');
    $template->set('menu_box_content', $menu_box_content);
  }

  if ($setts['enable_header_counter'] && stristr($_SERVER['PHP_SELF'], 'index.php')) {
    $template->set('header_site_status', header5(MSG_SITE_STATUS));

    $template->set('nb_site_users', $db->count_rows('users', "WHERE active='1'"));
    $template->set('nb_live_auctions', $db->count_rows('auctions', "WHERE active='1' AND approved='1' AND closed='0' AND deleted='0' AND creation_in_progress='0'"));
    $template->set('nb_live_wanted_ads', $db->count_rows('wanted_ads', "WHERE active=1 AND closed=0 AND deleted=0"));

    $template->set('nb_online_users', online_users());
  }

  if ($layout['d_news_box']) {
    $is_news = $db->count_rows('content_pages', "WHERE MATCH (topic_lang) AGAINST
		('" . $session->value('site_lang') . "*' IN BOOLEAN MODE) AND page_handle='news'");

    if ($is_news) {
      (string) $news_content = null;

      $template->set('is_news', $is_news);

      $news_box_header = header6(MSG_SITE_NEWS);
      $template->set('news_box_header', $news_box_header);

      $sql_select_news = $db->query("SELECT topic_id, topic_name, reg_date FROM " . DB_PREFIX . "content_pages WHERE
			MATCH (topic_lang) AGAINST	('" . $session->value('site_lang') . "*' IN BOOLEAN MODE) AND
			page_handle='news' ORDER BY topic_id DESC LIMIT 0," . $layout['d_news_nb']);

      $template->set('sql_select_news', $sql_select_news);

      $news_box_content = $template->process('header_news_box.tpl.php');
      $template->set('news_box_content', $news_box_content);
    }
  }

  if ($setts['enable_skin_change']) {
    $template->set('site_skins_dropdown', list_skins('site', true, $session->value('site_theme')));
  }

  $template_output .= $template->process('header.tpl.php');

  if (is_dir('install')) {
    $template_output .= '<p align="center" class="errormessage">' . GMSG_INSTALL_DELETE_MESSAGE . '</p>';
  }

  $template->change_path('templates/');
?>