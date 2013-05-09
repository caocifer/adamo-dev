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
      <?php echo $setts['sitename']; ?>
      -
      <?php echo MSG_DISPLAY_INVOICE; ?>
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
    <table width="790" cellpadding="0" cellspacing="2" align="center" class="border">
      <tr>
        <td><?php echo $invoice_header; ?></td>
      </tr>
      <?php if ($invoice_type == 'product_invoice') { ?>
          <tr>
            <td><?php echo $seller_full_name; ?><br>
              <?php echo $seller_full_address; ?></td>
          </tr>
        <?php } ?>
      <tr class="c4">
        <td></td>
      </tr>
      <tr>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td width="50%"><table width="70%" border="0" cellpadding="3" cellspacing="2" class="border">
                  <tr>
                    <td class="c4"><?php echo MSG_BILL_TO; ?>:</td>
                  </tr>
                  <tr class="c2">
                    <td><?php echo $buyer_full_name; ?><br>
                      <?php echo $buyer_full_address; ?></td>
                  </tr>
                </table></td>
              <td width="50%"><table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
                  <tr>
                    <td class="c4" nowrap><?php echo MSG_INVOICE_DATE; ?></td>
                    <td class="c1"><?php echo $invoice_date; ?></td>
                  </tr>
                  <?php if ($tax_details['apply']) { ?>
                      <tr>
                        <td class="c4" nowrap><?php echo MSG_TAX_REG_NUMBER; ?></td>
                        <td class="c1"><?php echo $tax_details['tax_reg_number']; ?></td>
                      </tr>
                    <?php } ?>
                  <tr>
                    <td class="c4"><?php echo MSG_INVOICE_NUMBER; ?></td>
                    <td class="c1"><?php echo $invoice_number; ?></td>
                  </tr>
                  <tr>
                    <td class="c4"><?php echo MSG_ORDER_METHOD; ?></td>
                    <td class="c1"><?php echo MSG_ONLINE; ?></td>
                  </tr>
                  <tr>
                    <td class="c4"><?php echo MSG_PRODUCT_TYPE; ?></td>
                    <td class="c1"><?php echo MSG_DIGITAL_GOODS; ?></td>
                  </tr>
                  <tr>
                    <td class="c4"><?php echo MSG_PAYMENT_TERMS; ?></td>
                    <td class="c1"><?php echo MSG_ON_DEMAND; ?></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td align="center"><font size="+2" color="#666666"><b> <?php echo $invoice_name; ?> </b></font></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
            <tr class="c4" align="center">
              <td><?php echo GMSG_QUANTITY; ?></td>
              <td><?php echo GMSG_DESCRIPTION; ?></td>
              <td><?php echo GMSG_PRICE; ?></td>
              <?php if ($invoice_type == 'product_invoice') { ?>
                  <td><?php echo MSG_POSTAGE; ?></td>
                  <td><?php echo MSG_INSURANCE; ?></td>
                <?php } ?>
              <td><?php echo MSG_TAX_RATE; ?></td>
              <td><?php echo MSG_TAX_AMOUNT; ?></td>
              <td><?php echo GMSG_TOTAL; ?></td>
            </tr>
            <tr class="c3">
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
              <td width="100%"></td>
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
              <?php if ($invoice_type == 'product_invoice') { ?>
                  <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
                  <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
                <?php } ?>
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="60" height="1"></td>
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
              <td><img src="themes/<?php echo $setts['default_theme']; ?>/img/pixel.gif" width="80" height="1"></td>
            </tr>
            <?php echo $invoice_content; ?>
          </table></td>
      </tr>
      <tr>
        <td><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td width="50%"><table width="70%" border="0" cellpadding="3" cellspacing="2" class="border">
                  <tr>
                    <td class="c4"><?php echo MSG_DELIVERY_ADDRESS; ?>:</td>
                  </tr>
                  <tr class="c2">
                    <td><?php echo $buyer_full_name; ?><br>
                      <?php echo $buyer_full_address; ?></td>
                  </tr>
                </table></td>
              <td width="50%"><table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
                  <tr>
                    <td class="c4"><?php echo MSG_TOTAL_EXC_TAX; ?></td>
                    <td class="c1"><?php echo $total_no_tax; ?></td>
                  </tr>
                  <?php if ($invoice_type != 'product_invoice') { ?>
                      <tr>
                        <td class="c4"><?php echo MSG_TAX_RATE; ?></td>
                        <td class="c1"><?php echo $tax_details['tax_rate']; ?></td>
                      </tr>
                    <?php } ?>
                  <tr>
                    <td class="c4"><?php echo MSG_TAX_AMOUNT; ?></td>
                    <td class="c1"><?php echo $total_tax; ?></td>
                  </tr>
                  <tr>
                    <td class="c4"></td>
                    <td class="c4"></td>
                  </tr>
                  <tr>
                    <td class="c4"><?php echo MSG_INVOICE_TOTAL; ?></td>
                    <td class="c1"><?php echo $total_amount; ?></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table></td>
      </tr>
      <?php if ($invoice_type != 'product_invoice') { ?>
          <tr>
            <td><p>&nbsp;</p></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="3" cellspacing="2" class="border">
                <tr>
                  <td class="c4"><b>
                      <?php echo MSG_COMMENTS; ?>:</b></td>
                </tr>
                <tr>
                  <td class="c1"><?php echo $setts['invoice_comments']; ?></td>
                </tr>
              </table></td>
          </tr>
          <tr class="c4">
            <td></td>
          </tr>
          <tr>
            <td><?php echo $invoice_footer; ?></td>
          </tr>
        <?php } ?>
    </table>
  </body>
</html>
