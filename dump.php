<?php 

if(isset($_SESSION['isme'])){
    if(!$_SESSION['isme']){
        header("Location: _index.html"); 
    }
}else{
    header("Location: index.php"); 
}
//有登入過就跳輸入密碼葉面，不然就跳首頁



$servername = "localhost"; //伺服器連線名
$user = 'vhost139372';
$password = 'YZUpa@zb';
$dbname = 'vhost139372';
$conn = new mysqli($servername, $username, $password, $dbname); //連線資料庫

echo "<table border='2' bordercolor='#66ccff'>";

if (!$conn) {
	die("連線失敗：" . mysqli_connect_error()); //連線資料庫失敗則殺死程序
}
$sql = "SELECT Id, Rank, Name, ATK, HP FROM servant"; //查詢語句--查詢資料庫表
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>id:" . $row["Id"] . "</td><td>職階:" . $row["Rank"] . "</td><td>英靈:" . $row["Name"] . "</td><td>最大ATK:" . $row["ATK"] . "</td><td>最大HP：" . $row["HP"] . "</td>";
		echo "</tr>";
	}
} else {
	echo "0 結果";
}
echo "</table>";
mysqli_close($conn); //關閉資料庫



?>