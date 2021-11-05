<!DOCTYPE html>
<html lang="en">

<head>
	<title>查詢結果</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<?php

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

$plant = $_POST["plant"];
$state = $_POST["state"];

//執行SQL查詢
$sql = "SELECT plant_text,plant_img FROM plantcontent Where plant_type = '$plant' AND plant_state = '$state'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>

<body class="bodyStyle">
	<div class="container">
		<div class="card">
			<?php
			echo '<img class="card-img-top img-style" src="https://plantdoctortopic.000webhostapp.com/' . $row['plant_img'] . '.jpg" alt="Card image">';
			?>
			<div class="card-body">
				<h4 class="card-title"><i class="fas fa-poll"></i>查詢結果</h4>
				<?php
				echo '<p class="card-text">' . nl2br($row['plant_text']) . '</p>';
				?>
				<a href="index.php" class="btn btn-search"><i class="fas fa-arrow-circle-left"></i>返回</a>
			</div>
		</div>
	</div>

	<div style="display:none"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/1b27502aad.js" crossorigin="anonymous"></script>
</body>

<?php
mysqli_free_result($result);
mysqli_close($link);
?>