<?php
	session_start();
	if(isset($_POST['inputUsername'])){


		$username =	$_POST["inputUsername"];
		$pass = $_POST["inputPassword"];

		if($username == ""){
			$_SESSION["message"] = "Username harus diisi";
			header("location:login.php");
			exit();
		}else if($pass == ""){
			$_SESSION["message"] = "Password harus diisi";
			header("location:login.php");
			exit();
		} else{
			include("conn.php");
			$result = $conn->query("SELECT * FROM data WHERE username = '$username'");
			$row = mysqli_fetch_assoc($result);

			if(($result->num_rows == 1) && (md5($pass))){
				if ($row["level"] == 'user'){
					setcookie("id",$row["id"]);
					header("location:home.php");
					exit();
				} else {
					setcookie("id",$row["id"]);
					header("location:homeadmin.php");
					exit();

				}
			}else{
				$_SESSION["message"] = "Akun/Password Salah";
				header("location:login.php");
				exit();
			}
		}

	}else{
		header("location:/");
		exit();
	}
 ?>