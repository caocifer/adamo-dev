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

<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <tr>
    <td class="c3" colspan="2"><b>
        <?php echo MSG_SEND_TO_FRIEND; ?>
      </b></td>
  </tr>
  <tr>
    <td class="c5" colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
  </tr>
  <?php echo $display_formcheck_errors; ?>
  <form action="auction_details.php" method="get">
    <input type="hidden" name="option" value="auction_friend">
    <input type="hidden" name="auction_id" value="<?php echo $auction_id; ?>">
    <tr class="c1">
      <td nowrap align="right"><?php echo MSG_YOUR_NAME; ?></td>
      <td><input type="text" name="name" value="<?php echo $post_details['name']; ?>" size="40"></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><?php echo MSG_YOUR_EMAIL_ADDRESS; ?></td>
      <td><input type="text" name="email" value="<?php echo $post_details['email']; ?>" size="40"></td>
    </tr>
    <tr class="c1">
      <td nowrap align="right"><?php echo MSG_FRIENDS_NAME; ?></td>
      <td><input type="text" name="friend_name" value="<?php echo $post_details['friend_name']; ?>" size="40"></td>
    </tr>
    <tr class="c1">
      <td align="right" nowrap><?php echo MSG_FRIENDS_EMAIL; ?></td>
      <td><input type="text" name="friend_email" value="<?php echo $post_details['friend_email']; ?>" size="40"></td>
    </tr>
    <tr class="c4">
      <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100" height="1"></td>
      <td width="100%"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="100%" height="1"></td>
    </tr>
    <tr class="c1">
      <td align="right" nowrap><?php echo MSG_COMMENTS; ?></td>
      <td><textarea name="comments" style="width: 100%; height: 100" id="comments"><?php echo $post_details['comments']; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" class="c4"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
    </tr>
    <tr>
      <td colspan="2" class="contentfont" align="center"><input type="submit" value="<?php echo GMSG_PROCEED; ?>" name="form_auction_friend">
      </td>
    </tr>
  </form>
</table>
<br>
