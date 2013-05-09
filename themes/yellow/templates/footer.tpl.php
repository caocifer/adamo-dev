<?php
  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
</td>
</tr>
</table>







<div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
<div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
<div align="center">
  <?php echo $banner_header_content; ?>
</div>
<div><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="5"></div>
<div style="padding: 5px; border-bottom:1px solid #cccccc; color:#9999FF" class="footerfont">

  <a href="<?php echo $index_link; ?>"><?php echo MSG_BTN_HOME; ?></a>
  <?php if (!$setts['enable_private_site'] || $is_seller) { ?>
      | <a href="<?php echo $place_ad_link; ?>"><?php echo $place_ad_btn_msg; ?></a>
    <?php } ?>
  | <a href="<?php echo $register_link; ?>"><?php echo $register_btn_msg; ?></a>
  | <a href="<?php echo $login_link; ?>"><?php echo $login_btn_msg; ?></a>
  | <a href="<?php echo process_link('content_pages', array('page' => 'help')); ?>"><?php echo MSG_BTN_HELP; ?></a>
  | <a href="<?php echo process_link('content_pages', array('page' => 'faq')); ?>"><?php echo MSG_BTN_FAQ; ?></a>
  | <a href="<?php echo process_link('site_fees'); ?>"><?php echo MSG_BTN_SITE_FEES; ?></a>
  <?php if ($layout['is_about']) { ?>
      | <a href="<?php echo process_link('content_pages', array('page' => 'about_us')); ?>"><?php echo MSG_BTN_ABOUT_US; ?></a>
    <?php } ?>
  <?php if ($layout['is_contact']) { ?>
      | <a href="<?php echo process_link('content_pages', array('page' => 'contact_us')); ?>"><?php echo MSG_BTN_CONTACT_US; ?></a>
    <?php } ?>
  <?php echo $custom_pages_links; ?>
</div>
<div class="footerfont1"> <b></b>
  <br>
  <b>
  </b>
  <center>Copyright &copy <?php echo date("Y") ?> - <a href="./" title="<?php echo $page_title; ?>"><?php echo $page_title; ?></a> - <?php if ($layout['is_terms']) { ?>
        <a href="<?php echo process_link('content_pages', array('page' => 'terms')); ?>"><?php echo MSG_BTN_TERMS; ?></a>. Script Licensed and Developed by <a href="http://www.iformatsoftware.com" title="The Best Clone Scripts, Ready Made Websites, PHP Scripts Tools & Software Apps">iFormatSoftware.com</a>.
      <?php } ?>
    <?php if ($layout['is_pp']) { ?>
        and <a href="<?php echo process_link('content_pages', array('page' => 'privacy')); ?>"><?php echo MSG_BTN_PRIVACY; ?></a></center>
    <?php } ?>
</div>
<div align="center" style="padding: 5px; color: #666666;">
</div>

</td>
</tr>
</table>
</body></html>