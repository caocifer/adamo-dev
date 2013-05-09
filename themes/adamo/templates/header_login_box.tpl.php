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

<table border="0" cellpadding="2" cellspacing="2" width="100%" style="border:1px solid #ccc;" class="no_b">
  <form action="login.php" method="post" name="loginbox">
    <input type="hidden" name="operation" value="submit">
    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
    <tr>
      <td align="right" class="user"><?php echo MSG_USERNAME; ?></td>
      <td nowrap class="user"><input name="username" type="text" size="10">
      </td>
    </tr>
    <tr >
      <td align="right" nowrap class="user"><?php echo MSG_PASSWORD; ?></td>
      <td nowrap class="user"><input name="password" type="password" size="10"></td>
    </tr>
    <tr >
      <td colspan="2" align="center"><input name="form_loginbox_proceed" id="form_loginbox_proceed" type="submit" value="<?php echo MSG_LOGIN_SMALL; ?>"></td>
    </tr>
  </form>
</table>
<div class="stat"><div class="nav_r"><div class="nav_l"><div class="nav"></div></div></div></div>