
<div class="card mt-5">
  <div class="card-header" style="background-color:black">
    <center><font size="10" color="red"><b>JLIX</b></font><br><center>
  </div>
  <div class="card-body"  style="background-color:#B20600; color:white">
    <h5 class="card-title">Harga Langganan hanya 20.000 Tiap Bulannya!</h5>
    <p class="card-text">Anda dapat menonton Film dan Serial Favorit anda sepuasnya</p>
  <form method="post">
    <input class="btn btn-secondary" name="kembali" type="submit" value="Kembali">
    <input style="float:right" name="lanjutkan" class="btn btn-dark" type="submit" value="Lanjutkan">
  </form>
    <p class="card-text">* Klik lanjutkan jika ingin berlangganan, 
        klik kembali jika sudah berlangganan</p>
    </div>
  
</div>

<?php

$kembali = $_POST['kembali']??'';
$lanjutkan = $_POST['lanjutkan']??'';

if($lanjutkan){
  header('location:?modul=registrasi');

}
if($kembali){
  header('location:?modul=signin');
}

?>