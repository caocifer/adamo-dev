<?php
#################################################################
## MyPHPAuction v6.04															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c1.gif" width="4" height="4"></td>
    <td width="100%" class="ftop"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c2.gif" width="4" height="4"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <tr class="c3">
    <td colspan="2"><img src="images/subt.gif" align="absmiddle" hspace="4" vspace="2"> <b>
        <?php echo $manage_box_title; ?>
      </b></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
  <form action="list_admin_users.php" method="post" name="form_admin_user">
    <input type="hidden" name="do" value="<?php echo $do; ?>" />
    <input type="hidden" name="id" value="<?php echo $user_details['id']; ?>" />
    <input type="hidden" name="operation" value="submit" />
    <tr class="c1">
      <td nowrap><?php echo AMSG_USERNAME; ?></td>
      <td width="100%"><input type="text" name="username" value="<?php echo $user_details['username']; ?>" size="50" /></td>
    </tr>
    <tr class="c3">
      <td align="right" nowrap></td>
      <td></td>
    </tr>
    <?php if ($do == 'edit_user') { ?>
        <tr class="c2">
          <td nowrap><?php echo AMSG_CREATED; ?></td>
          <td width="100%"><?php echo show_date($user_details['date_created']); ?></td>
        </tr>
        <tr class="c1">
          <td nowrap><?php echo AMSG_LAST_LOGIN; ?></td>
          <td width="100%"><?php echo show_date($user_details['date_lastlogin']); ?></td>
        </tr>
        <tr class="c3">
          <td align="right" nowrap></td>
          <td></td>
        </tr>
        <tr class="c1">
          <td nowrap><?php echo AMSG_ENTER_CURRENT_PASSWORD; ?></td>
          <td width="100%"><input type="password" name="current_password" value="" size="35" /></td>
        </tr>
      <?php } ?>
    <tr class="c2">
      <td nowrap><?php echo AMSG_PASSWORD; ?></td>
      <td width="100%"><input type="password" name="password" value="" size="35" /></td>
    </tr>
    <tr class="c1">
      <td nowrap><?php echo AMSG_REPEAT_PASSWORD; ?></td>
      <td width="100%"><input type="password" name="password2" value="" size="35" /></td>
    </tr>
    <tr class="c3">
      <td align="right" nowrap></td>
      <td></td>
    </tr>
    <tr class="c2">
      <td nowrap><?php echo GMSG_LEVEL; ?></td>
      <td width="100%"><select name="level">
          <option value="1" selected>1</option>
          <option value="2" <?php echo ($user_details['level'] == 2) ? 'selected' : ''; ?>>2</option>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right" class="explain"><img src="images/info.gif"></td>
      <td width="100%" class="explain"><?php echo AMSG_ADMIN_LEVEL_EXPLANATION; ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="c3"><input type="submit" name="form_admin_user_save" value="<?php echo AMSG_SAVE_CHANGES; ?>">
      </td>
    </tr>
  </form>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
<br>
