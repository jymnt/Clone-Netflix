<?php 

include_once('db_func.php');

if(isset($_SESSION['namaAdmin']) && $_SESSION['namaAdmin']!=''){

}
else{
	login();
}


function login(){
	global $mysqli;
	$pesan = '';
	$data = $_POST['data']??[];
	if(!empty($data)){
		$user= $mysqli->real_escape_string($data['username']);
		$pass= $mysqli->real_escape_string($data['password']);
		$sql = "SELECT * FROM user where (id_user)='$user' 
						and (pass_user)='$pass'";
		$user = select($sql);
			if(count($user)>0){
				if($user[0]['user_group']=='admin' 
				|| $user[0]['user_group'] == 'operator'){
				header('location:?');
				$_SESSION['namaAdmin']=$user[0]['nm_user'];
				$_SESSION['group']=$user[0]['user_group'];
				return;
			}else{
				$pesan = "Masuk pada laman member!";
			}
		}else{
			$pesan = "Anda bukan Admin";
		}

	}
	?>
	<style>

.form-signin {
	  width: 100%;
	  max-width: 30%;
	  padding: 15px;
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
	<div class="card">
	<div style="background-color:black;">
	<center><font size="5" color="grey"><b>ADMIN</b></font><br><center>
		<center><font size="10" color="red"><b>JLIX</b></font><br><center>
		</div>
		<div class="card-body">
		  <form method="post">
			<h1 class="h3 mb-3 fw-normal" style="color:white">Login</h1>
			<?php
                if($pesan!=''){
                   echo "<div class='alert alert-danger'>$pesan</div>";
                }
            ?> 
			<div class="form-floating mt-2">
			  <input name="data[username]" type="text" class="form-control" id="floatingInput" placeholder="akun">
			  <label for="floatingInput">Nama Pengguna</label>
			</div>
			<div class="form-floating mt-2">
			  <input name="data[password]" type="password" class="form-control" id="floatingPassword" placeholder="Password">
			  <label for="floatingPassword">Password</label>
			</div>

			<button class="w-100 btn btn-outline-danger" type="submit">Log in</button>
			<p class="mt-5 mb-3 text-muted">&copy; JLIX <?=date('Y')?></p>
		  </form>
		</div>
	</div>
	</main>
<?php }?>