<?php 
	session_start();
	if(empty($_COOKIE["id"])){
		header("location:home.php");
		exit();
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ganti Pass</title>
</head>
<body>
	<h2>Ganti Password</h2>
	<form action="doGanti.php" method="post">
		Password Lama : <input type="password" name ="inputPassword1"><br/>
		Password Baru : <input type="password" name ="inputPassword2"><br/>
		Konfirmasi Password Baru: <input type="password" name ="inputPassword3"><br/>
		<button>Simpan</button>
	</form>
	<br/>
	<?php 
		if(isset($_SESSION["message"])){
			echo $_SESSION["message"];
			unset($_SESSION["message"]);
		}
	 ?>
	<br/>
	
</body>
</html>