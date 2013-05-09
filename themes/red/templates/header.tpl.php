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
            <link href="themes/<?php echo $setts['default_theme']; ?>/adamo.css" rel="stylesheet" type="text/css">
              <link href="themes/<?php echo $setts['default_theme']; ?>/reset.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="http://adamo.vn/themes/red/nivo_slider/nivo-slider.css" type="text/css" media="screen" />
                <link rel="stylesheet" href="http://adamo.vn/themes/red/nivo_slider/themes/light/light.css" type="text/css" media="screen" />
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                <script src="http://adamo.vn/themes/red/nivo_slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
                <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
                <!--<link rel="stylesheet" href="http://adamo.vn/themes/red/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
                <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />-->
                <script type="text/javascript">
                  $(window).load(function() {
                    $('#slider').nivoSlider();
                  });
                </script>
                <script>
                  $(function() {
                    $("#tabs").tabs({
                      //define ajax options, since they do it in the demo!
                      // not sure why,what, or if its needed <br>
                      //commented examples sure wouuld eilimate half of the forum posts!
                      ajaxOptions: {
                        error: function(xhr, status, index, anchor) {
                          $(anchor.hash).html(
                                  "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                                  "If this wouldn't be a demo.");
                        }
                      },
                      //make sure to include a comma between the ajaxoptions, and the load options
                      //this is the bit that makes all a link with the class of 'thisPane' stay within the tab
                      //a href tags that are not of the class 'thisPane' will open outside the tab
                      load: function(event, ui) {
                        $(ui.panel).delegate('a.thisPane', 'click', function(event) {
                          $(ui.panel).load(this.href);
                          event.preventDefault();
                        });
                      }


                    });
                  });

                </script>
                <style type="text/css">
                  <!--
                  .lb {
                    background-image:  url(themes/<?php echo $setts['default_theme']; ?>/img/lb_bg.gif);
                  }
                  .db {
                    background-image:  url(themes/<?php echo $setts['default_theme']; ?>/img/db_bg.gif);
                  }
                  <?php //if (substr(strrchr($_SERVER['PHP_SELF'],'/'),1)=="register.php"){ echo ".main_table {	width:930px; float:left; margin-left:10px}";}  ?> 

                  <?php //if (substr(strrchr($_SERVER['PHP_SELF'],'/'),1)=="categories.php"){ echo ".main_table { width:97%; margin-left:20px; margin-right:20px}";} ?> 
                  <?php //if (substr(strrchr($_SERVER['PHP_SELF'],'/'),1)=="auction_search.php"){ echo ".main_table { width:97%; margin-left:20px; margin-right:20px}";}  ?> 
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
                    <div class="top_link"> <!--!!!!!!!!!!!!without right menu-->
                      <div class="user_links">
                        <div class="welcome_link" style="<?php
                          if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "register.php") {
                            echo "display:none";
                          }
                        ?> <?php
                            if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "login.php") {
                              echo "display:none";
                            }
                          ?>"><?php if ($member_active == 'Active') {
                            ;
                            ?> <?php echo $member_username; ?> (<a href="<?php echo $login_link; ?>"><?php echo $login_btn_msg; ?></a>) <?php
                          }
                          else {
                            ;
                            ?><a href="login.php">ÄÄƒng nháº­p</a> hoáº·c <a href="register.php">ÄÄƒng kÃ½</a><?php } ?>
                        </div>  
                        <ul class="user_menu">			
                          <li><a href="http://adamo.vn/members_area.php"><?php echo "TÃ i khoáº£n"; ?></a></li>
                          <li><a href="<?php echo $place_ad_link; ?>"><?php echo $place_ad_btn_msg; ?></a></li>
                          <li><a href="<?php echo process_link('content_pages', array('page' => 'help')); ?>"><?php echo MSG_BTN_HELP; ?></a></li>
                        </ul>
                      </div>
                    </div>
                    <div id="wrapper"/>
                    <div id="header_box">
                      <div id="header_logo">
                        <a href="<?php echo $index_link; ?>"><img src="images/myphpauction.gif?<?php echo rand(2, 9999); ?>" alt="logo"></a>
                        <div style="clear:both"></div>
                            <?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "index.php") { ?>
                            <div class="product-menu" <?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) != "index.php") echo "style = 'display:none'" ?>>
                              <ul class="menu">
                                <?php
                                $home_cats_list = get_home_cat();
                                for ($i = 0; $i < count($home_cats_list); $i++) {
                                  $home_sub_cats_list = get_home_sub_cat($home_cats_list[$i]['cat_id']);
                                  $category_link = process_link('categories', array('category' => $category_lang[$home_cats_list[$i]['cat_id']], 'parent_id' => $home_cats_list[$i]['cat_id']));
                                  echo "<li class='expanded'><a href='" . $category_link . "'>" . $home_cats_list[$i]['name'] . "</a><ul class='menu'>";
                                  for ($j = 0; $j < count($home_sub_cats_list); $j++) {
                                    $sub_category_link = process_link('categories', array('category' => $category_lang[$home_sub_cats_list[$j]['cat_id']], 'parent_id' => $home_sub_cats_list[$j]['cat_id']));
                                    echo "<li><a href='" . $sub_category_link . "'>" . $home_sub_cats_list[$j]['name'] . "</a></li>";
                                  }
                                  echo "</ul></li>";
                                }
                                ?>
                              </ul>
                            </div>
  <?php } ?>
                      </div> 
                      <div id="header_right">
                        <div id="search_area">
                          <div class="basic_search">

                            <form action="auction_search.php" method="post">
                              <input type="hidden" name="option" value="basic_search">
                                <input type="text" size="25" name="basic_search" maxlength="300" id="basic_search">
                                  <input name="form_basic_search" type="submit" id="search_btn" value="<?php echo GMSG_SEARCH; ?>">
                                    </form>

                                    </div>
                                    <div class="cat_search">
                                      <form name="cat_browse_form" method="get" action="categories.php"><?php echo $categories_browse_box; ?>
                                      </form>
                                    </div>
                                    </div>
                                    <div style="clear:both"></div>
                                        <?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "index.php") { ?>
                                            <?php $files = get_slide_url(); ?>
                                        <div id="home_slider" class="slider-wrapper theme-light" <?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) != "index.php") echo "style = 'display:none'" ?>>
                                          <div id="slider" class="nivoSlider">
                                        <?php
                                        foreach ($files as $file) {
                                          echo '<img src="http://adamo.vn/themes/red/nivo_slider/images/' . $file . '" alt="slider"/>';
                                        }
                                        ?>
                                          </div>
                                        </div>
                                      <?php } ?>
                                    </div>
                                    </div>
                                    <div style="clear:both"></div>

                                        <?php
                                          if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "index.php") {
                                            $cats = array(2117, 2114, 2092);
                                            $categories = get_cat_name($cats);
                                            ?>
                                        <div id="tabs">
                                          <ul class="tabs_name">
                                        <?php
                                        foreach ($categories as $k => $v) {
                                          echo '<li><a href="tabs.php?cat=' . $k . '">' . $v . '</a></li>';
                                        }
                                        ?>
                                          </ul>
                                        </div>
                                        <div style="clear:both"></div>
  <?php } ?>


<?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) != "index.php") { ?>

                                        <table border="0" cellpadding="0" cellspacing="0" class="main_table" style="margin-top:20px">

                                          <tr>
                                            <td>

                                              <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                <tr valign="top">
                                                      <?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) != "sell_item.php") { ?>
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

                                                        <?php if ($member_active == 'Active') { ?>

                                                          <?php echo $menu_box_header; ?>
                                                          <div id="exp1102170142">
        <?php echo $menu_box_content; ?>
                                                          </div>
                                                          <?php } ?>

                                                        <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
                                                        <noscript>
      <?php echo MSG_JS_NOT_SUPPORTED; ?>
                                                        </noscript>
                                                        <!--
      <?php //echo $category_box_header; ?>
                                                              <div id="exp1102170166">
      <?php //echo $category_box_content;  ?>
                                                              </div>
                                                        -->
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
                                                          <!--<div align="center"><a href="rss_feed.php"><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/rss.gif" border="0" alt="" align="absmiddle"></a></div>-->

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
                                                      ?> <?php
                                                      if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "sell_item.php") {
                                                        echo "display:none";
                                                      }
                                                      ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="10" height="1"></td>
                                                    <?php } ?>
                                                  <td width="100%">

                                                    <?php if (substr(strrchr($_SERVER['PHP_SELF'], '/'), 1) == "index.php") {
                                                      ?>





                                                      <!--<?php if ($member_active != 'Active') { ?>
                                                          <div><a href="<?php echo process_link('register'); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/img/newuser.jpg" border="0"></a></div>
                                                          <div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
                                                      <?php } ?>-->

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
    <?php
    }
  }
?>