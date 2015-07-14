<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';

	if (isset($_POST['btn_simpan_jenis_usaha_baru'])) {
		$id = gen_uuid();
		$nama_usaha = $_POST['nama_usaha'];
		$jenis_usaha = $_POST['jenis_usaha'];
		$modal = $_POST['modal'];
		$jumlah_pegawai = $_POST['jumlah_pegawai'];
		$no_tlp = $_POST['no_tlp'];
		$file_photo1 = $_FILES['file_photo1']['name'];
		$file_photo2 = $_FILES['file_photo2']['name'];
		$file_photo3 = $_FILES['file_photo3']['name'];
		$file_photo4 = $_FILES['file_photo4']['name'];
		$file_doc = $_FILES['file_doc']['name'];
		$deskripsi = addslashes($_POST['deskripsi']);
		// echo "deskripsi".$deskripsi;
		$ext1 = pathinfo($file_photo1, PATHINFO_EXTENSION);
		$ext2 = pathinfo($file_photo2, PATHINFO_EXTENSION);
		$ext3 = pathinfo($file_photo3, PATHINFO_EXTENSION);
		$ext4 = pathinfo($file_photo4, PATHINFO_EXTENSION);
		$ext5 = pathinfo($file_doc, PATHINFO_EXTENSION);

		$fileName1 = $id."_file1.".$ext1;
		$fileName2 = $id."_file2.".$ext2;
		$fileName3 = $id."_file3.".$ext3;
		$fileName4 = $id."_file4.".$ext4;
		$fileName5 = $id."_file_doc.".$ext5;


		$result = mysql_query("INSERT INTO m_jenis_usaha VALUES('$id', '$nama_usaha', '$no_tlp', '$jenis_usaha', $modal, $jumlah_pegawai, '$deskripsi', '$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5', now(),  0) ") or die(mysql_error());
		if ($result) {
				move_uploaded_file($_FILES['file_photo1']['tmp_name'], '../upload/images/'.$fileName1);
				move_uploaded_file($_FILES['file_photo2']['tmp_name'], '../upload/images/'.$fileName2);
				move_uploaded_file($_FILES['file_photo3']['tmp_name'], '../upload/images/'.$fileName3);
				move_uploaded_file($_FILES['file_photo4']['tmp_name'], '../upload/images/'.$fileName4);
				move_uploaded_file($_FILES['file_doc']['tmp_name'], '../upload/document/'.$fileName5);
				echo "<script> alert('Terima Kasih Partisipasinya !! Admin pengelola akan me-review pengajuan anda.'); window.location.href='../index.php'</script>";
			} else {
				echo "<script> alert('Proses Gagal Silahkan Ulangi !'); window.history.back();</script>";
			}	
	}
?>