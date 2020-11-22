<?php 

$questions = $_POST['questions'];
$q_a = array();
$q_a['Questions'] = explode(",",$questions);
$q_a['C_Quest'] = count($q_a['Questions']);
$q_a['Q_scale'] = array();
$q_a['Q_selection'] = array();
$json_string = file_get_contents('question.json');  
$data = json_decode($json_string, true);  
print($data['Q_Ver']);
$q_a['Q_Ver'] = $data['Q_Ver']+1;

//handle questions and selections [[scale]] [[sele[selections]]]
foreach($q_a['Questions'] as $sele){
    if(substr($sele,0,1)== 'A'){
        array_push($q_a['Q_scale'],substr($sele,strpos($sele,':')+1));
    }else{
        $A = explode("&&",$sele);
        $A[0] =substr($sele,strpos($sele,':')+1,strpos($sele,'&&')-strpos($sele,':')-1);
        $B = explode("_&s_",$A[1]);
        $T = array();
        foreach($B as $selections)
        {
            array_push($T,str_replace('s_','',$selections));
        }null;
        array_pop($A);
        array_push($A,$T);
        echo("<br>");
        array_push($q_a['Q_selection'],$A);
    };
}
// print_r($q_a['Q_selection']);
// print(count($q_a['Q_selection']));
$q_a['C_Q_selection']= count($q_a['Q_selection']);
$q_a['C_Q_scale'] = count($q_a['Q_scale']);

echo("<br>");echo("<br>");echo("<br>");echo("<br>");
//  print_r($q_a);
$jsoncode = json_encode($q_a);
// echo $jsoncode ;

$file = fopen("question.json","r+"); //開啟檔案
fwrite($file,$jsoncode );
fclose($file);

?>