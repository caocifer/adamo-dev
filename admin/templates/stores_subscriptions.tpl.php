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

<div class="mainhead"><img src="images/stores.gif" align="absmiddle">
  <?php echo $header_section; ?>
</div>
<?php echo $msg_changes_saved; ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="3" cellpadding="3" class="fside">
  <form action="stores_subscriptions.php" method="post">
    <input type="hidden" name="tiers" value="1" />
    <input type="hidden" name="operation" value="submit" />
    <tr>
      <td colspan="6" class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
          <?php echo strtoupper($fee_box_title); ?>
        </b></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="1" cellpadding="3" class="border">
          <tr class="c4">
            <td><?php echo AMSG_SUBSCRIPTION_NAME; ?></td>
            <td align="center"><?php echo AMSG_ITEMS_IN_STORE; ?></td>
            <td align="center"><?php echo GMSG_AMOUNT; ?>
              <br>
              [
              <?php echo $setts['currency']; ?>
              ]</td>
            <td align="center"><?php echo AMSG_RECURRING_FEE_DAYS; ?></td>
            <td align="center"><?php echo AMSG_FEATURED; ?></td>
            <td align="center"><?php echo AMSG_DELETE; ?></td>
          </tr>
          <?php echo $stores_subscriptions_content; ?>
          <tr class="c4">
            <td><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
                <?php echo AMSG_ADD_SUBSCRIPTION; ?>
              </b></td>
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr class="c1">
            <td><input name="new_store_name" type="text" id="new_store_name" size="40"></td>
            <td align="center"><input name="new_store_nb_items" type="text" id="new_store_nb_items" size="9"></td>
            <td align="center"><input name="new_fee_amount" type="text" id="new_fee_amount" size="9"></td>
            <td align="center"><input name="new_store_recurring" type="text" id="new_store_recurring" size="9"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td colspan="6" class="explain"><img src="images/info.gif" align="absmiddle">
        <?php echo AMSG_STORE_SUBSCR_NOTE_A; ?></td>
    </tr>
    <tr>
      <td colspan="6" class="explain"><img src="images/info.gif" align="absmiddle">
        <?php echo AMSG_STORE_SUBSCR_NOTE_B; ?></td>
    </tr>
    <tr>
      <td colspan="6" class="explain"><img src="images/info.gif" align="absmiddle">
        <?php echo AMSG_STORE_SUBSCR_NOTE_C; ?></td>
    </tr>
    <tr>
      <td colspan="6" class="explain"><img src="images/info.gif" align="absmiddle">
        <?php echo AMSG_STORE_SUBSCR_NOTE_D; ?></td>
    </tr>
    <tr>
      <td colspan="6" align="center"><input type="submit" name="form_submit_fee" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
    </tr>
  </form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
