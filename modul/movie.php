
<br><h1 style='color:white'>FEATURED MOVIE</h1><hr style='color:white'>

<?php 
include_once('db_func.php');

$nm_tabel ='daftar_film';
$data = select("SELECT * FROM $nm_tabel WHERE jenis = 'movie'");
// print_r($data);


detail($data);

// print_r($data);
function detail($data){
    global $nm_tabel, $primary;
    $template = '
<div class="col" >
    <div class="card h-100 mt-2" >
      <img src="%s" style="width:100;" class="card-img-top">

      <div class="card-body" style="background-color:#B20600; color:white">
        <h4 class="card-title">%s</h4>
        <p class="card-text" style="font-family:sans-serif"><b>Director : %s</b></p>
      </div>
      <div class="card-footer" style="background-color:#B22727">
      <a class="btn btn-secondary" style="font-family:sans-serif" href="%s"><b>Lihat Detail</b></a>
      <a class="btn btn-dark" style="font-family:sans-serif" href="%s"><b>Nonton</b></a>
      </div>
    </div>
  </div>
';
echo '<div class="row row-cols-1 row-cols-md-4 g-4">';

foreach($data as $k){
  $id = $k['kd_film'];
	echo sprintf($template,
            $k['cover'],
            $k['judul'],
            $k['director'], 
            "?modul=detail_film&id=$id",
            "?modul=nonton&id=$id");
}
echo '</div>';
}
?>
<style>
  .card:hover{
  transform: scale(1.2);
}
</style>