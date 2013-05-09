<?php
#################################################################
## MyPHPAuction v6.05															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  class tax extends fees_main {

    function round_number($number, $round = 2) {
      // we will multiply by 10^$round, then get the floor value of that amount then divide by 10^round.
      ## -> if it does problems, switch back to floor()
      $temp_value = $number * pow(10, $round);
      $temp_value = ceil($temp_value);
      $number = $temp_value / pow(10, $round);

      return $number;
    }

    function display_countries($countries_id) {
      (string) $display_output = null;
      (array) $countries_array = null;

      if ($countries_id) {
        $sql_select_countries = $this->query_silent("SELECT name FROM " . DB_PREFIX . "countries WHERE
				id IN (" . $countries_id . ")");

        if ($sql_select_countries) {
          while ($country_details = $this->fetch_array($sql_select_countries)) {
            $countries_array[] = $country_details['name'];
          }
        }
      }

      $display_output = $this->implode_array($countries_array, ', ');

      return $display_output;
    }

    function show_country($country_name, $state_name) {
      (string) $display_output = null;

      $display_output = ($state_name) ? $country_name . ' - ' . $state_name : $country_name;

      return $display_output;
    }

    function countries_dropdown($select_name, $selected_value, $form_refresh = null, $form_refresh_type = 'register', $add_null_field = false) {
      (string) $display_output = null;

      $form_refresh_output = ($form_refresh_type == 'register') ? 'onChange = "form_submit()"' : 'onChange = "submit_form(' . $form_refresh . ', \'\')"';

      $sql_select_countries = $this->query("SELECT c.id, c.name FROM " . DB_PREFIX . "countries c WHERE
			c.parent_id=0 ORDER BY c.country_order ASC, c.name ASC");

      $display_output = '<select name="' . $select_name . '" id="' . $select_name . '" ' . (($form_refresh) ? $form_refresh_output : '') . '> ';

      if ($add_null_field) {
        $display_output .= '<option value="" selected>' . GMSG_ALL_COUNTRIES . '</option>';
      }
      while ($country_details = $this->fetch_array($sql_select_countries)) {
        $display_output .= '<option value="' . $country_details['id'] . '" ' . (($selected_value == $country_details['id']) ? 'selected' : '') . '>' . $country_details['name'] . '</option>';
      }

      $display_output .= '</select>';

      return $display_output;
    }

    function states_box($box_name, $selected_value, $country_value = null, $form_refresh = null) {
      (string) $display_output = null;

      if ($country_value) {
        $country_id = $country_value;
      }
      else {
        $country_id = $this->get_sql_field("SELECT id FROM " . DB_PREFIX . "countries WHERE
				parent_id=0 ORDER BY country_order ASC, name ASC LIMIT 0,1", 'id');
      }

      $is_states = $this->count_rows('countries', "WHERE parent_id='" . $country_value . "' AND parent_id!=0");

      if ($is_states) {
        $sql_select_states = $this->query("SELECT s.id, s.name FROM " . DB_PREFIX . "countries s WHERE
				s.parent_id='" . $country_value . "' ORDER BY s.country_order ASC, s.name ASC");

        $display_output = '<select name="' . $box_name . '" id="' . $box_name . '" ' . (($form_refresh) ? 'onChange = "submit_form(' . $form_refresh . ', \'\')"' : '') . '> ';
        $display_output .= '<option value="" selected>' . MSG_SELECT_STATE . '</option> ';

        while ($state_details = $this->fetch_array($sql_select_states)) {
          $display_output .= '<option value="' . $state_details['id'] . '" ' . (($selected_value == $state_details['id']) ? 'selected' : '') . '>' . $state_details['name'] . '</option>';
        }

        $display_output .= '</select>';
      }
      else {
        $selected_value = (is_numeric($selected_value)) ? '' : $selected_value;
        $display_output = '<input name="' . $box_name . '" type="text" id="' . $box_name . '" value="' . $selected_value . '" size="25" />';
      }

      return $display_output;
    }

    function apply_tax($fee_amount, $currency, $user_id, $enable_tax) {
      (array) $countries_array = null;
      (array) $output = null;

      $output['amount'] = $fee_amount;
      $output['apply_tax'] = false;
      $output['tax_rate'] = 0;

      if ($enable_tax) {
        $user_row = $this->get_sql_row("SELECT tax_exempted, country, state FROM " . DB_PREFIX . "users WHERE
				user_id=" . intval($user_id));

        if (!$user_row['tax_exempted']) {
          $tax_row = $this->get_sql_row("SELECT tax_name, amount, countries_id FROM " . DB_PREFIX . "tax_settings WHERE
					site_tax=1");

          $countries_array = @explode(',', $tax_row['countries_id']);

          if (in_array($user_row['country'], $countries_array) || in_array($user_row['state'], $countries_array)) {
            $output['apply_tax'] = true;
            $output['tax_rate'] = $tax_row['amount'];
            $output['amount'] = $this->round_number($fee_amount + ($fee_amount * $tax_row['amount'] / 100));

            $output['tax_details'] = GMSG_THE_PRICE_INCLUDES . ' ' . $tax_row['amount'] . '% ' . $tax_row['tax_name'] . ' ' .
              '( ' . $this->display_amount($fee_amount, $currency) . ' + ' . $tax_row['amount'] . '% ' . $tax_row['tax_name'] . ' )';
          }
        }
      }
      $output['amount'] = $this->round_number($output['amount']); ## round to two decimals

      return $output;
    }

    function tax_user_type($tax_account_type, $tax_reg_number) {
      (string) $tax_user_type = null;
      if ($tax_account_type == 0 && empty($tax_reg_number)) /* individual and no tax number */
        $tax_user_type = 'd';
      else if ($tax_account_type == 0 && !empty($tax_reg_number)) /* individual with a tax number */
        $tax_user_type = 'c';
      else if ($tax_account_type == 1 && empty($tax_reg_number)) /* business and no tax number */
        $tax_user_type = 'b';
      else if ($tax_account_type == 1 && !empty($tax_reg_number)) /* business with a tax number */
        $tax_user_type = 'a';

      return $tax_user_type;
    }

    function can_add_tax($user_id, $enable_tax) {
      (array) $result = null;

      if ($enable_tax) {
        $user_row = $this->get_sql_row("SELECT tax_account_type, tax_reg_number, country, state FROM
				" . DB_PREFIX . "users WHERE user_id=" . intval($user_id));

        $tax_user_type = $this->tax_user_type($user_row['tax_account_type'], $user_row['tax_reg_number']);

        $can_add_tax = $this->get_sql_field("SELECT tax_id FROM
				" . DB_PREFIX . "tax_settings WHERE
				(LOCATE('," . $user_row['country'] . ",', CONCAT(',',seller_countries_id,','))>0 OR
				LOCATE('," . $user_row['state'] . ",', CONCAT(',',seller_countries_id,','))>0) AND
				LOCATE('," . $tax_user_type . ",', CONCAT(',',tax_user_types,','))>0", 'tax_id');

        $result['tax_id'] = intval($can_add_tax);
        $result['tax_reg_number'] = $user_row['tax_reg_number'];
        $result['can_add_tax'] = (intval($can_add_tax) > 0) ? true : false;
      }

      return $result;
    }

    /**
     * this function will be used on the ad_details page to display to users from which
     * locations tax will be charged for a particular item
     *
     * if buyer_id is specified, it will check if tax will apply for him
     */
    function auction_tax($seller_id, $enable_tax, $buyer_id = 0) {
      $output = array('display' => GMSG_NO_TAX_APPLIED, 'display_buyer' => null,
        'display_buyer_purchase' => null, 'apply' => false, 'amount' => 0, 'tax_name' => null, 'tax_reg_number' => null);

      $can_add_tax = $this->can_add_tax($seller_id, $enable_tax);

      if ($can_add_tax['can_add_tax']) {
        $output['tax_reg_number'] = $can_add_tax['tax_reg_number'];

        $tax_row = $this->get_sql_row("SELECT tax_name, amount, countries_id FROM
				" . DB_PREFIX . "tax_settings WHERE tax_id=" . intval($can_add_tax['tax_id']));

        $output['display'] = '<strong>' . $tax_row['amount'] . '% ' . $tax_row['tax_name'] . ' ' . GMSG_APPLIED_TO_USRS_FROM . ':</strong><br>' .
          $this->display_countries($tax_row['countries_id']);

        if ($buyer_id) {
          $buyer_row = $this->get_sql_row("SELECT tax_exempted, country, state FROM " . DB_PREFIX . "users WHERE
					user_id=" . intval($buyer_id));

          if (!$buyer_row['tax_exempted']) {
            $countries_array = @explode(',', $tax_row['countries_id']);

            if (in_array($buyer_row['country'], $countries_array) || in_array($buyer_row['state'], $countries_array)) {
              $output['apply'] = true;
              $output['tax_name'] = $tax_row['tax_name'];
              $output['amount'] = $tax_row['amount'];

              if ($seller_id != $buyer_id) {
                $output['display_buyer'] = MSG_USER_TAX_LIABLE . ' ' . $tax_row['tax_name'] . '.';
              }

              $output['display_buyer_purchase'] = $tax_row['amount'] . '% ' . $tax_row['tax_name'] . ' ' .
                MSG_TAX_WINNING_BID_EXPL;
            }
          }
          else {
            $output['display_buyer'] = MSG_USER_TAX_EXEMPTED;
          }
        }
      }

      return $output;
    }

  }
?>