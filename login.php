<?PHP
header("Content-Type: text/html; charset=utf8");
if(!isset($_POST["submit"])){
exit("錯誤執行");
}//檢測是否有submit操作 
include('connect.php');//連結資料庫
$password = $_POST['password'];//post獲得使用者密碼單值
$choose = $_POST['choose'];
if ($password&&$choose){//如果使用者名稱和密碼都不為空
$sql = "select * from userform where code='$password'";//檢測資料庫是否有對應的username和password的sql
$result = mysql_query($sql);//執行sql
$rows=mysql_num_rows($result);//返回一個數值
if($rows){//0 false 1 true

$sql = "select * from userform where code='$password' and choose = 0";//檢測資料庫是否有對應的username和password的sql
$result = mysql_query($sql);//執行sql
$rows=mysql_num_rows($result);//返回一個數值
	if($rows){
	$sql1 = "UPDATE `userform` SET `choose`= '$choose' WHERE code = '$password'";//檢測資料庫是否有對應的username和password的sql
	$result = mysql_query($sql1);//執行sql
	echo "投票成功 生工系感謝尼";//成功輸出註冊成功
	exit;
	}
	else{
	echo "已經投過票了喔~";	
	exit;
		}
}else{
	
echo "密碼錯誤";
echo "
<script>
setTimeout(function(){window.location.href='index.html';},1000);
</script>
";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
}
}else{//如果使用者名稱或密碼有空
echo "填寫不完整";
echo "
<script>
setTimeout(function(){window.location.href='index.html';},1000);
</script>";
//如果錯誤使用js 1秒後跳轉到登入頁面重試;
}
mysql_close();//關閉資料庫
?>