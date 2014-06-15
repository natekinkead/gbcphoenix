<? include('config.php');?>
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
<br>
<br>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><table border="0" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
        <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><a href="viewdirectory.php"><font style="font-family:'Trebuchet MS'; font-size:16px;"><strong>Directory Listing</strong></font></a></p></td>
      </tr>
    </table></td>
    <td align="center"><table border="0" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
        <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
          <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><a href="admin.php"><font style="font-family:'Trebuchet MS'; font-size:16px;"><strong>Edit Information</strong></font></a></p></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="60" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table border="0" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
        <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><a href="ministries<? if(!$diradmin){print "view";}?>.php"><font style="font-family:'Trebuchet MS'; font-size:16px;"><strong>Ministries Report</strong></font></a></p></td>
      </tr>
    </table></td>
    <td align="center"><table border="0" cellpadding="10" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
      <tr align="center" valign="top" bordercolor="#E9F3EE" bgcolor="#E9F3EE">
        <td valign="middle" bordercolor="#D0E6DB" bgcolor="#DDDDDD" class="heading"><p><a href="map_preview.php"><font style="font-family:'Trebuchet MS'; font-size:16px;"><strong>Area Map</strong></font></a></p></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
