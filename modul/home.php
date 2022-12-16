    
<!-- ajax -->
<hr>
<div id="alert" class="alert alert-dark" style="background-color:black">
</div>
<?php 
$data = select('daftar_film');
$max = count($data);
?>
<script>
	var c = 0;
	var max = <?php echo $max;?>;
	setInterval(
		function(){
			$.get('ajax.php?urutan='+c,function(text){
				$('#alert').html(text);			
			})
			c++;
			if(c>=max){
				c=0;
			}
		},20000
	);
	
</script>


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
<div class="col mb-5" >
    <div class="card h-100" >
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
?>

<style>
  .card:hover{
  transform: scale(1.2);
}
</style>