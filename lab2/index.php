<?php 
require_once "vendor/autoload.php";

$url=explode("/",$_SERVER["PATH_INFO"]);
$resource = (isset($url[1]))? $url[1] : "" ;
$resource_id;


if(!isset($url[2])){
    $resource_id="";
} elseif(isset($url[2]) && is_numeric($url[2])){
    $resource_id=intval($url[2]);
}else{
    $resource_id=0;
}

if($resource =="items"){
    require_once("routes/router.php");
}else{
    $err=["error"=> _NO_RESOURSES_];
    return return_response($err,404);
}


