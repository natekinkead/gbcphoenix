<? include('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Grace Bible Church Directory Map</title>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>

<body>
<? include('menu.php');?>
<h1>Grace Bible Church Directory Map</h1>
<img src="gbc_map.jpg" width="800" height="600" />
<? if($diradmin == "yes"){?>
<br />
<a href="map.php">Process live map &raquo;
</a>
<? }?>
</body>
</html>
