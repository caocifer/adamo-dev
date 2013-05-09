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
<script type="text/javascript">
  function noenter() {
    return !(window.event && window.event.keyCode == 13);
  }
</script>
<?php echo $bid_header_message; ?>

<table width="100%" border="0" cellpadding="0" cellspacing="2" class="subitem">
  <tr>
    <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/status1.gif" vspace="5" align="absmiddle"></td>
    <td nowrap><?php echo MSG_WELCOME; ?>, <br>
      <b><?php echo $session->value('username'); ?></b></td>
    <td class="contentfont" width="100%" align="right" >>> <a href="<?php echo process_link('auction_details', array('auction_id' => $item_details['auction_id'])); ?>">
        <?php echo MSG_RETURN_TO_AUCTION_DETAILS_PAGE; ?></a>&nbsp;&nbsp;</td>
  </tr>
</table>
<?php echo $bidding_error_message; ?>
<?php echo $bidding_page_content; ?>