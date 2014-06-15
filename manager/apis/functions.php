<?php
ini_set("display_errors","Off");
session_start();
date_default_timezone_set('America/Los_Angeles');
require_once("../db_include.php");
if(!isset($_REQUEST["loader"]) && isset($_REQUEST[$_REQUEST["frmid"]."_loader"])){
    $_REQUEST["loader"] = $_REQUEST[$_REQUEST["frmid"]."_loader"];
}

if(!isset($_REQUEST["method"]) && isset($_REQUEST[$_REQUEST["frmid"]."_method"])){
    $_REQUEST["method"]=$_REQUEST[$_REQUEST["frmid"]."_method"];
}
if(!isset($_REQUEST["method"]) && isset($_REQUEST["loader"]) && $_REQUEST["loader"]>""){
    $_REQUEST["method"]=$_REQUEST["loader"];
    $_REQUEST[$_REQUEST["keyfield"]]=$_REQUEST[$_REQUEST["keyfield"]];
}

call_user_func($_REQUEST["method"]);
//print_r($_REQUEST);


function returnthis($sq){
    $result = mysql_query($sq);
    $rs = array();
    $cnt = mysql_num_rows($result);
    for($i=0;$i<$cnt;$i++){$rs[] = mysql_fetch_assoc($result);}
    echo json_encode($rs);
}

function getmembers(){
    $sq="select mid, firstname,lastname,family_role, address_id from mgr_members where lastname like '{$_REQUEST["initial"]}%' ";
    if($_REQUEST["members"]=="true"){
      $sq .= " and member_status = 1";
    }
    if($_REQUEST["regulars"]=="true"){
        $sq .= " and regular_attender = 1";
    }
    if($_REQUEST["inactive"]=="true"){
        $sq .= " and active = 0";
    } else{
        $sq .= " and active = 1";
    }
    $sq .= " order by lastname, firstname";
    //echo $sq;
    returnthis($sq);
}

function getmember(){
    returnthis("select * from mgr_members a left join mgr_address b on a.address_id = b.address_id where mid = {$_REQUEST["mid"]}");
}

function getname(){
    returnthis("select concat(firstname, ' ', lastname) as fname from mgr_members where mid = {$_REQUEST["mid"]}");
}

function getfield(){
    returnthis("select {$_REQUEST["fld"]} as fld from mgr_{$_REQUEST["tbl"]} where {$_REQUEST["key"]} = {$_REQUEST["val"]}");
}
function addtofamily(){
    $result = mysql_query("select parent,family from mgr_members where mid = {$_REQUEST["add"]}");
    $row=mysql_fetch_assoc($result);
    if($row["parent"]>0 && $_REQUEST["switch"]!="yes"){
        returnthis("select '{$row["family"]}' as result");
        return;
    }
    mysql_query("update mgr_members set parent={$_REQUEST["mid"]}, family='{$_REQUEST["family"]}'  where mid = {$_REQUEST["add"]}");
    returnthis("select 'ok' as result");
}
function removefamilymember(){
    $sq="update mgr_members set family = '', parent = 0, family_role=null where mid = {$_REQUEST["mid"]}";
    mysql_query($sq);
}
function getfamily(){
    returnthis("select mid, concat(firstname, ' ', lastname) as fname, family_role from mgr_members where family = '{$_REQUEST["family"]}'");
}
function saveaddress(){
    mysql_query("update mgr_address set address1='{$_REQUEST["address1"]}',address2='{$_REQUEST["address2"]}',city='{$_REQUEST["city"]}',state='{$_REQUEST["state"]}',zip='{$_REQUEST["zip"]}' where address_id = {$_REQUEST["address_id"]}");
}
function alladdresses(){
    returnthis("select address_id,address1,address2,city,state,zip from mgr_address where ifnull(address1,'') > '' order by address1");
}
function addfamilyaddress(){
    mysql_query("insert into mgr_address (address1,address2,city,state,zip) values('{$_REQUEST["address1"]}','{$_REQUEST["address2"]}','{$_REQUEST["city"]}','{$_REQUEST["state"]}','{$_REQUEST["zip"]}')");
    $result = mysql_query("select max(address_id) as address_id from mgr_address where address1='{$_REQUEST["address1"]}' and address2='{$_REQUEST["address2"]}' and city='{$_REQUEST["city"]}' and state='{$_REQUEST["state"]}' and zip='{$_REQUEST["zip"]}'");
    $row=mysql_fetch_assoc($result);
    mysql_query("update mgr_members set address_id = {$row["address_id"]} where mid {$_REQUEST["mid"]}");
    returnthis("select '{$row["address_id"]}' as address_id");

}
function setfield(){
    if($_REQUEST["fld"]=="family"){
         $result = mysql_query("select family from mgr_members where family = {$_REQUEST["newval"]} and {$_REQUEST["key"]} != {$_REQUEST["val"]}");
       //  if(mysql_num_rows($result)>0){
       //      returnthis("select 'dup' as result");
       //      return;
       // }else{
             $result = mysql_query("select family from mgr_members where {$_REQUEST["key"]} = {$_REQUEST["val"]}");
             $row=mysql_fetch_assoc($result);
             if($row["family"]>""){
                 mysql_query("update mgr_{$_REQUEST["tbl"]} set {$_REQUEST["fld"]} = {$_REQUEST["newval"]} where  family = '{$row["family"]}'");
             }

       //  }
        if($_REQUEST["address_id"]>""){
            mysql_query("update mgr_address set family = {$_REQUEST["newval"]} where address_id = {$_REQUEST["address_id"]}");
        }
    }
    if($_REQUEST["fld"]=="family_role" && $_REQUEST["newval"] == "head"){
        $result = mysql_query("select parent from mgr_members  where {$_REQUEST["key"]} = {$_REQUEST["val"]}");
        $row=mysql_fetch_assoc($result);
        if($row["parent"] > "0"){
            mysql_query("update mgr_members set address_id = null where {$_REQUEST["key"]} = {$_REQUEST["val"]}");
        }
        $result = mysql_query("update mgr_members set parent = 0 where {$_REQUEST["key"]} = {$_REQUEST["val"]}");

    }
    mysql_query("update mgr_{$_REQUEST["tbl"]} set {$_REQUEST["fld"]} = {$_REQUEST["newval"]}  where {$_REQUEST["key"]} = {$_REQUEST["val"]}");
    returnthis("select 'ok' as result");
}