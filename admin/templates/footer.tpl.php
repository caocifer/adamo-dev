<?php
#################################################################
## MyPHPAuction v6.04                              ##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.  ##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
</td>
</tr>
</table>

<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-top: 1px solid #777777; background-image: url(images/bg_foo.gif); background-repeat: repeat-x; background-position: top;">
  <tr height="35">
    <td class='contentfont'>&nbsp;&nbsp;&nbsp;<b>Copyright &copy <?php echo date("Y") ?> - <a href="./" title="<?php echo $setts['sitename']; ?>"><?php echo $setts['sitename']; ?></a> - Script Licensed and Developed by <a href="http://www.iformatsoftware.com" title="The Best Clone Scripts, Ready Made Websites, PHP Scripts Tools & Software Apps">iFormatSoftware.com</a>. All rights reserved.</b></td>
    <td class='contentfont' style="color: #666666;" align="right"><?php if ($setts['debug_load_time']) { ?>
          <?php echo GMSG_PAGE_LOADED_IN; ?>
          <?php echo $time_passed; ?>
          <?php echo GMSG_SECONDS; ?>
        <?php } ?>
      <?php if ($setts['debug_load_memory']) { ?>
          <?php echo GMSG_MEMORY_USAGE; ?>
          <?php echo $memory_usage; ?>
          KB
        <?php } ?>
      &nbsp;&nbsp;&nbsp; </td>
  </tr>
</table>
</body></html>