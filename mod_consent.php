<!DOCTYPE html>
<html>
<?php
$json_string = file_get_contents('consent.json');  
$fileData = json_decode($json_string, true); 

if(isset($fileData['title'])){
    $title = $fileData['title'];
    // echo $title;
}else{
    $title = "";
}
if(isset($fileData['content'])){
     $content = $fileData['content'];
}else{
    $content = "";
}
if(isset($fileData['notice'])){
     $notice = $fileData['notice'];
}else{
    $notice = "";
}
if(isset($fileData['C_Ver'])){
     $C_Ver = $fileData['C_Ver'];
}else{
    $C_Ver = 0;
}

?>

<head>
    <meta charset="UTF-8" />
    <title>HERE is modify</title>
    <script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <a href="index.html"><button>回選單</button></a>
    <center id="main">
        <form method="post" action="handle_encode_consent.php">
            <h1>Modify "研究參與者同意書"</h1>
            <label>Tile:</label>
            <textarea id="title" name="title" rows="2" cols="150"></textarea>
            <br><label>Content:</label>
            <textarea id="content" name="content" rows="20" cols="150"></textarea>
            <br>
            <label>Notice:</label>
            <textarea id="notice" name="notice" rows="2" cols="150"></textarea><br>
            <input onclick="chk()" type="submit" name="submit" id="submit">
        </form>
    </center>


</body>

</html>
<script language="javascript" type="text/javascript">
var C_Ver = <?php echo $C_Ver ?>;
var content = "<?php echo $content ?>";
var title = "<?php echo $title ?>";
var notice = "<?php echo $notice ?>";

function chk() {
    var a = $('#content').val();

    alert(a);

};

window.onload = function() {

    console.log(content);

    $('#notice').val(notice);
    $('#title').val(title);
    $('#content').val(content);
    var aaa = document.getElementById('main');
    aaa.insertAdjacentHTML('afterbegin', '<h2>Version:' + C_Ver + '</h2>');
    console.log($('#main'));
};
</script>