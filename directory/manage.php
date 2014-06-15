<? include('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$config_title?></title>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-top: 15px;
}
-->
</style></head>

<body>
<!--<div align="center" class="style1">The Directory database is currently under modification.&nbsp; Any changes you make right now will be lost!<br />
</div>-->
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ECEBE6" class="maintxt text">
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" class="bluetxtboldbig"><strong><font size="3">
      </font></strong>
      <table width="99%" height="28" border="0" cellpadding="4" cellspacing="0">
        <tr>
          <td align="left" valign="top"><strong><font size="3">
          <?=$config_title?>&nbsp; |&nbsp; </font></strong><a href="ministries.php" target="_blank"><strong><font size="2">View Ministry Report &raquo;</font></strong></a><strong><font size="2">&nbsp; |&nbsp; </font></strong><a href="map_preview.php" target="_blank"><strong><font size="2">View Map &raquo;</font></strong></a></td>
		  <form id="form1" name="form1" method="post" action="">
            <td align="right" valign="top">
              <input name="logout" type="submit" id="logout" value="Logout" />
              <strong><a href="<?=$config_url?>" target="_blank" style="font-size:12px;"></a></strong></td>
		  </form> 
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="200" valign="top"><iframe name="list" src="list.php" width="200" height="600" frameborder="0" scrolling="auto"></iframe></td>
    <td width="600" valign="top"><iframe name="edit" src="edit_households.php" width="600" height="600" frameborder="0" scrolling="auto"></iframe></td>
  </tr>
</table>
<div align="center"><br />
    <a href="sync.php" target="_blank">synchronize redunancies</a>
</div>
</body>
</html>
