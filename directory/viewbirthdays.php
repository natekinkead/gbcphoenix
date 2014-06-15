<? $auth = 'view';
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Grace Bible Church Directory</title>
<script type="text/javascript" src="scriptaculous/lib/prototype.js"></script>
<script type="text/javascript" src="scriptaculous/src/scriptaculous.js"></script>
<script type="text/javascript" src="scriptaculous/src/unittest.js"></script>
<script type="text/javascript">

function WaitDiv() {
	document.getElementById("wait").style.display="none";
    document.getElementById("hideMe").style.display="block";
}

/*<a id="expander" href="#" onclick="$$('div.<?=$mrsdata["id"]?>').each( function(e) { e.visualEffect('slide_down',{duration:1.5}) }); return false; changeState('close');">Open</a>
<a href="#" onclick="$$('div.<?=$mrsdata["id"]?>').each( function(e) { e.visualEffect('slide_up',{duration:1.5}) }); return false; changeState('open');">Close</a>*/
</script>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	font-family:Calibri, Verdana, Arial, Helvetica, sans-serif;
	font-size:16px;
	background-color:#FFFFFF;
}
div {
	padding:3px;/*border:#000000 1px solid;*/
}
#container {
	width:250px;
}
#header {
	background:url(images/gloss-black.jpg) repeat-x #000000;
	text-align:left;
}
h1, h2, h3 {
	display:inline;
}
h1 {
	font-size:19px;
	text-align:center;
	color:#FFFFFF;
}
h2 {
	font-size:18px;
	color:#F9F9F9;
}
#leftbox {
	padding:0px;
	width:250px;
	background:url(images/fade-gray.jpg) repeat-x #FFFFFF;
	margin-top:3px;
}
#p_name, #p_info {
	float:left;/*height:14px;*/
}
#p_name {
	width:130px;
	font-size:18px;
	font-weight:bold;
}
#p_info {
	width:230px;
}
#rightbox {
	padding:0px 0px 3px 0px;
	width:275px;
	background:url(images/fade-gray-long.jpg) bottom repeat-x #FFFFFF;
	margin-top:3px;
	margin-left:3px;
}
#homelabel {
	float:left;
	width:60px;
	text-align:right;
}
#homeinfo {
	float:left;
	width:200px;
}
.breakhere {
	page-break-before:always;
}
-->
</style>
</head>
<body>
<? $pagebreaks = array(
	""
)?>
<? if(!isset($_GET["publish"])){include('menu.php');}?>
<div id="container">
<? 
$months = array(
	'1' => 'January',
	'2' => 'February',
	'3' => 'March',
	'4' => 'April',
	'5' => 'May',
	'6' => 'June',
	'7' => 'July',
	'8' => 'August',
	'9' => 'September',
	'10' => 'October',
	'11' => 'November',
	'12' => 'December'
);
foreach($months as $k => $v){?>
	  <div id="header" <? if(in_array($k, $pagebreaks)){print 'class="breakhere" ';}?>>
		<h1><?=$v?>
		</h1>
	  </div>
	  <table width="650" border="0" cellpadding="0" cellspacing="0">
      <? 
	$sql="select *, right(concat('000',substring_index(p.birthday, '/', -1)), 2) as sortfield from dir_people as p, dir_households as h where p.household = h.id and p.birthday like '".$k."/%' order by sortfield, h.lastname, p.firstname";
	$result=mysql_query($sql, $conn);
	while($data = mysql_fetch_assoc($result)){?>
		<tr>
		  <td width="372" valign="top"><div id="leftbox">
		  <?=stripslashes($data["birthday"])?> - 
		  <?=stripslashes($data["firstname"]." ".$data["lastname"])?>
			</div></td>
		  <td width="278" valign="top"></td>
		</tr>
	  <? }?>
	  </table>
	  <br />
<? }?>
</div>
</body>
</html>
