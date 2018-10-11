<?php 
include_once("koneksi.php");
session_start();
$id = $_SESSION['id'];
$nama =$_SESSION['nama'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>6701174057</title>
</head>
<body>
	<br>
	<br>
	<br>
	<?php
	$query="SELECT 
				`username`,
			    `password`, 
			    `nama`, 
			    `jenis_kelamin`, 
			    `tanggal_lahir`, 
			    `foto`
		 	FROM `user` WHERE id='$id'";
 	$result=mysqli_query($conn,$query);
 	$data=mysqli_fetch_array($result);
	?>
	<a href="logOut.php">Logout</a><br>
	<a href="editprofile.php?id=<?php echo $id; ?>">Edit Profil</a><br>
	<a href="posting.php?id=<?php echo $id; ?>">Edit Profil</a><br>
	<center>
	<h3>Selamat Datang, <?php echo $nama; ?></h3>
	<table>
		<tr>
			<td colspan="2">
				<img src="terkirim/<?php echo $data['foto']; ?>" width="200">
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>
				<?php echo $data['nama']; ?>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<?php echo $data['jenis_kelamin']; ?>
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>
				<?php echo $data['tanggal_lahir']; ?>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2"><a href="posting.php">Post!</a></td>
		</tr>
	</table>
</body>
</html>