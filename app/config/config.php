<?php
define('BASEURL', 'https://info-maba-unima.site/public');

// Database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'infr3757_informasi_maba');
define('DB_PASSWORD', 'v7VHtSgYcEHa');
define('DB_NAME', 'infr3757_db_info_maba_unima');

//Zona Waktu
date_default_timezone_set('Asia/Makassar');

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
