<?
if((!isset($_GET['id']) || $_GET['id'] == '') && !isset($_POST['savebtn']) && !isset($_POST['updatebtn']) && !isset($_POST['clearbtn']) && !isset($_POST['deletebtn'])){die();}

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

// SAVE
if(isset($_POST["savebtn"])){
	//gathers highest id
	$sql="select max(id) as maxid from ".$dbtable."";
	$rs=mysql_query($sql, $conn);
	$rsdata = mysql_fetch_assoc($rs);
	$newid = ($rsdata["maxid"]+1);
	//$query = mysql_query("select max(id) as maxid from ".$dbtable.""); 
	//$maxid = mysql_fetch_array($query);
	$sql_insert_fields = "";
	$sql_insert_values = "";
	foreach($fields as $k => $v){
		$sql_insert_fields .= ", ".$v;
		$sql_insert_values .= ", '".addslashes($_POST[$v])."'";
	}
	$sql = "insert into ".$dbtable." (id".$sql_insert_fields.") values ('".$newid."'".$sql_insert_values.")";
	$rs=mysql_query($sql, $conn);
	
	setInterests($newid);
	
	// REFRESH LIST
	print "<script>parent.list.location.href='list.php?anchor=".$_POST["household"]."'</script>";
	print "<script>location.href='edit_people.php?id=".$newid."'</script>";
	/*print "<script>parent.list.location.href='list.php#".($rsdata["maxid"]+1)."'</script>";*/
	//header('location:edit_people.php?id='.($maxid["maxid"]+1));
}

// UPDATE
if(isset($_POST["updatebtn"])){
	$sql_update_set = "";
	$comma = "";
	foreach($fields as $k => $v){
		$sql_update_set .= $comma.$v." = '".addslashes($_POST[$v])."'";
		$comma = ", ";
	}
	$sql = "update ".$dbtable." set ".$sql_update_set." where id = ".$_POST["id"]; 
	$rs=mysql_query($sql, $conn);
	
	setInterests($_POST["id"]);
	
	// REFRESH LIST
/*	print "<script>parent.list.location.href='list.php?anchor=".$_POST["household"]."'</script>";
	print "<script>location.href='edit_people.php?id=".$_POST["id"]."'</script>";
*/	/*print "<script>parent.list.location.href='list.php#".$_POST["id"]."'</script>";*/
	//header('parent.list.location:list.php');
	//header('location:edit_people.php?id='.$_POST["id"]);
}

// CLEAR
if(isset($_POST["clearbtn"])){
	header('location:edit_people.php');
}

// DELETE
if(isset($_POST["deletebtn"])){
	$sql = "delete from ".$dbtable." where id = ".$_POST["id"]; 
	$rs=mysql_query($sql, $conn);
	//$query = mysql_query("delete from ".$dbtable." where id = ".$_POST["id"]); 
	// REFRESH LIST
print "<script>parent.list.location.href='list.php'</script>";
print "<script>location.href='edit_people.php'</script>";
}

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

function setInterests($personid){
	global $conn;
	$ministries[0] = "";
	// Gathers Ministry Records
	$msql="select * from dir_ministries order by category, type, ministry";
	$mrs=mysql_query($msql, $conn);
	while ($mrsdata = mysql_fetch_assoc($mrs)){
		$ministries[$mrsdata["id"]] = $mrsdata["ministry"];
	}
	
	// Delete all records from person
	$sql = "delete from dir_interests where personid = ".$personid;
	$rs=mysql_query($sql, $conn);
	
	// Insert new records
	foreach($ministries as $k => $v){
		if(isset($_POST["ministry_".$k])){
	
			$sql = "insert into dir_interests (personid, ministryid, notetxt) values (".$personid.", ".$k.", '".addslashes($_POST["ministry_".$k])."')";
			$rs=mysql_query($sql, $conn);
		}
	}
}
?>