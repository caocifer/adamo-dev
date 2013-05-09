<?php
#################################################################
## MyPHPAuction v6.03															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<?php echo $header_registration_message; ?>
<br>
<?php echo $invalid_login_message; ?>
<table width="80%" border="0" cellpadding="5" cellspacing="5" align="center" class="contentfont">
  <tr valign="top">
    <td width="50%" align="center" class="border c2"><p><b>
          <?php echo MSG_NEW_TO; ?>
          <?php echo $setts['sitename']; ?>?</b><br>
        <br>
        <?php echo MSG_REGISTRATION_MSG; ?>
      <form action="register.php" method="post">
        <input name="submit" type="submit" class="buttons" value="<?php echo MSG_REGISTER_FOR_ACCOUNT; ?>">
      </form>
      </p>
    </td>
    <td width="50%" align="center" class="border c2"><b>
        <?php echo MSG_ALREADY_A; ?>
        <?php echo $setts['sitename']; ?>
        <?php echo MSG_USER ?>?
      </b><br>
      <form action="<?php echo ($setts['enable_enhanced_ssl']) ? $setts['site_path_ssl'] : SITE_PATH; ?>login.php" method="post">
        <input type="hidden" name="operation" value="submit">
        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
        <table width="100%" border="0" cellpadding="2" cellspacing="2" align="center">
          <tr>
            <td align="right"><?php echo MSG_USERNAME ?></td>
            <td><input name="username" type="text" id="username"></td>
          </tr>
          <tr>
            <td align="right"><?php echo MSG_PASSWORD ?></td>
            <td><input name="password" type="password" id="password"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="form_login_proceed" type="submit" id="form_login_proceed" value="<?php echo MSG_LOGIN_TO_MEMBERS_AREA; ?>"></td>
          </tr>
        </table>
      </form>
      <a href="<?php echo SITE_PATH; ?>retrieve_password.php">
        <?php echo MSG_LOST_PASSWORD; ?>
      </a> </td>
  </tr>
</table>
