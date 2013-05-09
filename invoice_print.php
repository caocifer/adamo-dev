<?php
#################################################################
## MyPHPAuction v6.04															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  session_start();

  define('IN_SITE', 1);

  include_once ('includes/global.php');
  include_once ('includes/class_formchecker.php');
  include_once ('includes/class_custom_field.php');
  include_once ('includes/class_user.php');
  include_once ('includes/class_item.php');

  if (!$session->value('user_id') && $session->value('adminarea') != 'Active') {
    header_redirect('login.php');
  }
  else {
    $display_invoice = false;

    $invoices_array = array('product_invoice', 'auction_invoice', 'wanted_ad_invoice', 'fee_invoice');

    $invoice_type = (in_array($_REQUEST['invoice_type'], $invoices_array)) ? $_REQUEST['invoice_type'] : '';
    $template->set('invoice_type', $invoice_type);

    $item = new item();
    $item->setts = &$setts;

    switch ($_REQUEST['invoice_type']) {
      case 'product_invoice':
        $invoice_name = GMSG_RECEIPT;

        $sql_select_products = $db->query("SELECT w.*, a.name, a.apply_tax, a.currency FROM " . DB_PREFIX . "winners w
				LEFT JOIN " . DB_PREFIX . "auctions a ON a.auction_id=w.auction_id WHERE w.invoice_id='" . $_REQUEST['invoice_id'] . "' AND
				(w.seller_id='" . $session->value('user_id') . "' OR w.buyer_id='" . $session->value('user_id') . "')");

        $single_settings = false;
        (string) $invoice_content = null;

        $is_invoice = $db->num_rows($sql_select_products);

        if ($is_invoice) {
          $display_invoice = true;

          while ($invoice_details = $db->fetch_array($sql_select_products)) {
            if (!$single_settings) /* some page settings will only be taken once */ {
              $single_settings = true;

              $template->set('invoice_header', '<img src="images/myphpauction.gif" border="0">');

              $user = new user();
              $tax = new tax();

              $template->set('invoice_date', show_date($invoice_details['purchase_date'], false));
              $template->set('invoice_number', 'PR-' . $_REQUEST['invoice_id']);

              $seller_details = $db->get_sql_row("SELECT u.name, u.address, u.city, u.zip_code,
							c.name AS country_name, s.name AS state_name, u.state FROM " . DB_PREFIX . "users u
							LEFT JOIN " . DB_PREFIX . "countries s ON u.state=s.id
							LEFT JOIN " . DB_PREFIX . "countries c ON u.country=c.id WHERE u.user_id=" . $invoice_details['seller_id']);

              $template->set('seller_full_name', $seller_details['name']);
              $template->set('seller_full_address', $user->full_address($seller_details));

              $buyer_details = $db->get_sql_row("SELECT u.name, u.address, u.city, u.zip_code,
							c.name AS country_name, s.name AS state_name, u.state FROM " . DB_PREFIX . "users u
							LEFT JOIN " . DB_PREFIX . "countries s ON u.state=s.id
							LEFT JOIN " . DB_PREFIX . "countries c ON u.country=c.id WHERE u.user_id=" . $invoice_details['buyer_id']);

              $template->set('buyer_full_name', $buyer_details['name']);
              $template->set('buyer_full_address', $user->full_address($buyer_details));
            }

            $auction_tax = $tax->auction_tax($invoice_details['seller_id'], $setts['enable_tax'], $invoice_details['buyer_id']);
            $invoice_details['apply_tax'] = ($setts['enable_tax']) ? $invoice_details['apply_tax'] : 0;

            $tax_details = array(
              'apply' => $invoice_details['apply_tax'],
              'tax_reg_number' => (($invoice_details['apply_tax']) ? $auction_tax['tax_reg_number'] : '-'),
              'tax_rate' => (($invoice_details['apply_tax']) ? $auction_tax['amount'] . '%' : '-')
            );

            $template->set('tax_details', $tax_details);

            $product_no_tax = $invoice_details['bid_amount'] * $invoice_details['quantity_offered'];
            $product_postage = ($invoice_details['postage_included']) ? $invoice_details['postage_amount'] : 0;
            $product_insurance = ($invoice_details['insurance_included']) ? $invoice_details['insurance_amount'] : 0;

            $product_no_tax_pi = $product_no_tax + $product_postage + $product_insurance;

            $total_no_tax += $product_no_tax_pi;

            $product_tax = ($invoice_details['apply_tax']) ? $product_no_tax_pi * $auction_tax['amount'] / 100 : 0;
            //$postage_tax = ($invoice_details['apply_tax']) ? $product_postage * $auction_tax['amount'] / 100 : 0;
            //$insurace_tax = ($invoice_details['apply_tax']) ? $product_insurance * $auction_tax['amount'] / 100 : 0;

            $total_tax += $product_tax;

            $product_total = $product_no_tax_pi + $product_tax;

            $total_amount += $product_total;
            //$total_postage += $product_postage + $postage_tax;
            //$total_insurance += $product_insurance + $insurace_tax;## MyPHPAuction 2009 now create the invoice content


            $invoice_content .= '<tr class="c1"> ' .
              '	<td align="center">' . $invoice_details['quantity_offered'] . '</td> ' .
              '	<td>[ ' . MSG_ID . ': ' . $invoice_details['auction_id'] . ' ] ' . $invoice_details['name'] . '</td> ' .
              '	<td align="center">' . $fees->display_amount($product_no_tax, $invoice_details['currency']) . '</td> ' .
              '	<td align="center">' . $fees->display_amount($product_postage, $invoice_details['currency']) . '</td> ' .
              '	<td align="center">' . $fees->display_amount($product_insurance, $invoice_details['currency']) . '</td> ' .
              '	<td align="center">' . $tax_details['tax_rate'] . '</td> ' .
              '	<td align="center">' . $fees->display_amount($product_tax, $invoice_details['currency']) . '</td> ' .
              '	<td align="center">' . $fees->display_amount($product_total, $invoice_details['currency']) . '</td> ' .
              '</tr> ';
          }

          if ($display_invoice) {
            /*
              if ($total_postage > 0 || $total_insurance > 0)
              {
              $invoice_content .= '<tr class="c4"><td colspan="6"></td></tr>';
              }
              if ($total_postage > 0)
              {
              $total_no_tax += $total_postage;
              $total_amount += $total_postage;

              $invoice_content .= '<tr class="c1"> '.
              '	<td align="center">-</td> '.
              '	<td>' . MSG_POSTAGE . '</td> '.
              '	<td align="center">' . $fees->display_amount($total_postage, $invoice_details['currency']) . '</td> '.
              '	<td align="center">-</td> '.
              '	<td align="center">-</td> '.
              '	<td align="center">' . $fees->display_amount($total_postage, $invoice_details['currency']) . '</td> '.
              '</tr> ';
              }

              if ($total_insurance > 0)
              {
              $total_no_tax += $total_insurance;
              $total_amount += $total_insurance;

              $invoice_content .= '<tr class="c1"> '.
              '	<td align="center">-</td> '.
              '	<td>' . MSG_INSURANCE . '</td> '.
              '	<td align="center">' . $fees->display_amount($total_insurance, $invoice_details['currency']) . '</td> '.
              '	<td align="center">-</td> '.
              '	<td align="center">-</td> '.
              '	<td align="center">' . $fees->display_amount($total_insurance, $invoice_details['currency']) . '</td> '.
              '</tr> ';
              }
             */

            $template->set('invoice_content', $invoice_content);
            $template->set('total_no_tax', $fees->display_amount($total_no_tax, $invoice_details['currency']));
            $template->set('total_tax', $fees->display_amount($total_tax, $invoice_details['currency']));
            $template->set('total_amount', $fees->display_amount($total_amount, $invoice_details['currency']));
          }
        }

        break;
      case 'fee_invoice':
        $invoice_name = GMSG_RECEIPT;

        $addl_invoice_query = ($session->value('adminarea') == 'Active') ? '' : " AND user_id='" . $session->value('user_id') . "'";
        $invoice_details = $db->get_sql_row("SELECT * FROM " . DB_PREFIX . "invoices WHERE
				 invoice_id='" . $_REQUEST['invoice_id'] . "' AND live_fee=1 " . $addl_invoice_query);

        if ($item->count_contents($invoice_details)) {
          $display_invoice = true;

          $template->set('invoice_header', $setts['invoice_header']);
          $template->set('invoice_comments', $setts['invoice_comments']);
          $template->set('invoice_footer', $setts['invoice_footer']);

          $buyer_details = $db->get_sql_row("SELECT u.name, u.address, u.city, u.zip_code,
					c.name AS country_name, s.name AS state_name, u.state FROM " . DB_PREFIX . "users u
					LEFT JOIN " . DB_PREFIX . "countries s ON u.state=s.id
					LEFT JOIN " . DB_PREFIX . "countries c ON u.country=c.id WHERE u.user_id=" . $invoice_details['user_id']);

          $user = new user();

          $tax = new tax();
          $auction_tax = $tax->apply_tax(1, $setts['currency'], $invoice_details['user_id'], $setts['enable_tax']);

          $tax_details = array(
            'apply' => $auction_tax['apply_tax'],
            'tax_reg_number' => (($auction_tax['apply_tax']) ? $setts['vat_number'] : '-'),
            'tax_rate' => (($auction_tax['apply_tax']) ? $auction_tax['tax_rate'] . '%' : '-')
          );

          $template->set('tax_details', $tax_details);

          $template->set('invoice_date', show_date($invoice_details['invoice_date'], false));
          $template->set('invoice_number', (($invoice_details['item_id'] > 0) ? 'LF-' : (($invoice_details['wanted_ad_id'] > 0) ? 'LWF-' : 'SF-')) . $_REQUEST['invoice_id']);


          $template->set('buyer_full_name', $buyer_details['name']);
          $template->set('buyer_full_address', $user->full_address($buyer_details));

          $fee_total = $invoice_details['amount'];
          $fee_tax = '-';
          $fee_no_tax = $fee_total;

          if ($auction_tax['apply_tax']) {
            $fee_no_tax = ($auction_tax['apply_tax']) ? $tax->round_number($fee_total / (1 + $auction_tax['tax_rate'] / 100)) : 0;
            $fee_tax = $fee_total - $fee_no_tax;
          }## MyPHPAuction 2009 now create the invoice content
          $invoice_content = '<tr class="c1"> ' .
            '	<td align="center">1</td> ' .
            '	<td>' . $invoice_details['name'] . '</td> ' .
            '	<td align="center">' . $fees->display_amount($fee_no_tax, $setts['currency']) . '</td> ' .
            '	<td align="center">' . $tax_details['tax_rate'] . '</td> ' .
            '	<td align="center">' . $fees->display_amount($fee_tax, $setts['currency']) . '</td> ' .
            '	<td align="center">' . $fees->display_amount($fee_total, $setts['currency']) . '</td> ' .
            '</tr> ';

          $template->set('invoice_content', $invoice_content);
          $template->set('total_no_tax', $fees->display_amount($fee_no_tax, $setts['currency']));
          $template->set('total_tax', $fees->display_amount($fee_tax, $setts['currency']));
          $template->set('total_amount', $fees->display_amount($fee_total, $setts['currency']));
        }
        break;
      case 'auction_invoice':
        $invoice_name = GMSG_DEBIT;

        $addl_invoice_query = ($session->value('adminarea') == 'Active') ? '' : " AND user_id='" . $session->value('user_id') . "'";
        $sql_select_invoices = $db->query("SELECT * FROM " . DB_PREFIX . "invoices WHERE
				" . (($_REQUEST['auction_id'] > 0) ? 'item_id' : 'wanted_ad_id') . "='" . (($_REQUEST['auction_id'] > 0) ? $_REQUEST['auction_id'] : $_REQUEST['wanted_ad_id']) . "' AND
				live_fee=0 " . $addl_invoice_query);

        $is_invoice = $db->num_rows($sql_select_invoices);

        if ($is_invoice) {
          $display_invoice = true;

          $template->set('invoice_header', $setts['invoice_header']);
          $template->set('invoice_comments', $setts['invoice_comments']);
          $template->set('invoice_footer', $setts['invoice_footer']);

          (string) $invoice_content = null;

          $single_settings = false;

          while ($invoice_details = $db->fetch_array($sql_select_invoices)) {
            if (!$single_settings) {
              $single_settings = true;

              $buyer_details = $db->get_sql_row("SELECT u.name, u.address, u.city, u.zip_code,
							c.name AS country_name, s.name AS state_name, u.state FROM " . DB_PREFIX . "users u
							LEFT JOIN " . DB_PREFIX . "countries s ON u.state=s.id
							LEFT JOIN " . DB_PREFIX . "countries c ON u.country=c.id WHERE u.user_id=" . $invoice_details['user_id']);

              $user = new user();

              $tax = new tax();
              $auction_tax = $tax->apply_tax(1, $setts['currency'], $invoice_details['user_id'], $setts['enable_tax']);

              $tax_details = array(
                'apply' => $auction_tax['apply_tax'],
                'tax_reg_number' => (($auction_tax['apply_tax']) ? $setts['vat_number'] : '-'),
                'tax_rate' => (($auction_tax['apply_tax']) ? $auction_tax['tax_rate'] . '%' : '-')
              );

              $template->set('tax_details', $tax_details);

              $template->set('buyer_full_name', $buyer_details['name']);
              $template->set('buyer_full_address', $user->full_address($buyer_details));

              $template->set('invoice_number', (($invoice_details['item_id'] > 0) ? 'AF-' : 'WF-') . (($invoice_details['item_id'] > 0) ? $invoice_details['item_id'] : $invoice_details['wanted_ad_id']));

              $invoice_date = $invoice_details['invoice_date'];
            }

            $fee_total = $invoice_details['amount'];
            $fee_tax = '-';
            $fee_no_tax = $fee_total;

            $total_amount += $fee_total;

            if ($auction_tax['apply_tax']) {
              $fee_no_tax = ($auction_tax['apply_tax']) ? $tax->round_number($fee_total / (1 + $auction_tax['tax_rate'] / 100)) : 0;
              $fee_tax = $fee_total - $fee_no_tax;

              $total_tax += $fee_tax;
              $total_no_tax += $fee_no_tax;
            }## MyPHPAuction 2009 now create the invoice content
            $invoice_content .= '<tr class="c1"> ' .
              '	<td align="center">1</td> ' .
              '	<td>' . $invoice_details['name'] . '</td> ' .
              '	<td align="center">' . $fees->display_amount($fee_no_tax, $setts['currency']) . '</td> ' .
              '	<td align="center">' . $tax_details['tax_rate'] . '</td> ' .
              '	<td align="center">' . $fees->display_amount($fee_tax, $setts['currency']) . '</td> ' .
              '	<td align="center">' . $fees->display_amount($fee_total, $setts['currency']) . '</td> ' .
              '</tr> ';
          }

          $template->set('invoice_date', show_date($invoice_date, false));

          $template->set('invoice_content', $invoice_content);
          $template->set('total_no_tax', $fees->display_amount($total_no_tax, $setts['currency']));
          $template->set('total_tax', $fees->display_amount($total_tax, $setts['currency']));
          $template->set('total_amount', $fees->display_amount($total_amount, $setts['currency']));
        }
        break;
    }

    if ($display_invoice) {
      $template->set('invoice_name', $invoice_name);
      $template->set('invoice_type', $invoice_type);
      $template_output = $template->process('invoice_print.tpl.php');
    }

    echo $template_output;
  }
?>