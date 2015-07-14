<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_POST['btn_simpan_add_schedule'])) {
		$id = gen_uuid();
		$id_proposal = $_POST['proposal_id'];
		$id_entrepreneur = $_SESSION['user_sid'];

		$tanggalSchedule = $_POST['tanggalSchedule'];
		$namaSchedule = $_POST['namaSchedule'];
		$deskripsiSchedule = $_POST['deskripsiSchedule'];
		$strQry = "INSERT INTO m_schedule VALUES ('$id','$id_proposal','$id_entrepreneur','$tanggalSchedule','$namaSchedule','$deskripsiSchedule','NEW')";
		// echo ">>>".$strQry;
		$exQuery = mysql_query($strQry) or die(mysql_error());
		if ($exQuery) {
			echo "<script> alert('Berhasil Menambahkan Schedule! '); window.history.back();</script>";
		} else {
			echo "<script> alert('Gagal Menambahkan Schedule! '); window.history.back();</script>";
		}
	}
?>