<?php
#################################################################
## MyPHPAuction v6.03															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="menu_shop">
  <tr align="center">
    <td class="bordermenu_shop"><a href="shop.php?user_id=<?php echo $user_id; ?>">
        <?php echo MSG_STORE_HOME; ?>
      </a></td>
    <td class="bordermenu_shop"><a href="shop.php?user_id=<?php echo $user_id; ?>&page=shop_about">
        <?php echo MSG_STORE_ABOUT_PAGE; ?>
      </a></td>
    <td class="bordermenu_shop"><a href="shop.php?user_id=<?php echo $user_id; ?>&page=shop_specials">
        <?php echo MSG_STORE_SPECIALS ?>
      </a></td>
    <td class="bordermenu_shop"><a href="shop.php?user_id=<?php echo $user_id; ?>&page=shop_shipping_info">
        <?php echo MSG_STORE_SHIPPING_INFO; ?>
      </a></td>
    <td class="bordermenu_shop"><a href="shop.php?user_id=<?php echo $user_id; ?>&page=shop_company_policies">
        <?php echo MSG_STORE_COMPANY_POILICIES; ?>
      </a></td>
    <td class="bordermenu_shop"><a href="other_items.php?owner_id=<?php echo $user_id; ?>">
        <?php echo MSG_VIEW_AUCTIONS; ?>
      </a></td>
    <td class="bordermenu_shop"><a href="user_reputation.php?user_id=<?php echo $user_id; ?>">
        <?php echo MSG_VIEW_REPUTATION ?>
      </a></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="search_shop" align="center"> 
  <form action="shop.php" method="get"> 
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <tr> 
      <td nowrap align="center"><?php echo MSG_SEARCH_IN_SHOP; ?> &nbsp; <INPUT size="25" name="keywords_search" value="<?php echo $keywords_search; ?>"> &nbsp;  
        <input name="form_search_proceed" type="submit" value="<?php echo GMSG_SEARCH; ?>"></td> 
    </tr> 
  </form> 
</table>
<br>
<?php if ($user_details['shop_nb_feat_items'] && empty($page)) { ?>
    <table width="100%" border="0" cellpadding="3" cellspacing="2" class="feat_borders">
      <tr>
        <?php
        $width = 100 / $user_details['shop_nb_feat_items'] . '%';
        for ($i = 0; $i < $user_details['shop_nb_feat_items']; $i++) {
          if (!empty($feat_item_details[$i]['name'])) {
            $main_image = $db->get_sql_field("SELECT media_url FROM " . DB_PREFIX . "auction_media WHERE
      		auction_id='" . $feat_item_details[$i]['auction_id'] . "' AND media_type=1 AND upload_in_progress=0 ORDER BY media_id ASC LIMIT 0,1", 'media_url');

            $auction_link = process_link('auction_details', array('name' => $feat_item_details[$i]['name'], 'auction_id' => $feat_item_details[$i]['auction_id']));
            ?>
            <td width="<?php echo $width; ?>" align="center" valign="top"  class="c2_shop border_shop"> 
              <table width="100%" border="0" cellspacing="2" cellpadding="2" class="feat_borders"> 
                <tr><td colspan="2" class="c1_shop"><a href="<?php echo $auction_link; ?>"><?php echo $feat_item_details[$i]['name']; ?></a></td></tr> 
                <tr class="smallfont_shop"> 
                  <td align="center"><a href="<?php echo $auction_link; ?>"><img src="<?php echo ((!empty($main_image)) ? 'thumbnail.php?pic=' . $main_image . '&w=' . $layout['hpfeat_width'] . '&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif'); ?>" border="0" alt="<?php echo $feat_item_details[$i]['name']; ?>"></a></td> 
                  <td valign="top" align="center" class="smallfont"><a href="<?php echo $auction_link; ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/ma_bidding.gif" border="0" align="absmiddle" hspace="5"><br> 
                      <b><?php echo MSG_BID_NOW; ?></b></a> </td> 
                </tr> 
                <tr>
                  <td class="c2_shop" nowrap align="right"><?php echo MSG_START_BID; ?>
                    :</td>
                  <td class="c2_shop" nowrap><?php echo $fees->display_amount($feat_item_details[$i]['start_price'], $feat_item_details[$i]['currency']); ?> </td>
                </tr>
                <tr>
                  <td class="c3_shop" align="right"><?php echo MSG_CURRENT_BID; ?>
                    :</b></td>
                  <td class="c3_shop"><b><?php echo $fees->display_amount($feat_item_details[$i]['max_bid'], $feat_item_details[$i]['currency']); ?></td>
                </tr>
                <tr>
                  <td colspan="2" class="c2_shop smallfont" align="center"><b>
                      <?php echo MSG_ENDS; ?>
                      :</b> <?php echo show_date($feat_item_details[$i]['end_time']); ?> </td>
                </tr>
              </table> 
            </td> 
          <?php }
          else {
            ?> 
            <td width="<?php echo $width; ?>"></td>
          <?php } ?>
    <?php } ?>
      </tr> 
    </table>
    <br> 		
  <?php } ?>
<?php if (!$parent_id && empty($page)) { ?>
    <table width="100%" cellpadding="0" cellspacing="0" border="0"> 
      <tr> 
        <td width="48%" valign="top"> 
    <?php if ($user_details['shop_nb_ending_items'] && !$parent_id) { ?>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" class="feat_borders"> 
              <tr height="17"> 
                <td width="100%" class="c1_shop" colspan="5">&nbsp;&raquo;&nbsp;<?php echo MSG_ENDING_SOON_AUCTIONS; ?></td> 
              </tr> 
              <tr height="15" class="c4_shop"> 
                <td></td> 
                <td class="smallfont_shop" width="100%">&nbsp;<b><?php echo MSG_ITEM_TITLE; ?></b></td> 
                <td class="smallfont_shop" nowrap>&nbsp;</td> 
              </tr> 
            <?php echo $shop_ending_auctions_content; ?>
            </table> 
    <?php } ?>
        </td> 
        <td width="4%" valign="top"> </td> 
        <td width="48%" valign="top"> 
    <?php if ($user_details['shop_nb_recent_items'] && !$parent_id) { ?>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" class="feat_borders"> 
              <tr height="17"> 
                <td width="100%" class="c1_shop" colspan="3">&nbsp;&raquo;&nbsp;<?php echo MSG_RECENTLY_LISTED_AUCTIONS; ?></td> 
              </tr> 
              <tr height="15" class="c4_shop"> 
                <td></td> 
                <td class="smallfont_shop" nowrap="nowrap">&nbsp;<b><?php echo MSG_ITEM_TITLE; ?><b></td> 
                      <td class="smallfont_shop" nowrap>&nbsp;</td> 
                      </tr> 
                      <?php echo $shop_recent_auctions_content; ?>   
                      </table> 
    <?php } ?>
                    </td> 
                    </tr> 
                    </table> 
                    <br>
  <?php } ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="3">
                  <tr>
                    <td class="catnav_shop"><?php echo $shop_categories_header; ?></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="feat_borders">
                  <tr>
<?php if ($is_subcategories) { ?>
                        <td width="170" valign="top">
                          <table width="100%" border="0" cellpadding="3" cellspacing="2" class="contentfont_shop">
                        <?php echo $shop_subcategories_content; ?>
                          </table></td>		
  <?php } ?>
                    <td valign="top">
