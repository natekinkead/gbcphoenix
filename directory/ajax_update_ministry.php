<? include('config.php');

$sql = "update dir_ministries set ministry = '".$_POST["value"]."' where id = ".substr($_POST["editorId"],7); 
$rs=mysql_query($sql, $conn);
print $_POST["value"];
?>