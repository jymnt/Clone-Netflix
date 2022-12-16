<?php

session_start();

// mengububungkan database
$mysqli = new mysqli(
    "localhost",
    "root",
    "",
    "jasa_sewa"
);

// fungsi untuk melakukan eksekusi pada fungsi lain
function execute($sql){
    $mysqli = $GLOBALS['mysqli'];
    // mengambil hasil berdasarkan query yang dimasukkan (insert)
    $hasil = $mysqli->query($sql);
    // menerima data berdasarkan query yang akan ditampilkan (select)
    if(strtoupper(
        substr(
            trim($sql),0,6
        )
    )=="SELECT"){
        // melakukan deteksi eror yang terdapat pada database (mysql)
        if($hasil==false){
            echo "<div><span style=\"color:red\">Terdapat Error:</span><hr><b>".$mysqli->error.'</b><br>Eksekusi :'.$sql.'<hr></div>';
            return [];
        }else{
            return $hasil->fetch_all(MYSQLI_ASSOC);
        }
    }else{
        if($hasil==false){
            echo "<div><span style=\"color:red\">Terdapat Error:</span><hr><b>".$mysqli->error.'</b><br>Eksekusi :'.$sql.'<hr></div>'; 
        }
        return $hasil;
    }
}

// fungsi untuk melakukan input pada form dengan menggunakan template (tipe = text)
function input($data, $label, $index, $tipe="text"){
    $template = '
    <div class="mb-3 row">
        <label for="data_%s" class="col-sm-2" col-form-label">%s
        </label>
        <div class="col-sm-10">
            <input type="%s" class="form-control"
                    id="data_%s"
                    name="data[%s]"
                    value="%s">
        </div>
    </div>
    ';

    // sprintf sebagai fungsi untuk mengeluarkan apa yang menjadi %s pada $template
    return sprintf($template, $index, $label, $tipe, $index, $index, 
                    $data[$index]??'');
}

function textarea($data, $label, $index, $tipe="text"){
    $template = '
    <div class="mb-3 row">
        <label for="data_%s" class="col-sm-2" col-form-label">%s
        </label>
        <div class="col-sm-10">
            <textarea cols="50" rows="10" type="%s" class="form-control"
                    id="data_%s"
                    name="data[%s]"
                    >%s</textarea>
        </div>
    </div>
    ';

    // sprintf sebagai fungsi untuk mengeluarkan apa yang menjadi %s pada $template
    return sprintf($template, $index, $label, $tipe, $index, $index, 
                    $data[$index]??'');
}

function search($data, $index, $tipe="text"){
    $template = '
    <div class="col-xs-2 me-2">
        <input class="form-control" 
            type="%s" 
            id="data_%s"
            name="data[%s]"
            value="%s"
            placeholder="Search" 
            aria-label="Search">
    </div>';
    
    return sprintf($template, $tipe, $index, $index, 
                    $data[$index]??'');
}

function inputdate($data, $label, $index, $tipe="text"){
    $template = '
    <div class="mb-3 row">
        <label for="data_%s" class="col-sm-2" col-form-label">%s
        </label>
        <div class="col-sm-10">
            <input class="span2 datepicker"  size="16"
                    type="%s" class="form-control"
                    id="data_%s"
                    name="data[%s]"
                    value="%s">
            <i class="bi bi-calendar2-event"></i>
            <script>
            $(\'.datepicker\').datepicker({
                \'format\':\'yyyy-mm-dd\'   
            })
            </script>
        </div>
    </div>
    ';

    // sprintf sebagai fungsi untuk mengeluarkan apa yang menjadi %s pada $template
    return sprintf($template, $index, $label, $tipe, $index, $index, 
                    $data[$index]??'');
}

// fungsi untuk melakukan query select pada tabel
function select($namatabel){
    // menampilkan semua isi tabel
    $sql = "SELECT * FROM $namatabel";
    if  (strtoupper(
            substr(
                trim($namatabel),0,6
            )
        )=="SELECT"){
        $sql = $namatabel;
    }
    $data = execute($sql);	
	return $data;
}

// fungsi untuk melakukan query insert dan update
function save($namatabel, $data, $where=''){
    $a = [];
    foreach($data as $field=>$value){
        $a[]=" `$field` = '$value'";
    }
    // query untuk melakukan insert
    $sql = "INSERT INTO $namatabel SET ". join(',',$a);
    if($where!='')
        // query untuk melakukan update
        $sql = "UPDATE $namatabel SET ".join(',',$a)." WHERE $where";
    return execute($sql);
}

// fungsi untuk menjalankan query delete
function delete($namatabel, $where){
    $sql = "DELETE FROM $namatabel WHERE $where";
    execute($sql);
}

// fungsi untuk melakukan pengolahan file gambar dan video
function olahfile($index_file, $folder){
    // melakukan pengecekan pada file yang dimasukkan 
    if(isset($_FILES[$index_file]) 
	     && !$_FILES[$index_file]['error']){
		$file_temp = $_FILES[$index_file]['tmp_name'];
		$file_nama = $folder.'/'.$_FILES[$index_file]['name'];
		move_uploaded_file(
			$file_temp,	
			$file_nama
		);
		$_POST['data'][$index_file]=$file_nama;
	}
}


// fungsi untuk menampilkan tabel
function tabel($header,$data,$pk){
	echo "\r\n<table id=\"tabel-saya\" class=\"display table table-hover\">\r\n";
	echo "<thead>
			<tr>\r\n";
	// echo "\r\n<table class=\"table table-hover\">\r\n";
	// echo "<tr>\r\n";
	echo "<th>No.</th>\r\n";
	foreach($header as $i=>$item){
		if(isset($item['label'])){
			echo "<th>".$item['label']."</th>\r\n";
		}
		else{
			echo "<th>".$item."</th>\r\n";
		}
	}
	echo "<th>Aksi</th>\r\n";
	echo "</tr>\r\n
	</thead>

	<tbody>
	";
	$no=1;
	$modulx = ($_GET['modul']??'');
	foreach($data as $val){
		echo "<tr>\r\n";
		echo "<td>".$no."</td>\r\n";
		$no++;
		foreach($header as $i=>$item){
			if(isset($item['tipe']) && $item['tipe']=='img'){
				echo "<td><img src=\"".$val[$i]."\" style=\"width:100px;\"></td>\r\n";
            }
            elseif(isset($item['tipe']) && $item['tipe']=='video'){
				echo "<td>
                <video autoplay loop muted playsinline width=\"400\">
                    <source src=\"$val[$i]\" type=\"video/mp4\">
                    </td>\r\n
                    </video>"
                    ;
            }else
				echo "<td>".$val[$i]."</td>\r\n";
		}
		echo "<td>
			<a class=\"btn btn-primary\" href=\"?modul=$modulx&act=edit&id=".$val[$pk]."\">
				<i class=\"bi bi-pen\"></i>
			</a>
			<a class=\"btn btn-primary\" href=\"?modul=$modulx&act=delete&id=".$val[$pk]."\">
				<i class=\"bi bi-trash\"></i>
			</a>
			</td>\r\n";
		
		echo "</tr>\r\n";
	}
	echo "</tbody></table>\r\n";
}

// fungsi yang dapat melakukan kontrol atas perintah tambah, edit dan hapus
// dan mengambil qury berdasarkan fungsi yang di panggil
function controller($namatabel, $pk, $namafile){
    $act = $_GET['act']??'';
    $id = $_GET['id']??'';
    $where = '';
    $data = [0=>[]];
    if($id!=''){
        $where = "$pk = $id";
        $data = select("SELECT * FROM $namatabel WHERE $where");
    }
    $modul = ($_GET['modul']??'');
    switch($act){
        case 'add':
        case 'edit' :
            if(isset($_POST['data'])){
                $data_post = $_POST['data'];
                if(save($namatabel,$data_post,$where)){
                    header("Location:?modul=$modul");
                }
                $data[0] = $data_post;
            }
            form($data[0]);
            break;
        case 'delete' :
            if($id!=''){
                delete($namatabel, $where);
                header("Location: ?modul=$modul");
            }
            break;
        default:
            list_film();
            break;
    }
}

?>