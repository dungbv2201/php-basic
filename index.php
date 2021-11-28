<?php
	session_start();
	function renderError($field){
		if(isset($_SESSION['validate'][$field])){
			return '<span class="invalid">'.$_SESSION['validate'][$field][0].'</span>';
		}
	}
	$oldData = $_SESSION['old'] ?? null;
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Form-validation</title>
	<link rel="stylesheet" href="styles/form.css">
</head>
<body>
	<div class="form-register">
		<h2>Register Form</h2>
		<form action="register.php" method="POST">
			<div class="form-group">
				<label for="name" class="label">Name:</label>
				<input
					type="text"
					name="name"
					placeholder="Enter name"
					value="<?= $oldData['name'] ?? '' ?>"
					id="name">
				<?php echo renderError('name')?>
			</div>
			<div class="form-group">
				<label for="" class="label">Gender:</label>
				<input type="radio" name="gender" id="male" value="1" checked="checked">
				<label for="male">Male</label>
				<input type="radio" name="gender" value="0" id="female" style="margin-left: 15px">
				<label for="female">Female</label>
			</div>
			<div class="form-group">
				<label for="email" class="label">Email:</label>
				<input
					type="email"
					id="email"
					value="<?= $oldData['email'] ?? '' ?>"
					name="email">
				<?php echo renderError('email')?>
			</div>
			<div class="form-group">
				<label for="password" class="label">Password</label>
				<input type="password" id="password" name="password">
				<?php echo renderError('password')?>
			</div>
			<div class="form-group">
				<label for="birth_day" class="label">Date of birth</label>
				<input
					type="date"
					value="<?= $oldData['birth_day'] ?? '' ?>"
					id="birth_day"
					name="birth_day">
				<?php echo renderError('birth_day')?>
			</div>
			<div class="form-group">
				<label for="address" class="label">Address:</label>
				<textarea name="address" id="address" cols="30" rows="10">
					<?= $oldData['address'] ?? '' ?>
				</textarea>
			</div>
			<button class="submit" type="submit">Submit</button>
		</form>
	</div>
</body>
</html>
<?php
session_destroy();
?>
