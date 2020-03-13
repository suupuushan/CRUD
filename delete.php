<?php 
	include("conn.php");
	if(isset($_COOKIE["id"])){
		$delete = mysqli_query($conn, "DELETE FROM data1 WHERE id = '".$_COOKIE["id"]."'");
		echo "<script>
			alert ('Data berhasil dihapus');
			document.location.href = 'profile.php';
			</script>";
	}
	

 ?>