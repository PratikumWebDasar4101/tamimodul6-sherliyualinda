<?php  
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
	$nama 					= $_POST['nama'];
	$username 				= $_POST['username'];
	$password 				= $_POST['password'];
	$konfirmasi_password 	= $_POST['konfirmasi_password'];
	$tanggal_lahir 			= $_POST['tanggal_lahir'];
	$jenis_kelamin 			= $_POST['jenis_kelamin'];
	$foto 					= $_FILES['foto'];
	$file_name 				= $foto['name'];

	if (md5($password)==md5($konfirmasi_password)) {
		$file_moved = move_uploaded_file($foto['tmp_name'], "terkirim/".$foto['name']);
		if ($file_moved) {
			$query = "INSERT INTO `user`(
								  `username`, 
								  `password`, 
								  `nama`,
								  `jenis_kelamin`,
						 		  `tanggal_lahir`,
						  		  `foto`) 
					  VALUES (
					  			'$username',
					  			'".md5($password)."',
					  			'$nama',
					  			'$jenis_kelamin',
					  			'$tanggal_lahir',
					  			'$file_name')";
			$query_success = mysqli_query($conn,$query);
			if ($query_success) {
				header('location: login.php');
			}else{
				echo "gagal registrasi";
			}
		}
	}
}
?>