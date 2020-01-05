				<div class="row">
					<div class="col-md-3 produk">
						<h1><b>Ubah Produk</b></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<?php 
						$id_produk =  $_GET["id"];
						// var_dump($id_produk);

						$ambilData = $koneksi->query("SELECT * FROM produk WHERE id_produk = $id_produk "); 

						$pecahData = $ambilData->fetch_assoc();

						?>

						
						<form accept="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Nama Produk</label>
								<input class="form-control" type="text" value="<?php echo $pecahData["nama_produk"]; ?>" name="nama"></input>
							</div>
							<div class="form-group">
								<label>Harga Produk</label>
								<input class="form-control" type="text" value="<?php echo $pecahData["harga_produk"]; ?>" name="harga"></input>
							</div>
							<div class="form-group">
								<label>Berat Produk</label>
								<input class="form-control" type="number" value="<?php echo $pecahData["berat_produk"]; ?>" name="berat"></input>
							</div>
							<div class="form-group">
								<label>Stok Produk</label>
								<input class="form-control" type="number" value="<?php echo $pecahData["stok_produk"]; ?>" name="stok"></input>
							</div>
							<div class="form-group">
								<label>Foto Produk</label>
								<div>
									<input type="hidden" name="foto_lama" value="<?php echo $pecahData["foto_produk"]; ?>"></input>
									<img src="dist/foto_produk/<?php echo $pecahData["foto_produk"]; ?>" width="200">
								</div>
								<input class="form-control" type="file" name="foto_baru"></input>
							</div>
							<div class="form-group">
								<label>Deskripsi Produk</label>
								<textarea class="form-control" name="deskripsi" rows="7"><?php echo $pecahData["deskripsi_produk"]; ?></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
							</div>
						</form>
					</div>
				</div>				
				


<?php 

if(isset($_POST["simpan"])){
	var_dump($_POST);
	var_dump($_FILES);

	$id_produk = $_GET["id"];
	$nama = $_POST["nama"];
	$harga = $_POST["harga"];
	$berat = $_POST["berat"];
	$stok = $_POST["stok"];
	$deskripsi = $_POST["deskripsi"];
	$foto_lama = $_POST["foto_lama"];

	$foto_baru = $_FILES["foto_baru"]["name"];
	$lokasi = $_FILES["foto_baru"]["tmp_name"];
	$cek = $_FILES["foto_baru"]["error"];

	//cek apakah ada foto baru atau tidak
	if($cek == 4){
		$foto_baru = $foto_lama;
	}

	//upload file
	move_uploaded_file($lokasi, "foto_produk/".$foto_baru);

	//update
	$simpanData = $koneksi->query("UPDATE produk SET 
		nama_produk = '$nama',
		harga_produk = '$harga',
		berat_produk = '$berat',
		foto_produk = '$foto_baru',
		deskripsi_produk = '$deskripsi',
		stok_produk = '$stok'
		WHERE id_produk = $id_produk
		");

	if($simpanData == TRUE){
		echo "
			<script>
				alert('Produk Tersimpan');
				document.location.href='data.php?halaman=produk';
			</script>
		";
	}

}




?>