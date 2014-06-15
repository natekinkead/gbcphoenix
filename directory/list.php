<? include('config.php');

/*if(isset($_POST["submitbtn"])){
	foreach($_POST as $id => $seq){
		$query = mysql_query("update ".$dbtable." set seq = '".$seq."' where id = '".$id."'"); 
	}
	header('location:list.php');
};*/

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>The List</title>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="scriptaculous/lib/prototype.js"></script>
<script type="text/javascript" src="scriptaculous/src/scriptaculous.js"></script>
<script type="text/javascript" src="scriptaculous/src/unittest.js"></script>
<script>
function opencells(num){
if(document.getElementById('cell' + num).style.display=='none'){
document.getElementById('cell' + num).style.display='';
}else{
document.getElementById('cell' + num).style.display='none';
}
}
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
</script>
<style type="text/css">
<!--
body {
	background-color: #F2F1EE;
	margin-left: 15px;
	margin-top: 15px;
}
-->
</style></head>
<body<? if(isset($_GET["anchor"])){?> onload="<? if($diradmin){?>location.href='#<?=$_GET["anchor"]?>'; <? }?>$$('div.<?=$_GET["anchor"]?>').each( function(e) { e.visualEffect('slide_down',{duration:2}) }); changeState(<?=$_GET["anchor"]?>, 'close');"<? }?>>

<style type="text/css">

#wait
{
	position: absolute;
	width:85%;
	margin:0px;
	padding:0px;
	text-align: center;
	font-family:"Trebuchet MS";
}

</style>

<script type="text/javascript">

function WaitDiv() {
	document.getElementById("wait").style.display="none";
    document.getElementById("hideMe").style.display="block";
}
</script>

<div id="wait"><br />
    <br />
  <br />
<img src="loading.gif" align="absmiddle" /><br />
Processing...</div>

<div id="hideMe" style="display: none;">

<span class="bluetxtboldbig"><u><?=$config_list_label?></u></span><br />
<br />

<table border="0" cellpadding="0" cellspacing="0">
<? if($diradmin){?>
  <tr>
    <td align="left" valign="top" style="padding-bottom:12px;"><a href="edit_households.php" target="edit">&bull; <strong>ADD HOUSEHOLD &raquo;</strong></a></td>
  </tr>
<? }?>
<?
//displays records
$sql = "select id, lastname from dir_households ";
//if(!$diradmin){$sql .= "where id = '".$userdata["household"]."' ";}
$sql .= "order by lastname";
$rs=mysql_query($sql, $conn);
while ($rsdata = mysql_fetch_assoc($rs)){ ?>
  <tr>
  <td align="left" valign="top" style="padding-bottom:12px;"><a name="<?=$rsdata["id"]?>" id="opener_<?=$rsdata["id"]?>" href="#" onclick="$$('div.<?=$rsdata["id"]?>').each( function(e) { e.visualEffect('slide_down',{duration:.75}) }); changeState(<?=$rsdata["id"]?>, 'close'); return false;"><img src="folder plus.gif" width="9" height="9" border="0" /></a><a name="<?=$rsdata["id"]?>" id="closer_<?=$rsdata["id"]?>" href="#" onclick="$$('div.<?=$rsdata["id"]?>').each( function(e) { e.visualEffect('slide_up',{duration:1.5}) }); changeState(<?=$rsdata["id"]?>, 'open'); return false;" style="display:none;"><img src="folder plus.gif" width="9" height="9" border="0" /></a><a href="edit_households.php?id=<?=$rsdata["id"]?>" target="edit"><strong><?=stripslashes($rsdata["lastname"])?></strong></a><br />
 <div id="cell<?=$rsdata["id"]?>" class="<?=$rsdata["id"]?>" style="display:none;"><div style="overflow:hidden;">
 <?
//displays records
$sql="select id, firstname from dir_people where household = ".$rsdata["id"]." order by role, firstname";
$rs2=mysql_query($sql, $conn);
while ($rs2data = mysql_fetch_assoc($rs2)){ ?> &nbsp;&nbsp; &nbsp; <a name="p<?=$rs2data["id"]?>" href="edit_people.php?id=<?=$rs2data["id"]?>" target="edit">&bull; <?=stripslashes($rs2data["firstname"])?></a><br />
      <? } // End People ?>
 &nbsp;&nbsp; &nbsp; <a href="edit_people.php?household=<?=$rsdata["id"]?>" target="edit">&bull; ADD PERSON &raquo; </a>
 </div></div></td>
  </tr>
<? /*
  <tr>
    <td align="left" valign="bottom" id="cell<?=$rsdata["id"]?>" class="<?=$rsdata["id"]?>" style="display:none;"></td>
  </tr> */ } // End Households
//odbc_close($conn);?>
<? if($diradmin){?>
  <tr>
    <td align="left" valign="top"><a href="edit_households.php" target="edit">&bull; <strong>ADD HOUSEHOLD &raquo;</strong></a></td>
  </tr>
<? }?>
</table>
<br />
</div>
<script>
WaitDiv();
</script>
</body>
</html>