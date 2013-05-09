<?php
#################################################################
## MyPHPAuction v6.02															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  class fees_main extends voucher {

    var $vars = array();

    ## assign variables that will be used in the class.

    function set($name, $value) {
      $this->vars[$name] = $value;
    }

    function display_amount($amount, $currency = null, $zero = false) {
      (string) $display_output = null;

      if ($amount == 99999999999) {
        $display_output = GMSG_ABOVE;
      }
      else {
        $fee_amount = $amount;

        $currency = ($currency) ? $currency : $this->setts['currency'];

        $amount = ($this->setts['amount_format'] == 1) ? number_format($amount, $this->setts['amount_digits'], '.', ',') : number_format($amount, $this->setts['amount_digits'], ',', '.');
        $display_output = ($this->setts['currency_position'] == 1) ? ($currency . ' ' . $amount) : ($amount . ' ' . $currency);

        if ($fee_amount == 0) {
          $display_output = ($zero) ? $display_output : '-';
        }
        else if ($fee_amount < 0) {
          $display_output = MSG_ITEM_SWAPPED;
        }
      }

      return $display_output;
    }

    function user_payment_mode($user_id) {
      $tmp = $this->get_sql_field("SELECT payment_mode FROM " . DB_PREFIX . "users WHERE user_id=" . intval($user_id), "payment_mode");

      if ($this->setts['account_mode_personal'] == 1) {
        $payment_mode = ($tmp) ? $tmp : 1;
      }
      else {
        $payment_mode = $this->setts['account_mode'];
      }

      return $payment_mode;
    }

  }
?>