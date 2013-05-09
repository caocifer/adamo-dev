<?php
#################################################################
## MyPHPAuction v6.02															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<?php echo header5(MSG_COMPARE_ITEMS); ?>

<br>
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <form action="compare_items.php" method="POST">
    <tr>
      <?php echo $compared_items_content; ?>
    </tr>
    <tr>
      <td align="center" colspan="<?php echo $nb_auctions; ?>"><input type="submit" name="form_compare_items" value="<?php echo MSG_COMPARE_AGAIN; ?>"></td>
    </tr>
  </form>
</table>
<!--<p class="contentfont" align="center">[ <a href="<?php echo $redirect_url; ?>"><?php echo MSG_BACK_TO_PREV_PAGE; ?></a> ]</p>-->