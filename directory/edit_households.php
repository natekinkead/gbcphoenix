<? include('config.php');
include('editfunctions_households.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Stuff</title>
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
      <td align="right" valign="middle">Last Name:</td>
      <td valign="middle"><input name="lastname" type="text" id="lastname" value="<?=stripslashes($lastname)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Email:</td>
      <td valign="middle"><input name="email" type="text" id="email" value="<?=stripslashes($email)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Anniversary:</td>
      <td valign="middle"><input name="anniversary" type="text" id="anniversary" value="<?=stripslashes($anniversary)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td valign="middle">Primary Home  </td>
    </tr>
    <tr>
      <td align="right" valign="middle">Address:</td>
      <td valign="middle"><input name="address" type="text" id="address" value="<?=stripslashes($address)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Address2:</td>
      <td valign="middle"><input name="address2" type="text" id="address2" value="<?=stripslashes($address2)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">City:</td>
      <td valign="middle"><input name="city" type="text" id="city" value="<?=stripslashes($city)?>" size="20" />
State:
<input name="state" type="text" id="state" value="<?=stripslashes($state)?>" size="2" />
Zip:
<input name="zip" type="text" id="zip" value="<?=stripslashes($zip)?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle"> Phone:</td>
      <td valign="middle"><input name="homephone" type="text" id="homephone" value="<?=stripslashes($homephone)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td valign="middle">Alternate Home</td>
    </tr>
    <tr>
      <td align="right" valign="middle">Address:</td>
      <td valign="middle"><input name="altaddress" type="text" id="altaddress" value="<?=stripslashes($altaddress)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">City:</td>
      <td valign="middle"><input name="altcity" type="text" id="altcity" value="<?=stripslashes($altcity)?>" size="20" />
        State:
        <input name="altstate" type="text" id="altstate" value="<?=stripslashes($altstate)?>" size="2" />
        Zip:
        <input name="altzip" type="text" id="altzip" value="<?=stripslashes($altzip)?>" size="5" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle"> Phone:</td>
      <td valign="middle"><input name="altphone" type="text" id="altphone" value="<?=stripslashes($altphone)?>" size="40" /></td>
    </tr>
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
