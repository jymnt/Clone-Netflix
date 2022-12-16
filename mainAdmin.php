<?php
include_once('modul/db_func.php');

$link = [
    ['label'=>'Kelola Film', 'url'=>'?modul=daftar_film'],
	['label'=>'Kelola Pelanggan', 'url'=>'?modul=pelanggan'],
	['label'=>'Member', 'url'=>'main.php?modul=signout'],
//arahkan login khusus admin
];
$acl = [
	'admin'=>[
		'daftar_film'=>['edit','delete','add','daftar'],
		'data_transaksi'=>['edit','delete','add','daftar'],
		'pelanggan'=>['edit','delete','daftar'],
	],
	'operator'=>[
		'daftar_film'=>['edit','delete','add','daftar'],
		'data_transaksi'=>['edit','delete','add','daftar'],
		'pelanggan'=>['edit','delete','daftar'],
	]
];

ob_start();
	$modul = ($_GET['modul']??'');
	$act   = ($_GET['act']??'daftar');
	$group = ($_SESSION['group']??'');
	$filename1 = 'modul/'.$modul.'.php';
	
	// echo "Modul adalah :$modul<hr>";
	if(is_file($filename1)){
		$akses = ($acl[$group])??[];
		$modulx = ($akses[$modul])??[];
		if(
			!empty($akses) &&
			!empty($modulx) &&
			in_array($act,$modulx)
		){
			include_once($filename1);
		}
		else{
			if($modul=="logout")
				include_once('modul/logout.php');
			else 	
				include_once('modul/loginAdmin.php');
				
		}
	}
	else{
		echo '<div style="background-color:black">';
		echo'<center><font size="10" color="red"><b>HALAMAN ADMIN</b></font><br><center>';
		echo'<center><img src="gambar/logo.png" 
		alt="Girl in a jacket" width="600" height="600"><center>';
		echo '</div>';
		echo '<div style="background-color:black;height="600"">';
		echo'<center><font size="10" color="red"><b>JLIX</b></font><br><center>';
		echo '</div>';
	}	
		
	$content= ob_get_contents();
ob_end_clean();
	
include_once('template/templateAdmin.php');
