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
<script language="Javascript">
<!--
  function checkAll(field, array_len, check) {
    if (array_len == 1) {
      field.checked = check;
    } else {
      for (i = 0; i < array_len; i++)
        field[i].checked = check;
    }
  }

  function checkAll2(field_a, field_b, array_len, check) {
    if (check == true)
      check2 = false;
    else
      check2 = true;

    if (array_len == 1) {
      field_a.checked = check;
      field_b.checked = check2;
    } else {
      for (i = 0; i < array_len; i++)
        field_a[i].checked = check;
      for (i = 0; i < array_len; i++)
        field_b[i].checked = check2;
    }
  }

  -- ></script>

<div class="mainhead"><img src="images/auction.gif" align="absmiddle">
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
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr>
    <td class="c3"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
        <?php echo strtoupper($subpage_title); ?>
      </b></td>
  </tr>
  <tr>
    <td><?php echo $management_box; ?></td>
  </tr>
  <tr>
    <td align="center"><table border="0" cellpadding="3" cellspacing="3" class="border" align="center">
        <form action="list_auctions.php" method="get">
          <input type="hidden" name="status" value="<?php echo $form_details['status']; ?>">
          <tr class="c4">
            <td colspan="3"><b>
                <?php echo GMSG_AUCTION_SEARCH; ?>
              </b></td>
          </tr>
          <tr class="c2">
            <td><b>
                <?php echo AMSG_BY_KEYWORDS; ?>
              </b> :</td>
            <td colspan="2"><input name="keywords" type="text" id="keywords" value="<?php echo $keywords; ?>" /></td>
          </tr>
          <tr class="c1">
            <td><b>
                <?php echo AMSG_BY_AUCTION_ID; ?>
              </b> :</td>
            <td><input name="src_auction_id" type="text" id="src_auction_id" value="<?php echo $src_auction_id; ?>" /></td>
            <td><input name="form_auction_search" type="submit" id="form_auction_search" value="<?php echo GMSG_SEARCH; ?>" /></td>
          </tr>
        </form>
      </table></td>
  </tr>
  <tr>
    <td align="center"><?php echo $query_results_message; ?></td>
  </tr>
  <form action="list_auctions.php" method="get" name="select_auctions">
    <tr>
      <td><table width="100%" border="0" cellpadding="3" cellspacing="1" class="border">
          <input type="hidden" name="status" value="<?php echo $form_details['status']; ?>">
          <input type="hidden" name="start" value="<?php echo $form_details['start']; ?>">
          <input type="hidden" name="order_field" value="<?php echo $form_details['order_field']; ?>">
          <input type="hidden" name="order_type" value="<?php echo $form_details['order_type']; ?>">
          <input type="hidden" name="src_auction_id" value="<?php echo $form_details['src_auction_id'] ?>">
          <input type="hidden" name="keywords" value="<?php echo $form_details['keywords']; ?>">
          <tr class="c4">
            <td ><?php echo MSG_ITEM_TITLE; ?>
              &nbsp;
              <?php echo $page_order_itemname; ?></td>
            <td><?php echo AMSG_ITEM_DETAILS; ?>
              &nbsp;
              <?php echo $page_order_start_time; ?></td>
            <?php if ($status == 'approval') { ?>
                <td align="center"><?php echo AMSG_APPROVE; ?>
                  <br>
                  [ <a href="javascript:void(0);" onclick="checkAll(document.select_auctions['approve[]'], <?php echo $nb_auctions; ?>, true);"> <font color="#EEEE00">
                    <?php echo GMSG_ALL; ?></font></a> | 
                  <a href="javascript:void(0);" onclick="checkAll(document.select_auctions['approve[]'], <?php echo $nb_auctions; ?>, false);"> <font color="#EEEE00">
                    <?php echo GMSG_NONE; ?></font></a> ] </td>
              <?php }
              else {
                ?>
                <td align="center"><?php echo GMSG_STATUS; ?>
                  <br />
                  [ <a href="javascript:void(0);" onclick="checkAll2(document.select_auctions['activate[]'], document.select_auctions['inactivate[]'], <?php echo $nb_auctions; ?>, true);"> <font color="#EEEE00">
                    <?php echo AMSG_ACTIVATE_ALL; ?></font></a> ]
                  [ <a href="javascript:void(0);" onclick="checkAll2(document.select_auctions['activate[]'], document.select_auctions['inactivate[]'], <?php echo $nb_auctions; ?>, false);"> <font color="#EEEE00">
                  <?php echo AMSG_SUSPEND_ALL; ?></font></a> ]
                <?php echo $default_selection_link; ?>
                </td>
  <?php } ?>
            <td align="center"><?php echo AMSG_DELETE; ?>
              <br />
              [ <a href="javascript:void(0);" onclick="checkAll(document.select_auctions['delete[]'], <?php echo $nb_auctions; ?>, true);"> <font color="#EEEE00">
                <?php echo GMSG_ALL; ?></font></a> | 
              <a href="javascript:void(0);" onclick="checkAll(document.select_auctions['delete[]'], <?php echo $nb_auctions; ?>, false);"> <font color="#EEEE00">
          <?php echo GMSG_NONE; ?></font></a> ] </td>
          </tr>
<?php echo $auctions_content; ?>
        </table></td>
    </tr>
<?php if ($nb_auctions > 0) { ?>
        <tr>
          <td align="center"><?php echo $pagination; ?></td>
        </tr>
        <tr>
          <td align="center"><input type="submit" name="form_save_settings" value="<?php echo GMSG_PROCEED; ?>" <?php echo $disabled_button; ?> /></td>
        </tr>
      <?php } ?>
<?php if ($nb_marked_deleted_items) { ?>
        <tr>
          <td align="center">[ <a href="list_auctions.php?status=<?php echo $status; ?>&do=marked_deleted">
    <?php echo AMSG_DELETE_MARKED_DELETED_ITEMS; ?></a> ] 
            (<?php echo $nb_marked_deleted_items; ?> <?php echo AMSG_ITEMS; ?>)</td>
        </tr>
  <?php } ?>
  </form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
