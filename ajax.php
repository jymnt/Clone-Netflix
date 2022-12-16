<?php 
include_once('modul/db_func.php');
$urutan = $_GET['urutan']??0;

$data = select("SELECT * FROM daftar_film LIMIT $urutan,1");
echo '
     <center><video class="container" autoplay muted
     src="'.$data[0]['cuplikan'].'"></video>
     <br><br>';
echo  "<label style='size: 800px; color:Red'><b>" . $data[0]['judul']. "</b></label>";
     