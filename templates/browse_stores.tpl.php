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
<?php echo $header_stores_page; ?>
<?php echo $store_search_box; ?>
<br>
<?php if ($nb_featured_stores) { ?>
    <?php echo headercat(MSG_FEATURED_STORES); ?>
    <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
      <?php echo $featured_stores_table; ?>
    </table>
    <br>
  <?php } ?>
<?php echo headercat(MSG_ALL_STORES); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="6" class="border">
  <?php echo $store_browse_table; ?>
  <?php if ($nb_stores > 0) { ?>
      <tr>
        <td colspan="8" align="center" class="contentfont"><?php echo $pagination; ?></td>
      </tr>
    <?php } ?>
</table>

