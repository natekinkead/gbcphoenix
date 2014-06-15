<? include('config.php');

$sql1 = "select id, lastname from dir_households"; 
$rs1=mysql_query($sql1, $conn);
while($family = mysql_fetch_assoc($rs1)){
	$sql2 = "update dir_people set lastname = '".$family["lastname"]."' where household = ".$family["id"];
	$rs2=mysql_query($sql2, $conn);
	print $sql2."<br />";
}
print "Complete!<br /><br />";
//print $sql;

?>
