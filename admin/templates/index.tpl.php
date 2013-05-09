<?php
#################################################################
## MyPHPAuction v6.04															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<?php echo $insufficient_priv_msg; ?>
<!-- Draw main menu on Admin home page -->

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" width="50%">
      <div class="mainhead"><img src="images/general.gif" align="absmiddle"><?php echo AMSG_SITE_SETUP; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="site_setup.php"><?php echo AMSG_SITE_NAME; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="site_setup.php"><?php echo AMSG_SITE_URL; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="site_setup.php"><?php echo AMSG_ADMIN_EMAIL; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="site_setup.php"><?php echo AMSG_CHOOSE_SITE_SKIN; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="site_setup.php"><?php echo AMSG_CHOOSE_SITE_LOGO; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="site_setup.php"><?php echo AMSG_CHOOSE_DEFAULT_LANG; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="site_setup.php"><?php echo AMSG_MAINTENANCE_MODE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="../initialize_counters.php" target="_blank"><?php echo AMSG_INITIALIZE_COUNTERS; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/set.gif" align="absmiddle"><?php echo AMSG_GENERAL_SETTINGS; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=signup_settings"><?php echo AMSG_USER_SIGNUP_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=closed_auctions_deletion"><?php echo AMSG_CLOSED_AUCT_DEL; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=hpfeat_items"><?php echo AMSG_HPFEAT_ITEMS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=catfeat_items"><?php echo AMSG_CATFEAT_ITEMS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=recently_listed_auctions"><?php echo AMSG_RECENT_AUCTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=popular_auctions"><?php echo AMSG_POPULAR_AUCTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=ending_soon_auctions"><?php echo AMSG_ENDING_SOON_AUCTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=auction_images"><?php echo AMSG_AUCTION_IMAGES_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=currency_setts"><?php echo AMSG_CURRENCY_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=time_date_setts"><?php echo AMSG_TIME_DATE_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=ssl_support"><?php echo AMSG_SETUP_SSL_SUPPORT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=meta_tags"><?php echo AMSG_META_TAGS_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=cron_jobs"><?php echo AMSG_CRON_JOBS_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=min_reg_age"><?php echo AMSG_MIN_REG_AGE_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=recent_wanted_ads"><?php echo AMSG_RECENT_WANTED_ADS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=auction_media"><?php echo AMSG_MEDIA_UPLOAD_SETTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=buy_out_method"><?php echo AMSG_SEL_BUY_OUT_METHOD; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=sellitem_buttons"><?php echo AMSG_SELLING_PROCESS_NAV_BTNS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=nb_autorelists"><?php echo AMSG_MAX_NB_AUTORELISTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=invoices_settings"><?php echo AMSG_INVOICES_SETTINGS; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/enable.gif" align="absmiddle"><?php echo AMSG_ENABLE_DISABLE; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=shipping_costs"><?php echo AMSG_SHIPPING_COSTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=hp_login_box"><?php echo AMSG_HP_LOGIN_BOX; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=hp_news_box"><?php echo AMSG_HP_NEWS_BOX; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=buy_out_method"><?php echo AMSG_BUY_OUT_METHOD; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=registration_terms"><?php echo AMSG_REGISTRATION_TERMS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=sellitem_terms"><?php echo AMSG_SELLITEM_TERMS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=swapping"><?php echo AMSG_SWAPPING; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=hp_counter"><?php echo AMSG_HP_COUNTER; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=addl_category_listing"><?php echo AMSG_ADDL_CATEGORY_LISTING; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=user_languages"><?php echo AMSG_USER_LANGUAGES; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=auction_sniping"><?php echo AMSG_AUCTION_SNIPING; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=private_site"><?php echo AMSG_PRIVATE_SITE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=preferred_sellers"><?php echo AMSG_PREFERRED_SELLERS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=bcc_emails"><?php echo AMSG_BCC_EMAILS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=seller_questions"><?php echo AMSG_SELLER_QUESTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=wanted_ads"><?php echo AMSG_WANTED_ADS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=bid_retraction"><?php echo AMSG_BID_RETRACTION; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=seller_other_items"><?php echo AMSG_SELLER_OTHER_ITEMS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=bulk_lister"><?php echo AMSG_BULK_LISTER; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=category_counters"><?php echo AMSG_CATEGORY_COUNTERS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=phone_nb_sale"><?php echo AMSG_PHONE_NB_SALE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=mod_rewrite"><?php echo AMSG_MOD_REWRITE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=auction_approval"><?php echo AMSG_ENABLE_AUCT_APPROVAL; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=change_duration"><?php echo AMSG_CHG_DURATION_ON_BID_PLACED; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=seller_verification"><?php echo AMSG_ENABLE_SELLER_VERIFICATION; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=profile_page"><?php echo AMSG_ENABLE_PROFILE_PAGE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=store_only_mode"><?php echo AMSG_ENABLE_STORE_ONLY_MODE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=skin_change"><?php echo AMSG_ENABLE_SKIN_CHANGE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=second_chance"><?php echo AMSG_ENABLE_SECOND_CHANCE; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/fees.gif" align="absmiddle"><?php echo AMSG_FEES; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="fees_settings.php"><?php echo AMSG_MAIN_SETTINGS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="fees_payment_gateways.php"><?php echo AMSG_SETUP_PAYMENT_GATEWAYS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="fees_management.php"><?php echo AMSG_FEES_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_currencies.php"><?php echo AMSG_CURRENCY_SETTINGS; ?></a>
            <!--
          <br><img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=mcrypt"><?php echo AMSG_MCRYPT_SETTINGS; ?></a>
            -->
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/fields.gif" align="absmiddle"><?php echo AMSG_CUSTOM_FIELDS_SETUP; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="custom_fields_types.php"><?php echo AMSG_SETUP_FIELD_TYPES; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table></td>
    <td><img src="images/pixel.gif" height="1" width="20"></td>
    <td width="50%" valign="top">
      <div class="mainhead"><img src="images/user.gif" align="absmiddle"><?php echo AMSG_USERS_MANAGEMENT; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_admin_users.php"><?php echo AMSG_ADMIN_USERS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_site_users.php"><?php echo AMSG_USERS_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="custom_fields.php?page=register"><?php echo AMSG_CUSTOM_REG_FIELDS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="user_login.php"><?php echo AMSG_LOGIN_AS_SITE_USER; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_users_reputations.php"><?php echo AMSG_USERS_REP_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="custom_fields.php?page=reputation_sale"><?php echo AMSG_CUSTOM_REP_FIELDS_MANAGEMENT_SALE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="custom_fields.php?page=reputation_purchase"><?php echo AMSG_CUSTOM_REP_FIELDS_MANAGEMENT_PURCHASE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="send_activation_emails.php"><?php echo AMSG_REG_ACTIVATION_EMAILS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="user_newsletter.php"><?php echo AMSG_SEND_NEWSLETTER; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="abuse_reports.php"><?php echo AMSG_ABUSE_REPORTS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="ban_users.php"><?php echo AMSG_BAN_USERS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="blocked_users.php"><?php echo AMSG_BLOCKED_USERS; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/auction.gif" align="absmiddle"><?php echo AMSG_AUCTIONS_MANAGEMENT; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_auctions.php?status=open"><?php echo AMSG_OPEN_AUCTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_auctions.php?status=closed"><?php echo AMSG_CLOSED_AUCTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_auctions.php?status=unstarted"><?php echo AMSG_UNSTARTED_AUCTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_auctions.php?status=suspended"><?php echo AMSG_SUSPENDED_AUCTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_sold_items.php"><?php echo AMSG_SOLD_ITEMS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_auctions.php?status=approval"><?php echo AMSG_AUCTIONS_AWAITING_APPROVAL; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="custom_fields.php?page=auction"><?php echo AMSG_CUSTOM_AUCT_FIELDS_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_wanted_ads.php"><?php echo AMSG_WANTED_ADS_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="custom_fields.php?page=wanted_ad"><?php echo AMSG_CUSTOM_WANTED_ADS_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="list_messaging.php"><?php echo AMSG_USER_MESSAGES_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="images_removal_tool.php"><?php echo AMSG_OLD_IMAGES_REMOVAL_TOOL; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/tables.gif" align="absmiddle"><?php echo AMSG_TABLES_MANAGEMENT; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_countries.php"><?php echo AMSG_EDIT_COUNTRIES; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_item_durations.php"><?php echo AMSG_EDIT_ITEM_DURATIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_payment_options.php"><?php echo AMSG_EDIT_PAYMENT_OPTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_shipping_options.php"><?php echo AMSG_EDIT_SHIPPING_OPTIONS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_bid_increments.php"><?php echo AMSG_EDIT_BID_INCREMENTS; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/stores.gif" align="absmiddle"><?php echo AMSG_STORES_MANAGEMENT; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="enable_disable.php?page=enable_stores"><?php echo AMSG_ENABLE_STORES; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="stores_subscriptions.php"><?php echo AMSG_STORE_SUBSCRIPTIONS_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="stores_management.php"><?php echo AMSG_STORES_MANAGEMENT; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/cat.gif" align="absmiddle"><?php echo AMSG_CATEGORIES; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_categories.php"><?php echo AMSG_EDIT_CATEGORIES; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="categories_lang.php"><?php echo AMSG_EDIT_CAT_LANG_FILES; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="table_suggested_categories.php"><?php echo AMSG_VIEW_SUGGESTED_CATEGORIES; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/content.gif" align="absmiddle"><?php echo AMSG_SITE_CONTENT; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="vouchers_management.php"><?php echo AMSG_VOUCHERS_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_section.php?page=help"><?php echo AMSG_EDIT_HELP_SECTION; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_section.php?page=news"><?php echo AMSG_EDIT_NEWS_SECTION; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_section.php?page=faq"><?php echo AMSG_EDIT_FAQ_SECTION; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_pages.php?page=about_us"><?php echo AMSG_EDIT_ABOUT_US_PAGE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_pages.php?page=contact_us"><?php echo AMSG_EDIT_CONTACT_US_PAGE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_pages.php?page=terms"><?php echo AMSG_EDIT_TERMS_PAGE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_pages.php?page=privacy"><?php echo AMSG_EDIT_PRIVACY_PAGE; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_section.php?page=custom_page"><?php echo AMSG_CUSTOM_PAGES_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_system_emails.php"><?php echo AMSG_EDIT_SYSTEM_EMAILS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_banners_management.php"><?php echo AMSG_SITE_BANNERS_MANAGEMENT; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_language_files.php"><?php echo AMSG_EDIT_SITE_LANGUAGE_FILES; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="content_section.php?page=announcements"><?php echo AMSG_EDIT_MEMBERS_ANNOUNCEMENTS; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/tax.gif" align="absmiddle"><?php echo AMSG_TAX_SETTINGS; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="general_settings.php?page=enable_tax"><?php echo AMSG_ENABLE_TAX; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="tax_settings.php"><?php echo AMSG_TAX_CONFIGURATION; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table>
      <br>
      <div class="mainhead"><img src="images/tools.gif" align="absmiddle"><?php echo AMSG_TOOLS; ?></div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
          <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="fside">
        <tr>
          <td width="100%" class="menulink">
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="word_filter.php"><?php echo AMSG_WORD_FILTER; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="block_free_emails.php"><?php echo AMSG_BLOCK_FREE_EMAILS; ?></a> <br>
            <img src="images/a.gif" align="absmiddle" vspace="2"> <a href="http://www.xe.com/ucc/" target="_blank"><?php echo AMSG_CURRENCY_CONVERTER; ?></a> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
          <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
          <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
        </tr>
      </table></td>
  </tr>
</table>
