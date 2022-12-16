<?php
include_once('modul/db_func.php');

$link = [
    ['label'=>'Home', 'url'=>'?'],
    ['label'=>'Movie', 'url'=>'?modul=movie'],
    ['label'=>'Series', 'url'=>'?modul=series'],
	['label'=>'Admin', 'url'=>'mainAdmin.php?modul=signout'],
//arahkan login khusus admin
];
$acl = [
	'member'=>[
		'movie'=>['daftar'],
		'series'=>['daftar'],
		'nonton'=>['daftar'],
		'sewa'=>['daftar'],
		'detail_film'=>['daftar'],
		'registrasi' => ['daftar']
	],
	'operator'=>[
		'nonton'=>['daftar'],
		'movie'=>['daftar'],
		'series'=>['daftar'],
		'sewa'=>['daftar'],
		'detail_film'=>['daftar'],
		'registrasi' => ['daftar']
	],
];

ob_start();
	$modul = ($_GET['modul']??'');
	$act   = ($_GET['act']??'daftar');
	$group = ($_SESSION['group']??'');
	$filename = 'modul/'.$modul.'.php';
	
	// echo "Modul adalah :$modul<hr>";
	if(is_file($filename)){
		$akses = ($acl[$group])??[];
		$modulx = ($akses[$modul])??[];
		if(
			!empty($akses) &&
			!empty($modulx) &&
			in_array($act,$modulx)
		){
			include_once($filename);
		}
		else{
			if($modul=="signout")
				include_once('modul/signout.php');
			else 	
				if($modul=="registrasi"){
					include_once('modul/registrasi.php');
				}elseif($modul=="found"){
					include_once('modul/found.php');
				}elseif($modul=="pesan"){
					include_once('modul/pesan.php');
				}elseif($modul=="pesan2"){
					include_once('modul/pesan2.php');;
				}else{
					include_once('modul/signin.php');
				}
				
		}
	}
	else{
		echo "<h1 style='color:white'>Tonton Film dan Series Favorite Anda!</h1><hr style='color:white'>";
		include_once('modul/home.php');
	}	
		
	$content= ob_get_contents();
ob_end_clean();
	include_once('template/template.php');
