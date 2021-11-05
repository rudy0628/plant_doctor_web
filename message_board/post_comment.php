<?php
  header("Content-type: text/html; charset=utf-8");
  require_once("dbtools.inc.php");

  $message_idx = $_POST["message_idx"];
  $current_member_id = $_COOKIE["current_member_id"];
  $comment_content = $_POST["content"];

  //建立資料連接
  $link = create_connection();

  //執行SQL查詢
  
  $sql_comment = "INSERT INTO comment(message_idx,member_id ,content)
          VALUES('$message_idx' ,'$current_member_id' ,'$comment_content')";
  $result_comment = execute_sql($link, "id17187180_plantdoctor_db", $sql_comment);


  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到index.php
  header("location:guestbook.php");
  exit();
?>