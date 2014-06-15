<?php
/**
 * Created by PhpStorm.
 * User: c0kind6
 * Date: 5/1/14
 * Time: 8:41 AM
 */
$hostname = "localhost";
$username = "kinkeadw_gbc";
$dbname = "kinkeadw_gbc";

//These variable values need to be changed by you before deploying
$password = "gr@ceandtruth";

$link=mysql_connect ($hostname, $username, $password) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_set_charset('utf8',$link);
mysql_select_db ($dbname);