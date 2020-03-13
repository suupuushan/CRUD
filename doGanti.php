<?php 
	session_start();
	include("conn.php");
	$result = $conn->query("SELECT * FROM data WHERE id = '".$_COOKIE["id"]."'");
	$row = mysqli_fetch_assoc($result);

	if(isset($_POST["inputPassword1"])){

		$pass = $_POST["inputPassword1"];
		$passnew1 = $_POST["inputPassword2"];
		$passnew2 = $_POST["inputPassword3"];

		if($pass == ""){
			$_SESSION["message"] = "Password lama harus diisi";
			header("location:ganti-pass.php");
			exit();
		}else if($passnew1 == ""){
			$_SESSION["message"] = "Password baru harus diisi";
			header("location:ganti-pass.php");
			exit();
		}else if($passnew1!=$passnew2){
			$_SESSION["message"] = "Password baru tidak cocok";
			header("location:ganti-pass.php");
			exit();
		}else if(($result->num_rows == 0) || (!md5($pass))){
			$_SESSION["message"] = "Password lama tidak cocok";
			header("location:ganti-pass.php");
			exit();
		}else{
			$pass_fix = password_hash($passnew1, PASSWORD_DEFAULT);
			$update = mysqli_query($conn, "UPDATE data SET password = '$pass_fix' WHERE id = '".$_COOKIE["id"]."'");

			if ($update){
				header("location:home.php");
				exit();
			} else {
				echo "Gagal Disimpan";
			}
		}

	}

 ?>