<?php 
//ud tim and
$ud=(isset($_GET["ud"])?$_GET["ud"]:"");
$tim=(isset($_GET["tim"])?$_GET["tim"]:"");
$and=(isset($_GET["and"])?$_GET["and"]:"");


$host = 'localhost';
$user = 'vhost139372';
$passwd = 'YZUpa@zb';
$database = 'vhost139372';
$connect = new mysqli($host, $user, $passwd, $database);
$success =false;
 
if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}else{

// $insertSql = "INSERT INTO u_ans (uid, ansjson) VALUES ($ud,$and)";
$insertSql = "INSERT INTO u_ans (uid, ansjson) VALUES ('$ud','$and')";
$status = $connect->query($insertSql);
 
if ($status) {
    // echo '新增成功';
    $success=true;
} else {
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}
$insertSql = "INSERT INTO u_t (uid, t) VALUES ('$ud','$tim')";
$status = $connect->query($insertSql);
 
if ($status) {
    // echo '新增成功';
    $success=true;
} else {
    $success=false;
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}
if($success){
     echo 'success';
}
$connect->close();

    
}


?>