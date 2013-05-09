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

    <td class="smallfont" width="75%">&nbsp;<b>Username<b></td>

          <td class="smallfont" width="25%">&nbsp;<b>Joined</b></td>

          <?php while ($data = $db->fetch_array($memberslist)) { ?>

              <?php
              $month = date("m", $data['reg_date']);

              $day = date("d", $data['reg_date']);

              $final = "$month/$day";
              ?>

              <tr height="15" class="<?php echo (($count++) % 2 == 0) ? "c1" : "c2"; ?>">

                <td class=smallfont>&nbsp;<a href="user_reputation.php?user_id=<?php echo $data['user_id']; ?>" title="View users Feedback" target="NEW"><?php echo $data['username']; ?></a></TD>

                <td class=smallfont>&nbsp;<?php echo $final; ?></TD></tr>

            <?php } ?>

          </table>