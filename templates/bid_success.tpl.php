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
<?php echo $bidding_success_message; ?>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="errormessage">
  <tr>
    <td><?php echo MSG_OUTBID_EXPL_NOTE; ?></td>
 	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="contentfont"><table width="100%" border="0" cellpadding="3" cellspacing="2">
        <tr class="c4">
          <td align="right"><strong>
              <?php echo MSG_ITEM_TITLE; ?>
            </strong></td>
          <td><strong>
              <?php echo $item_details['name']; ?>
            </strong></td>
        </tr>
        <tr class="c4">
          <td></td>
          <td></td>
        </tr>
        <tr class="c1">
          <td align="right"><b><?php echo MSG_TIME_LEFT; ?></b></td>
          <td><?php echo time_left($item_details['end_time']); ?></td>
        </tr>
        <tr class="c1">
          <td width="150" align="right"><strong>
              <?php echo MSG_CURRENT_BID; ?></strong></td>
          <td><?php echo $fees->display_amount($item_details['max_bid'], $item_details['currency']); ?></td>
        </tr>
        <tr class="c4">
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td width="150"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
          <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
      </table>
      <div align="center" class="contentfont"><?php echo MSG_TRACK_BID_EXPL; ?></div>
    </td>
  </tr>
</table>
