<?php
#################################################################
## myphpauction															##
##-------------------------------------------------------------##
## Copyright ©2008 myphpauction SoftwareLTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr align="center">
    <?php if ($member_active == 'Active') { ?>
        <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'messaging', 'section' => 'received')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_messaging.gif" border="0"></a></td>
        <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'current_bids')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_bidding.gif" border="0"></a></td>
        <?php if ($is_seller) { ?>
          <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'open')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_selling.gif" border="0"></a></td>
        <?php } ?>
        <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'reputation', 'section' => 'received')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_feedback.gif" border="0"></a></td>
        <?php if ($is_seller && $setts['enable_bulk_lister']) { ?>
          <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'bulk', 'section' => 'details')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_bulk.gif" border="0"></a></td>
        <?php } ?>
        <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'about_me', 'section' => 'view')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_aboutme.gif" border="0"></a></td>
        <?php if ($setts['enable_stores'] && $is_seller) { ?>
          <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'subscription')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_store.gif" border="0"></a></td>
        <?php } ?>
        <?php if ($setts['enable_wanted_ads']) { ?>
          <td class="membmenuicon" width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'open')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_wanted.gif" border="0"></a></td>
        <?php } ?>
      <?php } ?>
    <td class="membmenuicon" ><a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'editinfo')); ?>"><img src="themes/<?php echo $setts['default_theme']; ?>/images/system/ma_details.gif" border="0"></a></td>
  </tr>
  <tr align="center" height="21">
    <?php if ($member_active == 'Active') { ?>
        <td <?php echo (($page == 'messaging') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'messaging', 'section' => 'received')); ?>"><?php echo MSG_MM_MESSAGING; ?></a></td>
        <td <?php echo (($page == 'bidding') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'current_bids')); ?>"><?php echo MSG_MM_BIDDING; ?></a></td>
        <?php if ($is_seller) { ?>
          <td <?php echo (($page == 'selling') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'open')); ?>"><?php echo MSG_MM_SELLING; ?></a></td>
        <?php } ?>
        <td <?php echo (($page == 'reputation') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'reputation', 'section' => 'received')); ?>"><?php echo MSG_MM_REPUTATION; ?></a></td>
        <?php if ($is_seller && $setts['enable_bulk_lister']) { ?>
          <td <?php echo (($page == 'bulk') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'bulk', 'section' => 'details')); ?>"><?php echo MSG_MM_BULK_SHORT; ?></a></td>
        <?php } ?>
        <td <?php echo (($page == 'about_me') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'about_me', 'section' => 'view')); ?>"><?php echo MSG_MM_ABOUT_ME; ?></a></td>
        <?php if ($setts['enable_stores'] && $is_seller) { ?>
          <td <?php echo (($page == 'store') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'subscription')); ?>"><?php echo MSG_MM_STORE; ?></a></td>
        <?php } ?>
        <?php if ($setts['enable_wanted_ads']) { ?>
          <td <?php echo (($page == 'wanted_ads') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?> width="<?php echo $cell_width; ?>"><a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'open')); ?>"><?php echo MSG_MM_WANTED_ADS; ?></a></td>
        <?php } ?>
      <?php } ?>
    <td <?php echo (($page == 'account') ? 'class="memmenu_a"' : 'class="memmenu_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'editinfo')); ?>"><?php echo MSG_MM_MY_ACCOUNT; ?></a></td>
  </tr>
</table>

<table border="0" cellpadding="3" cellspacing="0" width="100%" class="submembmenu">
  <tr>
    <?php if ($page == 'messaging') { ?>
        <td nowrap <?php echo (($section == 'received') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'messaging', 'section' => 'received')); ?>">
            <?php echo MSG_MM_RECEIVED; ?></a></td>
        <td nowrap <?php echo (($section == 'sent') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'messaging', 'section' => 'sent')); ?>">
            <?php echo MSG_MM_SENT; ?></a></td>
        <?php
      }
      else if ($page == 'bidding') {
        ?>
        <td nowrap <?php echo (($section == 'current_bids') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'current_bids')); ?>">
            <?php echo MSG_MM_CURRENT_BIDS; ?></a></td>
        <td nowrap <?php echo (($section == 'won_items') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'won_items')); ?>">
            <?php echo MSG_MM_WON_ITEMS; ?></a></td>
        <td nowrap <?php echo (($section == 'invoices_received') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'invoices_received')); ?>">
            <?php echo MSG_MM_INVOICES_RECEIVED; ?></a></td>
        <td nowrap <?php echo (($section == 'item_watch') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'item_watch')); ?>">
            <?php echo MSG_MM_WATCHED_ITEMS; ?></a></td>
        <td nowrap <?php echo (($section == 'favorite_stores') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'bidding', 'section' => 'favorite_stores')); ?>">
            <?php echo MSG_MM_FAVORITE_STORES; ?></a></td>

        <?php
      }
      else if ($page == 'selling') {
        ?>
        <td nowrap <?php echo (($section == 'open') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'open')); ?>">
            <?php echo MSG_MM_OPEN; ?></a></td>
        <td nowrap <?php echo (($section == 'bids_offers') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'bids_offers')); ?>">
            <?php echo MSG_MM_ITEMS_WITH_BIDS; ?></a></td>
        <td nowrap <?php echo (($section == 'scheduled') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'scheduled')); ?>">
            <?php echo MSG_MM_SCHEDULED; ?></a></td>
        <td nowrap <?php echo (($section == 'closed') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'closed')); ?>">
            <?php echo MSG_MM_CLOSED; ?></a></td>
        <td nowrap <?php echo (($section == 'drafts') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'drafts')); ?>">
            <?php echo MSG_MM_DRAFTS; ?></a></td>
        <td nowrap <?php echo (($section == 'sold') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'sold')); ?>">
            <?php echo MSG_MM_SOLD; ?></a></td>
        <td nowrap <?php echo (($section == 'invoices_sent') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'invoices_sent')); ?>">
            <?php echo MSG_MM_INVOICES_SENT; ?></a></td>
        <td nowrap <?php echo (($section == 'fees_calculator') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'fees_calculator')); ?>">
            <?php echo MSG_MM_FEES_CALCULATOR; ?></a></td>
        <td nowrap <?php echo (($section == 'prefilled_fields') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'prefilled_fields')); ?>">
            <?php echo MSG_MM_PREFILLED_FIELDS; ?></a></td>
        <td nowrap <?php echo (($section == 'block_users') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'block_users')); ?>">
            <?php echo MSG_MM_BLOCK_USERS; ?></a></td>
        <td nowrap <?php echo (($section == 'suggest_category') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'selling', 'section' => 'suggest_category')); ?>">
            <?php echo MSG_MM_SUGGEST_CATEGORY; ?></a></td>

        <?php
      }
      else if ($page == 'reputation') {
        ?>
        <td nowrap <?php echo (($section == 'received') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'reputation', 'section' => 'received')); ?>">
            <?php echo MSG_MM_MY_REPUTATION; ?></a></td>
        <td nowrap <?php echo (($section == 'sent') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'reputation', 'section' => 'sent')); ?>">
            <?php echo MSG_MM_LEAVE_COMMENTS; ?></a></td>

        <?php
      }
      else if ($page == 'bulk') {
        ?>
        <td nowrap <?php echo (($section == 'details') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'bulk', 'section' => 'details')); ?>">
            <?php echo MSG_MM_DETAILS; ?></a></td>

        <?php
      }
      else if ($page == 'about_me') {
        ?>
        <td nowrap <?php echo (($section == 'view') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'about_me', 'section' => 'view')); ?>">
            <?php echo MSG_MM_VIEW; ?></a></td>
        <?php if ($setts['enable_profile_page']) { ?>
          <td nowrap <?php echo (($section == 'profile') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'about_me', 'section' => 'profile')); ?>">
              <?php echo MSG_PROFILE_PAGE; ?></a></td>
        <?php } ?>

        <?php
      }
      else if ($page == 'store') {
        ?>
        <td nowrap <?php echo (($section == 'subscription') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'subscription')); ?>">
            <?php echo MSG_MM_SUBSCRIPTION_SETUP; ?></a></td>
        <td nowrap <?php echo (($section == 'setup') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'setup')); ?>">
            <?php echo MSG_MM_MAIN_SETTINGS; ?></a></td>
        <td nowrap <?php echo (($section == 'store_pages') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'store_pages')); ?>">
            <?php echo MSG_MM_STORE_PAGES; ?></a></td>
        <td nowrap <?php echo (($section == 'categories') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'store', 'section' => 'categories')); ?>">
            <?php echo MSG_MM_CUSTOM_CATS; ?></a></td>

        <?php
      }
      else if ($page == 'wanted_ads') {
        ?>
        <td nowrap <?php echo (($section == 'new') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'new')); ?>">
            <?php echo MSG_MM_ADD_NEW; ?></a></td>
        <td nowrap <?php echo (($section == 'open') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'open')); ?>">
            <?php echo MSG_MM_OPEN; ?></a></td>
        <td nowrap <?php echo (($section == 'closed') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'wanted_ads', 'section' => 'closed')); ?>">
            <?php echo MSG_MM_CLOSED; ?></a></td>

        <?php
      }
      else if ($page == 'account') {
        ?>
        <td nowrap <?php echo (($section == 'editinfo') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'editinfo')); ?>">
            <?php echo MSG_MM_PERSONAL_INFO; ?></a></td>
        <td nowrap <?php echo (($section == 'management') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'management')); ?>">
            <?php echo MSG_MM_MANAGE_ACCOUNT; ?></a></td>
        <td nowrap <?php echo (($section == 'history') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'history')); ?>">
            <?php echo MSG_MM_ACCOUNT_HISTORY; ?></a></td>
        <td nowrap <?php echo (($section == 'mailprefs') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'mailprefs')); ?>">
            <?php echo MSG_MM_MAIL_PREFS; ?></a></td>
        <td nowrap <?php echo (($section == 'abuse_report') ? 'class="subcell_a"' : 'class="subcell_u"'); ?>><a href="<?php echo process_link('members_area', array('page' => 'account', 'section' => 'abuse_report')); ?>">
            <?php echo MSG_MM_ABUSE_REPORT; ?></a></td>
      <?php } ?>
   	<td width="100%"></td>
  </tr>
</table>

<?php if ($pref_seller_reduction) { ?>
    <img src="themes/<?php echo $setts['default_theme']; ?>/images/pixel.gif" border="0" width="1" height="5">
    <table border="0" cellpadding="6" cellspacing="0" width="100%">
      <tr>
        <td class="c1" align="center"><?php echo '[ <strong>' . MSG_PREFERRED_SELLER . ' - ' . $setts['pref_sellers_reduction'] . '% ' . MSG_REDUCTION_EXPL . '</strong> ]'; ?> </td>
      </tr>
    </table>
  <?php } ?>
<?php if ($credit_limit_warning) { ?>
    <img src="themes/<?php echo $setts['default_theme']; ?>/images/pixel.gif" border="0" width="1" height="5">
    <table border="0" cellpadding="6" cellspacing="0" width="100%">
      <tr>
        <td class="c2"><?php echo MSG_CREDIT_LIMIT_WARNING; ?></td>
      </tr>
    </table>
  <?php } ?>