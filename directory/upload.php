<? include('config.php');
include('createthumb.php');

if ($_POST["action"] == "upload") {

	$uploaddir = $config_upload_path;
	$file_approved = true;
	$filesize = $_FILES['userfile']['size'];
	$basename = basename($_FILES['userfile']['name']);
	
	if($config_upload_restrict == "yes"){
		$pcs = explode(".", $basename);
		$pcs_cnt = sizeof($pcs);
		$ext = $pcs[$pcs_cnt-1];
		$accepted = in_array($pcs[$pcs_cnt-1], $accepted_ext);
		if ( ($pcs_cnt > 1) && ($accepted != TRUE) ) {
			$file_approved = false;
		}
	}

	if ($file_approved == true) {

		if (file_exists($uploaddir . '/' . $basename)) {
			// append a digit to the end of the name
			$tmpVar = 1;
			while(file_exists($uploaddir . '/' . $tmpVar . '-' . $basename)) {
				// and keep increasing it until we have a unique name
				$tmpVar++;
			}
			$basename = $tmpVar . '-' . $basename;
		}

		$uploadfile = $uploaddir . "/" . $basename;
		$uploadthumb = $uploaddir . "/thumb_" . $basename;

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			// Upload Successful - Initiate Image Resizer
			if($config_resizer == "yes"){
				if($config_resizer_thumbcopy == "yes"){$destfile = $uploadthumb;}else{$destfile = $uploadfile;}
				if($config_resizer_force == "yes"){
					createthumb($uploadfile,$destfile,$config_resizer_size,$config_resizer_size); 
				} else {
					createthumb($uploadfile,$destfile,$_POST["resize"],$_POST["resize"]); 
				}
			}
			print '<script>window.opener.document.editform.'.$_POST["field"].'.value = "'.$basename.'"; window.close();</script>';
			exit;
		} else {
			$_SESSION["upload_error"] = "filemove";
			print "An upload error has occured.<br><br>1. Ensure that the file being uploaded resides on your local hard drive (not a shared fileserver).<br><br>2. Try reducing the size of the file being uploaded.<br><br>If that does not work, please contact Symbolic Interactive.  Please specify the filetype and size of the file being uploaded.  We apologize for the inconvenience.<br><br>"; 
			//header("Location: items.php?ERROR");
			exit;
		}
	} else { // not approved
		print "The file type is not allowed to be uploaded to the server.  The accepted file types are...<br><br>";
		foreach($accepted_ext as $k => $v){
			print $v." ";
		}
	} // end approved

} // end action=upload
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Upload File</title>
<link rel="STYLESHEET" type="text/css" href="<?=$config_css?>">
</head>
<body>
<form name="fileform" enctype="multipart/form-data" action="" method="POST">
<TABLE WIDTH="90%" height="140" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0" class="maintxt">
<TR><TD><DIV STYLE="font-size:14px;font-weight:bold;color:#FFFFFF;">Upload a File:</DIV>
    <hr>
</TD></TR>
<TR>
  <TD align="center" style="font-family:arial;font-size:11px;color:#FFFFFF">
    <input type="hidden" name="action" value="upload">
    <input type="hidden" name="field" value="<?=$_GET["field"]?>">
    <input name="userfile" type="file">
    <? if(($config_resizer == "yes") and ($config_resizer_force != "yes")){?>
Image Resize:*
<input name="resize" type="text" id="resize" value="" size="3" />
<br>
<font size="1"><br>
*Enter the integer value in pixels to set the longest dimension.<br>
Resizer will maintain aspect ratio.  Leave blank to disable.</font><br>
<? }?>
<input type="submit" value="Upload File"></TD>
</TR>
<TR>
  <TD><hr></TD>
</TR>
</TABLE>
</form>
</body>
</html>