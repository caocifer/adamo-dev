<?php
  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>
<table width="100%" border="0" cellspacing="0" cellpadding="3" class=border>


  <tr class="c4" height="15">
    <td class="smallfont" width="70%">&nbsp;<b>Auction Title<b></td>
          <td class="smallfont" width="30%" nowrap>&nbsp;<b>Sold For</b></td> 
          <?php while ($data = mysql_fetch_array($lastsold)) { ?>
              <tr height="15" class="<?php echo (($count++) % 2 == 0) ? "c2" : "c3"; ?>"> 
                <?php $qdata = $db->get_sql_row("SELECT * FROM myphpauction_auctions WHERE auction_id='" . $data['auction_id'] . "'"); ?>
                <?php
                $string = $qdata['name'];
                $maxsize = 35;
                $delimiter = "|||";
                if (strlen($string) > $maxsize) {
                  $string = explode($delimiter, wordwrap($string, $maxsize, $delimiter));
                  $string = "$string[0]...";
                }
                ?>
                <td class="<?php echo $qdata['auction_id']; ?>">&nbsp;<a href="auction_details.php?auction_id=<?php echo $qdata['auction_id']; ?>"><?php echo $string; ?></a></td> 
                <td align=center><?php echo $data['bid_amount']; ?>
                </td> 
              </tr>
            <?php } ?>
          </table>

