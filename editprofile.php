<?php 
include_once('koneksi.php');
$id=$_GET['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>6701174057</title>
</head>
<body>
	<br>
	<br>
		<center>
			<h3>SELAMAT DATANG</h3>
		<table bgcolor="pink">
		<form action="updateprofil.php" method="POST" enctype="multipart/form-data">
			<?php
			$id = $_GET['id'];
			$query ="SELECT * FROM user WHERE id = '$id'";
			$result = mysqli_query($conn,$query);
			$data = mysqli_fetch_array($result);
			?>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<tr>
				<td>Nama</td>
				<td>
					<input type="text" name="nama" value="<?php echo $data['nama']?>">
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" name="username" value="<?php echo $data['username']?>">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td>
					<input type="password" name="konfirmasi_password">
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>
					<input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']?>">
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>
					<input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo $data['jenis_kelamin']=="Laki-Laki" ? "checked" : ""; ?>>Laki-Laki
					<input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo $data['jenis_kelamin']=="Perempuan" ? "checked" : ""; ?>>Perempuan
				</td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>
					<input type="file" name="foto">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="submit">
				</td>
			</tr>
		</form>
	</table>
</body>
</html>