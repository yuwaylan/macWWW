<?php 
//ud tar fb
$ud=(isset($_GET["ud"])?$_GET["ud"]:"");
$tar=(isset($_GET["tar"])?$_GET["tar"]:"");
$fb=(isset($_GET["fb"])?$_GET["fb"]:"");

$host = 'localhost';
$user = 'vhost139372';
$passwd = 'YZUpa@zb';
$database = 'vhost139372';
$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}else{
    if($fb != ""){
        $insertSql = "INSERT INTO feb (uid, rs, fb) VALUES ('$ud','$tar','$fb')";
        $status = $connect->query($insertSql);
        
        if ($status) {
            echo 'success';
        } else {
            echo "錯誤: " . $insertSql . "<br>" . $connect->error;
        }
    }else{
         echo "錯誤: fb=empty";
    }
    $connect->close();

    
}


?>