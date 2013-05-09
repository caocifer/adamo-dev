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

<table width="100%" border="0" cellspacing="0" cellpadding="2" class="bordercat">
  <?php while ($news_details = $db->fetch_array($sql_select_news)) { ?>
      <tr> 
        <td><img src="themes/<?php echo $setts['default_theme']; ?>/images/arrow.gif" width="8" height="8" hspace="4"></td> 
        <td width="100%" class="smallfont"><b><?php echo show_date($news_details['reg_date'], false); ?></b></td> 
      </tr> 
      <tr> 
        <td></td> 
        <td class="smallfont"><a href="<?php echo process_link('content_pages', array('page' => 'news', 'topic_id' => $news_details['topic_id'])); ?>"><?php echo $news_details['topic_name']; ?></a></td> 
      </tr>
    <?php } ?>
  <tr bgcolor="#fff1a1">
    <td></td>
    <td class="contentfont" align="right"><b><a href="<?php echo process_link('content_pages', array('page' => 'news')); ?>"><?php echo MSG_VIEW_ALL; ?></a></b>&nbsp;</td>
  </tr>
</table>
