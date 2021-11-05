<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "id17187180_root_nkust";
$password = "@Lastcool0628";
$dbname = "id17187180_plantdoctor_db";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}

$current_member_id = $_COOKIE["current_member_id"];
$current_pswd = $_POST["current_pswd"];
$current_pswd_sha = hash('sha512', $current_pswd);
$update_pswd = $_POST["update_pswd"];
$update_pswd_sha = hash('sha512', $update_pswd);


//執行SQL查詢
$sql = "SELECT * FROM member Where member_id = '$current_member_id' AND pswd = '$current_pswd_sha'";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 0) {
  //釋放 $result 佔用的記憶體
  mysqli_free_result($result);

  //關閉資料連接
  mysqli_close($link);

  //顯示訊息要求使用者輸入正確的帳號密碼
  echo "<script type='text/javascript'>";
  echo "alert('目前登入帳號密碼錯誤，請查明後再修改密碼');";
  echo "history.back();";
  echo "</script>";
}

//如果帳號密碼正確
else {
  //修改PSWD 欄位
  $sql = "UPDATE member SET pswd='$update_pswd_sha' WHERE member_id='$current_member_id'";
  $result = mysqli_query($link, $sql);

  header("location:index.php");
}
