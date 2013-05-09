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

<br>
<form action="members_area.php?page=about_me&section=view" method="POST">
  <table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
    <tr>
      <td colspan="2" class="c7"><b>
          <?php echo MSG_MM_ABOUT_ME_PAGE; ?>
        </b></td>
    </tr>
    <tr class="c1">
      <td colspan="2"><?php echo MSG_ABOUT_ME_PAGE_EXPL; ?></td>
    </tr>
    <tr>
      <td colspan="2"><b>
          <?php echo MSG_STORE_STATUS; ?>
        </b>:
        <?php echo $shop_status['display']; ?></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr class="c1">
      <td align="right"><?php echo MSG_ENABLE_ABOUT_ME_PAGE; ?></td>
      <td><input name="enable_aboutme_page" type="checkbox" id="enable_aboutme_page" value="1" <?php echo ($user_details['enable_aboutme_page']) ? 'checked' : ''; ?>></td>
    </tr>
    <tr class="c1">
      <td align="right"><?php echo MSG_ABOUT_ME_PAGE_CONTENT; ?></td>
      <td><textarea id="aboutme_page_content" name="aboutme_page_content" style="width: 400px; height: 200px; overflow: hidden;"><?php echo $user_details['aboutme_page_content']; ?></textarea>
        <script>
          var oEdit_1 = new InnovaEditor("oEdit_1");
          oEdit_1.width = "100%";//You can also use %, for example: oEdit1.width="100%"
          oEdit_1.height = 250;
          oEdit_1.REPLACE("aboutme_page_content");//Specify the id of the textarea here
        </script></td>
    </tr>
    <tr class="c5">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="150" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="form_aboutme_save" value="<?php echo GMSG_PROCEED; ?>" /></td>
    </tr>
  </table>
</form>
