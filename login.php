<?php
if(isset($_POST["login"])){

	$username = $_POST["nama"];
	$pass = $_POST["password"];
	$pass2 = $_POST["confrim_password"];

	if($pass == $pass2){
		$cekNama = $koneksi->query("SELECT * FROM admin WHERE username = '$username' ");
		$cek = $cekNama->num_rows;

		$_SESSION["admin"] = $cekNama->fetch_assoc();

		if($cek == 1){
			echo "
				<script>
					alert('Selamat Datang');
					location='index.php?halaman=home';
				</script>
			";
		}
	}

}

?>



<div class="row">
	<div class="col-md-12 tombol">
		<?php if($_GET["halaman"] == 'login'){ ?>
			<a href="intro.php?halaman=signUp" class="col-md-4 col-md-push-2 tombol_signUp_nonActive">Sign Up</a>
			<a href="intro.php?halaman=login" class="col-md-4 col-md-push-2 tombol_login_active">Login</a>
		<?php } ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2><b>Admin BelanjaYuk</b></h2>
	</div>
</div>
<form action="" method="post">
	<div class="row">
		<div class="col-md-12 input">
			<input type="text" class="col-md-8 col-md-push-2" placeholder="Nama" name="nama" autofocus="" required="">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 input">
			<input type="password" class="col-md-8 col-md-push-2" placeholder="Password" name="password" required="">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 input">
			<?php 
			if(isset($_POST["login"])){
				if($pass != $pass2){?>
					<p style="color: red;">Konfrim Password tidak sama!</p>
				<?php }
			}
			?>
			<input type="password" class="col-md-8 col-md-push-2" placeholder="Konfrim Password" name="confrim_password" required="">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 start">
			<button type="submit" class="col-md-8 col-md-push-2" name="login">LOGIN</button>		
		</div>
	</div>
</form>