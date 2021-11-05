<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>留言板</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="home.css">
</head>

<body>
	<?php
	//檢查 cookie 中的 passed 變數是否等於 TRUE
	$passed = $_COOKIE["passed"];
	//如果 cookie 中的 passed 變數不等於 TRUE
	//表示尚未登入網站，將使用者導向首頁 index.html
	if ($passed != "TRUE") {
		header("location:index.php");
		exit();
	}

	//目前登入帳號
	$current_member_id = $_COOKIE["current_member_id"];
	?>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a class="navbar-brand" href="guestbook.php"><i class="fas fa-home"></i></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="update_member_page.php"><i class='fas fa-edit'></i>修改會員</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>登出</a>
				</li>
				<li class="nav-item">
					<p class="nav-link"><i class="fas fa-user"></i>&nbsp<?php echo $current_member_id ?></p>
				</li>
			</ul>
		</div>
	</nav>
	<br>
	<?php

	require_once("dbtools.inc.php");


	//指定每頁顯示幾筆記錄
	$records_per_page = 5;

	//取得要顯示第幾頁的記錄
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	//建立資料連接
	$link = create_connection();
	//取得當前登入會員
	//執行 SQL 命令
	$sql = "SELECT * FROM message ORDER BY date DESC";
	$result = execute_sql($link, "id17187180_plantdoctor_db", $sql);


	//取得記錄數
	$total_records = mysqli_num_rows($result);

	//計算總頁數
	$total_pages = ceil($total_records / $records_per_page);

	//計算本頁第一筆記錄的序號
	$started_record = $records_per_page * ($page - 1);

	//將記錄指標移至本頁第一筆記錄的序號
	mysqli_data_seek($result, $started_record);

	//使用 $bg 陣列來儲存表格背景色彩
	$bg[0] = "card bgcolor";

	echo '<article class="container">'; //container fluid

	//post div
	$j = 1;
	while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page) {
		echo "<article class='" . $bg[0] . " '>"; //card
		echo "<article class='card-body' style = 'padding : 10px 20px 0px'>" . $row["author"] . "</article>";
		echo "<article class='card-body' style = 'font-size : 1.5em ; padding : 10px 20px'>" . $row["subject"] . "</article>";
		echo "<article class='card-body' style = 'padding : 10px 20px'><small>" . $row["date"] . "</small></article>";
		echo "<article class='card-body' style = 'padding : 10px 20px ;font-size :1.2em'>" . $row["content"] . "</article>";
		if ($current_member_id == $row["member_id"]) {
			echo '<hr class="Divider">';
			echo "<article class = 'd-flex justify-content-center '>";
			echo "<button type='button' class='btn btn-search btn-light' data-toggle='modal' data-target='#myModal'><i class='fas fa-edit'></i>編輯</button>";
			echo "<a class='btn btn-search btn-danger' href='delete_message.php?author=" . $row["author"] . "&subject=" . $row["subject"] . "&message_idx=" . $row["message_idx"] . "'><i class='fas fa-trash-alt'></i>刪除</a>";
			echo "</article>";
		}
		echo '<hr class="Divider">';
		//post div

		//comment div
		$message_idx = $row["message_idx"];
		$sql_comment = "SELECT * FROM comment WHERE message_idx='$message_idx'";
		$result_comment = execute_sql($link, "id17187180_plantdoctor_db", $sql_comment);
		$total_records_comment = mysqli_num_rows($result_comment);
		echo '<section class="card-body bg-light comment-div">';
		echo '<h5>留言區</h5>';
		echo '<hr class="Divider">';
		while ($row_comment = mysqli_fetch_assoc($result_comment) and $total_records_comment > 0) {
			$comment_idx = $row_comment["comment_idx"];
			if ($current_member_id == $row_comment["member_id"]) {
				echo '<p class="card-text">' . $row_comment['member_id'] . '：' . $row_comment['content'] . '&nbsp;<a class="btn-light"href="delete_comment.php?comment_idx=' . $comment_idx . '"><i class="fas fa-trash-alt"></i></a></p>';
			} else {
				echo '<p class="card-text">' . $row_comment['member_id'] . '：' . $row_comment['content'] . '</p>';
			}
		}
		echo "</section>";
		//comment div

		echo '<article class="container" style = "padding : 0px 20px">'; //comment form
		echo '<form name="myForm" method="post" action="post_comment.php" >';
		echo '<div class="input-group mb-3" >';
		echo '<input type="hidden" name="message_idx" id="message_idx" value="' . $row['message_idx'] . '" />';
		echo '<textarea type="text" class="form-control" id="content" name="content" rows="1" placeholder="留言"></textarea>';
		echo '<button class="btn btn-primary" type="submit"><i class="far fa-paper-plane"></i></button>';
		echo '</div>';
		echo '</form>';
		echo '</article>'; //comment form

		echo '</article>'; //card
		echo '<br>';
		$j++;
	}
	echo '</article>'; //container fluid

	//產生導覽列
	echo '<article class="container col-9">';
	echo '<ul class="pagination  justify-content-center">';
	if ($page > 1)
		echo "<li class='page-item' align='center'><a class='page-link' href='guestbook.php?page=" . ($page - 1) . "'>上一頁</a></li>";

	for ($i = 1; $i <= $total_pages; $i++) {
		if ($i == $page)
			echo "<a class='page-link' href='guestbook.php?page=$i'>$i</a> ";
		else
			echo "<a class='page-link' href='guestbook.php?page=$i'>$i</a> ";
	}

	if ($page < $total_pages)
		echo "<li class='page-item' align='center'><a class='page-link' href='guestbook.php?page=" . ($page + 1) . "'>下一頁</a></li>";
	echo '</ui>';
	echo '</article>';

	//釋放記憶體空間
	mysqli_free_result($result);
	mysqli_close($link);
	?>
	<!-- 新增留言表單 -->
	<article class="container" style="margin-bottom:5px">
		<form name="myForm" method="post" action="post_message.php">
			<article class="form-group">
				<input type="text" class="form-control" id="subject" name="subject" placeholder="請輸入標題">
			</article>
			<article class="form-group form-group-textarea">
				<textarea type="text" class="form-control" id="content" name="content" placeholder="請輸入內容"></textarea>
			</article>
			<button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>送出</button>
			<button type="reset" class="btn btn-danger"><i class="fas fa-trash-alt"></i>清除</button>
		</form>
	</article>
	<!-- 修改內容MODAL -->
	<article class="modal fade" id="myModal">
		<article class="modal-dialog">
			<article class="modal-content" style="padding : 5px ;">
				<form name="update_myForm" method="post" action="update_message.php">
					<!-- Modal body -->
					<article class="form-group">
						<input type="text" class="form-control" id="update_subject" name="update_subject" placeholder="請輸入標題">
					</article>
					<!-- Modal footer -->
					<article class="form-group form-group-textarea">
						<textarea type="text" class="form-control" id="update_content" name="update_content" placeholder="請輸入內容"></textarea>
					</article>
					<button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>送出</button>
					<button type="reset" class="btn btn-danger"><i class="fas fa-trash-alt"></i>清除</button>
				</form>
			</article>
		</article>
	</article>
	<div style="display:none"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1b27502aad.js" crossorigin="anonymous"></script>
</body>

</html>