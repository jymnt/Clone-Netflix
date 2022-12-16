<form class="d-flex mt-5" method="post">
      <?=search([],'judul')?>
      <button class="btn btn-outline-danger" name="search" type="submit"><i class="bi bi-search"></i></button>
    </form> <br>
<?php 

$nm_tabel ='daftar_film';
$primary = 'kd_film';
$nm_file = "$nm_tabel.php";
$data = select($nm_tabel);

$nm_tabel ='daftar_film';
    $data = select($nm_tabel);
    if(isset($_POST['data'])){
        $search = $_POST['data'];
        
        foreach($search as $field=>$value){
        // masukkan ke $a kalau $value tidak kosong 
        
        if($value!='')
            $a[]=" $field like '%$value%'";
            echo "<label style=\"font-size:30px; color:white;\"><b>Results Found : $value </b></label><hr style=\"color:white\"><br><br>";
        }
        $sql = "SELECT * FROM $nm_tabel ".
            (isset($a)?' WHERE '.join(' and ' , $a):'');
        // echo $sql;die();
        $data = select($sql);
        // print_r($_POST['judul']); 
    }
    else{
        $data = select($nm_tabel);
    }


$template = '

<div class="card mb-3 me-5" style="max-width: 540px; background-color:#B20600; color:white">
  <div class="row g-0">
    <div class="col-md-4">
      <center><img src="%s" class="img-thumbnail" style="max-width:120px"></center>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">%s</h5>
        <p class="card-text"><b>Director : </b>%s</p>
        <a class="btn btn-secondary" style="font-family:sans-serif" href="%s"><b>Lihat Detail</b></a>
      </div>
    </div>
  </div>
</div>
';

echo '<div class="row row-cols-1 g-4">';
foreach($data as $k){
  $id = $k['kd_film'];
	echo sprintf($template,
            $k['cover'],
            $k['judul'],
            $k['director'], 
            "?modul=detail_film&act=tampil&id=$id");
}
echo '</div>';
?>