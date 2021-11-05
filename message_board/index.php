<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>登入會員</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">
		function check_data() {
			if (document.loginForm.member.value.length == 0)
				alert("帳號欄位不可以空白哦！");
			else if (document.loginForm.pswd.value.length == 0)
				alert("密碼欄位不可以空白哦！");
			else
				myForm.submit();
		}
	</script>
</head>

<body>
	<article class="container">
		<h2>登入</h2>
		<form name="loginForm" method="post" action="login.php">
			<article class="form-group">
				<label for="member">帳號:</label>
				<input type="text" class="form-control" id="member" placeholder="請輸入帳號" name="member">
			</article>
			<article class="form-group">
				<label for="pwd">密碼:</label>
				<input type="password" class="form-control" id="pwd" placeholder="請輸入密碼" name="pswd">
			</article>
			<article class="form-group form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="remember"> 記住我
				</label>
			</article>
			<button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>登入</button>
			<a class="btn btn-light" href="create_account_page.php"><i class='fas fa-edit'></i>創建新帳號</a>
		</form>
	</article>
	<div style="display:none"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1b27502aad.js" crossorigin="anonymous"></script>
</body>

</html>