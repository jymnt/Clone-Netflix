<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
	<link href="css/datatables.min.css" rel="stylesheet" type="text/css" />
 
	<style>
		.mybg{
			background-repeat:no-repeat;
			background-size:cover;
		}
	</style>
	
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
	<link rel="shortcut icon" href="gambar/logo.png">
    <title>JLIX| Sewa Film Termurah!</title>
  </head>
  <body class="">
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand" style="color:red" href="mainAdmin.php?"><b>JLIX</b></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon" ></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">	   
			  <?php 
				$tmpl = '
				<li class="nav-item">
				  <a  class="nav-link" href="%s" >%s</a>
				</li>
				';
				foreach($link as $i){
					printf($tmpl,$i['url'],$i['label']);
				}
				if(($_SESSION['namaAdmin']??'')!=''){
				?>
				<li class="nav-item">
				  <a class="nav-link" href="?modul=logout">
					Logout(<?php echo $_SESSION['namaAdmin'];?>)</a>
				</li>
				<?php
				}
				else{
				?>
				<li class="nav-item">
				  <a class="nav-link" href="?modul=loginAdmin">Login</a>
				</li>
				<?php }?>
			  </ul>
			</div>
		  </div>
		</nav>
	<div class="container pt-5">
		<?php echo $content;?>
	</div>
    <script src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/datatables.min.js"></script>
	<script>
	$(document).ready( function () {
		$('#tabel-saya').DataTable({			

		});
	} );
	</script>
  </body>
</html>