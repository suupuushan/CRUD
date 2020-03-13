<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Foto</title>
</head>
<body>
	<h2>Upload Foto Profile</h2>
	<form action="doFoto.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="gambar" id="gambar">
		<br>
		<input type="submit" name="btn" value="Upload Gambar">
	</form>
	<br>
	<div>
		<?php 
		if(isset($_SESSION["message"])){
			echo $_SESSION["message"];
			unset($_SESSION["message"]);
		}
		 ?>
	</div>
</body>
</html>