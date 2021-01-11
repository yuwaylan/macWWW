<?php 

// if(isset($_SESSION['isme'])){
//     if(!$_SESSION['isme']){
//         header("Location: _index.php"); 
//     }
// }else{
//     header("Location: index.php"); 
// }
//有登入過就跳輸入密碼葉面，不然就跳首頁

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $regip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $regip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
   $regip= $_SERVER['REMOTE_ADDR'];
}
$argip = explode(".", strval($regip));
if($argip[0].$argip[1] != "140138"){
    echo "<script>alert(' login ip =".$regip.",".$argip[0].".".$argip[1]." invaled ip 請洽開發者 !')</script>";
    header("Location: _index.php"); 
}else{
     echo "<script>alert(' login ip =".$regip.",".$argip[0].".".$argip[1]." valed ip 登入成功 !')</script>";
}

$today = getdate();
date("Y/m/d H:i");  //日期格式化
$year=$today["year"]; //年 
$month=$today["mon"]; //月
$day=$today["mday"];  //日
if(strlen($month)=='1')$month='0'.$month;
if(strlen($day)=='1')$day='0'.$day;
$today=$year."-".$month."-".$day;
$output = "";
$file = fopen($today."-OutPut.txt","w+"); //開啟檔案
fwrite($file,$output);
fclose($file);

$host = 'localhost';
$user = 'vhost139372';
$passwd = 'YZUpa@zb';
$database = 'vhost139372';
$connect = new mysqli($host, $user, $passwd, $database);


if (!$connect) {
	die("連線失敗：" . mysqli_connect_error()); //連線資料庫失敗則殺死程序
}else{
    echo "<table border='2' bordercolor='#66ccff'>"; 

    //找到有用的ans UID
    //UID -> birth -> gender -> ans -> time -> os -> (fb info)

    //uid ans
    $sql_uid_ans = "SELECT * FROM `u_ans` WHERE 1"; 
    $result_uid_ans = mysqli_query($connect, $sql_uid_ans);

    
    if (mysqli_num_rows($result_uid_ans) > 0) { 
        
        $output = "";

        while ($rows_ans = mysqli_fetch_assoc($result_uid_ans)){
            $is_print =false;
            $uid = "";
            $birth = "";
            $gender = "";
            $ans = "";
            $time = "";
            $os = "";
            $fbinfo = "";

            if(count($rows_ans['u_ans']) == 27){
                $uid = $rows_ans['uid'];
                

                //uid dev_name
                $sql_basic_info = "SELECT `dev_name` FROM `u_basic_i` WHERE 'uid' == '$uid'"; 
                $result_basic_info = mysqli_query($connect, $sql_basic_info);
                $oss = mysqli_fetch_assoc($result_basic_info);
                $os = $oss['dev_name'];

                #      (birthday)  (gender)
                //uid isnoaccount  no_gend  
                $sql_usr_info = "SELECT 'isnoaccount' , 'no_gend' FROM `no_info` WHERE 'uid' == '$uid'"; 
                $result_usr_info = mysqli_query($connect, $sql_usr_info);
                $usr_info = mysqli_fetch_assoc($result_usr_info);
                $gender = $usr_info['no_gend'];
                $birth = $usr_info['isnoaccount'];

                //uid t
                $sql_t = "SELECT 't' FROM `u_t` WHERE 'uid' == '$uid'"; 
                $result_t = mysqli_query($connect, $sql_t);
                $time = $result_t['t'];

                //uid etc
                $sql_f = "SELECT `etc` FROM `fb_info` WHERE 'uid' == '$uid'"; 
                $result_f = mysqli_query($connect, $sql_f);
                if (mysqli_num_rows($result_f) > 0){
                    $fbinfo = $result_f['etc'];
                }else{
                    $fbinfo = "";
                }
            }else{
                $is_print =false;
            }

            if($is_print){
                echo "<tr>";
                echo "<td>" . $uid. "</td><td>" . $birth . "</td><td>" . $gender . "</td><td>" . $ans . "</td><td>" . $time . "</td><td>" . $os . "</td><td>" . $fbinfo . "</td>";
                echo "</tr>";
                $output .= "[".$uid."//".$birth."//".$gender."//".$ans."//".$time."//".$os."//".$fbinfo."]\n";
            }

        }
        
        
        
        $file = fopen($today."-OutPut.txt","w+"); //開啟檔案
        fwrite($file,$output);
        fclose($file);
  

    } else {
        echo "0 結果";
    }
    echo "</table>";
    mysqli_close($connect); //關閉資料庫
}


?>