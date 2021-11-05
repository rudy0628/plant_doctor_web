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

$member = $_POST["member"];
$pswd = $_POST["pswd"];
$pswd_sha = hash('sha512', $pswd);


//執行SQL查詢
$sql = "SELECT * FROM member Where member_id = '$member' AND pswd = '$pswd_sha'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 0) {
  //釋放 $result 佔用的記憶體
  mysqli_free_result($result);

  //關閉資料連接
  mysqli_close($link);

  //顯示訊息要求使用者輸入正確的帳號密碼
  echo "<script type='text/javascript'>";
  echo "alert('帳號密碼錯誤，請查明後再登入');";
  echo "history.back();";
  echo "</script>";
}

//如果帳號密碼正確
else {
  //取得 member 欄位
  $current_member_id = mysqli_fetch_object($result)->member_id;

  //釋放 $result 佔用的記憶體
  mysqli_free_result($result);

  //關閉資料連接
  mysqli_close($link);

  //將使用者資料加入 cookies
  setcookie("current_member_id", $current_member_id);
  setcookie("passed", "TRUE");
  header("location:guestbook.php");
}
