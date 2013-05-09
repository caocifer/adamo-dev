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

    <td class="smallfont" nowrap="nowrap">&nbsp;<b>Username</b></td>

    <td class="smallfont" nowrap="nowrap">&nbsp;<b>Sales</b></td>

  </tr>

  <?php while ($data = mysql_fetch_array($topsellers)) { ?> 

      <tr height="15" class="<?php echo (($count++) % 2 == 0) ? "c2" : "c3"; ?>"> 

        <td class="smallfont" width="85%" nowrap>&nbsp;<a href="user_reputation.php?user_id=<?php echo $data['user_id']; ?>" title="View Feedback for Seller: <?php echo $data['username']; ?>" target="NEW"><?php echo $data['username']; ?></a></td>

        <td class="smallfont" width="15%" nowrap><center><?php echo $data['items_sold']; ?></center>

    </td></tr>

  <?php } ?>

</table>

