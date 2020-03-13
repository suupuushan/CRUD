<?php 
	include("conn.php");
	if(empty($_COOKIE["id"])){
		header("location:home.php");
		exit();
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
</head>
<body>
	<?php 
		if(isset($_COOKIE["id"])){
			$select = mysqli_query($conn, "SELECT * FROM data1 WHERE id = '".$_COOKIE["id"]."'");
			if(mysqli_num_rows($select) < 1){
	?>
				<h3>DATA KOSONG</h3>
					<a href="add-data.php">Tambah Data</a><br><br>
					<a href="home.php">HOME</a>
	<?php
			}else{
				$hasil = mysqli_fetch_array($select);
	?>
				<table>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $hasil["nama"] ?></td>
					</tr>
					<tr>
						<td>NIM</td>
						<td>:</td>
						<td><?php echo $hasil["nim"] ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $hasil["alamat"] ?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $hasil["telepon"] ?></td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td><?php echo $hasil["jurusan"] ?></td>
					</tr>
				</table>
				<a href="edit.php?id=<?php echo $_COOKIE["id"] ?>">Edit</a>
				<a href="delete.php?id=<?php echo $_COOKIE["id"] ?>">Hapus</a>
				<a href="home.php">Home</a>
	<?php
			}
		}
 	?>
</body>
</html>