<?php
include 'config_service.php';
if (isset($_POST['btn_login'])) {
	$emailP = $_POST['email'];
	$pass = $_POST['password'];

	$sql = mysql_query("SELECT * FROM m_entrepreneur where email = '$emailP' and password = '$pass' ");
	$arr = mysql_fetch_array($sql);

	$id = $arr['id'];
	$email = $arr['email'];
	$password = $arr['password'];
	// $role = $arr['has_role'];

	if ($emailP == $email && $pass == $password) {

		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		$_SESSION['user_sid'] = $id;
		// $obj[] = array('session' => $role, 'userId' => $id, 'email' => $email); 

		// echo json_encode("success");
		echo "<script> alert('Selamat datang kembali, temukan berbagai proposal usaha yang menarik! '); window.history.go(-2);</script>";
		// echo $_SESSION['email']." = ".$_SESSION['password'];
	} else {
		// $obj = array();
		// echo json_encode("failed");
		echo "<script> alert('Email atau password anda belum terdaftar, silahkan ulangi kembali! '); window.history.back();</script>";
	}
}

?>