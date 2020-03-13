<?php 
	include("conn.php");
	$select1 = mysqli_query($conn, "SELECT * FROM data WHERE id = '".$_COOKIE["id"]."'");
	$choosen = mysqli_fetch_array($select1);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Input Data</title>
</head>
<body>
	<h2>Input Data Mahasiswa</h2>
	<form method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" placeholder="Nama" required></td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim" placeholder="NIM" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" placeholder="Alamat" required></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="telepon" placeholder="Telepon" required></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td><input type="text" name="jurusan" placeholder="Jurusan" required></td>
			</tr>
			<tr>
				<td><input type="submit" name="simpan" placeholder="Simpan" required></td>
			</tr>
		</table>
	</form>
	<a href="home.php">HOME</a>
	<?php
	if(isset($_POST['simpan'])){
		$nama = $_POST["nama"];
		$id = $_COOKIE["id"];
		$NIM = $_POST["nim"];
		$alamat = $_POST["alamat"];
		$telp = $_POST["telepon"];
		$jurusan = $_POST["jurusan"];
		$insert = mysqli_query($conn, "INSERT INTO data1 VALUES('$id','$nama','$NIM','$alamat','$telp','$jurusan')");

		if($insert){
			echo "<script>
				alert('Data berhasil ditambahkan')
				document.location.href= 'profile.php';
				</script>";
			exit();
		} else {
			echo "<script>
				alert('Data Gagal ditambahkan')
				document.location.href= 'add-data.php';
				</script>";
		}
	}
	
	 ?>
</body>
</html>