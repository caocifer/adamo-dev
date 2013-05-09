<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  session_start();

  define('IN_ADMIN', 1);

  include_once ('../includes/global.php');

  include_once ('../includes/class_site_content.php');

  if ($session->value('adminarea') != 'Active') {
    header_redirect('login.php');
  }
  else {
    include_once ('header.php');

    $site_content = new site_content();

    (string) $management_box = NULL;

    $selected_lang = ($_REQUEST['language']) ? $_REQUEST['language'] : $setts['site_lang'];
    $template->set('selected_lang', $selected_lang);

    $languages_dropdown = list_languages('admin', true, $selected_lang);
    $template->set('languages_dropdown', $languages_dropdown);

    //$template->set('db', $db);

    $file_name = '../language/' . $selected_lang . '/mails/' . $_REQUEST['file_path'];
    $template->set('file_path', $_REQUEST['file_path']);

    if (isset($_POST['form_save_settings'])) {
      $save_file_output = save_file($file_name, $db->rem_special_chars($_POST['file_content']));

      $msg_changes_saved = '<p align="center" class="contentfont">' . $save_file_output . '</p>';
      $template->set('msg_changes_saved', $msg_changes_saved);
    }

    (string) $file_content = null;
    (string) $email_files_list = null;

    if ($_REQUEST['file_path']) {
      $email_files_list .= '<tr class="c1"> ' .
        '	<td width="150" align="right">' . AMSG_SELECTED_FILE . '</td> ' .
        '	<td>' . $file_name . ' [ <a href="content_system_emails.php?language=' . $selected_lang . '">' . GMSG_CHANGE . '</a> ]</td> ' .
        '</tr>';

      $fp = fopen($file_name, "r");

      while (!feof($fp)) {
        $file_content .= fgets($fp, 4096);
      }
      fclose($fp);
    }
    else {
      $dir = substr($_SERVER['SCRIPT_FILENAME'], 0, -31);

      $files_list = opendir($dir . 'language/' . $selected_lang . '/mails/');

      while ($file = readdir($files_list)) {
        if ($file != '..' && $file != '.' && $file != '' && $file != 'index.htm') {
          $background = ($counter++ % 2) ? 'c1' : 'c2';

          $file = substr($file, 0, -4);

          $email_files_list .= '<tr class="' . $background . '"> ' .
            '	<td> <img src="images/a.gif" align="absmiddle"> <a href="content_system_emails.php?language=' . $selected_lang . '&file_path=' . $file . '.php">' . $file . '</a></td> ' .
            '</tr>';
        }
      }
      closedir($files_list);
      clearstatcache();
    }
    $template->set('email_files_list', $email_files_list);

    $template->set('file_content', $file_content);

    $template->set('header_section', AMSG_SITE_CONTENT);
    $template->set('subpage_title', AMSG_EDIT_SYSTEM_EMAILS);

    $template_output .= $template->process('content_system_emails.tpl.php');

    include_once ('footer.php');

    echo $template_output;
  }
?>