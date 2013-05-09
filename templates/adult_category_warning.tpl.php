<?php
#################################################################
## MyPHPAuction v6.01															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<?php echo headercat($categories_header_menu); ?>

<br>
<table width="40%" border="0" cellpadding="5" cellspacing="0" class="errormessage" align="center">
  <tr>
    <td align="center" class="contentfont"><br /><h1 class="redfont" style="margin-bottom: 5px;"><?php echo MSG_WARNING; ?></h1>
      <h3 style="margin-bottom: 5px; margin-top: 3px;"><?php echo MSG_ADULT_CAT_MSG_A; ?></h3>
      <?php echo MSG_ADULT_CAT_MSG_B; ?>
      <?php echo $minimum_age; ?>
      <?php echo MSG_ADULT_CAT_MSG_C; ?>
      <table>
        <tr>
          <td><form name="agree" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
              <input type="hidden" name="auction_id" value="<?php echo $auction_id; ?>">
              <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">
              <input type="hidden" name="option" value="agree_adult">
              <input type="submit" id="agree" value="<?php echo MSG_BTN_AGREE; ?>">
            </form></td>
          <td><form name="cancel" action="index.php">
              <input type="submit" id="cancel" value="<?php echo MSG_CANCEL; ?>">
            </form></td>
        </tr>
      </table></td>
  </tr>
</table>
