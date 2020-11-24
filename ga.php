<?php 

#################################################
##-需要： 這個APP 的 user id && 問卷的答案 &&   ---##
##-----  ( FB user prof || IG user prof ) ||  -##
##-----  ( 使用者出生日期 && 使用者性別 )     -----##
#################################################


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

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}




$q_a['C_Q_selection']= count($q_a['Q_selection']);
$q_a['C_Q_scale'] = count($q_a['Q_scale']);

echo("<br>");echo("<br>");echo("<br>");echo("<br>");
//  print_r($q_a);
$jsoncode = json_encode($q_a);
// echo $jsoncode ;

$file = fopen("question.json","w"); //開啟檔案
fwrite($file,$jsoncode );
fclose($file);

header("Location: mod_question.php"); 


?>