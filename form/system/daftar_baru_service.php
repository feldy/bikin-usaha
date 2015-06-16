<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';

	if (isset($_POST['btn_simpan_daftar_baru'])) {
		$id = gen_uuid();
		$nama = $_POST['nama'];
		$email = $_POST['email_utama'];
		$password = $_POST['password_utama'];
		$ttl = $_POST['tempat'].", ".$_POST['tgl_lahir'];
		$jk = $_POST['jk'];
		$tlp = $_POST['tlp'];
		$alamat = $_POST['alamat'];
		// $file = $_POST['file'];



		$validasiEmail = mysql_query("select * from m_entrepreneur o where o.email = '$email'") or die(mysql_error());
		$numROW = mysql_num_rows($validasiEmail);

		if ($numROW > 0) {
			// echo "<script> alert('Maaf Entrepreneur lain sudah menggunakan Email anda! Silahkan ganti! '); window.history.back();</script>";
		} else {
			$path = $_FILES['file']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$fileName = $id.".".$ext;
			move_uploaded_file($_FILES['file']['tmp_name'], '../upload/images/'.$fileName);

			$path2 = $_FILES['file2']['name'];
			$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
			$fileName2 = $id.".".$ext2;
			move_uploaded_file($_FILES['file2']['tmp_name'], '../upload/photo_profile/'.$fileName2);

			$result = mysql_query("INSERT INTO m_entrepreneur VALUES('$id', '$email', '$password', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '$fileName2',  '$fileName')");
			// -- $result = "INSERT INTO m_entrepreneur VALUES('$id', '$email', '$password', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '')";
			
			if ($result) {
				// echo "<script> alert('Selamat Datang Entrepreneur Baru !! Silahkan Login yaa'); window.location.href='../halaman_utama.php?page=login'</script>";
			} else {
				// echo "<script> alert('Daftar Gagal Silahkan Ulangi !'); window.history.back();</script>";
			}	
		}
		
	}
?>