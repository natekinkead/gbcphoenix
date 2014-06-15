<? include('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Samples</title>
<link href="<?=$config_css?>" rel="stylesheet" type="text/css">
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
</style>
</head>

<body>
<form id="frminput" name="frminput" method="post" action="">
  <table width="98%" border="0" cellpadding="5" cellspacing="0" class="bluetxtboldbig">
    <tr>
      <td align="right" valign="middle">textbox:</td>
      <td valign="middle"><input name="id" type="hidden" id="id" value="<?=$id?>" />
      <input name="sampletext" type="text" id="sampletext" value="<?=stripslashes($sampletext)?>" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">image:</td>
      <td valign="middle"><a href="javascript:chooseImage('choose_img.php?img=1')" style="font-size:12px;">Choose image...</a>
       &nbsp; <input name="image" type="text" id="image" value="<?=stripslashes($image)?>" size="20" /></td>
    </tr>
    <tr>
      <td align="right" valign="top"><br />
        textarea:</td>
      <td valign="middle"><textarea name="textarea" cols="50" rows="20" id="textarea"><?=stripslashes($textarea)?></textarea></td>
    </tr>
  </table>
</form>
</body>
</html>
