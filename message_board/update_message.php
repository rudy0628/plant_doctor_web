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

  $update_subject = $_POST["update_subject"];
  $update_content = $_POST["update_content"];
  $current_time = date("Y-m-d H:i:s");
  $current_member_id = $_COOKIE["current_member_id"];


  //執行SQL查詢
  $sql = "UPDATE message
		  SET author='$current_member_id', subject='$update_subject', content='$update_content', date='$current_time'
		  WHERE member_id='$current_member_id'";

  $result = mysqli_query($link, $sql);
 

  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到index.php
  header("location:guestbook.php");
  exit();
?>
