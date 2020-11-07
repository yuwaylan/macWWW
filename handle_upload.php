<?php

$file=(empty($_FILES['file']))?"":$_FILES['file']; 
move_uploaded_file($file['tmp_name'],"proj.zip");

?>