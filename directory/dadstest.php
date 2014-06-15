<? 
$conn=odbc_connect('nse','','');
if (!$conn){exit("Connection Failed: " . $conn);}

$dbtable = 'dir_households';

$sql="select id, lastname from ".$dbtable;
$rs=mysql_query($sql, $conn);
while ($rsdata = mysql_fetch_assoc($rs)){
      $sql2 = "update dir_households set lastname = '".ucwords(strtolower($rsdata["lastname"]))."' where id = ".$rsdata["id"];
	  print $sql2."<br>";
	  $rs2=odbc_prepare($conn,$sql2);
      odbc_execute($rs2); 
};
?>