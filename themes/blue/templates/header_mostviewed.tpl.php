<?php
#################################################################
## myphpauction V6.8															##
##-------------------------------------------------------------##
## Copyright ©2008 myphpauction SoftwareLTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################



  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<table width="100%" border="0" cellspacing="0" cellpadding="3" class=border>



  <tr class="c4" height="15"> 

    <td class="smallfont" nowrap="nowrap">&nbsp;<b>Views</b></td> 

    <td class="smallfont" width="100%">&nbsp;<b>Auction Title<b></td></tr>

          <?php while ($data = mysql_fetch_array($gettop5auctions)) { ?> 

              <tr height="15" class="<?php echo (($count++) % 2 == 0) ? "c2" : "c3"; ?>"> 

                <td class="smallfont" nowrap>&nbsp;<b>

                    <?php $totalviews = $data['nb_clicks'];
                    echo "$totalviews";
                    ?></b></td> 

                <?php
                $string = $data['name'];

                $maxsize = 30;
                $delimiter = "|||";

                if (strlen($string) > $maxsize) {

                  $string = explode($delimiter, wordwrap($string, $maxsize, $delimiter));

                  $string = "$string[0]...";
                }
                ?>

                <td width="100%" class="c2">&nbsp;<a href="auction_details.php?auction_id=<?php echo $data['auction_id']; ?>" title="Click to View Auction" target="NEW"><?php echo $string; ?></a>

                </td></tr>

  <?php } ?>

          </table>

