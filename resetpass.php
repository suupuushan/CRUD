<?php 

session_start();

include 'conn.php';

if(!isset($_GET["code"])) {
	exit("Laman tidak ditemukan..");
}

$code = $_GET["code"];

$query = mysqli_query($conn, "SELECT email FROM reset WHERE code='$code'");
if (mysqli_num_rows($query) == 0) {
	exit("Laman tidak ditemukan");
}

if (isset($_POST["password"])) {
	$pw = $_POST["password"];
	$pw1 = $_POST["retype"];

	if($pw == ''){
		$_SESSION["message"] = "Password harus diisi";
		header("location:resetpass.php?code=$code");
		exit();
	} else if ($pw != $pw1){
		$_SESSION["message"] = "Password tidak cocok";
		header("location:resetpass.php?code=$code");
		exit();
	} else {
		$pw = md5($pw);
		$row = mysqli_fetch_array($query);
		$email = $row["email"];
		$result = mysqli_query($conn, "UPDATE data SET password='$pw' WHERE email='$email'");

		if ($result) {
			$query1 = mysqli_query($conn, "DELETE FROM reset WHERE code='$code'");
			header("location:login.php");
			exit();
		} else {
			exit("Terjadi kesalahan");
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reset</title>
</head>
<body>
	<form method="POST">
		<input type="password" name="password" placeholder="Password">
		<br>
		<input type="password" name="retype" placeholder="Re-type Password">
		<br>
		<input type="submit" name="btn" value="Ganti Password">
	</form>
	<?php 
		if(isset($_SESSION["message"])){
			echo $_SESSION["message"];
			unset($_SESSION["message"]);
		}
	 ?>
</body>
</html>