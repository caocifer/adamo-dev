<?php
#################################################################
## myphpauction V6.8															##
##-------------------------------------------------------------##
## Copyright ©2008 myphpauction SoftwareLTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<table width="100%" border="0" cellspacing="1" cellpadding="2" class="bordercat">
  <tr><td></td></tr>
  <tr><td></td></tr>
  <?php
    while ($cats_header_details = $db->fetch_array($sql_select_cats_list)) {
      $category_link = process_link('categories', array('category' => $category_lang[$cats_header_details['category_id']], 'parent_id' => $cats_header_details['category_id']));
      ?>

      <tr>
        <td class="contentfont">
      <!--<img src="themes/<?php echo $setts['default_theme']; ?>/img/arrow.gif" hspace="3" align="absmiddle">--><a class="ln" href="<?php echo $category_link; ?>" <?php echo ((!empty($cats_header_details['hover_title'])) ? 'title="' . $cats_header_details['hover_title'] . '"' : ''); ?>>
            <?php echo $category_lang[$cats_header_details['category_id']]; ?>
            <?php echo (($setts['enable_cat_counters']) ? (($cats_header_details['items_counter']) ? '(<strong>' . $cats_header_details['items_counter'] . '</strong>)' : '(' . $cats_header_details['items_counter'] . ')') : ''); ?></a></td>
      </tr>
    <?php } ?>
  <tr><td></td></tr>
  <tr><td></td></tr>
</table>
<div class="stat"><div class="nav_r"><div class="nav_l"><div class="nav"></div></div></div></div>