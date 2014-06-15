<?
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
<html>
<head>
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
</head>
<body>
<p class="title">
  Welcome to the Grace Bible Church Directory!</p>
<br />
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><table border="0" align="left" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
        <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><font face="Trebuchet MS"><strong>View </strong></font></p></td>
      </tr>
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
            <form action="view.php" method="post" name="login" class="blacktext" id="login">
        <td bordercolor="#E9F3EE" bgcolor="#EFEFEF" class="blacktext"><font face="Trebuchet MS"> Password:</font><br />
			<input name="pwview" type="password" id="pwview" />
            <br />
            <input type="submit" value="Enter" />
        </td>
			</form>
      </tr>
    </table></td>
    <td align="right"><table border="0" align="right" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
        <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><font face="Trebuchet MS"><strong>Administration</strong></font></p></td>
      </tr>
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
            <form action="index.php" method="post" name="login" class="blacktext" id="login">
        <td bordercolor="#E9F3EE" bgcolor="#EFEFEF" class="blacktext"><font face="Trebuchet MS">Password:</font><br />
			<input name="pw" type="password" id="pw" />
            <br />
            <input type="submit" value="Enter" />
        </td>
</form>
      </tr>
    </table></td>
  </tr>
</table>
<br />
  <br />
  <? if(isset($_POST["email"])){?>
    <div align="center"><span class="style1">
    <?=$confirm?>
  </span>
</div>
  <? }else{?>
<form id="form1" name="form1" method="post" action="login.php">
  <table border="0" align="center" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
    <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
      <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><font face="Trebuchet MS"><strong>Don't have a Password? </strong></font></p></td>
    </tr>
    <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
      <td bordercolor="#E9F3EE" bgcolor="#EFEFEF" class="blacktext"><span class="style1">Name:</span><br />
        <input type="text" name="name" />
        <br />
        <span class="style1">Email:</span><br />
        <input type="text" name="email" />
        <br />
        <span class="style1">Admin?</span>
        <label>
        <input type="checkbox" name="admin" value="yes" />
        </label>
        <br />
        <input type="submit" name="Submit" value="Send Me a Password" /></td>
    </tr>
  </table>
</form>
<? }?>
<br />
  <br />
  </body>
</html>
