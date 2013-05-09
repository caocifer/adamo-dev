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
<?php echo $header_wanted_ads; ?>

<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <form action="wanted_ads.php" method="get">
    <input type="hidden" name="option" value="search">
    <tr>
      <td class="c3"><?php echo MSG_SEARCH_WANTED_ADS; ?></td>
    </tr>
    <tr>
      <td class="c5"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1 contentfont">
      <td><INPUT size="40" name="keywords_search" value="<?php echo $keywords_search; ?>">
        &nbsp;
        <input name="form_search_proceed" type="submit" value="<?php echo GMSG_SEARCH; ?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <b><a href="members_area.php?page=wanted_ads&section=new">
            <?php echo MSG_SUBMIT_WANTED_AD; ?>
          </a></b> ] </td>
    </tr>
  </form>
</table>
<br>
<?php echo headercat($categories_header_menu); ?>
<div id="exp11021709934728">
  <?php if ($is_subcategories) { ?>
      <table width="100%" border="0" cellpadding="6" cellspacing="0" class="contentfont">
        <tr>
          <?php echo $subcategories_content; ?>
        </tr>
      </table>
    <?php } ?>
</div>
<noscript>
JS not supported
</noscript>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr class="membmenu" valign="top">
    <td align="center"><?php echo MSG_PICTURE; ?></td>
    <td><?php echo MSG_ITEM_TITLE; ?>
      <br>
      <?php echo $page_order_itemname; ?></td>
    <td align="center"><?php echo MSG_NR_OFFERS; ?>
      <br>
      <?php echo $page_order_nb_bids; ?></td>
    <td align="center"><?php echo MSG_ENDS; ?>
      <br>
      <?php echo $page_order_end_time; ?></td>
  </tr>
  <tr class="<?php echo (IS_SHOP == 1) ? 'c5_shop' : 'c5'; ?>">
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
    <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="50" height="1"></td>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
  </tr>
  <?php echo $browse_wanted_ads_content; ?>
  <?php if ($nb_items > 0) { ?>
      <tr>
        <td colspan="6" align="center"><?php echo $pagination; ?></td>
      </tr>
    <?php } ?>
</table>
