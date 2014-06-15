<?
$dbtable = "dir_people";

// Standard DB Field Names (required to use this admin tool)
// id - int, primary
// title - text
// seq - int :: NO form input in "edit_people.php".  It's use in "list.php"

// Custom DB Field Names (Ensure the form input names on edit_people.php match the list below.)
$fields = array(
"household",
"firstname",
"role",
"cell",
"email",
"birthday"
);

// Set all fields variables to empty
$id = "";
foreach($fields as $k => $v){$$v = "";}

// POPULATE
if(isset($_GET["id"])){
	//gathers record
	$sql="select * from ".$dbtable." where id = ".$_GET["id"];
	$rs=mysql_query($sql, $conn);
	$rsdata = mysql_fetch_assoc($rs);
	//$query = mysql_query(); 
	//$content = mysql_fetch_array($query);
	
	$id = $rsdata["id"];
	foreach($fields as $k => $v){
		$$v = $rsdata[$v];  // Creates a variable variable.  If $v is "image", then it creates a variable called $image that contains the database value for that field.
	}
	
	//gathers records for Ministry Interests
	$interests[0] = "";
	$isql="select * from dir_interests where personid = ".$_GET["id"];
	$irs=mysql_query($isql, $conn);
	$i = 0;
	while($irsdata = mysql_fetch_assoc($irs)){
		$interests[$i] = $irsdata["ministryid"];
		$interestnotes[$irsdata["ministryid"]] = $irsdata["notetxt"];
		$i++;
	}
}
?>