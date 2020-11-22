<?php 

$questions = $_POST['questions'];

$jsoncode = json_encode($q_a);
// echo $jsoncode ;

$file = fopen("consent.json","r+"); //開啟檔案
fwrite($file,$jsoncode );
fclose($file);

?>