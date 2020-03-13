<?php 
	session_start();
	include("conn.php");

	function upload() {
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];


		if ($error === 4) {
			echo "<script>
			alert('Pilih gambar terlebih dahulu');
			</script>";
			return false;
		}

		$extensiGambarValid = ['jpg','jpeg','png'];
		$extensiGambar = explode('.', $namaFile);
		$extensiGambar = strtolower(end($extensiGambar));
		if (!in_array($extensiGambar, $extensiGambarValid)) {
			echo "<script>
			alert('Yang anda upload bukan gambar');
			</script>";
			return false;
		}

		if ($ukuranFile > 1000000){
			echo "<script>
			alert('Ukuran gambar terlalu besar');
			</script>";
			return false;
		}

		$fileuniq = uniqid();
		$fileuniq .= '.';
		$fileuniq .= $extensiGambar;

		move_uploaded_file($tmpName, 'profile/' . $fileuniq);

		return $fileuniq;  

	}

	if(isset($_POST["btn"])){

		$gambar = upload();
		if($gambar == 0){
			echo "<script>
			alert('Gagal');
			document.location.href = 'foto.php';
			</script>";
			exit();
		}

		$query = mysqli_query($conn, "UPDATE data SET gambar = '$gambar' WHERE id = '".$_COOKIE["id"]."'" );

		if ($query) {
			echo "<script>
			alert('Foto Berhasil di Upload');
			document.location.href = 'home.php';
			</script>";
		} else {
			echo "<script>
			alert('Foto Gagal di Upload');
			document.location.href = 'foto.php';
			</script>";
		}

		
	}
 ?>