<?php

// $koneksi = new mysqli("localhost","root","","trainittoko");
require 'koneksi.php';

$koneksi = koneksi();

// var_dump($_SESSION["admin"]);

ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

session_start();

if(!isset($_GET["halaman"]) || $_GET["halaman"] == NULL){
	echo "
		<script>
			location='intro.php?halaman=login';
		</script>
	";
}else{
	if(isset($_SESSION["admin"])){
		// var_dump($_SESSION["admin"]);
		echo "
			<script>
				alert('Anda Sudah Login!');
				location='index.php?halaman=home';
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
  	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="DY/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="DY/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="DY/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="DY/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="DY/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="DY/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="DY/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="DY/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="DY/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="DY/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="DY/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="DY/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="DY/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="DY/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="DY/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="DY/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="DY/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="DY/mstile-310x310.png" />
	
  	<?php if($_GET["halaman"] == 'signUp'){ ?>
		<title>Sign Up</title>
	<?php }elseif($_GET["halaman"] == 'login'){ ?>
		<title>Login</title>
	<?php }?>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/css/intro.css">
	
	<!-- tambahkan ini supaya icon dapat tampil -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	
</head>
<body class="body">


<div class="container login">	
	<div class="row">
		<div class="container">
		<?php if($_GET["halaman"] == 'signUp'){ ?>
			<div class="content_signUp col-md-6 col-md-push-3">
		<?php }elseif($_GET["halaman"] == 'login'){ ?>
			<div class="content_login col-md-6 col-md-push-3">
		<?php }elseif($_GET["halaman"] == 'reset_pass'){ ?>
			<div class="content_reset_pass col-md-6 col-md-push-3">
		<?php } ?>
				<?php if($_GET["halaman"] == 'signUp'){
					include 'signUp.php';
				}elseif($_GET["halaman"] == 'login'){
					include 'login.php';
				}elseif($_GET["halaman"] == 'reset_pass'){
					include 'reset_pass.php';
				}else{
					echo "
						<script>
							location='intro.php?halaman=signUp';
						</script>
					";
				} ?>
			</div>			
		</div>
	</div>
</div>

<footer>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="text-center"><i class="far fa-copyright"></i> Copyright 2018 | Imam Try Wibowo. All Right Reserved</p>
				</div>	
			</div>
		</div>
	</div>
</footer>



<!-- jquery.min.js wajib agar bootstrap.min.js dapat bekerja -->
<script src="dist/js/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- <script src="dist/js/admin.js"></script> -->
</body>
</html>