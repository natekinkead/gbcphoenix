<?php
function logbad($value) {

$report_to = "nate@kinkeadweb.com"; $name = "Spam Reporter"; $mail = "no-reply@kinkeadweb.com";

// replace this with your own get_ip function...
$ip = (empty($_SERVER['REMOTE_ADDR'])) ? 'empty' : $_SERVER['REMOTE_ADDR'];
$rf = (empty($_SERVER['HTTP_REFERER'])) ? 'empty' : $_SERVER['HTTP_REFERER'];
$ua = (empty($_SERVER['HTTP_USER_AGENT'])) ? 'empty' : $_SERVER['HTTP_USER_AGENT'];
$ru = (empty($_SERVER['REQUEST_URI'])) ? 'empty' : $_SERVER['REQUEST_URI'];
$rm = (empty($_SERVER['REQUEST_METHOD'])) ? 'empty' : $_SERVER['REQUEST_METHOD'];

$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
$headers .= "X-Priority: 1\n";
$headers .= "X-MSMail-Priority: Normal\n";
$headers .= "X-Mailer: php\n";
$headers .= "From: \"".$name."\" <".$mail.">\r\n\r\n";

@mail ( $report_to ,"[ABUSE] mailinjection @ " . $_SERVER['HTTP_HOST'] . " by " . $ip ,"Stopped possible mail-injection @ " . $_SERVER['HTTP_HOST'] . " by " . $ip . " (" . date('d/m/Y H:i:s') . ")\r\n\r\n" . "*** IP/HOST\r\n" . $ip . "\r\n\r\n" . "*** USER AGENT\r\n" . $ua . "\r\n\r\n" . "*** REFERER\r\n" . $rf . "\r\n\r\n" . "*** REQUEST URI\r\n" . $ru . "\r\n\r\n" . "*** REQUEST METHOD\r\n" . $rm . "\r\n\r\n" . "*** SUSPECT\r\n--\r\n" . $value . "\r\n--" ,$headers );

}

// Check 1
//First, make sure the form was posted from a browser.
// For basic web-forms, we don't care about anything
// other than requests from a browser:
if(!isset($_SERVER['HTTP_USER_AGENT'])) { die('<font face="verdana" size="2">Forbidden - You are not authorized to view this page (0)</font>'); exit; }

// Cek 2
// Make sure the form was indeed POST'ed:
// (requires your html form to use: action="post")
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{ die('<font face="verdana" size="2">Forbidden - You are not authorized to view this page (1)</font>');
exit;
}

// Host names from where the form is authorized
// to be posted from:
$authHosts = array("gbcphoenix.com");

// Where have we been posted from?
$fromArray = parse_url(strtolower($_SERVER['HTTP_REFERER']));

// Test to see if the $fromArray used www to get here.
$wwwUsed = strpos($fromArray['host'], "www.");

// Make sure the form was posted from an approved host name.
if(!in_array(($wwwUsed === false ? $fromArray['host'] :
substr(stristr($fromArray['host'], '.'), 1)), $authHosts))
{ logbad("Form was not posted from an approved host name");
die('<font face="verdana" size="2"> Forbidden - You are not authorized to view this page (2)</font>');
exit;
}

// Attempt to defend against header injections:
$badStrings = array("content-type:", "mime-version:", "content-transfer-encoding:", "multipart/mixed", "charset=", "bcc:", "cc:");

// Loop through each POST'ed value and test if it contains
// one of the $badStrings:
foreach($_POST as $k => $v)
{
foreach($badStrings as $v2) {
if(strpos(strtolower($v), $v2) !== false) {
logbad($v);
die('<font face="verdana" size="2">Form processing cancelled: string (`<em>'.$v.'</em>`) contains text portions that are potentially harmful to this server. <em>Your input has not been sent!</em> Please use your browser\'s `back`-button to return to the previous page and try rephrasing your input.</font>');
exit;
}
}
}

// Made it past spammer test, free up some memory
// and continuing the rest of script:
unset($k, $v, $v2, $badStrings, $authHosts, $fromArray, $wwwUsed);
?>