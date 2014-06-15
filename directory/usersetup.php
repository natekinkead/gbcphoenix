<? include('config.php');

$sql1 = "select id, household, firstname, lastname from dir_people"; 
$rs1=mysql_query($sql1, $conn);
while($user = mysql_fetch_assoc($rs1)){
	$spos = strpos($user["firstname"]," ");
	if($spos == 0){$spos = strlen($user["firstname"]);}
	$spos2 = strpos($user["lastname"]," ");
	if($spos2 == 0){$spos2 = strlen($user["lastname"]);}
	$sql2 = "update dir_people set username = '".strtolower(substr($user["firstname"],0,$spos).substr($user["lastname"],0,$spos2))."', password = '".$user["household"].$user["id"]."' where id = ".$user["id"];
	$rs2=mysql_query($sql2, $conn);
	print $sql2."<br />";
}
print "Complete!<br /><br />";
//print $sql;

?>
