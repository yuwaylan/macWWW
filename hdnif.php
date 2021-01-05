<?php 
//ud bt gd isme 
$ud=(isset($_GET["ud"])?$_GET["ud"]:"");
$bt=(isset($_GET["bt"])?$_GET["bt"]:"");
$gd=(isset($_GET["gd"])?$_GET["gd"]:"");
$isme=(isset($_GET["isme"])?$_GET["isme"]:"");

$host = 'localhost';
$user = 'vhost139372';
$passwd = 'YZUpa@zb';
$database = 'vhost139372';
$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}else{

$insertSql = "INSERT INTO no_info (uid, isnoaccount, no_gend ,no_birth) VALUES ('$ud','$bt','$gd','$isme')";
$status = $connect->query($insertSql);
 
if ($status) {
    echo 'success';
} else {
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}

$connect->close();

    session_start();
    
    if(isset($_SESSION['page'])&&isset($_SESSION['ud'])){
        $_SESSION['page']=4;
        echo $etc;

        header("Location: /usrq.php");
        
        
    }
}


?>