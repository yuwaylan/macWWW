<!DOCTYPE html>
<html>

<head>
    <title>HERE is modify</title>
</head>
<style>
button {
    width: 200px;
    height: 100px;
    margin: 40vh 10vw;
}
</style>

<body>
    <center>
        <form method="post" action="handle_encode_consent.php">
            <h1>Modify "研究參與者同意書"</h1>
            <label>Tile:</label>
            <textarea id="title" name="title" rows="2" cols="50"></textarea>
            <br><label>Content:</label>
            <textarea id="content" name="content" rows="20" cols="50"></textarea>
            <br>
            <input type="submit" name="submit" id="submit" onclick="onsubmit()">
        </form>
    </center>


</body>

</html>
<script language="javascript" type="text/javascript">

</script>