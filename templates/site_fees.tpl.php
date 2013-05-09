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
<?php echo $site_fees_header_message; ?>

<br>
<table border="0" cellspacing="2" cellpadding="3" align="center" class="border">
  <form action="site_fees.php" method="post">
    <tr class="c2">
      <td><?php echo MSG_CHOOSE_CATEGORY; ?>
        : </td>
      <td><?php echo $fees_categories_box; ?></td>
      <td><input type="submit" name="form_choose_category" value="<?php echo GMSG_SELECT; ?>"></td>
    </tr>
  </form>
</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
  <?php if ($is_setup_fee) { ?>
      <tr>
        <td colspan="2" class="c3"><strong>
            <?php echo MSG_LISTING_FEES; ?>
          </strong></td>
      </tr>
      <tr class="c5">
        <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%"  border="0" cellspacing="2" cellpadding="2" class="border">
            <?php echo $listing_fees_table; ?>
          </table></td>
      </tr>
      <tr class="c5">
        <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['second_cat_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_ADDLCAT_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['second_cat_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['picture_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_IMG_UPL_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['picture_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['hlitem_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_HL_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['hlitem_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['bolditem_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_BOLD_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['bolditem_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['catfeat_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_CATFEAT_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['catfeat_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['hpfeat_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_HPFEAT_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['hpfeat_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['rp_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_RP_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['rp_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['swap_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_SWAP_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['swap_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['buyout_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_BUYOUT_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['buyout_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['makeoffer_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_MAKEOFFER_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['makeoffer_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['custom_start_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_CUSTOM_START_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['custom_start_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['video_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_MEDIA_UPL_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['video_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($fee_row['wanted_ad_fee'] > 0) { ?>
      <tr class="c2">
        <td align="right" width="50%"><strong>
            <?php echo GMSG_WA_SETUP_FEE; ?>
          </strong></td>
        <td><?php echo $fees->display_amount($fee_row['wanted_ad_fee']); ?></td>
      </tr>
    <?php } ?>
  <?php if ($is_stores) { ?>
      <tr>
        <td class="c3" colspan="2"><strong>
            <?php echo MSG_STORE_ACCOUNT_TYPES; ?>
          </strong></td>
      </tr>
      <tr class="c5">
        <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
      <tr align="center">
        <td colspan="2"><table width="100%"  border="0" cellspacing="2" cellpadding="2" class="border">
            <?php echo $store_subscriptions_table; ?>
          </table></td>
      </tr>
    <?php } ?>
  <?php if ($is_sale_fee) { ?>
      <tr>
        <td class="c3" colspan="2"><strong>
            <?php echo GMSG_ENDAUCTION_FEE; ?>
            - <?php echo (stristr($fee_row['endauction_fee_applies'], 's')) ? MSG_PAID_BY_SELLER : MSG_PAID_BY_BUYER; ?></strong> </td>
      </tr>
      <tr class="c5">
        <td colspan="2"><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="1" height="1"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><table width="100%" border="0" cellspacing="2" cellpadding="2" class="border">
            <?php echo $sale_fees_table; ?>
          </table></td>
      </tr>
    <?php } ?>
  <?php if ($setts['enable_tax']) { ?>
      <tr>
        <td align="center" colspan="2" class="c1 border"><b>
            <?php echo $tax_message; ?>
          </b></td>
      </tr>
    <?php } ?>
</table>
