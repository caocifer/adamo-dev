<?php
#################################################################
## MyPHPAuction v6.05															##
##-------------------------------------------------------------##
## Copyright ©2009 MyPHPAuction. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

  if (!defined('INCLUDED')) {
    die("Access Denied");
  }
?>

<form action="<?php echo $post_url; ?>" method="post">
  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
  <div class="mainhead"><img src="images/user.gif" align="absmiddle">
    <?php echo $header_section; ?>
  </div>
  <?php echo $msg_changes_saved; ?>
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
          <?php echo strtoupper($subpage_title); ?>
        </b></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="3" cellspacing="3" class="fside">
    <?php if ($user_id) { ?>
        <tr class="c1">
          <td width="150"><?php echo AMSG_SEND_MSG_TO; ?>
            :</td>
          <td><strong>
              <?php echo AMSG_USERNAME; ?>
            </strong> :
            <?php echo $user_details['username']; ?>
            <br>
            <strong>
              <?php echo AMSG_EMAIL_ADDR; ?>
            </strong> :
            <?php echo $user_details['email']; ?></td>
        </tr>
        <tr class="c1">
          <td width="150"><?php echo AMSG_SENDING_OPTIONS; ?>
            :</td>
          <td><input type="radio" name="msg_method" value="0" checked>
            <?php echo AMSG_BY_EMAIL; ?>
            <br>
            <input type="radio" name="msg_method" value="1" <?php echo ($email_details['msg_method'] == 1) ? 'checked' : ''; ?>>
            <?php echo AMSG_INTERNAL_MESSAGING; ?></td>
        </tr>
      <?php }
      else {
        ?>
        <tr class="c1">
          <td width="150"><?php echo AMSG_SEND_NEWSLETTER_TO; ?>
            :</td>
          <td><select name="newsletter_send" id="newsletter_send">
              <option value="1" selected>
    <?php echo AMSG_ALL_USERS; ?> (<?php echo $total_users; ?> <?php echo AMSG_USERS; ?>)
              </option>
              <option value="2">
    <?php echo AMSG_ACTIVE_USERS; ?> (<?php echo $active_users; ?> <?php echo AMSG_USERS; ?>)
              </option>
              <option value="3">
    <?php echo AMSG_SUSPENDED_USERS; ?> (<?php echo $suspended_users; ?> <?php echo AMSG_USERS; ?>)
              </option>
              <option value="4">
    <?php echo AMSG_NEWSLETTER_SUBSCRIBERS; ?> (<?php echo $nl_users; ?> <?php echo AMSG_USERS; ?>)
              </option>
            </select></td>
        </tr>
        <tr class="c1">
          <td width="150"><?php echo AMSG_SENDING_OPTIONS; ?>
            :</td>
          <td><input type="radio" name="sending_method" value="0" checked>
    <?php echo AMSG_USE_CRON_JOB; ?>
            <br>
            <input type="radio" name="sending_method" value="1" <?php echo ($email_details['sending_method'] == 1) ? 'checked' : ''; ?>>
        <?php echo AMSG_SEND_DIRECTLY; ?></td>
        </tr>
  <?php } ?>
    <tr class="c1">
      <td><?php echo AMSG_SUBJECT; ?>
        :</td>
      <td><input name="subject" type="text" id="subject" value="<?php echo $email_details['subject']; ?>" size="40"></td>
    </tr>
    <tr class="c1">
      <td><?php echo AMSG_CONTENT; ?>
        :</td>
      <td><textarea name="email_content" cols="45" rows="10" id="email_content"><?php echo $db->add_special_chars($email_details['email_content']); ?></textarea>
        <script>
          var oEdit1 = new InnovaEditor("oEdit1");
          oEdit1.width = "100%";//You can also use %, for example: oEdit1.width="100%"
          oEdit1.height = 300;
          oEdit1.REPLACE("email_content");//Specify the id of the textarea here
        </script></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input name="form_send_email" type="submit" id="form_send_email" value="<?php echo GMSG_PROCEED; ?>"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
      <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
      <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
    </tr>
  </table>
</form>
