<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_GET['proses'])) {
		$id = $_GET['id'];
		$anggota = $_GET['tipe_anggota'];
		$status = "";
		if ($_GET['proses'] == "approved") {
			$status = "APPROVED";
		} else if ($_GET['proses'] == "reject") {
			$status = "REJECTED";
		}
		$strQuery = "UPDATE t_anggota_proposal_usaha SET status = '$status', tanggal = now() where id = '$id' and tipe_anggota = '$anggota'";

		$prosesQry = mysql_query($strQuery) or die(mysql_error());
		// echo $strQuery;
		if ($prosesQry) {
			echo "<script> alert('Berhasil ! '); window.history.back();</script>";
		} else {
			echo "<script> alert('Gagal ! '); window.history.back();</script>";
		}
	}
?>