<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	
	if (isset($_POST['btn_simpan_not_user'])) {
		$id = gen_uuid();
		$idReff = $_SESSION['user_sid'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$tlp = $_POST['tlp'];
		$alamat = $_POST['alamat'];
		// $file = $_POST['file'];

		
		$path = $_FILES['file']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$fileName = $id.".".$ext;

		$path2 = $_FILES['file2']['name'];
		$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
		$fileName2 = $id.".".$ext2;

		$result = mysql_query("INSERT INTO m_pegawai_not_user VALUES('$id', '$idReff', '$nama', '$alamat', '$jk', '$tlp', '', '$fileName2',  '$fileName', now())") or die(mysql_error());
		// -- $result = "INSERT INTO m_entrepreneur VALUES('$id', '$email', '$password', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '')";
		
		if ($result) {
			move_uploaded_file($_FILES['file2']['tmp_name'], '../upload/photo_profile/'.$fileName2);
			move_uploaded_file($_FILES['file']['tmp_name'], '../upload/document/'.$fileName);
			echo "<script> alert('Terima Kasih, akan di review dahulu pengajuan anda oleh admin'); window.history.back();</script>";
		} else {
			echo "<script> alert('Gagal menambahkan karyawan Silahkan Ulangi !'); window.history.back();</script>";
		}			
	}
?>