<?php

$nm_tabel = 'daftar_film';
$primary = 'kd_film';
$nm_file = "$nm_tabel.php";
$where = "";

olahfile('cover', 'cover');
olahfile('cuplikan', 'video');
controller($nm_tabel, $primary, $nm_file);

function list_film(){
    global $nm_tabel, $primary;
    // melakukan pengecekan user sedang mencari atau tidak
    // menggunakan method post
    $data = select($nm_tabel);
    ?>
    <h3><br>Pengelolaan <?=ucwords($nm_tabel) ?></h3>
    <hr> 
    <?php
    echo '<a href="?modul='.$nm_tabel.'&act=add" class="btn btn-primary mb-2">Tambah '.ucwords($nm_tabel).'</a>';
    tabel([
        'judul' => 'Judul',
        'genre' => 'Genre',
        'tanggal_rilis' => 'Tanggal Rilis',
        'jlh_eps' => 'Jumlah Episode',
        'director' => 'Director',
        'penulis' => 'Penulis',
        'rate' => 'Rate',
        'link' => 'Link',
        'epslain' => 'Episode',
        'jenis' => 'Jenis', //movie,serial
        'cover' => ['label' => 'Cover', 'tipe' => 'img'],
        'cuplikan' => ['label' => 'Cuplikan', 'tipe' => 'video'],
        // 'cuplikan' => 'Cuplikan',
        'sinopsis' => 'Sinopsis',
    ], $data, $primary);
}

function form($data){
    ?>
<div class="container mt-5">
<div class="col">
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <?=input($data, 'Judul Film', 'judul')?>
                <?=input($data, 'Genre', 'genre')?>
                <?=inputdate($data, 'Tanggal Rilis', 'tanggal_rilis')?>
                <?=input($data, 'Jumlah Episode', 'jlh_eps')?>
                <?=input($data, 'Director', 'director')?>
                <?=input($data, 'Penulis', 'penulis')?>
                <?=input($data, 'Link', 'link')?>
                <?=input($data, 'Episode Lain', 'epslain')?>
                <?=input($data, 'Rate', 'rate')?>
                <?=input($data, 'Jenis', 'jenis')?>
                Cover   : <input type='file' class='form-control' name="cover"><br><br>
                Cuplikan : <input type='file' class='form-control' name="cuplikan"><br><br>
                <?=textarea($data, 'Sinopsis', 'sinopsis')?>
                <input class="btn btn-outline-primary btn-lg " type="submit" value="Simpan">
            </form>
        </div>
    </div>
</div>
</div>
        <?php
}
?>