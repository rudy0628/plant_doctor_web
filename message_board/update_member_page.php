<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>修改會員資料</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
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
					<p class="nav-link"><i class="fas fa-user"></i>&nbsp <?php echo $current_member_id ?> </p>
				</li>
			</ul>
		</div>
	</nav>
	</br>
	<article class="container">
		<h2 style="text-align : center ;">更改會員密碼</h2>
		<form name="Update_pswd_Form" method="post" action="update_member_pswd.php">
			<article class="form-group">
				<label for="member">帳號:</label>
				<p id="member" name="update_member_id"><?php echo "$current_member_id"; ?></p>
			</article>
			<article class="form-group">
				<label for="pwd">目前密碼:</label>
				<input type="password" class="form-control" id="pwd" placeholder="請輸入目前密碼:" name="current_pswd">
			</article>
			<article class="form-group">
				<label for="pwd">新的密碼:</label>
				<input type="password" class="form-control" id="pwd" placeholder="請輸入新的密碼:" name="update_pswd">
			</article>
			<button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>送出</button>
			<button type="reset" class="btn btn-danger"><i class="fas fa-trash-alt"></i>清除</button>
		</form>
	</article>
	<div style="display:none"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1b27502aad.js" crossorigin="anonymous"></script>
</body>

</html>