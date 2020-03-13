<?php 
	include("conn.php");
	$data_edit = mysqli_query($conn, "SELECT * FROM data1 WHERE id = '".$_COOKIE["id"]."'");
	$result = mysqli_fetch_array($data_edit);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Data</title>
</head>
<body>
	<h2>Edit Data Mahasiswa</h2>
	<form method="post">
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $result["nama"] ?>" required></td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim" value="<?php echo $result["nim"] ?>" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" value="<?php echo $result["alamat"] ?>" required></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="telepon" value="<?php echo $result["telepon"] ?>" required></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td><input type="text" name="jurusan" value="<?php echo $result["jurusan"] ?>" required></td>
			</tr>
			<tr>
				<td><input type="submit" name="edit" placeholder="Simpan" required></td>
			</tr>
		</table>
	</form>
	<a href="home.php">HOME</a>
	<?php
	if(isset($_POST['edit'])){
		$nama = $_POST["nama"];
		$NIM = $_POST["nim"];
		$alamat = $_POST["alamat"];
		$telp = $_POST["telepon"];
		$jurusan = $_POST["jurusan"];
		$update = mysqli_query($conn, "UPDATE data1 SET nama = '$nama',
														nim = '$NIM',
														alamat = '$alamat',
														telepon = '$telp',
														jurusan = '$jurusan' WHERE id = '".$_COOKIE["id"]."'");
		if ($update){
			echo "<script>
			alert ('Data berhasil disimpan');
			document.location.href = 'profile.php';
			</script>";
		} else {
			echo "<script>
			alert ('Data gagal disimpan');
			document.location.href = 'profile.php';
			</script>";
		}
	}
	 ?>
</body>
</html>