<?php  
include_once 'koneksi.php';
session_start();

if (isset($_POST['submit'])) {
	$username =$_POST['username'];
	$password =$_POST['password'];
	

	$query = "SELECT `id`, `nama` FROM `user` 
			  WHERE username='$username' AND password='".md5($password)."'";
	$query_success = mysqli_query($conn,$query);
	$result = mysqli_num_rows($query_success);
	
	if ($result>0) {
		while ($data = mysqli_fetch_array($query_success)) {
			$_SESSION ['id']=$data['id'];
			$_SESSION ['nama']= $data['nama'];
			header('location: halamanawal.php');
		}
	}else{
		$_SESSION['prosesRegristrasi'] = "Username atau Password Belum Terdaftar atau Salah";
		header('location: login.php');
	}

}
?>