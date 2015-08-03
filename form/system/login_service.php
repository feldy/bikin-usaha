<?php
include 'config_service.php';
if (isset($_POST['btn_login'])) {
	$emailP = $_POST['email']; //revisi pakai username
	$pass = $_POST['password'];

	$sql = mysql_query("SELECT * FROM m_entrepreneur where username = '$emailP' and password = '$pass' ");
	$arr = mysql_fetch_array($sql);

	$id = $arr['id'];
	$email = $arr['email'];
	$password = $arr['password'];
	$nama = $arr['nama'];
	$username = $arr['username'];
	$tipe_user = $arr['tipe_user'];
	// $role = $arr['has_role'];

	if ($emailP == $username && $pass == $password) {

		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		$_SESSION['user_sid'] = $id;
		$_SESSION['user_nama'] = $nama;
		$_SESSION['username'] = $username;
		$_SESSION['tipe_user'] = $tipe_user;
		// $obj[] = array('session' => $role, 'userId' => $id, 'email' => $email); 

		// echo json_encode("success");
		echo "<script> alert('Selamat datang kembali, temukan berbagai proposal usaha yang menarik! '); window.location.href='../index.php';</script>";
		// echo $_SESSION['email']." = ".$_SESSION['password'];
	} else {
		// $obj = array();
		// echo json_encode("failed");
		echo "<script> alert('Email atau password anda belum terdaftar, silahkan ulangi kembali! '); window.history.back();</script>";
	}
}

?>