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

  $new_member_id = $_POST["new_member"];
  $pswd = $_POST["new_pswd"];
  $new_pswd_id = hash('sha512', $pswd);


  //執行SQL查詢
  $sql = "SELECT * FROM member Where member_id = '$new_member_id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  if (mysqli_num_rows($result) != 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);

    //顯示訊息要求使用者更換帳號名稱
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }

  //如果帳號密碼正確
  else
  {
    //釋放 $result 佔用的記憶體
      mysqli_free_result($result);

      //執行 SQL 命令，新增此帳號
      $sql = "INSERT INTO member (member_id, pswd) VALUES ('$new_member_id','$new_pswd_id' )";

      $result = mysqli_query($link, $sql);


      header("location:index.php");
  }
  //關閉資料連接
  mysqli_close($link);
