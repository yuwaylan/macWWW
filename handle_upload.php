<?php

    $proj = $_FILES['upfile'];
    
    move_uploaded_file($proj['tmp_name'],"up_load/proj.zip");
    echo "<script>alert('upload success !! );</script>";
    $results = shell_exec('sh unzip.sh');
    echo $results;

    $results = shell_exec('python3 do_encode.py');
    echo $results;
    header("Location: result.php"); 

?>