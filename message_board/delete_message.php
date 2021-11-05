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

  $del_author=$_GET["author"];
  $del_subject=$_GET["subject"];
  $del_message_idx=$_GET["message_idx"];


  //執行SQL查詢
  $sql = "DELETE FROM message WHERE author='$del_author' AND subject='$del_subject'";
  $sql_comment = "DELETE FROM comment WHERE message_idx='$del_message_idx'" ;

  $result = mysqli_query($link, $sql);
  $result_comment = mysqli_query($link, $sql_comment);

  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到index.php
  header("location:guestbook.php");
  exit();
?>
