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
<?php echo $page_header; ?>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <form action="currency_converter.php" method="get" name="currency_converter_form">
    <tr>
      <td colspan="3"><b><?php echo MSG_CURRENCY_CONVERTER; ?></b></td>
    </tr>
    <tr>
      <td colspan="3" class="c4"></td>
    </tr>
    <tr>
      <td colspan="3" class="c1"><?php echo MSG_CONVERTER_EXPL; ?></td>
    </tr>
    <tr>
      <td colspan="3" class="c4"></td>
    </tr>
    <?php echo $converter_result_box; ?>
    <tr class="membmenu">
      <td width="20%"><?php echo MSG_CONVERT; ?></td>
      <td width="40%"><?php echo MSG_FROM; ?></td>
      <td><?php echo MSG_TO; ?></td>
    </tr>
    <tr class="c4">
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr class="c2">
      <td><input type="text" name="amount" value="<?php echo $amount; ?>" size="8"></td>
      <td><?php echo $currency_from_box; ?></td>
      <td><?php echo $currency_to_box; ?></td>
    </tr>
    <tr>
      <td colspan="3" class="c4"></td>
    </tr>
    <tr>
      <td colspan="3"><input type="submit" value="<?php echo GMSG_PROCEED; ?>" name="form_convert"></td>
    </tr>
  </form>
</table>
<?php echo $page_footer; ?>
