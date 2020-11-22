<?php 

$title = $_POST['title'];
$content = $_POST['content'];
$notice =$_POST['notice'];
$q_a = array();
if(isset($title))$q_a['title']=$title;
if(isset($content))$q_a['content']=$content;
if(isset($notice))$q_a['notice']=$notice;



$json_string = file_get_contents('consent.json');  
$data = json_decode($json_string, true);  

$q_a['C_Ver'] = (isset($data['C_Ver'])? $data['C_Ver']+1 :0);

$jsoncode = json_encode($q_a);
$file = fopen("consent.json","w"); //開啟檔案
fwrite($file,$jsoncode );
fclose($file);

$json_string = file_get_contents('consent.json');  
$data = json_decode($json_string, true);  
if(isset($data['content']))
{
     $q_a['content'] = str_replace(array('\r\n', '\r', '\n'),'',$data['content']);
    //  ####################
    ####  找不出為什麼妹辦法把換行取代掉
    ####################
}
if(isset($data['title']))
{
    $q_a['title'] = str_replace(PHP_EOL,'',$data['title']);
}
if(isset($data['notice']))
{
     $q_a['notice'] = str_replace(PHP_EOL,'',$data['notice']);
}
$jsoncode = json_encode($q_a);
$file = fopen("consent.json","w"); //開啟檔案
fwrite($file,$jsoncode );
fclose($file);

header("Location: mod_consent.php"); 
?>