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
	<title>Register</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style-regis.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<h2>Register</h2>
		<form action="doRegister.php" method="post">
			<div class="box-login">
				<input type="text" placeholder= "Email" name="inputEmail"><br/>
			</div>
			<div class="box-login">
				<input type="text" placeholder= "Username" name="inputUsername"><br/>
			</div>
			<div class="box-login">
				<input type="password" placeholder= "Password" name ="inputPassword1"><br/>
			</div>
			<div class="box-login">
				<input type="password" placeholder= "Konfirmasi Password"name ="inputPassword2"><br/>
			</div>
			<button class="btn">Register</button>
		</form>
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
		<div class="login">Already have an account? 
			<a href="login.php">Log in here!</a>  
		</div>
	</div> 
	
</body>
</html>