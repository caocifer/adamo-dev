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
<table width="80%" border="0" cellpadding="5" cellspacing="0" class="errormessage" align="center">
  <tr>
    <td class="contentfont">
      <h5 style="margin-bottom: 5px; "><?php echo ($setts['seller_verification_mandatory']) ? MSG_GET_VERIFIED_EXPL_1 : MSG_GET_VERIFIED_EXPL_2; ?></h5>
      <?php echo MSG_GET_VERIFIED_EXPL_3; ?>
      <table align="center">
        <tr>
          <td>[ <a href="<?php echo process_link('fee_payment', array('do' => 'seller_verification')); ?>"><?php echo MSG_GET_VERIFIED; ?></a> ]</td>
          <?php if (!$setts['seller_verification_mandatory']) { ?>
              <td>[ <a href="<?php echo process_link('sell_item', array('option' => 'new_item', 'current_step' => 'verification_checked')); ?>"><?php echo MSG_SKIP_VERIFICATION; ?></a> ]</td>
            <?php } ?>
        </tr>
      </table></td>
  </tr>
</table>
