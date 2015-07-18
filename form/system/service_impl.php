<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();

	if (isset($_POST['type'])) {
		$type = $_POST['type'];
		if ($type == "supplier") {
			$kategori_jenis = $_POST['kategori_jenis'];
			$a = array();
			$x = mysql_query("SELECT id, nama, max_jumlah_pegawai FROM m_jenis_usaha WHERE kategori_jenis = '$kategori_jenis' and is_active = 1 ") or die(mysql_error());
            while ($arr=mysql_fetch_assoc($x)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		} elseif ($type == "kirim_undangan") {
			$email = $_POST['email'];
			$type = $_POST["type"];
			$x = mysql_query("SELECT count(*) as jumlah_result, file_photo as file_photo, id as id, nama as nama  FROM m_entrepreneur WHERE email = '$email' ") or die(mysql_error());
			while ($arr=mysql_fetch_assoc($x)) {
            	$a = $arr;
            }
            echo json_encode($a);
		} elseif ($type == "add_undangan_proposalku") {
				$email = $_POST['email'];
				$a = array();
				$str = "SELECT count(*) as jumlah_result, file_photo as file_photo, id as id, nama as nama  FROM m_entrepreneur WHERE email = '$email' ";
				$x = mysql_query($str) or die(mysql_error());
				$x2 = mysql_query($str) or die(mysql_error());
				$jml = mysql_fetch_array($x2);
				while ($arr=mysql_fetch_assoc($x)) {
	            	$a = $arr;
	            }
	           
	            if ($jml['jumlah_result'] == 0) {
	            	echo json_encode($a);
	            } else {
					$proposal_id = $_POST['proposal_id'];
	            	$str = "SELECT count(*) as jumlah FROM m_undangan u INNER JOIN m_entrepreneur e ON u.from_id = e.id WHERE e.email  = '$email' and u.proposal_id = '$proposal_id' and u.keterangan = 'UNDANGAN PEGAWAI'  ";
		            $y = mysql_query($str) or die(mysql_error());
					$ay = mysql_fetch_array($y);
					// echo $ay['jumlah'];
					if ($ay['jumlah'] == "0") {
						// echo "sdkjfskjdfhskjdhf";
		            	echo json_encode($a);
					} else {
						$a = array('status' => "sudah_ditambahkan");
						echo json_encode($a);
					}
	            }
		} elseif ($type == "add_undangan_investor_proposalku") {
				$email = $_POST['email'];
				$a = array();
				$str = "SELECT count(*) as jumlah_result, file_photo as file_photo, id as id, nama as nama  FROM m_entrepreneur WHERE email = '$email' ";
				$x = mysql_query($str) or die(mysql_error());
				$x2 = mysql_query($str) or die(mysql_error());
				$jml = mysql_fetch_array($x2);
				while ($arr=mysql_fetch_assoc($x)) {
	            	$a = $arr;
	            }
	           
	            if ($jml['jumlah_result'] == 0) {
	            	echo json_encode($a);
	            } else {
					$proposal_id = $_POST['proposal_id'];
	            	$str = "SELECT count(*) as jumlah FROM m_undangan u INNER JOIN m_entrepreneur e ON u.from_id = e.id WHERE e.email  = '$email' and u.proposal_id = '$proposal_id' and u.keterangan = 'UNDANGAN INVESTOR'  ";
		            $y = mysql_query($str) or die(mysql_error());
					$ay = mysql_fetch_array($y);
					// echo $ay['jumlah'];
					if ($ay['jumlah'] == "0") {
						// echo "sdkjfskjdfhskjdhf";
		            	echo json_encode($a);
					} else {
						$a = array('status' => "sudah_ditambahkan");
						echo json_encode($a);
					}
	            }
		} elseif ($type == "tambah_karyawan") {
			$email = $_POST['email'];
			$a = array();
			$x = mysql_query("SELECT count(*) as jumlah_result, file_photo as file_photo, id as id, nama as nama  FROM m_entrepreneur WHERE email = '$email' ") or die(mysql_error());
			while ($arr=mysql_fetch_assoc($x)) {
            	$a = $arr;
            }
            echo json_encode($a);
		} elseif ($type == "kirim_undangan_proposalku") {
			$email = $_POST['email'];
			$tipe = $_POST['tipe'];
			// $owner = $_POST['owner']; jangan pakai owner tapi user sid yang login
			$owner = $_SESSION['user_sid'];
			$proposal_id = $_POST['proposal_id'];
			$status = "";
			for ($i = 0; $i < count($email); $i++) {
				$id = gen_uuid();
				$email1 = $email[$i];
				$x = mysql_query("INSERT INTO m_undangan VALUES('$id','$owner','$email1', '$proposal_id', now(),'UNDANGAN PEGAWAI', 0)") or die(mysql_error());
				if ($x) {} else {
					$status = 'error';
				}			
			}
			echo $status;
		} elseif ($type == "kirim_undangan_investor_proposalku") {
			$email = $_POST['email'];
			$tipe = $_POST['tipe'];
			// $owner = $_POST['owner']; jangan pakai owner tapi user sid yang login
			$owner = $_SESSION['user_sid'];
			$proposal_id = $_POST['proposal_id'];
			$status = "";
			for ($i = 0; $i < count($email); $i++) {
				$id = gen_uuid();
				$email1 = $email[$i];
				$x = mysql_query("INSERT INTO m_undangan VALUES('$id', '$owner', '$email1', '$proposal_id', now(),'UNDANGAN INVESTOR', 0)") or die(mysql_error());
				if ($x) {} else {
					$status = 'error';
				}			
			}
			echo $status;
		} elseif ($type == "chat") {
			$id = gen_uuid();
			$message = $_POST['message'];
			$proposal_id = $_POST['proposal_id'];
			$id_entrepreneur = $_SESSION['user_sid'];
			
			mysql_query("INSERT INTO m_chat VALUES('$id','$id_entrepreneur','$proposal_id','$message', now())") or die(mysql_error());
			$strQuery = "   	SELECT  e.nama as nama_entrepreneur,
										e.file_photo as file_photo,
									t.message as message,
									t.tanggal as tanggal
                            FROM m_chat t 
                            INNER JOIN m_entrepreneur e ON t.id_entrepreneur = e.id
                            WHERE id_proposal = '$proposal_id' 
                            ORDER BY t.tanggal asc";
            // echo $strQuery;
            $a = array();
            $query = mysql_query($strQuery) or die(mysql_error());
			while ($arr=mysql_fetch_assoc($query)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		} elseif ($type == "load_chat") {
			$proposal_id = $_POST['proposal_id'];
			
			$strQuery = "   	SELECT  e.nama as nama_entrepreneur,
										e.file_photo as file_photo,
									t.message as message,
									t.tanggal as tanggal
                            FROM m_chat t 
                            INNER JOIN m_entrepreneur e ON t.id_entrepreneur = e.id
                            WHERE id_proposal = '$proposal_id' 
                            ORDER BY t.tanggal asc";
            // echo $strQuery;
            $a = array();
            $query = mysql_query($strQuery) or die(mysql_error());
			while ($arr=mysql_fetch_assoc($query)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		}
	}
?>