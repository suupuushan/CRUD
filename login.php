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
	<title>Login</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style-login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="body">
	<div class="container">
		<h2>Login</h2>
		<form action="doLogin.php" method="post">
			<div class="box-login">
				<i class="fa fa-user"></i>
				<input class = "input1" type="text" name="inputUsername" placeholder="Username">
			</div>
			<div class="box-login">
				<i class="fa fa-lock"></i>
				<input class = "input2" type="password" name ="inputPassword" placeholder="Password">
			</div>
			<button class="btn">Login</button>
		</form>
		<div class="lupa">
			<a href="forgotpass.php">Lupa Password?</a>
		</div>
		<br/>
		<div class="messege">
			<?php 
			if(isset($_SESSION["message"])){
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}
			 ?>
		</div>
		
		<br/>
		<div class="regis">Doesn't have any account? 
			<a href="register.php">Register Here!</a>  
		</div>
		
	</div>
	
	
</body>
</html>