<?php
function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

$uid =guid();
$os = "";
$NowTime=time();
$regtime = date('Y-m-d H:i:s',$NowTime);

$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
        $Android = true;
}else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
        $Android = false;
        $AndroidTablet = true;
}else{
        $Android = false;
        $AndroidTablet = false;
}
$webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
// $BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
// $RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
//do something with this information
if( $iPod || $iPhone ){
    $os = "iOS";
}else if($iPad){
    $os = "iOS ipad";
}else if($Android){
    $os = "Android";
}else if($AndroidTablet){
    $os = "Android Tablet";
}else if($webOS){
    $os = "webOS";
}else{
        $os = "we're not a mobile device";
}

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $regip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $regip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
   $regip= $_SERVER['REMOTE_ADDR'];
}
echo $regip;





?>


<!DOCTYPE html>
<html>

<head>
    <title>大數據人格分析</title>
</head>

<body>



</body>

</html>