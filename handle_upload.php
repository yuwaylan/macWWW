<?php

    $proj = $_FILES['upfile'];
    
    move_uploaded_file($proj['tmp_name'],"up_load/proj.zip");
    echo "<script>alert('upload success !! );</script>"
?>