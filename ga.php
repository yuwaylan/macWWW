<?php 

#################################################
##-需要： 這個APP 的 user id && 問卷的答案 &&   ---##
##-----  ( FB user prof || IG user prof ) ||  -##
##-----  ( 使用者出生日期 && 使用者性別 )     -----##
#################################################
$can_run = true;

try {
    /**  must contant  **/
    if(isset($_POST['a_ns']))$ans = $_POST['a_ns'];//答案 ==>> JSON
    else throw new Exception('not input answer');
    if(isset($_POST['ui_d']))$uid =$_POST['ui_d'];//app uid ==>> Str
    else throw new Exception('not input uid');

    /**  should contant  **/
    if(isset($_POST['fbp_f']))$fbp =$_POST['fbp_f'];//fb user profile ==>> JSON
    else $fbp = '';
    if(isset($_POST['igp_f']))$igp =$_POST['igp_f'];//ig user profile ==>> JSON
    else $igp = '';
    if(isset($_POST['nop_f']))$nop =$_POST['nop_f'];//no login user profile ==>> JSON
    else $nop = '';

    if($fbp == '' && $igp == '' && $nop == '')
    {
        throw new Exception('not login');
    }
} catch (Exception $e) {
    $can_run =false;
    if (!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip = $_SERVER["HTTP_CLIENT_IP"];
    }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }else{
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    echo $ip;
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    $error_msg = $e->getMessage();
    $time = date("Y-m-d H:i:s");
    $file = fopen("add_falure_log.ychu","a"); //開啟檔案
    $str = 'ERROR : [' . $error_msg . ']@['.$ip.'], Time['.$time.'], \n'.
    'Parameter{ uid['.$uid.'], ans['.$ans.'], fbp['.$fbp.'], igp['.$igp.'], nop['.$nop.'] }';
    fwrite($file,$str);
    fclose($file);
    
}// end catch

if($can_run){
    
}

?>