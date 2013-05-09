<?php
  include_once ('includes/global.php');
  include_once ('includes/functions.php');
  $cat = array($_GET['cat']);
  $page = $_GET['page'];
  $adjacents = 3;
  $limit = 3;         //how many items to show per page
  if ($page)
    $start = ($page - 1) * $limit;    //first item to display on this page
  else
    $start = 0;
  $sub_cats = get_all_subcats($cat);
  $total_pages = get_total_pages($sub_cats);
  $products = get_tab_products($sub_cats, $start, $limit);
  if ($products == NULL) {
    echo "ChÆ°a cÃ³ sáº£n pháº©m";
  }
  else {
    $i = 0;
    foreach ($products as $product) {
      ?>
      <div class="product_wrapper <?php if (($i == 0) || ($i == 3)) echo 'first'; if (($i == 2) || ($i == 5)) echo 'last' ?>">
        <div class="product_photo">
          <a href="<?php echo process_link('auction_details', array('name' => $product['name'], 'auction_id' => $product['auction_id'])); ?>"><img border="0" alt="<?php echo $product['name'] ?>" src="thumbnail.php?pic=<?php echo $product['media_url'] ?>&w=150&sq=Y"></a>
        </div>
        <div class="product_info">
          <a href="<?php echo process_link('auction_details', array('name' => $product['name'], 'auction_id' => $product['auction_id'])); ?>" title="<?php echo $product['name']; ?>"><h2><?php echo $product['name']; ?></h2></a>
          <span class="owner"><a href="other_items.php?owner_id=<?php echo $product['owner_id']; ?>"><h3><?php echo $product['username']; ?></h3></a></span>
          <?php
          if ($product['listing_type'] == 'buy_out') {
            $price = intval($product['buyout_price']);
          }
          elseif (intval($product['start_price']) > intval($product['max_bid'])) {
            $price = intval($product['start_price']);
          }
          else {
            $price = intval($product['max_bid']);
          }
          ?>
          <span class="price"><h3><?php
              setlocale(LC_MONETARY, 'vi_VN');
              echo money_format('%.0n', $price);
              ;
              ?></h3></span>
        </div>
      </div>
      <?php
      $i++;
    }
    /*     * pagination* */
    $targetpage = "tabs.php?cat=" . $_GET['cat'];  //your file name  (the name of this file)
    if ($page == 0)
      $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;
    $pagination = "";
    if ($lastpage > 1) {
      $pagination .= "<div style='clear:both'></div><div class=\"pagination\">";
      //previous button
      if ($page > 1)
        $pagination.= "<a class='thisPane pre_btn' href=\"$targetpage&page=$prev\">Â«</a>";
      else
        $pagination.= "<span class=\"disabled pre_btn\">Â«</span>";

      //pages	
      if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
        for ($counter = 1; $counter <= $lastpage; $counter++) {
          if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
          else
            $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$counter\">$counter</a>";
        }
      }
      elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
        //close to beginning; only hide later pages
        if ($page < 1 + ($adjacents * 2)) {
          for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
            if ($counter == $page)
              $pagination.= "<span class=\"current page_btn\">$counter</span>";
            else
              $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$counter\">$counter</a>";
          }
          $pagination.= "...";
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$lpm1\">$lpm1</a>";
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$lastpage\">$lastpage</a>";
        }
        //in middle; hide some front and some back
        elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=1\">1</a>";
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=2\">2</a>";
          $pagination.= "...";
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
            if ($counter == $page)
              $pagination.= "<span class=\"current page_btn\">$counter</span>";
            else
              $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$counter\">$counter</a>";
          }
          $pagination.= "...";
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$lpm1\">$lpm1</a>";
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$lastpage\">$lastpage</a>";
        }
        //close to end; only hide early pages
        else {
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=1\">1</a>";
          $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=2\">2</a>";
          $pagination.= "...";
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
            if ($counter == $page)
              $pagination.= "<span class=\"current page_btn\">$counter</span>";
            else
              $pagination.= "<a class='thisPane page_btn' href=\"$targetpage&page=$counter\">$counter</a>";
          }
        }
      }

      //next button
      if ($page < $counter - 1)
        $pagination.= "<a class='thisPane next_btn' href=\"$targetpage&page=$next\">Â»</a>";
      else
        $pagination.= "<span class=\"disabled next_btn\">Â»</span>";
      $pagination.= "</div>\n";
    }
    echo $pagination;
  }