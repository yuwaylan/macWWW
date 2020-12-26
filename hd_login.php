<?php
$ans = isset($_POST['ans'])?$_POST['ans']:"";
if($ans =="")
{
    header("Location: index.html"); 
    echo "ans = ". $ans;
}else{
    // echo "ans = ". $ans;
    $file_path = "data.ch";
    if(file_exists($file_path)){
    $str = file_get_contents($file_path,CRYPT_BLOWFISH);
    if(password_verify($ans,$str)){
        echo "<script>alert('登入成功')</script>";
        session_start();
        $_SESSION['isme']=true;
    }else{
        echo "<script>alert('密碼錯誤')</script>";
        header("Location: index.html"); 
    }

}

}


?>