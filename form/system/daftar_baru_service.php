<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';

	if (isset($_POST['btn_simpan_daftar_baru'])) {
		$id = gen_uuid();
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email_utama'];
		$password = $_POST['password_utama'];
		$tipe_user = $_POST['tipe_user'];
		$ttl = $_POST['tempat'].", ".$_POST['tgl_lahir'];
		$jk = $_POST['jk'];
		$tlp = $_POST['tlp'];
		$alamat = $_POST['alamat'];
		// $file = $_POST['file'];



		$validasiEmail = mysql_query("select * from m_entrepreneur o where o.username = '$username'") or die(mysql_error());
		$numROW = mysql_num_rows($validasiEmail);

		if ($numROW > 0) {
			echo "<script> alert('Maaf Entrepreneur lain sudah menggunakan Username anda! Silahkan ganti! '); window.history.back();</script>";
		} else {
			$path = $_FILES['file']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$fileName = $id.".".$ext;

			$path2 = $_FILES['file2']['name'];
			$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
			$fileName2 = $id.".".$ext2;

			$path3 = $_FILES['ktp']['name'];
			$ext3 = pathinfo($path3, PATHINFO_EXTENSION);
			$fileName3 = $id."_ktp.".$ext3;

			$path4 = $_FILES['npwp']['name'];
			$ext4 = pathinfo($path4, PATHINFO_EXTENSION);
			$fileName4 = $id."_npwp.".$ext4;
			// echo ">>>>>".$_FILES['ktp']['name'] == "";
			if ($path == "") {
				$fileName = "";
				echo "1";
			}
			if ($path2 == "") {
				$fileName2 = "";
				echo "2";
			}
			if ($path3 == "") {
				$fileName3 = "";
				echo "3";
			}
			if ($path4 == "") {
				$fileName4 = "";
				echo "4";
			}

			// -- echo "INSERT INTO m_entrepreneur VALUES('$id', '$email',  '$username', '$password', '$tipe_user', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '$fileName2',  '$fileName', now(), '$fileName3', '$fileName4'";
			$result = mysql_query("INSERT INTO m_entrepreneur VALUES('$id', '$email',  '$username', '$password', '$tipe_user', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '$fileName2',  '$fileName', now(), '$fileName3', '$fileName4')");
			// -- $result = "INSERT INTO m_entrepreneur VALUES('$id', '$email', '$password', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '')";
			
			if ($result) {
				if ($fileName != "") {
					move_uploaded_file($_FILES['file']['tmp_name'], '../upload/document/'.$fileName);
				}
				if ($fileName2 != "") {
					move_uploaded_file($_FILES['file2']['tmp_name'], '../upload/photo_profile/'.$fileName2);
				}
				if ($fileName3 != "") {
					move_uploaded_file($_FILES['ktp']['tmp_name'], '../upload/document/'.$fileName3);
				}
				if ($fileName4 != "") {
					move_uploaded_file($_FILES['npwp']['tmp_name'], '../upload/document/'.$fileName4);
				}

				echo "<script> alert('Selamat Datang Entrepreneur Baru !! Silahkan Login yaa'); window.location.href='../index.php?page=login'</script>";
			} else {
				echo "<script> alert('Daftar Gagal Silahkan Ulangi !'); window.history.back();</script>";
			}	
		}
		
	}
?>