<?php

$nm_tabel = 'pelanggan';
$primary = 'id';
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
    tabel([
        'nm_user' => 'Nama Pelanggan',
        'email_user' => 'Email Pelanggan',
        'id_user' => 'username',
        'pass_user' => 'password',
        'user_group' => 'Group',
        'langgananAwal' => 'Langganan Awal',
        'langgananAkhir' => 'Langganan Akhir',
        'Perpanjangan' => 'Perpanjangan',
    ], $data, $primary);
}

function form($data){
    ?>
<div class="col mt-5">
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <?=input($data, 'Group', 'user_group')?>
                <?=inputdate($data, 'Langganan Awal', 'langgananAwal')?>
                <?=inputdate($data, 'Langganan Akhir', 'langgananAkhir')?>
                <?=inputdate($data, 'Perpanjangan', 'Perpanjangan')?>
                <input class="btn btn-outline-primary btn-lg " type="submit" value="Simpan">
            </form>
        </div>
    </div>
</div>
        <?php
}
?>