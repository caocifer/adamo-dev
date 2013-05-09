<?php
  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <html>
    <head>
      <title><?php echo $page_title; ?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php echo $page_meta_tags; ?>
        <link href="themes/<?php echo $setts['default_theme']; ?>/style.css" rel="stylesheet" type="text/css">
          <link href="themes/<?php echo $setts['default_theme']; ?>/main_fl.css" rel="stylesheet" type="text/css">
            <style type="text/css">
              <!--
              .lb {
                background-image:  url(themes/<?php echo $setts['default_theme']; ?>/img/lb_bg.gif);
              }
              .db {
                background-image:  url(themes/<?php echo $setts['default_theme']; ?>/img/db_bg.gif);
              }
              <?php
                if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "register.php") {
                  echo ".main_table {	width:930px; float:left; margin-left:10px}";
                }
              ?> 

              <?php
                if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "categories.php") {
                  echo ".main_table { width:97%; margin-left:20px; margin-right:20px}";
                }
              ?> 
<?php
  if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "auction_search.php") {
    echo ".main_table { width:97%; margin-left:20px; margin-right:20px}";
  }
?> 
              -->
            </style>
            <script language="javascript" src="themes/<?php echo $setts['default_theme']; ?>/main.js" type="text/javascript"></script>
            <script type="text/javascript" src="themes/<?php echo $setts['default_theme']; ?>/countdownpro.js" defer="defer"></script>
<?php
  for ($i = 1; $i < 50; $i++) {
    ?><meta scheme="countdown<?php echo $i; ?>" name="event_msg" content="CLOSED"><?php
  }
?>
              <script language=JavaScript src='scripts/innovaeditor.js'></script>
              <script type="text/javascript">
                var currenttime = '<?php echo $current_time_display; ?>';
                var serverdate = new Date(currenttime);

                function padlength(what) {
                  var output = (what.toString().length == 1) ? "0" + what : what;
                  return output;
                }

                function displaytime() {
                  serverdate.setSeconds(serverdate.getSeconds() + 1)
                  var timestring = padlength(serverdate.getHours()) + ":" + padlength(serverdate.getMinutes()) + ":" + padlength(serverdate.getSeconds());
                  document.getElementById("servertime").innerHTML = timestring;
                }

                window.onload = function() {
                  setInterval("displaytime()", 1000);
                }

              </script>
              </head>
              <body>
                <table border="0" cellpadding="0" cellspacing="0" class="main_table">
                  <tr>
                    <td>

                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr valign="bottom">
                          <td valign="bottom" style="width:5%"><div style="float:left"><a href="<?php echo $index_link; ?>"><img src="images/myphpauction.gif?<?php echo rand(2, 9999); ?>" alt="" vspace="4" border="0"></a></div>
                          </td>
                          <td width="30%" valign="bottom" style="padding-bottom:5px">Welcome, <?php if ($member_active == 'Active') {
    ;
    ?> <?php echo $member_username; ?> (<a href="<?php echo $login_link; ?>"><?php echo $login_btn_msg; ?></a>) <?php
  }
  else {
    ;
    ?><a href="login.php">Sign in</a> or <a href="register.php">register</a><?php } ?>
                          </td>
                          <td valign="top">




                            <div class="toplink" style=" float:right;<?php
                            if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "register.php") {
                              echo "display:none";
                            }
?> <?php
                            if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "login.php") {
                              echo "display:none";
                            }
?>"> <!--!!!!!!!!!!!!without right menu-->
                              <div class="nav_r">
                                <div class="nav_l">	
                                  <div class="nav">  
                                    <div>


                                      <table cellspacing="0" cellpadding="0" border="0">
                                        <tbody><tr align="center">

                                            <td nowrap class="mainmenu">&nbsp;<a  style="color:#000000" href="<?php echo $place_ad_link; ?>"><?php echo $place_ad_btn_msg; ?></a>&nbsp;</td>



                                            <td nowrap="" class="mainmenu" style="display:none"><a style="color:#000000" href="<?php echo $index_link; ?>"><?php echo MSG_BTN_HOME; ?></a></td>
                                            <td nowrap="" class="mainmenu"><a style="color:#000000" href="<?php echo process_link('content_pages', array('page' => 'faq')); ?>"><?php echo MSG_BTN_FAQ; ?></a>   <?php if ($layout['is_about']) { ?></td>
                                                <td nowrap="" class="mainmenu"><a style="color:#000000" href="<?php echo process_link('content_pages', array('page' => 'about_us')); ?>"><?php echo MSG_BTN_ABOUT_US; ?></a><?php } ?><?php if ($layout['is_contact']) { ?></td>

                                                <td nowrap class="mainmenu" style=" border-right:none">&nbsp;<a style="color:#000000" href="<?php echo process_link('content_pages', array('page' => 'help')); ?>"><?php echo MSG_BTN_HELP; ?></a>&nbsp;</td>
                                              </tr>
                                            </tbody></table>

                                          <div style="float:right; margin-top:10px; font-weight:400">
                                            <a style="color:#0000CC;"href="<?php echo process_link('content_pages', array('page' => 'contact_us')); ?>"><?php echo MSG_BTN_CONTACT_US; ?></a><?php } ?>
                                      </div>

                            <?php /* ?>          		
                                <a href="<?php echo $index_link;?>"><?php echo MSG_BTN_HOME;?></a> | <a href="<?php echo process_link('content_pages', array('page' => 'faq'));?>"><?php echo MSG_BTN_FAQ;?></a>   <?php if ($layout['is_about']) { ?> | <a href="<?php echo process_link('content_pages', array('page' => 'about_us'));?>"><?php echo MSG_BTN_ABOUT_US;?></a><?php } ?><?php if ($layout['is_contact']) { ?> | <a href="<?php echo process_link('content_pages', array('page' => 'contact_us'));?>"><?php echo MSG_BTN_CONTACT_US;?></a><?php } ?>
                                <?php */ ?>
                                    </div>
                                  </div>					
                                </div>
                              </div>
                            </div>


                            <div style="float:right; background:url(themes/<?php echo $setts['default_theme']; ?>/images/imgHdrMainNavSearchRgt2.gif) bottom right no-repeat; margin-right:10px; <?php
                                 if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "auction_details.php") {
                                   echo " ";
                                 }
                                 else {
                                   echo "display:none";
                                 }
                            ?> ">
                              <div style="float:right; background:url(themes/<?php echo $setts['default_theme']; ?>/images/imgHdrMainNavSearchLft2.gif) bottom left no-repeat; padding:3px 10px">

                                <form action="auction_search.php" method="post">
                                  <input type="hidden" name="option" value="basic_search">            
                                    <input type="text" size="15" name="basic_search" maxlength="300" style="width:120px">
                                      <input name="form_basic_search" type="submit" value="<?php echo GMSG_SEARCH; ?>">
                                        </form>

                                        </div></div>

                                        </td>
                                        </tr>
                                        </table>

                                        <div class="srchBox_r">
                                          <div class="srchBox_l">
                                            <div class="srchBox" style="<?php
                                            if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "register.php") {
                                              echo "display:none";
                                            }
                            ?> <?php
                                            if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "login.php") {
                                              echo "display:none";
                                            }
                            ?> <?php
                                                  if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "auction_details.php") {
                                                    echo "display:none";
                                                  }
                            ?> "><!--without search-->
                                              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <form action="auction_search.php" method="post">
                                                    <input type="hidden" name="option" value="basic_search">

                                                      <td class="search" nowrap width="230"><input type="text" size="25" name="basic_search" maxlength="300" style="width:380px">&nbsp;&nbsp;&nbsp;</td>
                                                      <td class="search" nowrap width="100"><input name="form_basic_search" type="submit" value="<?php echo GMSG_SEARCH; ?>">&nbsp;&nbsp;&nbsp;</td>
                                                  </form>
                                                  <td class="search" nowrap width="50">&nbsp;&nbsp;&nbsp;<?php echo GMSG_BROWSE; ?>&nbsp;&nbsp;</td>
                                                  <form name="cat_browse_form" method="get" action="categories.php">
                                                    <td class="search"><?php echo $categories_browse_box; ?></td>
                                                  </form>
                                                  <td nowrap align="right" class="search" width="200">&nbsp;&nbsp;&nbsp;<?php echo $current_date; ?> <span id="servertime"></span>&nbsp;&nbsp;&nbsp;</td>
                                                  <!--<?php if ($setts['user_lang']) { ?>
                                                          <td nowrap align="center">&nbsp;&nbsp;<?php echo $languages_list; ?>&nbsp;&nbsp;</td>
  <?php } ?>-->
                                                </tr>
                                              </table>
                                            </div></div></div>
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td class="brnd1"></td>
                                            <td class="brnd2"></td>
                                            <td class="brnd3"></td>
                                            <td class="brnd4"></td>
                                            <td class="brnd5"></td>
                                            <td class="brnd6"></td>
                                            <td class="brnd7"></td>
                                          </tr>
                                          <tr>
                                            <td class="brnd8"></td>
                                            <td class="brnd8"></td>
                                            <td class="brnd8"></td>
                                            <td class="brnd8"></td>
                                            <td class="brnd8"></td>
                                            <td class="brnd8"></td>
                                            <td class="brnd8"></td>
                                          </tr>
                                        </table>
                                        <div class="nav_r">
                                          <div class="nav_l">	
                                            <div class="nav" style="<?php
                                                    if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "register.php") {
                                                      echo "display:none";
                                                    }
                                                  ?> <?php
                                                  if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "login.php") {
                                                    echo "display:none";
                                                  }
                                                  ?>  "> <!--!!!!!!!!!!!!!without menu-->
                                              <table border="0" cellspacing="0" cellpadding="0">
                                                <tr align="center">
                                                  <?php if (stristr($_SERVER['PHP_SELF'], "index.php")) { ?>
                                                      <td nowrap class="mainmenu">&nbsp;<a href="<?php echo $index_link; ?>"><?php echo MSG_BTN_HOME; ?></a>&nbsp;</td>
                                                    <?php }
                                                    else {
                                                      ?>
                                                      <td nowrap class="mainmenu">&nbsp;<a href="<?php echo $index_link; ?>"><?php echo MSG_BTN_HOME; ?></a>&nbsp;</td>
                                                      <?php
                                                    }
                                                    if (!$setts['enable_private_site'] || $is_seller) {
                                                      if (stristr($_SERVER['PHP_SELF'], "sell_item.php")) {
                                                        ?>
                                                        <td nowrap class="mainmenu"style="display:none">&nbsp;<a href="<?php echo $place_ad_link; ?>"><?php echo $place_ad_btn_msg; ?></a>&nbsp;</td>
                                                      <?php }
                                                      else {
                                                        ?>
                                                        <td nowrap class="mainmenu"style="display:none">&nbsp;<a href="<?php echo $place_ad_link; ?>"><?php echo $place_ad_btn_msg; ?></a>&nbsp;</td>
                                                        <?php
                                                      }
                                                    }
                                                    if (stristr($_SERVER['PHP_SELF'], "members_area.php") || stristr($_SERVER['PHP_SELF'], "register.php")) {
                                                      ?>
                                                      <td nowrap class="mainmenu">&nbsp;<a href="<?php echo $register_link; ?>"><?php echo $register_btn_msg; ?></a>&nbsp;</td>
                                                    <?php }
                                                    else {
                                                      ?>
                                                      <td nowrap class="mainmenu" style="display:none">&nbsp;<a href="<?php echo $register_link; ?>"><?php echo $register_btn_msg; ?></a>&nbsp;</td>
                                                    <?php } if (stristr($_SERVER['PHP_SELF'], "login.php")) { ?>
                                                      <td nowrap class="mainmenu"style="display:none">&nbsp;<a href="<?php echo $login_link; ?>"><?php echo $login_btn_msg; ?></a>&nbsp;</td>
                                                    <?php }
                                                    else {
                                                      ?>
                                                      <td nowrap class="mainmenu"style="display:none">&nbsp;<a href="<?php echo $login_link; ?>"><?php echo $login_btn_msg; ?></a>&nbsp;</td>
                                                    <?php
                                                    } if ($setts['enable_stores']) {
                                                      if (stristr($_SERVER['PHP_SELF'], "stores.php")) {
                                                        ?>
                                                        <td nowrap class="mainmenu">&nbsp;<a href="<?php echo process_link('stores'); ?>"><?php echo MSG_BTN_STORES; ?></a>&nbsp;</td>
    <?php }
    else {
      ?>
                                                        <td nowrap class="mainmenu">&nbsp;<a href="<?php echo process_link('stores'); ?>"><?php echo MSG_BTN_STORES; ?></a>&nbsp;</td>
      <?php
    }
  }
  if ($setts['enable_wanted_ads']) {
    if (stristr($_SERVER['PHP_SELF'], "wanted_ads.php")) {
      ?>
                                                        <td nowrap class="mainmenu">&nbsp;<a href="<?php echo process_link('wanted_ads'); ?>"><?php echo MSG_BTN_WANTED_ADS; ?></a>&nbsp;</td>
                                                <?php }
                                                else {
                                                  ?>
                                                        <td nowrap class="mainmenu">&nbsp;<a href="<?php echo process_link('wanted_ads'); ?>"><?php echo MSG_BTN_WANTED_ADS; ?></a>&nbsp;</td>
                                                  <?php
                                                }
                                              }
                                              if ($_REQUEST['page'] == 'help') {
                                                ?>
                                                      <td nowrap class="mainmenu" style="display:none">&nbsp;<a href="<?php echo process_link('content_pages', array('page' => 'help')); ?>"><?php echo MSG_BTN_HELP; ?></a>&nbsp;</td>
  <?php }
  else {
    ?>
                                                      <td nowrap class="mainmenu" style="display:none">&nbsp;<a href="<?php echo process_link('content_pages', array('page' => 'help')); ?>"><?php echo MSG_BTN_HELP; ?></a>&nbsp;</td>
  <?php
  }
  if (stristr($_SERVER['PHP_SELF'], "site_fees.php")) {
    ?>
                                                      <td nowrap class="mainmenu">&nbsp;<a href="<?php echo process_link('site_fees'); ?>"><?php echo MSG_BTN_SITE_FEES; ?></a>&nbsp;</td>
  <?php }
  else {
    ?>
                                                      <td nowrap class="mainmenu">&nbsp;<a href="<?php echo process_link('site_fees'); ?>"><?php echo MSG_BTN_SITE_FEES; ?></a>&nbsp;</td>
  <?php } ?>
                                                </tr>
                                              </table>
                                            </div>
                                          </div>
                                        </div>


                                        <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="10"></div>

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr valign="top">
                                            <td width="180" style="<?php
  if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "register.php") {
    echo "display:none";
  }
?> <?php
  if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "login.php") {
    echo "display:none";
  }
?> <?php
  if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "auction_details.php") {
    echo "display:none";
  }
?>"><script language="javascript">
                                                  var ie4 = false;
                                                  if (document.all) {
                                                    ie4 = true;
                                                  }

                                                  function getObject(id) {
                                                    if (ie4) {
                                                      return document.all[id];
                                                    } else {
                                                      return document.getElementById(id);
                                                    }
                                                  }
                                                  function toggle(link, divId) {
                                                    var lText = link.innerHTML;
                                                    var d = getObject(divId);
                                                    if (lText == '+') {
                                                      link.innerHTML = '&#8211;';
                                                      d.style.display = 'block';
                                                    }
                                                    else {
                                                      link.innerHTML = '+';
                                                      d.style.display = 'none';
                                                    }
                                                  }
                                                </script>
<?php if ($is_announcements && $member_active == 'Active') { ?>
    <?php echo $announcements_box_header; ?>
                                                    <div id="exp1102170555">
    <?php echo $announcements_box_content; ?>
                                                    </div>

                                                    <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
  <?php } ?>

<?php echo $menu_box_header; ?>
                                                <div id="exp1102170142">
                                            <?php echo $menu_box_content; ?>
                                                </div>

                                                <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
                                                <noscript>
                                            <?php echo MSG_JS_NOT_SUPPORTED; ?>
                                                </noscript>
<?php echo $category_box_header; ?>
                                                <div id="exp1102170166">
                                              <?php echo $category_box_content; ?>
                                                </div>
                                                <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="180" height="1"></div>
                                                <br>
<?php if ($setts['enable_header_counter']) { ?>
    <?php echo $header_site_status; ?>
                                                      <table width='100%' border='0' cellpadding='2' cellspacing='1' class='border no_b stat'>
                                                        <tr class='c1'>
                                                          <td width='20%' align='center'><b><?php echo $nb_site_users; ?></b></td>
                                                          <td width='80%'>&nbsp;<?php echo MSG_REGISTERED_USERS; ?></td>
                                                        </tr>
                                                        <tr class='c2'>
                                                          <td width='20%' align='center'><b><?php echo $nb_live_auctions; ?></b></td>
                                                          <td width='80%'>&nbsp;<?php echo MSG_LIVE_AUCTIONS; ?></td>
                                                        </tr>
                                                  <?php if ($setts['enable_wanted_ads']) { ?>
                                                          <tr class='c1'>
                                                            <td width='20%' align='center'><b><?php echo $nb_live_wanted_ads; ?></b></td>
                                                            <td width='80%'>&nbsp;<?php echo MSG_LIVE_WANT_ADS; ?></td>
                                                          </tr>
                                                  <?php } ?>
                                                        <tr class='c2'>
                                                          <td width='20%' align='center'><b><?php echo $nb_online_users; ?></b></td>
                                                          <td width='80%'>&nbsp;<?php echo MSG_ONLINE_USERS; ?></td>
                                                        </tr>
                                                      </table>
                                                      <div class="stat"><div class="nav_r"><div class="nav_l"><div class="nav"></div></div></div></div><?php } ?>
                                                  <div><img src='themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif' width='1' height='5'></div>
                                                  <br />
                                                  <div align="center"><a href="rss_feed.php"><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/rss.gif" border="0" alt="" align="absmiddle"></a></div>

                                            </td>
                                            <td width="10" style="<?php
                                              if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "register.php") {
                                                echo "display:none";
                                              }
                                              ?> <?php
                                              if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "login.php") {
                                                echo "display:none";
                                              }
                                              ?> <?php
                                                if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "auction_details.php") {
                                                  echo "display:none";
                                                }
                                              ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="10" height="1"></td>
                                            <td width="100%">

                                              <?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "index.php") {
                                                  ?>





                                                  <?php if ($member_active != 'Active') { ?>
                                                    <div><a href="<?php echo process_link('register'); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/img/newuser.jpg" border="0"></a></div>
                                                    <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
    <?php } ?>

    <?php if ($is_news && $layout['d_news_box']) { ?>
      <?php echo $news_box_header; ?>
      <?php echo $news_box_content; ?>
    <?php } ?>

    <?php if ($setts['enable_header_counter']) { ?>
                                                    <!-- was status site -->
    <?php } ?>
    <?php if ($layout['bw_hp_stores']) { ?>
                                                    <div><img src='themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif' width='1' height='5'></div>
      <?php echo $hp_featured_stores_header; ?>
      <?php echo $hp_featured_stores_content; ?>
    <?php } ?>

    <?php if ($layout['bw_hp_newusers']) { ?>
                                                    <div><img src='themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif' width='1' height='5'></div>
      <?php echo $hp_newest_members_header; ?>
      <?php echo $hp_newest_members_content; ?>
    <?php } ?>

    <?php if ($layout['bw_hp_mostviewed']) { ?>
                                                    <div><img src='themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif' width='1' height='5'></div>
      <?php echo $hp_most_viewed_header; ?>
      <?php echo $hp_most_viewed_content; ?>
    <?php } ?>

    <?php if ($layout['bw_hp_topsellers']) { ?>
                                                    <div><img src='themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif' width='1' height='5'></div>
      <?php echo $hp_top_sellers_header; ?>
      <?php echo $hp_top_sellers_content; ?>
    <?php } ?>

    <?php if ($layout['bw_hp_lastsold']) { ?>
                                                    <div><img src='themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif' width='1' height='5'></div>
      <?php echo $hp_last_sold_header; ?>
      <?php echo $hp_last_sold_content; ?>
    <?php } ?>
                                                  <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="171" height="1"></div>


  <?php }
?>
