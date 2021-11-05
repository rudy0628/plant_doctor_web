<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>新建會員</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<article class="container">
		<h2>建立帳號</h2>
		<form name="CreateForm" method="post" action="create_account.php">
			<article class="form-group">
				<label for="member">帳號:</label>
				<input type="text" class="form-control" id="member" placeholder="請輸入帳號" name="new_member">
			</article>
			<article class="form-group">
				<label for="pwd">密碼:</label>
				<input type="password" class="form-control" id="pwd" placeholder="請輸入密碼" name="new_pswd">
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