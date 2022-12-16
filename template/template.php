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
			background:url(gambar/bg2.jpg);
			background-repeat:no-repeat;
			background-size:cover;
		}

	</style>
	
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
	<link rel="shortcut icon" href="gambar/logo.png">
    <title>JLIX| Sewa Film Termurah!</title>
  </head>
  <body class="mybg">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-black">
		  <div class="container-fluid">
			<a class="navbar-brand" style="color:red" href="main.php?"><b>JLIX</b></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon" ></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">	   
			  <?php 
				$tmpl2 = '
				<li class="nav-item" style="color:red">
				  <a  class="nav-link" href="%s" >%s</a>
				</li>
				';
				foreach($link as $i){
					printf($tmpl2,$i['url'],$i['label']);
				}
				if(($_SESSION['namaUser']??'')!=''){
				?>
				</ul>
				<li class="nav-item">
				  <a class="nav-link" href="?modul=signout">
					signout(<?php echo $_SESSION['namaUser'];?>)</a>
				</li>
				<?php
				}
				else{
				?>
				<li class="nav-item">
				  <a class="nav-link" href="?modul=signin">Sign In</a>
				</li>
				<?php }?>
			  </ul>
			  <form action="?modul=found" class="d-flex" method="post">
				<?=search([],'judul')?>
				<button class="btn btn-outline-danger" name="search" type="submit">Search</button>
			</form> <br>
			</div>
		  </div>
		</nav>
	<div class="container pt-5">
		<?php echo $content;?>
	</div>
    <script src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/datatables.min.js"></script>
  </body>
</html>