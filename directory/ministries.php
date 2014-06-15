<? include('config.php');

$sql="select personid from dir_interests group by personid order by personid";
$rs=mysql_query($sql, $conn);
$totalpeople = 0;
while ($rsdata = mysql_fetch_assoc($rs))
{
   $totalpeople++;
}
//$totalpeople = odbc_num_rows($rs);
//$rsdata = mysql_fetch_assoc($rs);
//$totalpeople = $rsdata["total"];
//print $totalpeople;
//print $totalpeople;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Grace Bible Church Ministries</title>
<script type="text/javascript" src="scriptaculous/lib/prototype.js"></script>
<script type="text/javascript" src="scriptaculous/src/scriptaculous.js"></script>
<script type="text/javascript" src="scriptaculous/src/unittest.js"></script>
<script type="text/javascript">
function changeState(id, state) {
	if(state == 'close'){
		document.getElementById('opener_'+id).style.display = 'none';
		document.getElementById('closer_'+id).style.display = '';
	}
	if(state == 'open'){
		document.getElementById('opener_'+id).style.display = '';
		document.getElementById('closer_'+id).style.display = 'none';
	}
}
/*<a id="expander" href="#" onclick="$$('div.<?=$mrsdata["id"]?>').each( function(e) { e.visualEffect('slide_down',{duration:1.5}) }); return false; changeState('close');">Open</a>
<a href="#" onclick="$$('div.<?=$mrsdata["id"]?>').each( function(e) { e.visualEffect('slide_up',{duration:1.5}) }); return false; changeState('open');">Close</a>*/

function WaitDiv() {
	document.getElementById("wait").style.display="none";
    document.getElementById("hideMe").style.display="block";
}

</script>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
	background-color:#FFFFFF;
}
div.ministry {
	float:left;
	width:350px;
	font-weight:normal;
	margin:3px 2px 2px 0px;
	/*padding:2px;*/
	line-height:19px;
	text-align:right;
}
div.ministrystat {
	float:left;
	font-weight:normal;
	margin:3px 0px 2px 20px;
	/*padding:2px;*/
	line-height:19px;
	background-image:url(grad_blue.gif);
	background-repeat:repeat-x;
}
h1 {
	font-size:18px;
	text-align:center;
}
#wait {
	position: absolute;
	width:100%;
	text-align: center;
	font-family:"Trebuchet MS";
}
-->
</style>
</head>

<body>
<div id="wait" style="display:block"><br />
    <br />
    <br />
      <br />
      <br />
      <br />
    <br />
    <br />
    <br />
    <br />
    <br />
  <br />
<img src="loading.gif" align="absmiddle" /><br />
Processing...</div>

<div id="hideMe" style="display:none">
<? include('menu.php');?>

<a id="opener_all" href="#" onclick="$$('div.all').each( function(e) { e.visualEffect('slide_down',{duration:5}) }); changeState('all', 'close'); return false;">Open All</a>
<a id="closer_all" href="#" onclick="$$('div.all').each( function(e) { e.visualEffect('slide_up',{duration:5}) }); changeState('all', 'open'); return false;" style="display:none;">Close All</a><br />
<h1>Serving God through Church Ministries</h1> <br />
<? $category = "church";
include('include_ministries_graph.php');?>
<br />
<h1>Serving God through Tasks - Projects</h1>
<? $category = "project";
include('include_ministries_graph.php');?>
<br />
<h1>Serving God by Caring for People</h1>
<? $category = "people";
include('include_ministries_graph.php');?>
<br />
<h1>Professional Skills</h1>
<? $category = "professional";
include('include_ministries_graph.php');?>
</div>
<script>
WaitDiv();
</script>
</body>
</html>