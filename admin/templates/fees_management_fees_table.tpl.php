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

<table width="75%" border="0" cellpadding="3" cellspacing="3" align="center" class="border">
  <?php if (!$category_id) { ?>
      <tr class="c3">
        <td colspan="2"><?php echo GMSG_GENERAL; ?></td>
      </tr>
      <tr class="c1">
        <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=signup_fee"><?php echo GMSG_USER_SIGNUP_FEE; ?></a></td>
        <td>&nbsp;</td>
      </tr>
    <?php } ?>
  <tr class="c3">
    <td colspan="2"><?php echo AMSG_AUCTION_FEES; ?> </td>
  </tr>
  <tr class="c1">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=setup&tiers=1"><?php echo GMSG_SETUP_FEE; ?></a> </td>
    <td><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=endauction&tiers=1"><?php echo GMSG_ENDAUCTION_FEE; ?></a> </td>
  </tr>
  <tr class="c2">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=hpfeat_fee"><?php echo GMSG_HPFEAT_FEE; ?></a> </td>
    <td><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=catfeat_fee"><?php echo GMSG_CATFEAT_FEE; ?></a> </td>
  </tr>
  <tr class="c1">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=hlitem_fee"><?php echo GMSG_HL_FEE; ?></a> </td>
    <td><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=bolditem_fee"><?php echo GMSG_BOLD_FEE; ?></a> </td>
  </tr>
  <tr class="c2">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=picture_fee"><?php echo GMSG_IMG_UPL_FEE; ?></a> </td>
    <td><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=video_fee"><?php echo GMSG_MEDIA_UPL_FEE; ?></a> </td>
  </tr>
  <tr class="c1">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=second_cat_fee"><?php echo GMSG_ADDLCAT_FEE; ?></a> </td>
    <td><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=custom_start_fee"><?php echo GMSG_CUSTOM_START_FEE; ?></a> </td>
  </tr>
  <tr class="c2">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=buyout_fee"><?php echo GMSG_BUYOUT_FEE; ?></a> </td>
    <td><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=rp_fee"><?php echo GMSG_RP_FEE; ?></a> </td>
  </tr>
  <tr class="c1">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=makeoffer_fee"><?php echo GMSG_MAKEOFFER_FEE; ?></a> </td>
    <td><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=swap_fee"><?php echo GMSG_SWAP_FEE; ?></a></td>
  </tr>
  <tr class="c2">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=relist_fee_reduction"><?php echo GMSG_REL_FEES_RED_FEE; ?></a> </td>
    <td></td>
  </tr>
  <tr class="c3">
    <td colspan="2"><?php echo AMSG_WANTED_AD_FEES; ?></td>
  </tr>
  <tr class="c1">
    <td width="50%"><img src="images/a.gif" align="absmiddle" /> <a href="fees_management.php?category_id=<?php echo $category_id; ?>&fee_column=wanted_ad_fee"><?php echo GMSG_WA_SETUP_FEE; ?></a> </td>
    <td></td>
  </tr>
</table>
<br>