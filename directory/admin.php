<? include('config.php');

if(isset($_GET["download"])){
	$handle = fopen("gbc_directory_ministries.csv", "w");
	
	$headerstr = "Person, Phone";
	$msql="select ministry from dir_ministries order by ministry";
	$mrs=mysql_query($msql, $conn);
	while ($mrsdata = mysql_fetch_assoc($mrs)){
	$headerstr .= " ,".$mrsdata["ministry"];
	}
	$headerstr .= "\r\n";
	fwrite($handle, $headerstr);
	
	$rowstr = "";
	//displays records
	$psql="select p.firstname, p.phone, h.id, h.lastname from dir_people as p, dir_households as h where p.household = h.id order by h.lastname, p.firstname";
	$prs=mysql_query($psql, $conn);
	while ($prsdata = mysql_fetch_assoc($prs)){
	$rowstr = $prsdata["firstname"].' '.$prsdata["lastname"].', '.$prsdata["phone"].'\r\n';
	fwrite($handle, $rowstr);
	}
	fclose($handle);
	header('location:gbc_directory_ministries.csv');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$config_title?></title>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">
</head>

<body>
<!--<div align="center" class="style1">The Directory database is currently under modification.&nbsp; Any changes you make right now will be lost!<br />
</div>-->
<? include('menu.php');?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ECEBE6" class="maintxt text">
  <tr>
    <td width="200" valign="top"><iframe name="list" src="list.php?anchor=<?=$userdata["household"]?>" width="200" height="600" frameborder="0" scrolling="auto"></iframe></td>
    <td width="600" valign="top"><iframe name="edit" src="edit_people.php?id=<?=$userdata["id"]?>" width="600" height="600" frameborder="0" scrolling="auto"></iframe></td>
  </tr>
</table>
<? if($diradmin){?>
<div align="center"><br />
    <a href="sync.php" target="_blank">synchronize redunancies</a>
</div>
<? }?>
</body>
</html>
