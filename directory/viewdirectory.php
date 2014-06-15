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
	padding:3px;
	/*border:#000000 1px solid;*/
}
#container {
	width:650px;
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
	width:372px;
	background:url(images/fade-gray.jpg) repeat-x #FFFFFF;
	margin-top:3px;
}
#p_name, #p_info {
	float:left;
	/*height:14px;*/
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
	/*"8",
	"15",
	"20",
	"32",
	"37",
	"43",
	"49",
	"54",
	"61",
	"109",
	"75",
	"78",
	"83",
	"116",
	"88",
	"93"*/
)?>
<? if(!isset($_GET["publish"])){include('menu.php');}?>
<div id="container"><?
$sql="select * from dir_households order by lastname";
$h=mysql_query($sql, $conn);
while($hdata = mysql_fetch_assoc($h)){
	$sql="select * from dir_people where household = ".$hdata["id"]." and (role = '1' or role = '2') order by role, firstname";
	$heads=mysql_query($sql, $conn);?>
<div <? if(in_array($hdata["id"], $pagebreaks)){print 'class="breakhere" ';}?>>
<div id="header">
<h1><?=/*$hdata["id"]." ".*/stripslashes($hdata["lastname"])?></h1><h2>, <?
$conj = "";
while($headsdata = mysql_fetch_assoc($heads)){
	print $conj.stripslashes($headsdata["firstname"]);
	$conj = " &amp; ";
}?></h2>
    <? if(!($hdata["anniversary"] == "")){?>
    	<span style="font-size:11px; font-weight:normal; color:#EEEEEE;">- <?=$hdata["anniversary"]?></span>
	<? }?>
</div>
<table width="650" border="0" cellpadding="0" cellspacing="0">
<tr><td width="372" valign="top">
<?
unset($email_array);
$email_array[0] = "";
$sql="select * from dir_people where household = ".$hdata["id"]." order by role, firstname";
$p=mysql_query($sql, $conn);
while($pdata = mysql_fetch_assoc($p)){?>
<div id="leftbox">
	<div id="p_name"><?=$pdata["firstname"]?> 
    <? if(!($pdata["birthday"] == "")){?>
    	<span style="font-size:11px; font-weight:normal; color:#444444;">- <?=$pdata["birthday"]?></span>
	<? }?>
    </div>
	<div id="p_info">
    <? if(!($pdata["cell"] == "")){?>
    	<em><u>cell</u>:</em> 
    	<?=$pdata["cell"]?><br />
	<? }?>
	<? if(!($pdata["email"] == "")){?>
    	<em><u>email</u>:</em> 
    	<?=$pdata["email"]?>
        <? $email_array[$pdata["id"]] = $pdata["email"];?>
    <? }?>
    </div>
	<br clear="all" />
</div>
<? }?>
</td>
<td width="278" valign="top">
<? if(!($hdata["address"] == "")){?>
    <div id="rightbox">
        <div id="homelabel">
            <em><u>address</u>:</em>
        </div>
        <div id="homeinfo">
        	<?=stripslashes($hdata["address"])?><br />
            <? if(!($hdata["address2"] == "")){?>
                <?=stripslashes($hdata["address2"])?><br />
            <? }?>
            <?=stripslashes($hdata["city"])?>, <?=stripslashes($hdata["state"])?> <?=$hdata["zip"]?>
        </div>
        <br clear="all" />
		<? if(!($hdata["homephone"] == "")){?>
            <div id="homelabel">
                <em><u>phone</u>:</em> 
            </div>
            <div id="homeinfo">
           	  <?=$hdata["homephone"]?>
            </div>
            <br clear="all" />
		<? }?>
		<? if(!($hdata["email"] == "") && !in_array($hdata["email"],$email_array)){?>
            <div id="homelabel">
                <em><u>email</u>:</em> 
            </div>
            <div id="homeinfo">
              <?=$hdata["email"]?>
            </div>
            <br clear="all" />
		<? }?>
    </div>
<? }?>

<? if(!($hdata["altaddress"] == "")){?>
    <div id="rightbox">
        <div id="homelabel">
            <em><u>address</u>:</em>
        </div>
        <div id="homeinfo">
        	<?=$hdata["altaddress"]?><br />
            <?=$hdata["altcity"]?>, <?=$hdata["altstate"]?> <?=$hdata["altzip"]?>
        </div>
        <br clear="all" />
		<? if(!($hdata["altphone"] == "")){?>
            <div id="homelabel">
                <em><u>phone</u>:</em> 
            </div>
            <div id="homeinfo">
            	<?=$hdata["altphone"]?>
            </div>
            <br clear="all" />
		<? }?>
    </div>
<? }?>
</td>
</tr>
</table>
<br />
</div>
<? }?>
<br />
</div>
</body>
</html>