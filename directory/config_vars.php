<?

if($config_exec != "execute"){die;} // makes sure this file isn't included by a hacker... variable has to be set.

// MySQL Database Connection

// Set Database Parameters
//$dbhost = 'MySQLB6.webcontrolcenter.com';
$dbhost = 'localhost';
$dbuser = 'kinkeadw_gbc';
$dbpass = 'gr@ceandtruth';
$dbname = 'kinkeadw_gbc';
//$dbtable = '';

// Connect to the Database
$conn = mysql_connect( $dbhost, $dbuser, $dbpass );
if (!$conn){
	echo "Error: Could not connect to database.  Please try again later.";
	exit;
}
// Select the Site's Database 
mysql_select_db($dbname);
	
// Title of Admin Tool
$config_title = "Grace Bible Church Directory";

// URL Address of the Live Display Page
$config_url = "http://www.gracebiblechurchofphoenix.org";

// Headline Label Above the List on the Left
$config_list_label = "Households:";

// Path to a Stylesheet
$config_css = "default.css";  // default: "default.css"

// Path to the /htmleditor/ folder (without trailing "/").  Leave blank to disable the html editor.
$config_htmleditor = ""; // "../../htmleditor";

// File Upload Physical Path (without trailing "/")
$config_upload_path = "/home2/kinkeadw/directory/uploads";

// File Link Upload Physical Path (without trailing "/")
$config_uploadlink_path = "/home2/kinkeadw/directory/uploads";

// Restrict File Uploads to only allow Accepted Extensions
$config_upload_restrict = "yes";  // "yes" = enabled
	// if "yes", then specify...
	$accepted_ext = array("JPG","jpg","GIF","gif","PNG","png");

// Enable Uploaded Image Resizer
$config_resizer = "yes";  // "yes" = enabled

// Force Resizing to Specific Dimensions (Leave all blank for user-inputted dimensions
$config_resizer_force = "yes";  // "yes" = enabled
	// if "yes", then specify...
	$config_resizer_size = "75";  // the maximum dimension (in pixels)

//Create a copy of the image as a thumbnail.  Saves with the prefix "thumb_" before the filename.
$config_resizer_thumbcopy = "no";  // "yes" = enabled

?>