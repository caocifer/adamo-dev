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
<script language="javascript">
  function popUp(URL) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=2,location=0,statusbar=1,menubar=0,resizable=0,width=550,height=395,left = 80,top = 80');");
  }
</script>

<div class="mainhead"><img src="images/user.gif" align="absmiddle">
  <?php echo $header_section; ?>
</div>
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
  <tr>
    <td align="center"><?php echo $msg_changes_saved; ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" class="border">
        <form action="list_users_reputations.php" method="post">
          <tr class="c3">
            <td colspan="3"><b>
                <?php echo AMSG_REPUTATION_SEARCH; ?>
              </b></td>
          </tr>
          <tr class="c1">
            <td nowrap><?php echo GMSG_FROM; ?> (<?php echo AMSG_USERNAME; ?>):
              <input name="src_from" type="text" id="src_from" value="<?php echo $src_from; ?>" /></td>
            <td nowrap><?php echo GMSG_TO; ?> (<?php echo AMSG_USERNAME; ?>):
              <input name="src_to" type="text" id="src_to" value="<?php echo $src_to; ?>" /></td>
            <td width="100%"><?php echo AMSG_RATING; ?>:
              <select name="src_rating">
                <option value="" selected="selected">--
                  <?php echo GMSG_ANY; ?>
                  --</option>
                <option value="5" <?php echo ($src_rating == 5) ? "selected" : ""; ?>  style="color:#009933; ">
                  <?php echo GMSG_FIVE_TICKS; ?>
                </option>
                <option value="4" <?php echo ($src_rating == 4) ? "selected" : ""; ?>  style="color:#009933; ">
                  <?php echo GMSG_FOUR_TICKS; ?>
                </option>
                <option value="3" <?php echo ($src_rating == 3) ? "selected" : ""; ?>  style="color:#666666; ">
                  <?php echo GMSG_THREE_TICKS; ?>
                </option>
                <option value="2" <?php echo ($src_rating == 2) ? "selected" : ""; ?>  style="color:#FF0000; ">
                  <?php echo GMSG_TWO_TICKS; ?>
                </option>
                <option value="1" <?php echo ($src_rating == 1) ? "selected" : ""; ?>  style="color:#FF0000; ">
                  <?php echo GMSG_ONE_TICK; ?>
                </option>
              </select>
              <input name="form_rep_search" type="submit" id="form_rep_search" value="<?php echo GMSG_SEARCH; ?>" /></td>
          </tr>
        </form>
      </table></td>
  </tr>
  <tr>
    <td align="center"><?php echo $query_results_message; ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="3" cellspacing="3">
        <tr>
          <td colspan="5" class="c7"><b>
              <?php echo AMSG_FILTER_REPUTATIONS; ?>
              :</b>
            <?php echo $filter_reps_content; ?></td>
        </tr>
        <tr class="c3">
          <td width="200"><b>
              <?php echo AMSG_DETAILS; ?>
            </b></td>
          <td width="100"><b>
              <?php echo AMSG_REP_RATE; ?>
            </b></td>
          <td><b>
              <?php echo AMSG_REP_COMMENTS; ?>
            </b></td>
          <td width="110" align="center"><b>
              <?php echo AMSG_OPTIONS; ?>
            </b></td>
        </tr>
        <form action="list_users_reputations.php" method="POST">
          <?php echo $rep_details_content; ?>
          <tr class="c4">
            <td colspan="5" align="center"><input name="form_save_settings" type="submit" id="form_save_settings" value="<?php echo AMSG_SAVE_CHANGES; ?>" /></td>
          </tr>
          <tr>
            <td colspan="5" align="center"><?php echo $pagination; ?></td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4"><img src="images/c3.gif" width="4" height="4"></td>
    <td width="100%" class="fbottom"><img src="images/pixel.gif" width="1" height="1"></td>
    <td width="4"><img src="images/c4.gif" width="4" height="4"></td>
  </tr>
</table>
