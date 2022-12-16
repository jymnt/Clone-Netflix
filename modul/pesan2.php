
<div class="card mb-2 mt-5">
  <div class="card-header" style="background-color:black">
    <center><font size="10" color="red"><b>JLIX</b></font><br><center>
  </div>
  <div class="card-body"  style="background-color:#B20600; color:white">
    <h5 class="card-title">Anda akan berlangganan dan menjadi member silahkan lakukan pembayaran</h5>
    <p class="card-text"><b>Total yang harus dibayarkan : </b>Rp. 20.000,-</p>
    <p class="card-text"><b>Batas waktu pembayaran sampai : </b>
    <?php echo date('j/m/Y 23:59', strtotime("+1 day",strtotime(date("Y-m-d"))))?></p>

    <!-- card -->
<div class="card-group">
    <div class="card mb-5 me-2" style="color:black">
      <!-- <button type="button" class="btn btn-danger" 
      onclick="window.location.href='?modul=bca'"> -->
        <img class="img-thumbnail" src="gambar/bcaVA.jpg">
      <!-- </button> -->
        <center>
        <h5 class="card-title">BCA VIRTUAL ACCOUNT</h5>
        <h6 class="card-title">3456789023456718</h6>
        </center>  
    </div>
    <div class="card mb-5 me-2" style="color:black;">
        <!-- <button type="button" class="btn btn-danger"
        onclick="window.location.href='?modul=bni'"> -->
        <img class="img-thumbnail" style="padding:6px;" src="gambar/BNIVA.png">
        <!-- </button> -->
        <center>
        <h5 class="card-title">BNI VIRTUAL ACCOUNT</h5>
        <h6 class="card-title">1236789023456718</h6>
        </center>   
    </div>
    <div class="card mb-5 me-2" style="color:black">
        <!-- <button type="button" class="btn btn-danger" -->
        <!-- onclick="window.location.href='?modul=bri'">        -->
        <img class="img-thumbnail" src="gambar/BRIVA.jpg">
        <!-- </button> -->
        <center>
        <h5 class="card-title">BRI VIRTUAL ACCOUNT</h5>
        <h6 class="card-title">8906789023456718</h6>
        </center>   
    </div>
    <div class="card mb-5 me-2" style="color:black">
        <!-- <button type="button" class="btn btn-danger" -->
        <!-- onclick="window.location.href='?modul=mandiri'"> -->
        <img class="img-thumbnail" src="gambar/mandiriVA.png">
        <!-- </button> -->
        <center>
        <h5 class="card-title">MANDIRI VIRTUAL ACCOUNT</h5>
        <h6 class="card-title">5676789023456718</h6>
        </center>   
    </div>
</div>

<!-- button -->
  <form method="post" action="?modul=pesan">
    <input class="btn btn-secondary" name="kembali" type="submit" value="Kembali">
  </form>
    
    <p class="card-text">*pilih virtual account sesuai bank tersedia</p>
    </div>
  
</div>





