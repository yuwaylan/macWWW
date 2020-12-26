<!DOCTYPE html>
<html>

<head>
    <title>登入</title>
    <meta charset="utf-8">
    <script src="http://cdn.static.w3big.com/libs/jquery/1.10.2/jquery.min.js">
    </script>
</head>
<style>
button {
    width: 200px;
    height: 100px;
    margin: 40vh 10vw;
}
</style>

<body>
    <!--
    <center>
        <a href="mod_question.php"><button>Modify Questions</button></a>
        <a href="mod_consent.php"><button disabled="disabled">Modify Consent</button></a>
    </center>
    -->
    <center>
        <form id="fome" action="" method="POST" style="margin-top: 10vh;">
            <label>請輸入密碼</label><br>
            <label>提示:R+老師研究室編號+@+學校英文簡寫(小寫3字)+_+老師姓的拼音(首字大寫共5字)</label>
            <br>
            <p>(共11碼)ex:R00000@xxx_Aaaaa</p> <br><input type="password" name="pwd" id="pwd">
            <input type="text" name="ans" id="ans" style="display:none;">
            <input type="button" onclick="see()" value="查看輸入">
            <br><br>
            <input type="submit" name="submit" onclick="chk()">

        </form>
    </center>
</body>

</html>

<script>
function chk() {
    var aaaa = document.getElementById('pwd').value;
    if (aaaa.length != 16) {
        alert("請輸入正確密碼");
    } else {
        document.getElementById('ans').value = aaaa;
        document.getElementById('fome').action = "/hd_login.php";
    }



}


function see() {
    var aaaa = document.getElementById('pwd');
    if (aaaa.type == 'password') {
        aaaa.type = 'text';
    } else {
        aaaa.type = 'password';
    }
}
</script>