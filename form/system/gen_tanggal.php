<?php 
	function getTanggal($tanggal) {
		$pecah = split("-", $tanggal);
		//Array Hari
		// $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
		// $hari = $array_hari[];
		//Format Tanggal
		$tanggal = $pecah[2];
		//Array Bulan
		$array_bulan = array('Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
		$bulan = $array_bulan[intval($pecah[1])];
		//Format Tahun
		$tahun =  $pecah[0];
		//Menampilkan hari dan tanggal
		echo  $tanggal .' '. $bulan .' '. $tahun;
	}

?>