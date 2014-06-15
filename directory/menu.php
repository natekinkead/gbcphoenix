<table width="100%" height="28" border="0" cellpadding="4" cellspacing="0" bgcolor="#ECEBE6" >
  <tr>
    <td align="left" class="bluetxtboldbig"><strong><font size="3">
      <?=$config_title?>
      <br />
    </font></strong><a href="viewdirectory.php"><strong><font size="2">Directory Listing &raquo;</font></strong></a><strong><font size="2">&nbsp; |&nbsp; </font></strong><a href="admin.php"><strong><font size="2">Edit Info &raquo;</font></strong></a><strong><font size="2">&nbsp; |&nbsp; </font></strong><a href="viewbirthdays.php"><strong><font size="2">Birthdays &raquo;</font></strong></a><strong><font size="2">&nbsp; |&nbsp; </font></strong><a href="viewanniversaries.php"><strong><font size="2">Anniversaries &raquo;</font></strong></a><strong><font size="2">&nbsp;  |&nbsp; </font></strong><a href="ministries<? if(!$diradmin){print "view";}?>.php"><strong><font size="2"> Ministry Report &raquo;</font></strong></a><strong><font size="2">&nbsp; |&nbsp; </font></strong><a href="map_preview.php"><strong><font size="2">Area Map &raquo;</font></strong></a></td>
    
    <form id="form1" name="form1" method="post" action="">
      <td align="right" valign="top"><input name="logout" type="submit" id="logout" value="Logout" />
        <strong><a href="<?=$config_url?>" target="_blank" style="font-size:12px;"></a></strong></td>
    </form>
  </tr>
</table>
