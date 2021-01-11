<?php 

if(isset($_SESSION['isme'])){
    if(!$_SESSION['isme']){
        header("Location: _index.html"); 
    }
}else{
    header("Location: index.php"); 
}
//有登入過就跳輸入密碼葉面，不然就跳首頁



$servername = "localhost"; //伺服器連線名
$user = 'vhost139372';
$password = 'YZUpa@zb';
$dbname = 'vhost139372';
$conn = new mysqli($servername, $username, $password, $dbname); //連線資料庫


if (!$conn) {
	die("連線失敗：" . mysqli_connect_error()); //連線資料庫失敗則殺死程序
}else{
    echo "<table border='2' bordercolor='#66ccff'>"; 

    //找到有用的ans UID
    //UID -> birth -> gender -> ans -> time -> os -> (fb info)

    //uid ans
    $sql_uid_ans = "SELECT * FROM `u_ans` WHERE 1"; 
    $result_uid_ans = mysqli_query($conn, $sql_uid_ans);

    
    if (mysqli_num_rows($result_uid_ans) > 0) { 
        
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
                $result_basic_info = mysqli_query($conn, $sql_basic_info);
                $oss = mysqli_fetch_assoc($result_basic_info);
                $os = $oss['dev_name'];

                #      (birthday)  (gender)
                //uid isnoaccount  no_gend  
                $sql_usr_info = "SELECT 'isnoaccount' , 'no_gend' FROM `no_info` WHERE 'uid' == '$uid'"; 
                $result_usr_info = mysqli_query($conn, $sql_usr_info);
                $usr_info = mysqli_fetch_assoc($result_usr_info);
                $gender = $usr_info['no_gend'];
                $birth = $usr_info['isnoaccount'];

                //uid t
                $sql_t = "SELECT 't' FROM `u_t` WHERE 'uid' == '$uid'"; 
                $result_t = mysqli_query($conn, $sql_t);
                $time = $result_t['t'];

                //uid etc
                $sql_f = "SELECT `etc` FROM `fb_info` WHERE 'uid' == '$uid'"; 
                $result_f = mysqli_query($conn, $sql_f);
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
            }

        }   

    } else {
        echo "0 結果";
    }
    echo "</table>";
    mysqli_close($conn); //關閉資料庫
}


?>