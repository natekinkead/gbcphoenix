<? $auth = 'view';
include('config.php');

if(isset($_POST["email"])){
	// Require the Anti-Spam scipts...
	require ('antispam.php'); 
	
	if(!(isset($_POST["admin"]))){$_POST["admin"] = "";}
	//$result = 'User input matches image string.';
	$message = "Name:\n".$_POST["name"]."\n\nEmail:\n".$_POST["email"]."\n\nAdmin?\n".$_POST["admin"];
	mail("natekinkead@gmail.com", "GBC Directory PW Request", $message, "from:GBCPhoenix Visitor<info@gbcphoenix.com>");
	$confirm = "Thank you, ".$_POST["name"].".  An email has been sent requesting a password.  We will get back to you soon.";
}
?>
<link href="default.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.title {
	color: #FFFFFF;
	font-family:"Trebuchet MS";
	font-style: italic;
	font-weight: bold;
	font-size:20px;
	text-align:center;
	background-color:#666666;
	padding:3px;
	margin-top:50px;
}
.style1 {font-family: "Trebuchet MS"}
-->
</style>
<title>GBC Directory Login</title>
<p class="title">
  Viewing the GBC Directory</p>
<br />
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><table border="0" align="left" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
        <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><a href="viewdirectory.php"><font style="font-family:'Trebuchet MS'; font-size:16px;"><strong>Directory Listing </strong></font></a></p></td>
      </tr>
    </table></td>
    <td align="right"><table border="0" align="right" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
        <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><a href="ministriesview.php"><font style="font-family:'Trebuchet MS'; font-size:16px;"><strong>Ministries Report</strong></font></a></p></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
