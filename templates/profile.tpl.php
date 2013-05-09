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

<table width="100%" border="0" cellspacing="0" cellpadding="0" height="21" style="border-bottom: 2px solid #9c9c9c;">
  <tr>
    <td width="30"><img src="themes/<?php echo $setts['default_theme']; ?>/img/5_start.gif" width="5" height="30" align="absmiddle"></td>
    <td width="100%" background="themes/<?php echo $setts['default_theme']; ?>/img/5_bg.gif" valign="bottom" style="padding-left: 5px; padding-bottom: 3px;"><b style="color: #333333; font-size: 12px;">
        <?php echo MSG_VIEW_MEMBER_PROFILE; ?>
      </b></td>
    <td width="5"><img src="themes/<?php echo $setts['default_theme']; ?>/img/5_end.gif" width="5" height="30" align="absmiddle"></td>
  </tr>
</table>
<br>
<div class="title"> <img src="themes/<?php echo $setts['default_theme']; ?>/img/system/profile.gif" align="absmiddle">
  <?php echo MSG_VIEW_PROFILE_FOR; ?>: <b>
    <?php echo $user_details['username']; ?>
  </b>
  <?php echo user_pics($user_details['user_id']); ?>
</div>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="contentfont">
  <tr valign="top">
    <td width="50%"><table width="100%" border="0" cellspacing="2" cellpadding="3" class="border">
        <tr>
          <td class="c3" colspan="2"><?php echo MSG_INFORMATION; ?>:</td>
        </tr>
        <tr>
          <td class="c5" colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        </tr>
        <tr class="c1">
          <td width="30%" align="right"><b><?php echo MSG_REGISTERED_SINCE; ?></b></td>
          <td width="70%"><b><?php echo show_date($user_details['reg_date'], false); ?></b> <?php echo GMSG_IN . ' <b>' . $seller_country . '</b>'; ?></td>
        </tr>
        <tr class="c1">
          <td align="right"><b><?php echo MSG_PREFERRED_SELLER; ?></b></td>
          <td><?php echo field_display($user_details['preferred_seller'], GMSG_NO, GMSG_YES); ?></td>
        </tr>
        <tr class="c2">
          <td align="right"><b><?php echo MSG_REPUTATION; ?></b></td>
          <td><?php echo user_pics($user_details['user_id'], true); ?></td>
        </tr>
      </table>
      <br>
      <table width="100%" border="0" cellspacing="2" cellpadding="3" class="border">
        <tr>
          <td class="c3" colspan="2"><?php echo MSG_ACTIVITY_INFO; ?>:</td>
        </tr>
        <td class="c5" colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
        <tr class="c1">
          <td width="30%" align="right"><b><?php echo MSG_BIDDING; ?></b></td>
          <td width="70%"><b><?php echo $bidding_times; ?></b> <?php echo MSG_TIMES_IN; ?> <b><?php echo $bidding_auctions; ?></b> <?php echo MSG_AUCTIONS; ?></td>
        </tr>
        <tr class="c2">
          <td align="right"><b><?php echo MSG_SELLING; ?></b></td>
          <td><b><?php echo $nb_open_items; ?></b> <?php echo MSG_LIVE_AUCTIONS; ?>, <b><?php echo $nb_sold_items; ?></b> <?php echo MSG_ITEMS_SOLD; ?></td>
        </tr>
        <tr class="c1">
          <td align="right"><b>Auctions</b></td>
          <td><a href="other_items.php?owner_id=<?php echo $user_id; ?>"><?php echo MSG_FIND_ALL_AUCTIONS_FROM; ?> <b><?php echo $user_details['username']; ?></b></a></td>
      </table>
    </td>
    <td width="1%">&nbsp;</td>
    <td width="50%"><table width="100%" border="0" cellspacing="2" cellpadding="3" class="border">
        <tr>
          <td class="c3" colspan="2"><?php echo MSG_CONTACT_INFO; ?>:</td>
        </tr>
        <tr class="c2">
          <td width="30%" align="right"><b><?php echo MSG_COUNTRY; ?></b></td>
          <td width="70%"><?php echo $seller_country; ?></td>
        </tr>
        <!--
        <tr class="c2">
           <td align="right"><b>Phone</b></td>
           <td>000 000000000</td>
        </tr>
        -->
        <?php if ($user_details['profile_www']) { ?>
            <tr class="c1">
              <td align="right"><b><?php echo MSG_WEBSITE_URL; ?></b></td>
              <td><a href="<?php echo $user_details['profile_www']; ?>" target="_blank"><?php echo $user_details['profile_www']; ?></a></td>
            </tr>
          <?php } ?>
        <?php if ($user_details['profile_msn']) { ?>
            <tr class="c2">
              <td align="right"><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/msn.gif"></td>
              <td><b>MSN:</b> <?php echo $user_details['profile_msn']; ?></td>
            </tr>
          <?php } ?>
        <?php if ($user_details['profile_icq']) { ?>
            <tr class="c1">
              <td align="right"><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/icq.gif"></td>
              <td><b>ICQ:</b> <?php echo $user_details['profile_icq']; ?></td>
            </tr>
          <?php } ?>
        <?php if ($user_details['profile_aim']) { ?>
            <tr class="c2">
              <td align="right"><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/aim.gif"></td>
              <td><b>AIM:</b> <?php echo $user_details['profile_aim']; ?></td>
            </tr>
          <?php } ?>
        <?php if ($user_details['profile_yim']) { ?>
            <tr class="c1">
              <td align="right"><img src="themes/<?php echo $setts['default_theme']; ?>/img/system/yahoo.gif"></td>
              <td><b>YIM:</b> <?php echo $user_details['profile_yim']; ?></td>
            </tr>
          <?php } ?>
        <!--
        <tr class="c1">
           <td align="right"><b>Private Message:</b></td>
           <td><a href="#">Send a private message to <b>myphpauction</b></a></td>
        </tr>
        -->
      </table></td>
  </tr>
</table>
