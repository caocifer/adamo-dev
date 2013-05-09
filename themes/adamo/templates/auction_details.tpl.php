<?php
#################################################################
## myphpauction															##
##-------------------------------------------------------------##
## Copyright ©2008 Auctionlive pro Greatclone. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<?php echo $auction_print_header; ?>
<SCRIPT LANGUAGE="JavaScript"><!--
myPopup = '';

  function openPopup(url) {
    myPopup = window.open(url, 'popupWindow', 'width=640,height=150,status=yes');
    if (!myPopup.opener)
      myPopup.opener = self;
  }
//-->
</SCRIPT>
<SCRIPT LANGUAGE = "JavaScript">
  function converter_open(url) {
    output = window.open(url, "popDialog", "height=220,width=700,toolbar=no,resizable=yes,scrollbars=yes,left=10,top=10");
  }
</SCRIPT>
<?php if ($ad_display == 'live') { ?>

    <form name="hidden_form" action="auction_details.php" method="get" style="margin:0px;">
      <input type="hidden" name="option" />
      <input type="hidden" name="auction_id" />
      <input type="hidden" name="message_content" />
      <input type="hidden" name="question_id" />
    </form>
  <?php } ?>

<?php if ($print_button == 'show') { ?>
    <table align="center" border="0" cellpadding="3" cellspacing="3" class="errormessage">
      <tr>
        <td class="contentfont"><a href="#" onclick="javascript:window.print(this);"><?php echo GMSG_PRINT_THIS_PAGE; ?></a></td>
      </tr>
    </table>
  <?php } ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <?php if ($ad_display == 'live') { ?>
        <td class="contentfont" nowrap style="padding-right: 10px;"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/home.gif" align="absmiddle" border="0" hspace="5"> <a href="<?php echo process_link('index'); ?>">
            <?php echo MSG_BACK_TO_HP; ?>
          </a></td>
      <?php } ?>
    <td width="100%">
      <table width="100%" border="0" cellpadding="3" cellspacing="3" >
        <tr>
          <td width="150" align="right"><b>
              <?php echo MSG_MAIN_CATEGORY; ?>
              :</b></td>
          <td class="contentfont"><?php echo $main_category_display; ?></td>
        </tr>
        <?php if ($item_details['addl_category_id']) { ?>
            <tr>
              <td width="150" align="right"><b>
                  <?php echo MSG_ADDL_CATEGORY; ?>
                  :</b></td>
              <td class="contentfont"><?php echo $addl_category_display; ?></td>
            </tr>
          <?php } ?>
      </table>
    </td>
  </tr>
</table><br />
<table width='100%' border='0' cellspacing='0' cellpadding='0' height='21' style="border-bottom:3px solid #6e4af3">
  <tr>
<!--      <td width='30'><img src='themes/<?php echo $setts['default_theme']; ?>/images/det_start.gif' width='35' height='30' align='absmiddle'></td>-->
    <td width='100%' class='cathead' style='background:#CCCCFF'>
      <div style="background:url(themes/<?php echo $setts['default_theme']; ?>/images/auction_r_l.gif) top left no-repeat">
        <div style="background:url(themes/<?php echo $setts['default_theme']; ?>/images/auction_r_r.gif) top right no-repeat; padding:7px 0 7px 0px;">

          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="itemid" style="font-size:16px">&nbsp;&nbsp;
                <?php echo $item_details['name']; ?></td>
              <td align="right" class="itemidend"><?php echo MSG_AUCTION_ID; ?>
                : <b>
                  <?php echo $item_details['auction_id']; ?>
                </b>&nbsp;&nbsp;</td>
            </tr>
          </table> </div></div></td>
  <br>
  <table width="100%" border="0" cellspacing="1" cellpadding="1" style="background:#EFEFFF;" >
    <tr align="center">
      <td width="100%"><?php echo $item_can_bid['display']; ?></td>
    </tr>
  </table><br />
  <?php echo $auction_friend_form; ?>
  <?php echo $msg_changes_saved; ?>
  <?php echo $block_reason_msg; ?>
  <table width="100%" border="0" cellpadding="3" cellspacing="0">
    <tr valign="top">
      <td width="20%" align="center" style='background:#EFEFFF; border-left:1px solid #CCCCFF; border-top:1px solid #CCCCFF; border-bottom:1px solid #CCCCFF;' ><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <?php if (!empty($item_details['ad_image'][0])) { ?>
              <tr>
                <td align="center"><img src="<?php echo SITE_PATH; ?>thumbnail.php?pic=<?php echo $item_details['ad_image'][0]; ?>&w=150&sq=Y&b=Y" border="0" alt="<?php echo $item_details['name']; ?>"></td>
              </tr>
            <?php } ?>
          <?php if ($show_buyout) { ?>
              <tr>
                <td align="center"><?php
                  if ($ad_display == 'preview' || $session->value('user_id') == $item_details['owner_id'] || $blocked_user) {
                    echo '<img src="themes/' . $setts['default_theme'] . '/images/system/buyitnow25.gif" border="0">';
                  }
                  else {
                    echo '<a href="buy_out.php?auction_id=' . $item_details['auction_id'] . '"><img src="themes/' . $setts['default_theme'] . '/images/system/buyitnow25.gif" border="0"></a>';
                  }
                  echo '<br>for <strong>' . $fees->display_amount($item_details['buyout_price'], $item_details['currency']) . '</strong>' .
                  '<br><span class="contentfont">[ <a href="javascript:void(0);" onClick="converter_open(\'currency_converter.php?currency=' . $item_details['currency'] . '&amount=' . $item_details['buyout_price'] . '\');">' . MSG_CONVERT . '</a> ]</span>';
                  ?></td>
              </tr>
            <?php } ?>
          <?php if ($item_can_bid['show_box']) { ?>
              <tr>
                <td align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <?php if ($item_can_bid['result']) { ?>

                    <?php } ?>
                  </table></td>
              </tr>
            <?php } ?>
          <?php if (!empty($item_can_bid['display'])) { ?>
              <tr>
                <td align="center"><div>
                    <?php echo $item_can_bid['display']; ?>
                  </div></td>
              </tr>
            <?php } ?>  
        </table></td>
      <td width="50%" style='background:#EFEFFF; border-right:1px solid #CCCCFF; border-top:1px solid #CCCCFF; border-bottom:1px solid #CCCCFF;'><!-- Start Table for item details -->
        <table width="100%" border="0" cellspacing="2" cellpadding="3">
          <?php if ($ad_display == 'live' && !$buyout_only) { ?>
              <tr >
                <td><strong>
                    <?php echo MSG_CURRENT_BID; ?>
                  </strong></td>
                <td class="greenfont"><strong>
                    <?php echo $fees->display_amount($item_details['max_bid'], $item_details['currency']); ?>
                  </strong></td>
              </tr>
            <?php } ?>
          <?php if (!$buyout_only) { ?>
              <tr >
                <td><strong>
                    <?php echo MSG_START_BID; ?>
                  </strong></td>
                <td class="redfont"><strong>
                    <?php if ($item_can_bid['result']) { ?>
                      <form action="bid.php" method="post">
                        <input type="hidden" name="auction_id" value="<?php echo $item_details['auction_id']; ?>">
                        <input type="hidden" name="action" value="bid_confirm">
                      <?php } ?>
                      <?php if ($item_details['auction_type'] == 'dutch') { ?>
                        <?php echo GMSG_QUANTITY; ?>
                        :
                        <input name="quantity" type="text" id="quantity" value="1" size="3"></td>
                        </tr>
                      <?php } ?>
                      <tr>
                        <?php if ($item_details['auction_type'] != 'dutch') { ?>
                          </td>
                        <?php } ?>
                      <strong><?php echo $item_details['currency']; ?></strong>
                      <tr><input name="max_bid" type="text" id="max_bid" size="8" />
                      <input name="form_place_bid" type="submit" id="form_place_bid" value="<?php echo MSG_PLACE_BID; ?>" <?php echo (!$item_can_bid['result'] || $blocked_user) ? 'disabled' : ''; ?>></td>
                      </tr>
                      <?php if ($item_can_bid['result']) { ?>
                      </form>
                    <?php } ?>
                    <?php echo $fees->display_amount($item_details['start_price'], $item_details['currency']); ?>
                  </strong>
                  <?php if ($ad_display == 'live') { ?>
                    <span class="contentfont">[ <a href="javascript:void(0);" onClick="converter_open('currency_converter.php?currency=<?php echo $item_details['currency']; ?>&amount=<?php echo $item_details['start_price']; ?>');">
                        <?php echo MSG_CONVERT; ?>
                      </a> ]</span>
                  <?php } ?></td>
              </tr>
              <?php if ($your_bid > 0) { ?>
                <tr>
                  <td><strong>
                      <?php echo MSG_YOUR_BID; ?>
                    </strong></td>
                  <td class="greenfont"><strong>
                      <?php echo $fees->display_amount($your_bid, $item_details['currency']); ?>
                    </strong></td>
                </tr>
              <?php } ?>
            <?php } ?>
          <?php if ($ad_display == 'preview' && $item_details['is_reserve'] && !$buyout_only) { ?>
              <tr >
                <td><strong>
                    <?php echo MSG_RES_PRICE; ?>
                  </strong></td>
                <td><strong>
                    <?php echo $fees->display_amount($item_details['reserve_price'], $item_details['currency']); ?>
                  </strong></td>
              </tr>
            <?php } ?>
          <?php if ($item_details['quantity']) { ?>
              <tr>
                <td><b>
                    <?php echo GMSG_QUANTITY; ?>
                  </b></td>
                <td><?php echo $item_details['quantity']; ?></td>
              </tr>
            <?php } ?>
          <?php if ($ad_display == 'live' && !$buyout_only) { ?>
              <tr >
                <td><b>
                    <?php echo MSG_NR_BIDS; ?>
                  </b></td>
                <td class="contentfont"><?php echo $item_details['nb_bids']; ?>
                  <?php if ($item_details['nb_bids']) { ?>
                    [ <a href="<?php echo process_link('bid_history', array('auction_id' => $item_details['auction_id'])); ?>">
                      <?php echo MSG_VIEW_HISTORY; ?>
                    </a> ]
                  <?php } ?></td>
              </tr>
            <?php } ?>
          <tr >
            <td><b>
                <?php echo MSG_LOCATION; ?>
              </b></td>
            <td><?php echo $auction_location; ?></td>
          </tr>
          <tr >
            <td><b>
                <?php echo MSG_COUNTRY; ?>
              </b></td>
            <td><?php echo $auction_country; ?></td>
          </tr>
          <?php if ($ad_display == 'live' && $item_details['start_time'] <= CURRENT_TIME) { // dont show if the auction is not started ?>
              <tr >
                <td><b><?php echo MSG_TIME_LEFT; ?></b></td>
                <td><span id="countdown1"><?php echo date("Y-m-d H:i:s", $item_details['end_time']) . " GMT-03:00"; ?></span></td>
              </tr>
            <?php } ?>            
          <tr >
            <td><b>
                <?php echo GMSG_START_TIME; ?>
              </b></td>
            <td><?php echo ($ad_display == 'live' || $item_details['start_time_type'] == 'custom') ? show_date($item_details['start_time']) : GMSG_NOW; ?></td>
          </tr>
          <?php if ($ad_display == 'live' || $item_details['end_time_type'] == 'custom') { ?>
              <tr>
                <td><b>
                    <?php echo GMSG_END_TIME; ?>
                  </b></td>
                <td><?php echo show_date($item_details['end_time']); ?></td>
              </tr>
              <?php
            }
            else {
              ?>
              <tr >
                <td><b>
                    <?php echo GMSG_DURATION; ?>
                  </b></td>
                <td><?php echo $item_details['duration'] . ' ' . GMSG_DAYS; ?></td>
              </tr>
            <?php } ?>
          <?php if ($ad_display == 'live') { ?>
              <tr >
                <td><b>
                    <?php echo MSG_STATUS; ?>
                  </b></td>
                <td><?php echo item::item_status($item_details['closed']); ?></td>
              </tr>
            <?php } ?>

          <?php if ($item_details['is_offer'] && $setts['makeoffer_process'] == 1) { ?>
              <tr >
                <td><b><?php echo GMSG_MAKE_OFFER; ?></b></td>
                <td><?php
                  if ($ad_display == 'preview' || $session->value('user_id') == $item_details['owner_id'] || $blocked_user) {
                    echo '<img src="themes/' . $setts['default_theme'] . '/images/system/makeoffer25.gif" border="0">';
                  }
                  else {
                    echo '<a href="make_offer.php?auction_id=' . $item_details['auction_id'] . '"><img src="themes/' . $setts['default_theme'] . '/images/system/makeoffer25.gif" border="0"></a>';
                  }
                  ?></td>
              </tr>
              <?php if ($ad_display != 'live' || $setts['makeoffer_private']) { ?>
                <tr>
                  <td></td>
                  <td><?php echo MSG_OFFER_RANGE; ?>: <?php echo $item->offer_range($item_details); ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
          <?php if ($ad_display == 'live' && $item_details['reserve_price'] > 0) { ?>
              <tr>
                <td colspan="2"><b><?php echo ($item_details['reserve_price'] > $item_details['max_bid']) ? '<span class="redfont">' . MSG_RESERVE_NOT_MET . '</span>' : '<span class="greenfont">' . MSG_RESERVE_MET . '</span>'; ?></b></td>
              </tr>
            <?php } ?>
          <?php if ($item_details['enable_swap'] && !$item_details['closed']) { ?>
              <tr>
                <td colspan="2" class="contentfont"><?php echo MSG_SWAP_OFFERS_ACCEPTED; ?>
                  <?php echo ($ad_display == 'live' && !$blocked_user) ? $swap_offer_link : ''; ?></td>
              </tr>

            <?php } ?>
          <?php if ($ad_display == 'live' && !$buyout_only && !$item_details['closed']) { ?>
              <tr>
                <td><b>
                    <?php echo MSG_HIGH_BID; ?>
                  </b></td>
                <td><?php echo $high_bidders_content; ?></td>
              </tr>
            <?php } ?>
          <?php if ($ad_display == 'live' && !empty($winners_content)) { ?>
              <tr>
                <td><b>
                    <?php echo MSG_WINNER_S; ?>
                  </b></td>
                <td><?php echo $winners_content; ?></td>
              </tr>
            <?php } ?>
          <?php if ($item_details['apply_tax']) { ?>
              <tr>
                <td colspan="2"><?php echo $auction_tax['display']; ?></td>
              </tr>

              <?php if ($auction_tax['display_buyer']) { ?>
                <tr>
                  <td colspan="2"><?php echo $auction_tax['display_buyer']; ?></td>
                </tr>

              <?php } ?>
            <?php } ?>
          <?php echo $winners_message_board; ?>
        </table></td>
      <td width="30%"><table width="100%" border="0" cellspacing="2" cellpadding="3">
          <tr>
            <td style="font-size:16px;"><u><b><?php echo MSG_SELLER_INFORMATION; ?></b></u>
      </td>
    </tr>
    <tr>
      <td><b>

          <?php echo $user_details['username']; ?>
        </b>
        <?php echo user_pics($user_details['user_id']); ?>

      </td>
    </tr>
    <tr >
      <td><?php echo MSG_REGISTERED_SINCE; ?>
        <b>
          <?php echo show_date($user_details['reg_date'], false); ?>
        </b><br>
        <?php echo GMSG_IN . ' <b>' . $seller_country . '</b>'; ?></td>
    </tr>
    <?php if ($ad_display == 'live') { ?>
        <tr >
          <td class="contentfont"><a href="<?php echo process_link('other_items', array('owner_id' => $item_details['owner_id'])); ?>">
              <?php echo MSG_OTHER_ITEMS_FROM_SELLER; ?>
            </a>
          </td>
        </tr>
        <?php if ($user_details['shop_active']) { ?>
          <tr>
            <td class="contentfont"><a href="<?php echo process_link('shop', array('user_id' => $item_details['owner_id'])); ?>">
                <?php echo MSG_VIEW_STORE; ?>
                <?php echo $reputation_table_small; ?>
              </a></td>
          </tr>
        <?php } ?>
      <?php } ?>
  </table>

</td>
</tr>
</table>
<br>
<?php
  if ($item_details['listing_template_id'] > 0) {
    include ("themedesigner/template-" . $item_details['listing_template_id'] . ".php");
    ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="3" class="border">
      <?php
    }
    else {
      ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="3" class="border">
        <tr>
          <td class="c3" colspan="2"><?php echo GMSG_DESCRIPTION; ?></td>
        </tr>
        <tr class="c5">
          <td><img src="themes/<?php echo $setts['default_theme']; ?>/images/pixel.gif" width="150" height="1"></td>
          <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/images/pixel.gif" width="1" height="1"></td>
        </tr>
        <tr>
          <td colspan="2"><?php echo database::add_special_chars($item_details['description']); ?></td>
        </tr><?php } ?>
    <?php echo $custom_sections_table; ?>
    <?php if (item::count_contents($item_details['ad_image'])) { ?>
        <tr>
          <td colspan="2" style='background:#CCCCFF; padding:7px 0 7px 5px; font-size:16px'><?php echo MSG_AUCTION_IMAGES; ?></td>
        </tr>

        <tr>
          <td class="border" colspan="2"><table width="100%" cellpadding="3" cellspacing="0" border="0">
              <tr align="center">
                <td valign="top" class="picselect"><table cellpadding="3" cellspacing="1" border="0">
                    <tr align="center">
                      <td><b>
                          <?php echo MSG_SELECT_PICTURE; ?>
                        </b></td>
                    </tr>
                    <tr align="center">
                      <td><?php echo $ad_image_thumbnails; ?></td>
                    </tr>
                  </table></td>
                <td width="100%" class="picselectmain" align="center"><img name="main_ad_image" src="<?php echo SITE_PATH; ?>thumbnail.php?pic=<?php echo $item_details['ad_image'][0]; ?>&w=500&sq=Y&b=Y" border="0" alt="<?php echo $item_details['name']; ?>"></td>
              </tr>
            </table></td>
        </tr>
      <?php } ?>
    <?php if (item::count_contents($item_details['ad_video'])) { ?>
        <tr>
          <td class="c3" colspan="2"><?php echo MSG_AUCTION_MEDIA; ?></td>
        </tr>
        <tr>
          <td class="border" colspan="2"><table width="100%" cellpadding="3" cellspacing="0" border="0">
              <tr align="center">
                <td valign="top" class="picselect"><table cellpadding="3" cellspacing="1" border="0">
                    <tr align="center">
                      <td><b>
                          <?php echo MSG_SELECT_VIDEO; ?>
                        </b></td>
                    </tr>
                    <tr align="center">
                      <td><?php echo $ad_video_thumbnails; ?></td>
                    </tr>
                  </table></td>
                <td width="100%" class="picselectmain"align="center"><?php echo $ad_video_main_box; ?></td>
              </tr>
            </table></td>
        </tr>
      <?php } ?>
    <?php if ($ad_display == 'live') { ?>
        <tr>
          <td align="center" colspan="2"><table cellpadding="3" cellspacing="1" border="0" class="counter">
              <tr>
                <td nowrap><?php echo MSG_ITEM_VIEWED; ?>
                  <?php echo ($item_details['nb_clicks'] + 1); ?>
                  <?php echo GMSG_TIMES; ?></td>
              </tr>
            </table></td>
        </tr>
        <?php if ($setts['enable_asq']) { ?>
          <tr>
            <td style='background:#CCCCFF; padding:7px 0 7px 5px; font-size:16px' colspan="2"><?php echo MSG_ASK_SELLER_QUESTION; ?></td>
          </tr>
          <?php echo $public_questions_content; ?>
          <?php if ($session->value('adminarea') == 'Active') { ?>
            <tr>
              <td align="center" colspan="2"><?php echo MSG_QUESTIONS_LOGGED_AS_ADMIN; ?></td>
            </tr>
            <?php
          }
          else if (!$session->value('user_id')) {
            ?>
            <tr>
              <td align="center" colspan="2"><?php echo MSG_LOGIN_TO_ASK_QUESTIONS; ?></td>
            </tr>
            <?php
          }
          else if ($session->value('user_id') == $item_details['owner_id']) {
            ?>
            <tr>
              <td align="center" colspan="2"><?php echo MSG_CANT_POST_QUESTION_OWNER; ?></td>
            </tr>
            <?php
          }
          else {
            ?>
            <tr>
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/images/pixel.gif" width="1" height="1"></td>
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/images/pixel.gif" width="1" height="1"></td>
            </tr>
            <form action="auction_details.php" method="POST">
              <input type="hidden" name="auction_id" value="<?php echo $item_details['auction_id']; ?>">
              <input type="hidden" name="option" value="post_question">
              <tr class="c1">
                <td><table width="100%">
                    <tr>
                      <td><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/i_faq.gif" align="absmiddle"/></td>
                      <td width="100%" align="right"><strong>
                          <?php echo MSG_POST_QUESTION; ?>
                        </strong></td>
                    </tr>
                  </table></td>
                <td><table>
                    <tr>
                      <td><textarea name="message_content" cols="40" rows="3" class="contentfont"></textarea></td>
                      <td><div style="padding: 2px;">
                          <select name="message_handle">
                            <?php if ($user_details['default_public_questions']) { ?>
                              <option value="1" selected>
                                <?php echo MSG_POST_QUESTION_PUBLICLY; ?>
                              </option>
                            <?php } ?>
                            <option value="2">
                              <?php echo MSG_POST_QUESTION_PRIVATELY; ?>
                            </option>
                          </select>
                        </div>
                        <div style="padding: 2px;">
                          <input name="form_post_question" type="submit" id="form_post_question" value="<?php echo GMSG_SUBMIT; ?>" />
                        </div></td>
                    </tr>
                  </table></td>
              </tr>
            </form>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    <?php if ($item_details['direct_payment']) { ?>
        <tr>
          <td style='background:#CCCCFF; padding:7px 0 7px 5px; font-size:16px' colspan="2"><?php echo MSG_DIRECT_PAYMENT; ?></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><?php echo $direct_payment_methods_display; ?></td>
        </tr>
      <?php } ?>
    <?php if ($item_details['payment_methods']) { ?>
        <tr>
          <td class="c3" colspan="2"><?php echo MSG_OFFLINE_PAYMENT; ?></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><?php echo $offline_payment_methods_display; ?></td>
        </tr>
      <?php } ?>
    <tr>
      <td style='background:#CCCCFF; padding:7px 0 7px 5px; font-size:16px' colspan="2"><?php echo MSG_SHIPPING; ?></td>
    </tr>
    <tr class="c1">
      <td width="150" align="right"><?php echo MSG_SHIPPING_CONDITIONS; ?></td>
      <td><?php echo ($item_details['shipping_method'] == 1) ? MSG_BUYER_PAYS_SHIPPING : MSG_SELLER_PAYS_SHIPPING; ?></td>
    </tr>
    <?php if ($item_details['shipping_int'] == 1) { ?>
        <tr>
          <td>&nbsp;</td>
          <td><?php echo MSG_SELLER_SHIPS_INT; ?></td>
        </tr>
      <?php } ?>
    <?php if ($setts['enable_shipping_costs']) { ?>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_POSTAGE; ?></td>
          <td><?php echo $fees->display_amount($item_details['postage_amount'], $item_details['currency']); ?></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_INSURANCE; ?></td>
          <td><?php echo $fees->display_amount($item_details['insurance_amount'], $item_details['currency']); ?></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><?php echo MSG_SHIP_METHOD; ?></td>
          <td><?php echo $item_details['type_service']; ?></td>
        </tr>
        <?php if ($item_details['shipping_details']) { ?>
          <tr class="c1">
            <td width="150" align="right"><?php echo MSG_SHIPPING_DETAILS; ?></td>
            <td><?php echo $item_details['shipping_details']; ?></td>
          </tr>
        <?php } ?>
      <?php } ?>
  </table>
  <br />
  <?php if ($ad_display == 'live') { ?>
      <table width="100%" border="1" cellpadding="3" cellspacing="1" class="subitem">
        <tr class="contentfont" align="center">
          <td><table width=100%>
              <tr>
                <?php if ($session->value('user_id')) { ?>
                  <td><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/status1.gif" vspace="5" align="absmiddle"></td>
                  <td nowrap><?php echo MSG_WELCOME; ?>
                    , <br>
                    <b>
                      <?php echo $session->value('username'); ?>
                    </b></td>
                  <td align="center" width="100%"><?php if ($item_details['owner_id'] == $session->value('user_id')) { ?>
                      [ <a href="<?php echo process_link('sell_item', array('option' => 'sell_similar', 'auction_id' => $item_details['auction_id'])); ?>">
                        <?php echo MSG_SELL_SIMILAR; ?>
                      </a> ]<br>
                      <?php if (!$item->under_time($item_details)) { ?>
                        <?php if ($item_details['nb_bids'] == 0 && $item_details['active'] == 1) { ?>
                          [ <a href="edit_item.php?auction_id=<?php echo $item_details['auction_id']; ?>&edit_option=new">
                            <?php echo MSG_EDIT_AUCTION; ?>
                          </a> ]<br>
                          [ <a href="members_area.php?do=delete_auction&auction_id=<?php echo $item_details['auction_id']; ?>&page=selling&section=open" onclick="return confirm('<?php echo MSG_DELETE_CONFIRM; ?>');">
                            <?php echo MSG_DELETE; ?>
                          </a> ]<br>
                          <?php
                        }
                        else if ($item_details['nb_bids'] > 0 && $item_details['active'] == 1) {
                          ?>
                          [ <a href="edit_description.php?auction_id=<?php echo $item_details['auction_id']; ?>">
                            <?php echo MSG_EDIT_DESCRIPTION; ?>
                          </a> ]<br>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </td>
                  <?php
                }
                else {
                  ?>
                  <td><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/status.gif" vspace="5" align="absmiddle"></td>
                  <td width="100%"><?php echo MSG_STATUS_BIDDER_SELLER_A; ?>
                    <br>
                    <a href="<?php echo process_link('login'); ?>">
                      <?php echo MSG_STATUS_BIDDER_SELLER_B; ?>
                    </a>
                    <?php echo MSG_STATUS_BIDDER_SELLER_C; ?></td>
                <?php } ?>
              </tr>
            </table></td>
          <td align="center" class="leftborder" nowrap width="22%"><a href="javascript:popUp('<?php echo process_link('auction_print', array('auction_id' => $item_details['auction_id'])); ?>');"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/print.gif" align="absmiddle" border="0" hspace="5">
              <?php echo MSG_PRINT_VIEW; ?>
            </a></td>
          <td align="center" class="leftborder" nowrap width="22%"><a href="<?php echo process_link('auction_details', array('auction_id' => $item_details['auction_id'], 'option' => 'item_watch')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/watch.gif" align="absmiddle" border="0" hspace="5">
              <?php echo MSG_WATCH_ITEM; ?>
            </a></td>
          <td align="center" class="leftborder" nowrap width="22%"><a href="<?php echo process_link('auction_details', array('auction_id' => $item_details['auction_id'], 'option' => 'auction_friend')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/tofriend.gif" align="absmiddle" border="0" hspace="5">
              <?php echo MSG_SEND_TO_FRIEND; ?>
            </a> &nbsp; &nbsp;</td>
        </tr>
        <?php if (!empty($direct_payment_box)) { ?>
          <tr height="21">
            <td colspan="5" class="c4"><strong>
                <?php echo MSG_DIRECT_PAYMENT; ?>
              </strong></td>
          </tr>
          <?php foreach ($direct_payment_box as $dp_box) { ?>
            <tr>
              <td colspan="5" class="c5"><img src="themes/<?php echo $setts['default_theme']; ?>/images/pixel.gif" width="1" height="1"></td>
            </tr>
            <tr>
              <td colspan="5" class="border"><?php echo $dp_box; ?></td>
            </tr>
          <?php } ?>
        <?php } ?>
      </table>
      <br>
    <?php } ?>
  <?php if ($setts['enable_other_items_adp'] && $item->count_contents($other_items)) { ?>
      <table width="100%" border="1" cellpadding="3" cellspacing="3" class="border">
        <tr>
          <td style='background:#CCCCFF; padding:7px 0 7px 5px; font-size:16px' colspan="<?php echo $layout['hpfeat_nb']; ?>"><?php echo MSG_OTHER_ITEMS_FROM_SELLER; ?></td>
        </tr>
        <tr>
          <?php
          for ($counter = 0; $counter < $layout['hpfeat_nb']; $counter++) {
            $width = 100 / $layout['hpfeat_nb'] . '%';
            ?>
            <td width="<?php echo $width; ?>" align="center" valign="top"><?php
              if (!empty($other_items[$counter]['name'])) {
                $main_image = $db->get_sql_field("SELECT media_url FROM " . DB_PREFIX . "auction_media WHERE
      			auction_id='" . $other_items[$counter]['auction_id'] . "' AND media_type=1 AND upload_in_progress=0 ORDER BY media_id ASC LIMIT 0,1", 'media_url');

                $auction_link = process_link('auction_details', array('name' => $other_items[$counter]['name'], 'auction_id' => $other_items[$counter]['auction_id']));
                ?>
                <table width="100%" border="0" cellspacing="3" cellpadding="3">
                  <tr>
                    <td colspan="2" align="center" class="gradient"><a href="<?php echo $auction_link; ?>"><img src="<?php echo ((!empty($main_image)) ? 'thumbnail.php?pic=' . $main_image . '&w=' . $layout['hpfeat_width'] . '&sq=Y' : 'themes/' . $setts['default_theme'] . '/images/system/noimg.gif'); ?>" border="0" alt="<?php echo $other_items[$counter]['name']; ?>"></a></td>
                  </tr>
                  <tr class="c3">
                    <td colspan="2"><a style="color: #ffffff; font-weight: bold;" href="<?php echo $auction_link; ?>">&raquo;
                        <?php echo title_resize($other_items[$counter]['name']); ?>
                      </a></td>
                  </tr>
                  <tr class="c2">
                    <td nowrap align="right"><b>
                        <?php echo MSG_START_BID; ?>
                      </b> :</td>
                    <td nowrap><?php echo $fees->display_amount($other_items[$counter]['start_price'], $other_items[$counter]['currency']); ?> </td>
                  </tr>
                  <tr class="c2">
                    <td align="right"><b>
                        <?php echo MSG_CURRENT_BID; ?>
                      </b> :</b></td>
                    <td ><b><?php echo $fees->display_amount($other_items[$counter]['max_bid'], $other_items[$counter]['currency']); ?></td>
                  </tr>
                  <tr class="c1">
                    <td colspan="2" align="center"><b>
                        <?php echo MSG_ENDS; ?>
                        :</b> <?php echo show_date($other_items[$counter]['end_time']); ?> </td>
                  </tr>
                </table>
              <?php } ?></td>
          <?php } ?>

        </tr>
      </table>
      <br>
    <?php } ?>
  <br>

  <?php if ($ad_display == 'live') { ?>
      <table width=100% border=0 cellspacing=0 cellpadding=0>
        <tr>
          <td align='center' style="background:#EFEFFF; border:1px solid #CCCCFF;" ><?php echo MSG_THE_POSTER; ?>
            , <b>
              <?php echo $user_details['username']; ?>
            </b>,
            <?php echo MSG_ASSUMES_RESP_EXPL; ?>
          </td>
        </tr>
      </table>
      <br />

    <?php } ?>
  <?php echo $auction_print_footer; ?>
