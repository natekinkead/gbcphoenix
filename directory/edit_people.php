<? include('config.php');
include('editfunctions_people.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GBC Directory - Edit Person</title>
<? include('edithead.php');?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #E8E7E1;
}

div.ministry {
	display:block;
	float:left;
	width:200px;
	font-weight:normal;
	margin:3px 2px 2px 0px;
	/*padding:2px;*/
	line-height:19px;
}
-->
</style></head>

<body>
<style type="text/css">

#wait
{
	position: absolute;
	width:100%;
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
  <br />
  <br />
  <br />
<img src="loading.gif" align="absmiddle" /><br />
Processing...</div>

<div id="hideMe" style="display: none;">

<form id="editform" name="editform" method="post" action="">
  <table width="98%" border="0" cellpadding="5" cellspacing="0" class="bluetxtboldbig">
    <tr>
      <td align="right" valign="middle"><input name="id" type="hidden" id="id" value="<?=$id?>" /></td>
      <td valign="middle"><? include('editcontrols.php');?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">In Household:</td>
      <td valign="middle"><select name="household" id="household">
<? if(isset($_GET["household"])){$household = $_GET["household"];}
// List Households
$sql="select id, lastname from dir_households order by lastname";
$rs=mysql_query($sql, $conn);
while ($rsdata = mysql_fetch_assoc($rs)){
?><option value="<?=$rsdata["id"]?>" <? if($rsdata["id"] == $household){print 'selected="selected"';}?>><?=$rsdata["lastname"]?></option>
      <? }?>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle">First Name:</td>
      <td valign="middle"><input name="firstname" type="text" id="firstname" value="<?=stripslashes($firstname)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Role:</td>
      <td valign="middle"><select name="role" id="role">
        <option value="1" <? if($role == "1"){print 'selected="selected"';}?>>Man</option>
        <option value="2" <? if($role == "2"){print 'selected="selected"';}?>>Woman</option>
        <option value="3" <? if($role == "3"){print 'selected="selected"';}?>>Child 1</option>
        <option value="4" <? if($role == "4"){print 'selected="selected"';}?>>Child 2</option>
        <option value="5" <? if($role == "5"){print 'selected="selected"';}?>>Child 3</option>
        <option value="6" <? if($role == "6"){print 'selected="selected"';}?>>Child 4</option>
        <option value="7" <? if($role == "7"){print 'selected="selected"';}?>>Child 5</option>
            </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Cell Phone:</td>
      <td valign="middle"><input name="cell" type="text" id="cell" value="<?=stripslashes($cell)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Email:</td>
      <td valign="middle"><input name="email" type="text" id="email" value="<?=stripslashes($email)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Birthday:</td>
      <td valign="middle"><input name="birthday" type="text" id="birthday" value="<?=stripslashes($birthday)?>" size="40" /></td>
    </tr>
<? if(isset($_GET["id"])){ ?>
    <tr>
      <td align="right" valign="top">Ministry<br />
      Interests: </td>
      <td valign="middle"><u>Serving God through Church Ministries</u> 
        <br />
        <? //displays records
$msql="select * from dir_ministries where category = 'church' order by type, ministry";
$mrs=mysql_query($msql, $conn);
while ($mrsdata = mysql_fetch_assoc($mrs)){?>
<? include('include_ministries.php');?>
<? }?>
<br clear="all" />
<br />
<u>Serving God through Tasks - Projects</u>
<? //displays records
$msql="select * from dir_ministries where category = 'project' order by type, ministry";
$mrs=mysql_query($msql, $conn);
while ($mrsdata = mysql_fetch_assoc($mrs)){ ?>
<? include('include_ministries.php');?>
<? }?>
<br clear="all" />
<br />
<u>Serving God by Caring for People</u>
<? //displays records
$msql="select * from dir_ministries where category = 'people' order by type, ministry";
$mrs=mysql_query($msql, $conn);
while ($mrsdata = mysql_fetch_assoc($mrs)){ ?>
<? include('include_ministries.php');?>
<? }?>
<br clear="all" />
<br />
<u>Professional Skills</u>
<? //displays records
$msql="select * from dir_ministries where category = 'professional' order by type, ministry";
$mrs=mysql_query($msql, $conn);
while ($mrsdata = mysql_fetch_assoc($mrs)){ ?>
<? include('include_ministries.php');?>
<? }?></td>
    </tr>
<? }?>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td valign="middle"><? include('editcontrols.php');?></td>
    </tr>
  </table>
</form>
</div>
<script>
WaitDiv();
</script>
</body>
</html>
