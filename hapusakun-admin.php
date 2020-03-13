<?php 
	include("conn.php");
	if(isset($_GET["id"])){
		$delete = mysqli_query($conn, "DELETE FROM data WHERE id = '".$_GET["id"]."'");
		$delete1 = mysqli_query($conn, "DELETE FROM data1 WHERE id = '".$_GET["id"]."'");
		if ($delete && $delete1){
			echo "<script>
			alert ('Akun berhasil dihapus');
			document.location.href = 'data-user.php';
			</script>";
		}
	}
	

 ?>