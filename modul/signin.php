<?php 

include_once('db_func.php');

if(isset($_SESSION['namaUserUser']) && $_SESSION['namaUser']!=''){
	header('location:?');
}
else{
	login();
}


function login(){
	global $mysqli;
	$data = $_POST['data']??[];
	$pesan = '';
	if(!empty($data)){
		$user= $mysqli->real_escape_string($data['username']);
		$pass= $mysqli->real_escape_string($data['password']);
		$sql = "SELECT * FROM pelanggan where (id_user)='$user' 
						and (pass_user)='$pass'";
		$user = select($sql);
		if(count($user)>0){
			if($user[0]['user_group']=='member' 
				|| $user[0]['user_group'] == 'operator'){
			header('location:?');
			$_SESSION['namaUser']=$user[0]['nm_user'];
			$_SESSION['group']=$user[0]['user_group'];
			return;
			}else{
				$pesan = "Selesaikan pembayaran terlebih dahulu!";
			}
		}else{
			$pesan = "Anda bukan member silahkan langganan!";
		}
	} 
	?>
	<style>

	.form-signin {
	  width: 100%;
	  max-width: 30%;
	  padding: 15px;
	  margin: auto;
	  /* background-color:#9B0000; */
	  background-image: linear-gradient(rgba(2,0,0,255),rgba(255,0,0,255), 
	  rgba(2,0,0,255),rgba(2,2,2,2), rgba(255,0,0,5));
}
	  margin: auto;
	}

	.form-signin .checkbox {
	  font-weight: 400;
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
	<div class="card mt-3">
		<div class="card-body" style="background-color:#890F0D; ">
		  <form method="post">
		  <center><h1 class="h3 fw-normal" style="color:white"><b>Sign In</b></h1></center>
		  <?php
                if($pesan!=''){
                   echo "<div class='alert alert-danger'>$pesan</div>";
                }
            ?> 
			<div class="form-floating mt-2">
			  <input name="data[username]" type="text" class="form-control" id="floatingInput" placeholder="akun">
			  <label for="floatingInput">username</label>
			</div>
			<div class="form-floating mt-2">
			  <input name="data[password]" type="password" class="form-control" id="floatingPassword" placeholder="Password">
			  <label for="floatingPassword">password</label>
			</div>

			<button class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
			<p class="mt-2" style="color:white">
				Belum berlangganan? <a href="?modul=pesan">langganan disini!</a>
			</p>
			<p class="mt-5 mb-3 text-muted">&copy; JLIX <?=date('Y')?></p>
		  </form>
		</div>
	</div>
	</main>
<?php }?>
