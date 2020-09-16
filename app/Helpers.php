<?php
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
function tgl_romawi($tanggal){
	$bulan = array (
		'01' =>   'I',
		'02'=>'II',
		'03'=>'III',
		'04'=>'IV',
		'05'=>'V',
		'06'=>'VI',
		'07'=>'VII',
		'08'=>'VIII',
		'09'=>'IX',
		'10'=>'X',
		'11'=>'XI',
		'12'=>'XII'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $bulan[$tanggal];
}