<?php
#################################################################
## MyPHPAuction 2009															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<?php echo $category_logo; ?>
<?php echo headercat($categories_header_menu); ?>
<?php echo $categories_search_box; ?>

<br>
<?php if ($layout['catfeat_nb']) { ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="5">
      <?php
      $counter = 0;
      for ($i = 0; $i < $featured_columns; $i++) {
        ?>
        <tr>
          <?php
          for ($j = 0; $j < $layout['catfeat_nb']; $j++) {
            $width = 100 / $layout['catfeat_nb'] . '%';
            ?>
            <td width="<?php echo $width; ?>" align="center" valign="top" class="catfeatmaincell"><?php
              if (!empty($item_details[$counter]['name'])) {
                $main_image = $db->get_sql_field("SELECT media_url FROM " . DB_PREFIX . "auction_media WHERE
      			auction_id='" . $item_details[$counter]['auction_id'] . "' AND media_type=1 AND upload_in_progress=0 ORDER BY media_id ASC LIMIT 0,1", 'media_url');

                $auction_link = process_link('auction_details', array('name' => $item_details[$counter]['name'], 'auction_id' => $item_details[$counter]['auction_id']));
                ?>
                <table width="100%" border="0" cellspacing="2" cellpadding="5" class="catfeattable">
                  <tr class="smallfont" height="<?php echo $layout['catfeat_width'] + 10; ?>">
                    <td align="center" class="catfeatpic"><a href="<?php echo $auction_link; ?>"><img src="<?php echo ((!empty($main_image)) ? 'thumbnail.php?pic=' . $main_image . '&w=' . $layout['catfeat_width'] . '&sq=Y' : 'themes/' . $setts['default_theme'] . '/img/system/noimg.gif'); ?>" border="0" alt="<?php echo $item_details[$counter]['name']; ?>"></a></td>
                  </tr>
                  <tr>
                    <td class="catfeatc3"><b><a href="<?php echo $auction_link; ?>"><?php echo $item_details[$counter]['name']; ?></a></b></td>
                  </tr>
                  <tr>
                    <td class="catfeatc1"><b>
                        <?php echo MSG_START_BID; ?>
                        :</b> <?php echo $fees->display_amount($item_details[$counter]['start_price'], $item_details[$counter]['currency']); ?> <br>
                      <b>
                        <?php echo MSG_CURRENT_BID; ?>
                        :</b> <?php echo $fees->display_amount($item_details[$counter]['max_bid'], $item_details[$counter]['currency']); ?> <br>
                      <b>
                        <?php echo MSG_ENDS; ?>
                        :</b> <?php echo show_date($item_details[$counter]['end_time']); ?> </td>
                  </tr>
                </table>
                <?php
                $counter++;
              }
              ?></td>
        <?php } ?>
        </tr>
    <?php } ?>
    </table>
  <?php } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
  <tr>
<?php if ($is_subcategories || $is_shop_stores) { ?>
        <!-- add stores as well -->
        <td width="170" valign="top"><?php if ($is_shop_stores) { ?>
            <table width="100%" border="0" cellpadding="3" cellspacing="2" class="contentfont">
              <tr>
                <td class="c3"><?php echo MSG_SHOP_IN_STORES; ?></td>
              </tr>
            <?php echo $shop_stores_content; ?>
            </table>
          <?php } ?>
    <?php if ($is_subcategories) { ?>
            <table width="100%" border="0" cellpadding="3" cellspacing="2" class="contentfont">
              <tr>
                <td class="c3"><?php echo MSG_SUBCATEGORIES; ?></td>
              </tr>
            <?php echo $subcategories_content; ?>
            </table>
        <?php } ?>
        </td>
  <?php } ?>
    <td valign="top">
