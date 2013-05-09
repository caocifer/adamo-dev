<?php
#################################################################
## Auctionlivesoft															##
##-------------------------------------------------------------##
## Copyright ©2008 Auctionlivesoft SoftwareLTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<table border="0" cellpadding="3" cellspacing="3" width="100%" class="c1 border contentfont">
  <tr>
    <td class="c2" height="35" align="center">
      <?php echo MSG_WELCOME_BACK; ?>,<br><b><?php echo $member_username; ?></b>
    </td>
  </tr>
  <?php if ($member_active == 'Active') { ?>
      <tr>
        <td class="c4"><b><?php echo MSG_MM_MESSAGING; ?></b></td>
      </tr>
      <tr>
        <td class="c2">
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'messaging', 'section' => 'received')); ?>"><?php echo MSG_MM_RECEIVED; ?></a><br>
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'messaging', 'section' => 'sent')); ?>"><?php echo MSG_MM_SENT; ?></a>
        </td>
      </tr>
      <tr>
        <td class="c4"><b><?php echo MSG_MM_BIDDING; ?></b></td>
      </tr>
      <tr>
        <td class="c2">
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'current_bids')); ?>"><?php echo MSG_MM_CURRENT_BIDS; ?></a><br>
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'won_items')); ?>"><?php echo MSG_MM_WON_ITEMS; ?></a><br>
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'invoices_received')); ?>"><?php echo MSG_MM_INVOICES_RECEIVED; ?></a><br>
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'item_watch')); ?>"><?php echo MSG_MM_WATCHED_ITEMS; ?></a><br />
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'favorite_stores')); ?>"><?php echo MSG_MM_FAVORITE_STORES; ?></a>
        </td>
      </tr>
      <?php if ($is_seller) { ?>
        <tr>
          <td class="c4"><b><?php echo MSG_MM_SELLING; ?></b></td>
        </tr>
        <tr>
          <td class="c2">
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'open')); ?>"><?php echo MSG_MM_OPEN_AUCTIONS; ?></a> <br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'bids_offers')); ?>"><?php echo MSG_MM_ITEMS_WITH_BIDS; ?></a> <br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'scheduled')); ?>"><?php echo MSG_MM_SCHEDULED_AUCTIONS; ?></a> <br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'closed')); ?>"><?php echo MSG_MM_CLOSED_AUCTIONS; ?></a> <br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'drafts')); ?>"><?php echo MSG_MM_DRAFTS; ?></a> <br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'sold')); ?>"><?php echo MSG_MM_SOLD_ITEMS; ?></a><br />
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'invoices_sent')); ?>"><?php echo MSG_MM_INVOICES_SENT; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'fees_calculator')); ?>"><?php echo MSG_MM_FEES_CALCULATOR; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'prefilled_fields')); ?>"><?php echo MSG_MM_PREFILLED_FIELDS; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'block_users')); ?>"><?php echo MSG_MM_BLOCK_USERS; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'suggest_category')); ?>"><?php echo MSG_MM_SUGGEST_CATEGORY; ?></a>
          </td>
        </tr>
      <?php } ?>
      <tr>
        <td class="c4"><b><?php echo MSG_MM_REPUTATION; ?></b></td>
      </tr>
      <tr>
        <td class="c2">
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'reputation', 'section' => 'received')); ?>"><?php echo MSG_MM_MY_REPUTATION; ?></a><br />
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'reputation', 'section' => 'sent')); ?>"><?php echo MSG_MM_LEAVE_COMMENTS; ?></a>
        </td>
      </tr>
      <?php if ($is_seller && $setts['enable_bulk_lister']) { ?>
        <tr>
          <td class="c4"><b><?php echo MSG_MM_BULK; ?></b></td>
        </tr>
        <tr>
          <td class="c2">
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'bulk', 'section' => 'details')); ?>"><?php echo MSG_MM_DETAILS; ?></a>
          </td>
        </tr>
      <?php } ?>
      <tr>
        <td class="c4"><b><?php echo MSG_MM_ABOUT_ME; ?></b></td>
      </tr>
      <tr>
        <td class="c2">
          &raquo; <a href="<?php echo process_link('members_area', array('page' => 'about_me', 'section' => 'view')); ?>"><?php echo MSG_MM_VIEW; ?></a>
          <?php if ($setts['enable_profile_page']) { ?>
            <br>&raquo; <a href="<?php echo process_link('members_area', array('page' => 'about_me', 'section' => 'profile')); ?>"><?php echo MSG_PROFILE_PAGE; ?></a>
          <?php } ?>
        </td>
      </tr>
      <?php if ($setts['enable_stores'] && $is_seller) { ?>
        <tr>
          <td class="c4"><b><?php echo MSG_MM_STORE; ?></b></td>
        </tr>
        <tr>
          <td class="c2">
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'subscription')); ?>"><?php echo MSG_MM_SUBSCRIPTION_SETUP; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'setup')); ?>"><?php echo MSG_MM_MAIN_SETTINGS; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'store_pages')); ?>"><?php echo MSG_MM_STORE_PAGES; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'categories')); ?>"><?php echo MSG_MM_CUSTOM_CATS; ?></a>
          </td>
        </tr>
      <?php } ?>
      <?php if ($setts['enable_wanted_ads']) { ?>
        <tr>
          <td class="c4"><b><?php echo MSG_MM_WANTED_ADS; ?></b></td>
        </tr>
        <tr>
          <td class="c2">
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'new')); ?>"><?php echo MSG_MM_ADD_NEW; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'open')); ?>"><?php echo MSG_MM_OPEN; ?></a><br>
            &raquo; <a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'closed')); ?>"><?php echo MSG_MM_CLOSED; ?></a>
          </td>
        </tr>
      <?php } ?>
    <?php } ?>
  <tr>
    <td class="c4"><b><?php echo MSG_MM_MY_ACCOUNT; ?></b></td>
  </tr>
  <tr>
    <td class="c2">
      &raquo; <a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'editinfo')); ?>"><?php echo MSG_MM_PERSONAL_INFO; ?></a><br>
      &raquo; <a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'management')); ?>"><?php echo MSG_MM_MANAGE_ACCOUNT; ?></a><br>
      <!--&raquo; <a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'invoices')); ?>"><?php echo MSG_MM_INVOICES; ?></a><br>-->
      &raquo; <a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'history')); ?>"><?php echo MSG_MM_ACCOUNT_HISTORY; ?></a><br>
      &raquo; <a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'mailprefs')); ?>"><?php echo MSG_MM_MAIL_PREFS; ?></a><br>
      &raquo; <a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'abuse_report')); ?>"><?php echo MSG_MM_ABUSE_REPORT; ?></a>
    </td>
  </tr>
</table>
<br>