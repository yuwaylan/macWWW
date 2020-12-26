<?php 
//ud etc isme 
if(isset($_GET["ud"])){
    $ud=$_GET["ud"];
}else{
    $ud="99999";
}
$etc=(isset($_GET["etc"])?$_GET["etc"]:"999");
$isme=(isset($_GET["isme"])?$_GET["isme"]:"999");

$host = 'localhost';
$user = 'vhost139372';
$passwd = 'YZUpa@zb';
$database = 'vhost139372';
$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}else{

$insertSql = "INSERT INTO fb_info (uid, isfblogin, 	etc) VALUES ('$ud','$isme','$etc')";
$status = $connect->query($insertSql);
 
if ($status) {
    echo 'success';
} else {
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}
$connect->close();


    
}


?>