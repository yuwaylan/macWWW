<?php 
//ud Ac rt dn ri
$ud=(isset($_GET["ud"])?$_GET["ud"]:"");
$Ac=(isset($_GET["Ac"])?$_GET["Ac"]:"");
$rt=(isset($_GET["rt"])?$_GET["rt"]:"");
$dn=(isset($_GET["dn"])?$_GET["dn"]:"");
$ri=(isset($_GET["ri"])?$_GET["ri"]:"");

$host = 'localhost';
$user = 'vhost139372';
$passwd = 'YZUpa@zb';
$database = 'vhost139372';
$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}else{

$insertSql = "INSERT INTO u_basic_i (uid, Agree_concent, reg_time,reg_ip,dev_name) VALUES ('$ud','$Ac','$rt','$ri','$dn')";
$status = $connect->query($insertSql);
 
if ($status) {
    echo 'success';
} else {
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}


$connect->close();
    
}


?>