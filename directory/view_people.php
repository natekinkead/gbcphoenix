<? $auth = 'view';
include('config.php');
include('viewfunctions_people.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GBC Directory - View Person</title>
<link href="default.css" rel="stylesheet" type="text/css">
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
	margin:3px 10px 2px 15px;
	/*padding:2px;*/
	line-height:19px;
}
-->
</style></head>

<body>
  <table width="98%" border="0" cellpadding="5" cellspacing="0" class="bluetxtboldbig">
    <tr>
      <td align="right" valign="middle"> Name:</td>
      <td valign="middle">
<?=stripslashes($firstname)?> <? if(isset($_GET["household"])){$household = $_GET["household"];}
// FInd Households
$sql="select * from dir_households where id = ".$household;
$rs=mysql_query($sql, $conn);
$rsdata = mysql_fetch_assoc($rs);
print $rsdata["lastname"];?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Role:</td>
      <td valign="middle"><?
	  switch($role){
	  case '1':
	  print "Man";
	  break;
	  case '2':
	  print "Woman";
	  break;
	  case '3':
	  print "Child";
	  break;
	  }?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Home Phone:</td>
      <td valign="middle"><?=stripslashes($rsdata["homephone"])?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Cell Phone:</td>
      <td valign="middle"><?=stripslashes($cell)?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Family Email:</td>
      <td valign="middle"><?=stripslashes($rsdata["email"])?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Personal Email:</td>
      <td valign="middle"><? if($email == ''){print stripslashes($rsdata["email"]);}else{print stripslashes($email);}?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Birthday:</td>
      <td valign="middle"><?=stripslashes($birthday)?></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Anniversary:</td>
      <td valign="middle"><?=stripslashes($rsdata["anniversary"])?></td>
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
<? include('include_ministries_view.php');?>
<? }?>
<br clear="all" />
<br />
<u>Serving God through Tasks - Projects</u>
<? //displays records
$msql="select * from dir_ministries where category = 'project' order by type, ministry";
$mrs=mysql_query($msql, $conn);
while ($mrsdata = mysql_fetch_assoc($mrs)){ ?>
<? include('include_ministries_view.php');?>
<? }?>
<br clear="all" />
<br />
<u>Serving God by Caring for People</u>
<? //displays records
$msql="select * from dir_ministries where category = 'people' order by type, ministry";
$mrs=mysql_query($msql, $conn);
while ($mrsdata = mysql_fetch_assoc($mrs)){ ?>
<? include('include_ministries_view.php');?>
<? }?>
<br clear="all" />
<br />
<u>Professional Skills</u>
<? //displays records
$msql="select * from dir_ministries where category = 'professional' order by type, ministry";
$mrs=mysql_query($msql, $conn);
while ($mrsdata = mysql_fetch_assoc($mrs)){ ?>
<? include('include_ministries_view.php');?>
<? }?></td>
    </tr>
<? }?>
  </table>
  <br />
  <br />
</body>
</html>
