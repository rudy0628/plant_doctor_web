<?php
header("Content-type: text/html; charset=utf-8");
    //將cookies清空，並設定登入狀態為FALSE
    setcookie("current_member_id","");
    setcookie("passed", "FALSE");
    header("location:index.php");
?>
