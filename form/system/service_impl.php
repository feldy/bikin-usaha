<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';

	if (isset($_POST['type'])) {
		$type = $_POST['type'];
		if ($type == "supplier") {
			$kategori_jenis = $_POST['kategori_jenis'];
			$a = array();
			$x = mysql_query("SELECT id, nama, max_jumlah_pegawai FROM m_jenis_usaha WHERE kategori_jenis = '$kategori_jenis' ") or die(mysql_error());
            while ($arr=mysql_fetch_assoc($x)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		} elseif ($type == "kirim_undangan") {
			$email = $_POST['email'];
			$a = array();
			$x = mysql_query("SELECT count(*) as jumlah_result, file_photo as file_photo, id as id  FROM m_entrepreneur WHERE email = '$email' ") or die(mysql_error());
			while ($arr=mysql_fetch_assoc($x)) {
            	$a = $arr;
            }
            echo json_encode($a);
		}
	}
?>