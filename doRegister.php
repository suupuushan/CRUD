<?php 
	session_start();

	if(isset($_POST["inputEmail"])){

		$email = $_POST["inputEmail"];
		$username = $_POST["inputUsername"];
		$pass1 = $_POST["inputPassword1"];
		$pass2 = $_POST["inputPassword2"];

		if($email == ""){
			$_SESSION["message"] = "Email harus diisi";
			header("location:register.php");
			exit();
		}else if($username == ""){
			$_SESSION["message"] = "Username harus diisi";
			header("location:register.php");
			exit();
		}else if($pass1 == ""){
			$_SESSION["message"] = "Password harus diisi";
			header("location:register.php");
			exit();
		}else if($pass1!=$pass2){
			$_SESSION["message"] = "Password tidak cocok";
			header("location:register.php");
			exit();
		}else{
			include("conn.php");

			$result = $conn->query("SELECT * FROM data WHERE username LIKE '".$username."'");
			if($result->num_rows==0){
				$pass1 = md5($pass1);
				$level = 'user';
				$conn->query("INSERT INTO data VALUES('','".$email."','".$username."','".$pass1."','".$level."','')");
				echo "<script>
				alert('Pendaftaran Sukses')
				document.location.href= 'home.php';
				</script>";
				exit();

			}else{
				$_SESSION["message"] = "Username sudah digunakan";
				header("location:register.php");
				exit();
			}
		}


	}else{
		header("location:home.php");
		exit();
	}

 ?>