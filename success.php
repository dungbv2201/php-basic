<?php
session_start();
$data = $_SESSION['data'] ?? null;
if(!$data){
	header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>success</title>
	<link rel="stylesheet" href="styles/form.css">
</head>
<body>
<div class="form-register">
	<h2>Success</h2>
	<form action="register.php" method="POST">
		<div class="form-group">
			<label for="name" class="label">Name:</label>
			<span><?= $data['name'] ?></span>
		</div>
		<div class="form-group">
			<label for="" class="label">Gender:</label>
			<span><?= $data['gender'] == 1? 'Male': 'Female' ?></span>
		</div>
		<div class="form-group">
			<label for="email" class="label">Email:</label>
			<span><?= $data['email'] ?></span>
		</div>
		<div class="form-group">
			<label for="birth_day" class="label">Date of birth</label>
			<span><?= $data['birth_day'] ?></span>
		</div>
		<div class="form-group">
			<label for="address" class="label">Address:</label>
			<span><?= $data['address'] ?></span>
		</div>
	</form>
</div>
</body>
</html>
<?php
session_destroy();
?>
