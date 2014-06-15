<?
// Set all fields variables to empty
$id = "";
$lastname = "";
foreach($fields as $k => $v){$$v = "";}

// SAVE
if(isset($_POST["savebtn"])){
	//gathers highest id
	$sql="select max(id) as maxid from ".$dbtable."";
	$rs=mysql_query($sql, $conn);
	$rsdata = mysql_fetch_assoc($rs);
	//$query = mysql_query("select max(id) as maxid from ".$dbtable.""); 
	//$maxid = mysql_fetch_array($query);
	$sql_insert_fields = "";
	foreach($fields as $k => $v){
		$sql_insert_fields .= ", ".$v;
		$sql_insert_values .= ", '".addslashes($_POST[$v])."'";
	}
	$sql = "insert into ".$dbtable." (id, lastname".$sql_insert_fields.") values ('".($rsdata["maxid"]+1)."', '".addslashes($_POST["lastname"])."'".$sql_insert_values.")";
	$rs=mysql_query($sql, $conn);
	// REFRESH LIST
	print "<script>parent.list.location.href='list.php'</script>";
	print "<script>location.href='edit.php?id=".($rsdata["maxid"]+1)."'</script>";
	/*print "<script>parent.list.location.href='list.php#".($rsdata["maxid"]+1)."'</script>";*/
	//header('location:edit.php?id='.($maxid["maxid"]+1));
};

// UPDATE
if(isset($_POST["updatebtn"])){
	$sql_update_set = "";
	foreach($fields as $k => $v){
		$sql_update_set .= ", ".$v." = '".addslashes($_POST[$v])."'";
	}
	$sql = "update ".$dbtable." set lastname = '".addslashes($_POST["lastname"])."'$sql_update_set where id = ".$_POST["id"]; 
	$rs=mysql_query($sql, $conn);
	// REFRESH LIST
	print "<script>parent.list.location.href='list.php'</script>";
	print "<script>location.href='edit.php?id=".$_POST["id"]."'</script>";
	/*print "<script>parent.list.location.href='list.php#".$_POST["id"]."'</script>";*/
	//header('parent.list.location:list.php');
	//header('location:edit.php?id='.$_POST["id"]);
};

// CLEAR
if(isset($_POST["clearbtn"])){
	header('location:edit.php');
};

// DELETE
if(isset($_POST["deletebtn"])){
	$sql = "delete from ".$dbtable." where id = ".$_POST["id"]; 
	$rs=mysql_query($sql, $conn);
	//$query = mysql_query("delete from ".$dbtable." where id = ".$_POST["id"]); 
	// REFRESH LIST
print "<script>parent.list.location.href='list.php'</script>";
print "<script>location.href='edit.php'</script>";
};

// POPULATE
if(isset($_GET["id"])){
	//gathers record
	$sql="select * from ".$dbtable." where id = ".$_GET["id"];
	$rs=mysql_query($sql, $conn);
	$rsdata = mysql_fetch_assoc($rs);
	//$query = mysql_query(); 
	//$content = mysql_fetch_array($query);
	
	$id = $rsdata["id"];
	$lastname = $rsdata["lastname"];
	foreach($fields as $k => $v){
		$$v = $rsdata[$v];  // Creates a variable variable.  If $v is "image", then it creates a variable called $image that contains the database value for that field.
	}
};
?>