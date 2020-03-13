<?php 
session_start();

	if(isset($_COOKIE["id"])){
		header("location:home.php");
		exit();
	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style-home1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
	<div class="hello">
		<h1>Hello Guest!</h1>
		<div>
			<a class="link" href="login.php">
				<div class="login">
					Login
				</div>
			</a><br>
			<a class="link" href="register.php">
				<div class="regis">
					Register
				</div>
			</a>
		</div>
				
	</div>
</div>
</body>
</html>

