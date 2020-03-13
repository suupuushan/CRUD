<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data User</title>
</head>
<body>
	<h2>Data User</h2>
	<table border="1" cellspacing="0" width="500">
		<tr style="text-align: center">
			<td>No</td>
			<td>Username</td>
			<td>E-mail</td>
			<td>Opsi</td>
		</tr>
		<?php 
		include 'conn.php';
		$no = 1;
		$select = mysqli_query($conn, "SELECT * FROM data WHERE level = 'user'");
		while ($hasil = mysqli_fetch_array($select)){
		?>
		<tr style="text-align: center">
			<td><?php echo $no++ ?></td>
			<td><?php echo $hasil['username'] ?></td>
			<td><?php echo $hasil['email'] ?></td>
			<td>
				<a href="editdata-admin.php?id=<?php echo $hasil["id"]; ?>">Edit Data</a> ||
				<input type="button" onclick="deleteme(<?php echo $hasil["id"] ?>)" name="delete" value="Hapus Akun">
					<script language="javascript">
						function deleteme(delid){
							if(confirm("Anda yakin ingin menghapus akun?")){
								document.location.href='hapusakun-admin.php?id=' +delid+'';
								return true;
							}
						}
					</script>				
			</td>
		</tr>
		<?php
		} 
		 ?>
		
	</table>
	<br>
	<a href="home.php">Home</a>
</body>
</html>