<?php
/**
 * Created by PhpStorm.
 * User: Dell 6510
 * Date: 6/10/14
 * Time: 5:27 PM
 */
require_once("db_include.php");
$sq="select * from mgr_address";
function todate($v){
    $a=explode("/",$v);
    return "1900-" . str_pad($a[0],2,"0",STR_PAD_LEFT) . "-".str_pad($a[1],2,"0",STR_PAD_LEFT);
}
$result=mysql_query($sq);
while($row=mysql_fetch_assoc($result)){
    $result2=mysql_query("select id from mgr_address where address1 = ");
    //$sq="insert into mgr_members (firstname ,lastname,address_id,homephone,cellphone,dob,email,family_role,anniversary) values ( '{$row["firstname"]}', '{$row["lastname"]}', {$row["id"]},'{$row["homephone"]}','{$row["cell"]}','" . todate($row["birthday"]) . "','{$row["email"]}','". (($row["role"]=="1")?"head":"") . "', '" . todate($row["anniversary"]) . "')";
    //mysql_query($sq);
}

