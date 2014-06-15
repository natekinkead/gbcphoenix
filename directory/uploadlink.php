<? include('config.php');

if ($_POST["action"] == "upload") {

	$uploaddir = $config_uploadlink_path;
	$file_approved = true;
	$filesize = $_FILES['userfile']['size'];
	$basename = basename($_FILES['userfile']['name']);
	
	/*if($config_upload_restrict == "yes"){
		$pcs = explode(".", $basename);
		$pcs_cnt = sizeof($pcs);
		$ext = $pcs[$pcs_cnt-1];
		$accepted = in_array($pcs[$pcs_cnt-1], $accepted_ext);
		if ( ($pcs_cnt > 1) && ($accepted != TRUE) ) {
			$file_approved = false;
		}
	}*/

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

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			$msg = "File Upload Successful!  File URL is...<br><br>".$config_rooturl."/files/".$basename."<br><br>Instructions: Copy the above URL; In the main window text editor, highlight the text you wish to link; Click on the \"Insert/edit link\" button (picture of a chain link); Paste the URL in the \"Link URL\" box; Click the \"Insert\" button.";
			// Upload Successful - Initiate Image Resizer
			/*if($config_resizer == "yes"){
				if($config_resizer_force == "yes"){
					createthumb($uploadfile,$uploadfile,$config_resizer_size,$config_resizer_size); 
				} else {
					createthumb($uploadfile,$uploadfile,$_POST["resize"],$_POST["resize"]); 
				}
			}
			print '<script>window.opener.document.editform.'.$_POST["field"].'.value = "'.$basename.'"; window.close();</script>';
			exit;*/
		} else {
			$_SESSION["upload_error"] = "filemove";
			$msg = "An upload error has occured.<br><br>1. Ensure that the file being uploaded resides on your local hard drive (not a shared fileserver).<br><br>2. Try reducing the size of the file being uploaded.<br><br>If that does not work, please contact Symbolic Interactive.  Please specify the filetype and size of the file being uploaded.  We apologize for the inconvenience.<br><br>"; 
			//header("Location: items.php?ERROR");
			//exit;
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
<style type="text/css">
<!--
.style2 {font-size: 10px; color:#003366;}
-->
</style>
</head>
<body>
<form name="fileform" enctype="multipart/form-data" action="" method="POST">
<TABLE WIDTH="90%" height="140" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0" class="maintxt">
<TR><TD><DIV STYLE="font-size:14px;font-weight:bold;color:#FFFFFF;">Upload a File:</DIV>
    <hr>
</TD></TR>
<TR>
  <TD align="center" style="font-family:arial;font-size:11px;color:#FFFFFF">
<? if ($_POST["action"] == "upload") {?>
<span class="style2">
<? print $msg;?>
<br>
<br>
<a href="uploadlink.php">Upload Another File</a></span>
<? }else{?>
<input type="hidden" name="action" value="upload">
<input name="userfile" type="file">
<input type="submit" value="Upload File">
<? }?></TD>
</TR>
<TR>
  <TD><hr></TD>
</TR>
</TABLE>
</form>
</body>
</html>