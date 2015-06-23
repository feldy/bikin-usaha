<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_GET['id_proposal'])) {
		$id = gen_uuid();
		$id_entrepreneur = $_SESSION['user_sid'];
		$id_proposal = $_GET['id_proposal'];
		$id_nilai_investasi = $_GET['id_nilai_investasi'];
		$tipe_anggota = $_GET['tipe_anggota'];
		$id_nilai_investasi = (($id_nilai_investasi === NULL) ? "NULL" : "$id_nilai_investasi");

		$validasiUser = mysql_query("select * from t_anggota_proposal_usaha o where o.id_entrepreneur = '$id_entrepreneur' and o.id_proposal_usaha = '$id_proposal' and o.tipe_anggota = '$tipe_anggota'") or die(mysql_error());
		$numROW = mysql_num_rows($validasiUser);

		if ($numROW > 0) {
			echo "<script> alert('Maaf Sebelumnya anda sudah melakukan pengajuan! Mohon tunggu persetujuan dari owner ^^! '); window.history.back();</script>";

		} else {
			$str_query = "";
			if ($tipe_anggota == "pegawai") {
				$str_query = "	INSERT INTO t_anggota_proposal_usaha 
								VALUES('$id', '$id_proposal', '$id_entrepreneur', NULL, NULL, '$tipe_anggota','NEW', now())";
			} else {
				$str_query = "	INSERT INTO t_anggota_proposal_usaha 
								VALUES('$id', '$id_proposal', '$id_entrepreneur', NULL, '$id_nilai_investasi', '$tipe_anggota','NEW', now())";
				
			}
			echo ">>>>>>>>>>".$str_query;
			$result = mysql_query($str_query) or die(mysql_error());
			if ($result) {
				echo "<script> alert('OK, Pengajuan Selesai! Tinggal tunggu persetujuan dari ownernya yahh ! '); window.location.href='../index.php'</script>";
			}
		}
	}
?>