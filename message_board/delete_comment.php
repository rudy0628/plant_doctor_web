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


  $del_comment_idx=$_GET['comment_idx'];
  
  //執行SQL查詢
  $sql = "DELETE FROM comment WHERE comment_idx='$del_comment_idx'";
  $result = mysqli_query($link, $sql);


  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到index.php
  header("location:guestbook.php");
  exit();
?>
