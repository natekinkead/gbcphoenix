<?php
 
/* This example shows how to open and do operations on a Microsoft Access Database using PHP odbc functions 
 
$db_connection = odbc_connect('DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=../../db/directory.mdb', "ADODB.Connection", "", "SQL_CUR_USE_ODBC");
 
echo "<hr><b>Show all tables</b><br /><br />";
$result = odbc_tables($db_connection);
 
while ($resultdata = mysql_fetch_assoc($result)) {
    if(odbc_result($result,"TABLE_TYPE")=="TABLE") {
        echo "<br />" . $resultdata["households"];
    }
} 
echo "<hr /><b>SELECT id, lastname from households</b><br /><br />";
 
$res = odbc_exec($db_connection,"SELECT * FROM households");
 
 
 
 
 
$i = 0;
while ($resdata = mysql_fetch_assoc($res)) {
	$arr = odbc_fetch_array($res,$i);
	echo "<br />" . $arr["code"] . ", ". $arr["comment"];
	$i++;
}
 
echo "<br /><br /><b>Number of rows = $i</b><br /><br />";
 
odbc_close($db_connection);*/



/* ADO Database Connection

$conn = new COM("ADODB.Connection");

$connstr = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=". realpath("../../db/directory.mdb") ." ;DefaultDir=". realpath("../../");
$conn->open($connstr);

$dbtable = 'households';

//displays records
$rs = $conn->Execute("select id, lastname from ".$dbtable."");
while (!$rs->EOF) { 
print $rs->Fields[0]->Value;?>

      <a href="edit.php?id=<?=$rs->Fields['id']->Value?>" target="edit">&bull; <?=$rs->Fields['lastname']->Value?></a><span class="maintxt"></span><br />
      <br />
<? $rs->MoveNext();
};?>
<input type="text" value="?" disabled="disabled" style="width:20px;"/>
      <a href="edit.php" target="edit">&bull; ADD NEW ></a><br />
</form>*/

$conn=odbc_connect('nse','','');
$sql="SELECT * FROM dir_households"; 
$rs=mysql_query($sql, $conn);