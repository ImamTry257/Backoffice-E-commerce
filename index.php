<?php
// $koneksi = new mysqli("localhost","root","","trainittoko");
require 'koneksi.php';

$koneksi = koneksi();

ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

session_start();

if(!isset($_SESSION["admin"])){
	// var_dump($_SESSION["admin"]);
	echo "
		<script>
			alert('Silahkan Login!');
			location='intro.php?halaman=login';
		</script>
		";
}else{
	if(!isset($_GET["halaman"])){
	// var_dump($_SESSION["admin"]);
	echo "
			<script>
				location='index.php?halaman=home';
			</script>
		";
	}

	
}


?>




<!DOCTYPE html>
<html>
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

	<?php if($_GET["halaman"] == 'home'){ ?>
    <title>Home</title>
    <?php }elseif($_GET["halaman"] == 'pelanggan'){ ?>
    <title>Data Pelanggan</title>
    <?php }elseif($_GET["halaman"] == 'detail_pembelian'){ ?>
    <title>Detail Pembelian</title>
    <?php }?>

	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/css/utama2.css">
	
	<!-- tambahkan ini supaya icon dapat tampil -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	
</head>
<body>
<div class="body">

<!-- <div class="wrapper"> -->
	<nav class="row header-admin">
		<div class="container">
			<div class="">
				<div class="col-md-12">
					<ul class="navbar-nav ul">
						<li class="col-md-2 dodolanyuk"><a href="#" class="judul"><h2>Admin-DodolanYuk</h2></a></li>		
						<!-- <li class="col-md-4 col-md-push-6 tanggal tanggal_pukul"></li> -->
						<li class="dropdown li col-md-2 col-md-push-9">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img src="dist/foto_produk/<?php echo $_SESSION["admin"]["foto_admin"]; ?>" width="50" class="img-circle"><?php echo $_SESSION["admin"]["nama_lengkap"]; ?> <span class="caret"></span>
							</a>

							<ul class="dropdown-menu anak-akunAnda">
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>


	<aside class="row">
		<div class="sidebar col-sm-2">
			<ul class="menu-content">
				<li>
					<a href="index.php?halaman=home"> <i class="fa fa-home"></i> <span>Home</span></a>
				</li>
				<li>
					<a href="data.php?halaman=produk" class="dataMaster"> <i class="fa fa-cube"></i>  Produk </a>
				</li>
				<li>
					<a href="data.php?halaman=pembelian"><i class="fa fa-shopping-basket"></i> <span>Pembelian</span></a>
				</li>
				<li>
					<a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> <span>Pelanggan</span></a>
				</li>
			</ul>
		</div>
		<div class="inner col-sm-10">
			<?php if($_GET["halaman"] == 'home'){
				include 'selamatDatang.php';
			}elseif($_GET["halaman"] == 'pelanggan'){
				include 'pelanggan.php';
			}elseif($_GET["halaman"] == 'hapus_pelanggan'){
				include 'hapus_pelanggan.php';
			}elseif($_GET["halaman"] == 'detail_pembelian'){
				include 'index_detail_pembelian.php';
			} ?>
		</div>
	</aside>
</div>

<footer class="footer">
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12 tulisan">
					<p class="text-center"><i class="far fa-copyright"></i> Copyright 2018 | Imam Try Wibowo. All Right Reserved</p>
				</div>	
			</div>
		</div>
	</div>
</footer>

<!-- jquery.min.js wajib agar bootstrap.min.js dapat bekerja -->
<script src="dist/js/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<?php if($_GET["halaman"] == "home"){ ?>
	<script src="dist/js/admin.js"></script>
<?php }?>

</body>
</html>