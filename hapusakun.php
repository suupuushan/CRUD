<?php 
	include("conn.php");
	if(isset($_COOKIE["id"])){
		$delete = mysqli_query($conn, "DELETE FROM data WHERE id = '".$_COOKIE["id"]."'");
		$delete1 = mysqli_query($conn, "DELETE FROM data1 WHERE id = '".$_COOKIE["id"]."'");
		setcookie("id",null);
		if ($delete && $delete1){
			echo "<script>
			alert ('Akun berhasil dihapus');
			document.location.href = 'login.php';
			</script>";
		}
	}
	

 ?>