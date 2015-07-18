<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';

	if (isset($_POST['btn_simpan_edit_account'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$email = $_POST['email_utama'];
		// $password = $_POST['password_utama'];
		$ttl = $_POST['tempat'].", ".$_POST['tgl_lahir'];
		$jk = $_POST['jk'];
		$tlp = $_POST['tlp'];
		$alamat = $_POST['alamat'];
		$fileName = $_POST['name_file1'];
		$fileName2 = $_POST['name_file2'];

		$validasiEmail = mysql_query("select * from m_entrepreneur o where o.email = '$email' and o.id <> '$id'") or die(mysql_error());
		$numROW = mysql_num_rows($validasiEmail);

		if ($numROW > 0) {
			echo "<script> alert('Maaf Entrepreneur lain sudah menggunakan Email anda! Silahkan ganti! '); window.history.back();</script>";
		} else {
			if($_FILES['file']['name'] != ""){
				$path = $_FILES['file']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				$fileName = $id.".".$ext;
			}

			if($_FILES['file2']['name'] != ""){
				$path2 = $_FILES['file2']['name'];
				$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
				$fileName2 = $id.".".$ext2;
			}

			$result = mysql_query(" UPDATE m_entrepreneur SET 
										nama='$nama', 
										alamat='$alamat', 
										jenis_kelamin='$jk', 
										no_telepon='$tlp', 
										ttl='$ttl', 
										file_photo='$fileName2', 
										file_biodata='$fileName' 
									WHERE id = '$id'");
			// $result = mysql_query("INSERT INTO m_entrepreneur VALUES('$id', '$email', '$password', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '$fileName2',  '$fileName', now())");
			// -- $result = "INSERT INTO m_entrepreneur VALUES('$id', '$email', '$password', '$nama', '$alamat', '$jk', '$tlp', '$ttl', '')";
			
			if ($result) {
				if($_FILES['file']['name'] != ""){
					move_uploaded_file($_FILES['file']['tmp_name'], '../upload/document/'.$fileName);
				}
				if($_FILES['file2']['name'] != ""){
					move_uploaded_file($_FILES['file2']['tmp_name'], '../upload/photo_profile/'.$fileName2);
				}
				echo "<script> alert('Berhasil UPDATE'); window.location.href='../index.php?page=my_account&user_id=".$id."'</script>";
			} else {
				echo "<script> alert('Daftar Gagal Silahkan Ulangi !'); window.history.back();</script>";
			}	
		}
		
	}
?>