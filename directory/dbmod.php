<? 
$conn=odbc_connect('nse','','');
if (!$conn){exit("Connection Failed: " . $conn);}

//$dbtable = 'dir_people';

// REMOVES YEAR 2007 FROM BIRTHDAY
/*$sql="select id, birthday from dir_people";
$rs=mysql_query($sql, $conn);
while ($rsdata = mysql_fetch_assoc($rs)){

$birthday = substr($rsdata["birthday"],0,strpos($rsdata["birthday"],"/2007"));
print $birthday .' - ';

$sql2 = "update dir_people set birthday = '".$birthday."' where id = ".$rsdata["id"];
print $sql2;
$rs2=mysql_query($sql2, $conn);;

print '<br>';

};*/



// REMOVES YEAR 2007 FROM ANNIVERSARY
/*$sql="select id, anniversary from dir_households";
$rs=mysql_query($sql, $conn);
while ($rsdata = mysql_fetch_assoc($rs)){

$anniversary = substr($rsdata["anniversary"],0,strpos($rsdata["anniversary"],"/2007"));
print $anniversary .' - ';

$sql2 = "update dir_households set anniversary = '".$anniversary."' where id = ".$rsdata["id"];
print $sql2;
$rs2=mysql_query($sql2, $conn);;

print '<br>';

};*/



/*$conn = new COM("ADODB.Connection");

$connstr = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=". realpath("../../db/directory.mdb") ." ;DefaultDir=". realpath("../../");
$conn->open($connstr);

$rs = $conn->Execute("select id, lastname from households");
while (!$rs->EOF) {

$sql = "update dir_households set lastname = '".ucwords(strtolower($rs->Fields['lastname']->Value))."' where id = ".$rs->Fields['id']->Value;
print $sql;
$rs2 = $conn->Execute($sql);

$rs->MoveNext();
};*/?>