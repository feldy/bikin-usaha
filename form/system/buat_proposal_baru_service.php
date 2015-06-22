<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_POST['type'])) {
		$id = gen_uuid();
		$owner_id = $_SESSION['user_sid'];
		$nama_proposal = $_POST['nama_proposal'];
		$supplier = $_POST['supplier'];
		$deskripsi = $_POST['deskripsi'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$data_undangan = $_POST['data_undangan'];
		// $data_tambah_karyawan = $_POST['data_tambah_karyawan'];
		$max_jumlah_investor = $_POST['max_jumlah_investor'];
		$nilai_persentase_investor = $_POST['nilai_persentase_investor'];
		$nilai_persentase_owner = $_POST['nilai_persentase_owner'];



		$validasiNama = mysql_query("select * from t_proposal_usaha o where o.nama_proposal = '$nama_proposal'") or die(mysql_error());
		$numROW = mysql_num_rows($validasiNama);

		if ($numROW > 0) {
			echo "Maaf Entrepreneur lain sudah menggunakan Nama Proposal Ini anda! Silahkan ganti! ";
		} else {
			$str_query = "INSERT INTO t_proposal_usaha VALUES('$id', '$owner_id', '$supplier', '$nama_proposal', '$deskripsi', '$alamat','$kota', $max_jumlah_investor, '$nilai_persentase_investor', $nilai_persentase_owner, now())";
			$result = mysql_query($str_query) or die(mysql_error());


			if ($result) {
				$e = explode(",", $data_undangan);
				for($i = 0; $i < count($e); $i++) {
					$id_detail = gen_uuid();
					$idEntrepreneur = $e[$i];

				   	mysql_query("INSERT INTO m_undangan VALUES('$id_detail', '$owner_id', '$idEntrepreneur', '$id', now(), 'Undangan Join Usaha', 0)") or die(mysql_error());
				}
				echo "";
			} else {
				echo "gagal";
			}	
		}
		
	}
?>