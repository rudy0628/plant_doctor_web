<?php
  header("Content-type: text/html; charset=utf-8");
  require_once("dbtools.inc.php");

  $subject = $_POST["subject"];
  $content = $_POST["content"];
  $current_time = date("Y-m-d H:i:s");
  $current_member_id = $_COOKIE["current_member_id"];

  //建立資料連接
  $link = create_connection();

  //執行SQL查詢
  $sql = "INSERT INTO message(member_id, author, subject, content, date)
          VALUES('$current_member_id','$current_member_id', '$subject', '$content', '$current_time')";
  $result = execute_sql($link, "id17187180_plantdoctor_db", $sql);


  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到index.php
  header("location:guestbook.php");
  exit();
?>
