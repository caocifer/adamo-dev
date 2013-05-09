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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>
      <?php echo $setts['sitename']; ?> -
      <?php echo $message_title; ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG_CODEPAGE; ?>">
    <link href="themes/<?php echo $setts['default_theme']; ?>/style.css" rel="stylesheet" type="text/css">
    <style type="text/css">
      <!--
      .style1 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
      }
      -->
    </style>
  </head>
  <body>
    <?php echo $msg_changes_saved; ?>
    <table border="0" width="100%" cellpadding="3" cellspacing="2" class="border contentfont">
      <tr>
        <td nowrap><?php echo $message_title; ?></td>
      </tr>
      <?php if ($can_edit) { ?>
          <form name="bank_details_form" action="popup_bank_details.php" method="POST">
            <input type="hidden" name="auction_id" value="<?php echo $auction_id; ?>">
          <?php } ?>
        <tr class="c1">
          <td>
            <?php if ($can_edit) { ?>
                <textarea name="message_content" style="width:100%; height: 130px;"><?php echo $message_content; ?></textarea>
              <?php }
              else {
                ?>
                <?php echo eregi_replace("\n", '<br>', $message_content); ?>
  <?php } ?>
          </td>
        </tr>
<?php if ($can_edit) { ?>
            <tr>
              <td colspan="2" align="center" class="c2"><input type="submit" name="form_save_bank_details" value="<?php echo GMSG_PROCEED; ?>"></td>
            </tr>
          </form>
  <?php } ?>
    </table>
  </body>
</html>
