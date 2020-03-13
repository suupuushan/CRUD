<?php 

$conn = mysqli_connect('localhost','root','','syafiq');
if($conn){
	//echo "Sukses Koneksi";
} else {
	echo "Tidak dapat Koneksi";
	exit();
}

 ?>