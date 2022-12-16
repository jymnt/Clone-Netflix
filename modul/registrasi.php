<?php 

include_once('db_func.php');

registrasi();

function registrasi(){
	global $mysqli;
    $msg = '';
	$data = $_POST['data']??[];
	if(!empty($data)){
        $confirm = $_POST['pass_user']??'';
        if($confirm == $data['pass_user']){
            $msg =  'Anda Berhasil Masuk';
            $data['user_group']='anonym';
            if($data['id_user']&&$data['nm_user']&&$data['email_user']
					&& $data['pass_user'] != ''){
                // save('user',$data);
				save('pelanggan',$data);
                header("location:?modul=pesan2");
            }else{
                $msg = "Pastikan semua data terisi";
            }
        }else{
            $msg =  'Konfirmasi Password berbeda';
        }
	}
	?> 
	<style>

html, body{
    height: 100px;

    }

	.form-signin {
	  width: 100%;
	  max-width: 80%;
	  padding: 25px;
	  /* background-color:#9B0000; */
	  background-image: linear-gradient(rgba(2,0,0,255),rgba(255,0,0,255), 
	  rgba(2,0,0,255),rgba(2,2,2,2), rgba(255,0,0,5));
}
	  margin: auto;
	}

	.form-signin .form-floating:focus-within {
	  z-index: 2;
	}

	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	</style>
	<main class="form-signin">
	<div class="card" style="background-color:#890F0D;">
		<div class="card-body">
		  <form method="post">
			<center><h1 style="color:white" 
			class="h3 mb-3 fw-normal"><b>Pendaftaran Member</b></h1><center>
            <?php
                if($msg!=''){
                   echo "<div class='alert alert-danger'>$msg</div>";
                }
            ?> 
            <div class="form-floating mt-2">
			  <input name="data[nm_user]" type="text" class="form-control" id="floatingNama" placeholder="nama">
			  <label for="floatingNama">Nama</label>
			</div>
			<div class="col-md">
				<div class="form-floating mt-2">
					<input name="data[email_user]" type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com">
					<label for="floatingInputGrid">Email address</label>
				</div>
			</div>
			<div class="form-floating mt-2">
			  <input name="data[id_user]" type="text" class="form-control" id="floatingInput" placeholder="akun">
			  <label for="floatingInput1">username</label>
			</div>
			
            <div class="form-floating mt-2">
			  <input name="data[pass_user]" type="password" class="form-control" id="floatingPass" placeholder="Password">
			  <label for="floatingPass">Password</label>
			</div>
            <div class="form-floating mt-2">
			  <input name="pass_user" type="password" class="form-control" id="floatingPass2" placeholder="Password">
			  <label for="floatingPass2">Konfirmasi Password</label>
			</div>

			<button class="w-100 btn btn-lg btn-dark" type="submit">Registrasi</button>
			<p class="mt-5 mb-3 text-muted">&copy;JLIX <?=date('Y')?></p>
		  </form>
		</div>
	</div>
	</main>
<?php }?>