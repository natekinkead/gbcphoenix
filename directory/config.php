<?
session_start();

//print_r($_GET);
// Debug Mode
ini_set("display_errors", "On");

$config_exec = "execute";
$diradmin = false;

// Transfer GET vars to SESSION vars
if(isset($_GET["email"]) && isset($_GET["password"])){

	$_SESSION["gbcdiremail"] = $_GET["email"];
	$_SESSION["gbcdirpassword"] = $_GET["password"];
	
}

// Authenticate the User
if(!isset($_SESSION["gbcdiremail"]) || $_SESSION["gbcdiremail"] == ""){ // If no user is logged in, then go to login page

	//die("Access Denied");
	print "<script>top.location.replace('login.php');</script>";
	
}else{ // If user is logged in, then proceed.
	
	
	if($_SESSION["gbcdirpassword"] == "gr@ce"){
		$_SESSION["gbcdirauth"] = "yes";
		include('config_vars.php');
	}else{
		die("Invalid Credentials");
	}
	
	//print_r($_GET);
	// Authenticate GET vars login
	
	/*
	$sql = "select p.id, p.household, j.email, j.password, j.usertype from dir_people as p, dir_households as h, jos_users as j where ".
	"p.email = '".$_SESSION["gbcdiremail"]."' ".
	"and p.email = j.email ".
	"and j.password = '".$_SESSION["gbcdirpassword"]."' ".
	"and p.household = h.id";
	//print $sql;
	$userrs=mysql_query($sql, $conn);
	$userdata = mysql_fetch_assoc($userrs);
	//print "<pre>";
	//print_r($userdata);
	//print "</pre>";
	*/
	
	/*
	if(!is_array($userdata)){ // If user is not in the directory, then go to contact page
	
		$_SESSION["gbcdirauth"] = "no";
		header('location:contact.php');
		
	}else{ // If user is in the directory, then proceed.
		
		$_SESSION["gbcdirauth"] = "yes";	
		
		// Check if user is an administrator
		if($userdata["usertype"] == "Super Administrator" || $userdata["usertype"] == "Administrator"){
			$diradmin = true;
		}
	
	} // End if(!is_array($userdata)){
	*/
	
} // End if($_GET["email"] != ""){
	

/*if(isset($_POST["pwview"])){
	if($_POST["pwview"] == "ministry"){
		$_SESSION["gbcdirectoryview"] = "1";
		header('location:view.php');
	}
}
if(isset($_POST["pw"])){
	if($_POST["pw"] == "directoryadmin"){
		$_SESSION["gbcdirectoryadmin"] = "1";
	}
}
*/

// All conditions resulting in a login screen
// Logout
if(isset($_POST["logout"])){
	include('login.php');
	session_destroy();
	die();
}
	// this makes sure $auth exists
	if(!(isset($auth))){$auth = '';}

/*
if($auth == 'view'){
// Trying to view, but no session
	if(!isset($_SESSION["gbcdirectoryview"])){
		include('login.php');
		die();
	}
}else{
// Trying to admin, but no session
	if(!isset($_SESSION["gbcdirectoryadmin"])){
		include('login.php');
		die();
	}
}
*/

?>