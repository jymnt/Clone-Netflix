<?php 
include_once('db_func.php');

$nm_tabel ='daftar_film';
$primary = 'kd_film';
$id = $_GET['id']??'';
$where = '';
$data = [0=>[]];
if($id!=''){
    $where = "$primary = $id";
    $data = select("SELECT * FROM $nm_tabel WHERE $where");
}

detail($data);
// print_r($data);
function detail($data){
    global $nm_tabel, $primary;
    $temp = '
    <div class="col">
        <div class="card" style="background-color:#B20600;color:white">
            <center><video width="900" controls autoplay muted>
                <source src="%s" type="video/mp4"/></center>
            </video>
        <div class="card-body">
            <h5 class="card-title">%s</h5><hr style="color:black">
        <b>Genre : </b><p class="card-text">%s</p>
        <b>Tanggal Rilis : </b><p class="card-text">%s</p>
        <b>Director : </b><p class="card-text">%s</p>
        <b>Penulis : </b><p class="card-text">%s</p>
        <b>Rate : </b><p class="card-text">%s</p>
        <b>Jumlah Episode : </b><p class="card-text">%s</p>
        <b>Sinopsis : </b><p class="card-text">%s</p>
        </div>
        </div>
    </div>
';
echo '<div class="row row-cols-1 row-cols-md-1 g-4">';
foreach($data as $k){

//   print_r($c);
	echo sprintf($temp,
            $k['cuplikan'],
            $k['judul'],
            $k['genre'], 
            $k['tanggal_rilis'], 
            $k['director'], 
            $k['penulis'],
            $k['rate'], 
            $k['jlh_eps'], 
            $k['sinopsis'],
        );
}
echo '</div> ';
}


?>
