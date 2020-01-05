		

				<?php if(!isset($_POST["signUp"])){ ?>				
				<div class="row">
					<div class="col-md-12 tombol">
						<?php if($_GET["halaman"] == 'signUp'){ ?>
							<a href="intro.php?halaman=signUp" class="col-md-4 col-md-push-2 tombol_signUp_active">Sign Up</a>
							<a href="intro.php?halaman=login" class="col-md-4 col-md-push-2 tombol_login_nonActive">Login</a>
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2><b>Admin BelanjaYuk</b></h2>
					</div>
				</div>
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12 input">
							<input type="text" class="col-md-8 col-md-push-2" placeholder="Nama Lengkap" name="nama" required=""></input>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 input">
							<?php 
							if(isset($_POST["signUp"])){
								if($cek == 1){ ?>
									<p style="color: red;">Username sudah terdaftar</p>
								<?php }
							}
							?>
							<input type="text" class="col-md-8 col-md-push-2" placeholder="Username" name="username" required=""></input>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 input">
							<input type="password" class="col-md-8 col-md-push-2" placeholder="Password" name="password" required=""></input>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 input">
							<?php 
							if(isset($_POST["signUp"])){
								if($error == 4){ ?>
									<p style="color: red;">Gambar tidak ada</p>
								<?php }
							}
							?>
							<input type="file" class="col-md-8 col-md-push-2" placeholder="Foto anda" name="foto"></input>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 start">
							<button type="submit" class="col-md-8 col-md-push-2" name="signUp">SIGN UP</button>
						</div>
					</div>
				</form>

				<!-- jika tombol signUp ditekan -->
				<?php }elseif(isset($_POST["signUp"])){


						$nama = $_POST["nama"];
						$username = $_POST["username"];
						$password = $_POST["password"];

						$nama_foto = $_FILES["foto"]["name"];
						$lokasi = $_FILES["foto"]["tmp_name"];
						$error = $_FILES["foto"]["error"];

						//cek email, apakah sudah terdaftar belum
						$cekUsername = $koneksi->query("SELECT * FROM admin WHERE username = '$username'");

						$cek = $cekUsername->num_rows;


						//jika belum
						if($cek == 0){
	
							if($error == 0){

								//tambahkan kolom gambar ditambah
								move_uploaded_file($lokasi, "foto_produk/".$nama_foto);

								$masukkanData = $koneksi->query("INSERT INTO admin VALUES ('','$username', '$password', '$nama', '$nama_foto') ");
								var_dump($masukkanData);
								if($masukkanData == TRUE){
									echo "
										<script>
											alert('Selamat Anda sudah terdaftar');
											location='intro.php?halaman=login';
										</script>
									";
								}
							}
						
						//jika username sudah terdaftar
						}elseif($cek == 1){ 
							$_SESSION["daftar_admin"] = $_POST;
						?>
							<div class="row">
								<div class="col-md-12 tombol">
									<?php if($_GET["halaman"] == 'signUp'){ ?>
										<a href="intro.php?halaman=signUp" class="col-md-4 col-md-push-2 tombol_signUp_active">Sign Up</a>
										<a href="intro.php?halaman=login" class="col-md-4 col-md-push-2 tombol_login_nonActive">Login</a>
									<?php } ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h2><b>Sign Up for Free</b></h2>
								</div>
							</div>
							<form method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12 input">
										<input type="text" class="col-md-8 col-md-push-2" placeholder="Nama Lengkap" name="nama" value="<?php echo $_SESSION["daftar_admin"]["nama"]; ?>"></input>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 input">
										<?php 
										if(isset($_POST["signUp"])){
											if($cek == 1){ ?>
												<p style="color: red;">Username sudah terdaftar</p>
											<?php }
										}
										?>
										<input type="text" class="col-md-8 col-md-push-2" placeholder="Username" name="username" required=""></input>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 input">
										<input type="password" class="col-md-8 col-md-push-2" placeholder="Password" name="password" value="<?php echo $_SESSION["daftar_admin"]["password"]; ?>"></input>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 input">
										<?php 
										if(isset($_POST["signUp"])){
											if($error == 4){ ?>
												<p style="color: red;">Gambar tidak ada</p>
											<?php }
										}
										?>
										<input type="file" class="col-md-8 col-md-push-2" placeholder="Foto anda" name="foto"></input>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 start">
										<button type="submit" class="col-md-8 col-md-push-2" name="signUp">GET STARTED</button>
									</div>
								</div>
							</form>
						<?php }

				} ?>	



