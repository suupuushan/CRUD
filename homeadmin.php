<?php 
	include("conn.php");
	$query = mysqli_query($conn, "SELECT * FROM data WHERE id = '".$_COOKIE["id"]."'");
	$result = mysqli_fetch_array($query);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style-home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container1">
		<?php 
		if(isset($_COOKIE["id"])){
			if ($result["level"] == 'user'){
				header("location:home.php");
				exit();
			} else {

				$userloggedin = $conn->query("SELECT * FROM data WHERE id = '".$_COOKIE["id"]."'")->fetch_assoc();


			?>
			<div class="main">
				<div class="text">
					<a href="logout.php" class="link">
						<div class="menu">
							Logout
						</div>
					</a>
					<a href="profile.php" class="link">
						<div class="menu">
							Profile
						</div>
					</a>
					<a href="ganti-pass.php" class="link">
						<div class="menu">
							Ganti Password
						</div>
					</a>
					<a href="data-user.php" class="link">
						<div class="menu">
							Data User
						</div>
					</a>
					<input type="button" onclick="deleteme(<?php echo $_COOKIE["id"] ?>)" name="delete" value="Hapus Akun">
					<script language="javascript">
						function deleteme(delid){
							if(confirm("Anda yakin ingin menghapus akun?")){
								document.location.href='hapusakun.php?id=' +delid+'';
								return true;
							}
						}
					</script>

				</div>
				<div class="profile">
					<?php 
						if ($result['gambar' == '']) {
					?>
							<a href="foto.php">
								<img src="img/nophoto.png" width = "150" height = "150">
							</a>
					<?php
						} else {
					?>
							<a href="foto.php">
								<img src="profile/<?php echo $result["gambar"];?>" width = "150" height = "150">
							</a>
					<?php
					}
					 ?>
					
				</div>
			</div>
			<div class="pesan">
				<div class="greet">
					<div>
					Helloo,<br/><strong><?=$userloggedin["username"]?></strong><br/>
					</div>
				</div>
				
			</div>
			
		</div>
		<?php
				}
			}else {
				header("location:home1.php");
				exit();
			}

		 ?>
	

	
</body>
</html>