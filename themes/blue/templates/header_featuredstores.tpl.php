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



  <?php while ($data = $db->fetch_array($getStores)) { ?>

      <tr> 

        <td class="c2" align=center><a href="shop.php?user_id=<?php echo $data['user_id']; ?>" target="NEW" title="Click Here to View Sellers Store: <?php echo clean_string($data['shop_name']); ?>"><img src="<?php echo $setts['site_path']; ?>thumbnail.php?pic=<?php echo $data['shop_logo_path']; ?>&w=100&sq=Y&b=Y" border=0></a></td> 

      </tr>

      <tr><td width="100%" class="c2 smallfont" align=center><b><a href="shop.php?user_id=<?php echo $data['user_id']; ?>" target="NEW" title="View Sellers Store: <?php echo clean_string($data['shop_name']); ?>"><?php echo clean_string($data['shop_name']); ?></a></b><BR>

          Items in Store: <?php echo $data['shop_nb_items']; ?><BR>Seller: <a href="user_reputation.php?user_id=<?php echo $data['user_id']; ?>" target="NEW" title="View Sellers Feedback"><?php echo $data['username']; ?></a></td> 

      </tr> 



    <?php } ?>

</table>