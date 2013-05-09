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

<table width="100%" border="0" cellspacing="3" cellpadding="3" class="border">
  <form action="fees_management.php" method="get">
    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
    <input type="hidden" name="fee_column" value="<?php echo $fee_column; ?>">
    <input type="hidden" name="operation" value="submit" />
    <tr class="c3">
      <td colspan="2" align="center"><?php echo $fee_box_title; ?></td>
    </tr>
    <tr class="c2">
      <td width="150"><?php echo GMSG_FEE_AMOUNT; ?></td>
      <td><?php echo ($fee_column != 'relist_fee_reduction') ? $setts['currency'] : ''; ?>
        <input name="value" type="text" id="value" value="<?php echo $fee[$fee_column]; ?>" size="12">
        <?php echo ($fee_column == 'relist_fee_reduction') ? '%' : ''; ?>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo $fee_description; ?></td>
    </tr>
    <?php if ($fee_column == 'picture_fee') { ?>
        <tr class="c2">
          <td width="150"><?php echo AMSG_FREE_IMAGES; ?></td>
          <td><input name="free_images" type="text" id="free_images" value="<?php echo $fee['free_images']; ?>" size="6"></td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo AMSG_FREE_IMAGES_EXPL; ?></td>
        </tr>
      <?php } ?>
    <?php if ($fee_column == 'video_fee') { ?>
        <tr class="c2">
          <td width="150"><?php echo AMSG_FREE_MEDIA; ?></td>
          <td><input name="free_media" type="text" id="free_media" value="<?php echo $fee['free_media']; ?>" size="6"></td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo AMSG_FREE_MEDIA_EXPL; ?></td>
        </tr>
      <?php } ?>
    <tr class="c3">
      <td colspan="2" align="center"><input type="submit" name="form_submit_fee" value="<?php echo AMSG_SAVE_CHANGES; ?>"></td>
    </tr>
  </form>
</table>
