<!DOCTYPE html>
<html lang="en">

<head>
	<title>植物寶典</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body class="bodyStyle">
	<div class="container divStyle">
		<h2 class="title"><i class="fas fa-book"></i>植物寶典</h2>
		<form method="post" action="search.php">
			<p class="selectTitle"><i class="fas fa-seedling"></i>植物</p>
			<select name="plant" id="plant" class="custom-select selectStyle">
				<option value="SnakePlant" selected>虎尾蘭</option>
			</select>
			<p class="selectTitle"><i class="fas fa-signal"></i>狀態</p>
			<select name="state" id="state" class="custom-select selectStyle">
				<option value='Plague' selected> 疫病 </option>
				<option value='anthrax'> 炭疽病 </option>
				<option value='Botrytis'> 灰黴病 </option>
				<option value='White_sclerosis'> 白絹病 </option>
			</select>
			<button type="submit" class="btn btn-search" name="go"><i class="fas fa-search"></i>查詢</button>
		</form>
	</div>

	<div style="display:none"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1b27502aad.js" crossorigin="anonymous"></script>
</body>

</html>