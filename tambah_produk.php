<?php 

if(isset($_POST["simpan"])){
	// var_dump($_POST);
	// var_dump($_FILES);
	$nama = $_POST["nama"];
	$harga = $_POST["harga"];
	$berat = $_POST["harga"];
	$stok = $_POST["stok"];
	$deskripsi = $_POST["deskripsi"];

	$nama_foto = $_FILES["foto"]["name"];
	$lokasi = $_FILES["foto"]["tmp_name"];
	$cek = $_FILES["foto"]["error"];

	if($cek != 4){

		move_uploaded_file($lokasi, "foto_produk/".$nama_foto);

		//insert
		$simpanData = $koneksi->query("INSERT INTO produk VALUES (' ','$nama', '$harga', '$berat', '$nama_foto', '$deskripsi', '$stok') ");

		if($simpanData == TRUE){
			echo "
				<script>
					alert('Produk Tersimpan');
					document.location.href='data.php?halaman=produk';
				</script>
			";
		}
	}

}

?>				

				<div class="row">
					<div class="col-md-6 produk">
						<h1><b>Tambah Produk</b></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Nama Produk</label>
								<input class="form-control" type="text" name="nama" required=""></input>
							</div>
							<div class="form-group">
								<label>Harga Produk</label>
								<input class="form-control" type="text" name="harga" required=""></input>
							</div>
							<div class="form-group">
								<label>Berat Produk</label>
								<input class="form-control" type="number" name="berat" required=""></input>
							</div>
							<div class="form-group">
								<label>Stok Produk</label>
								<input class="form-control" type="number" name="stok" required=""></input>
							</div>
							<div class="form-group">
								<label>Foto Produk</label>
								<p style="color: red;">
									<?php
									if(isset($_POST["simpan"])){ 
									//cek apakah ada foto baru atau tidak
									if($cek == 4){ ?>
										<p style="color: red;"><b>Gambar tidak ada!</b></p>		
									<?php }} ?>
								</p>
								<input class="form-control" type="file" name="foto"></input>
							</div>
							<div class="form-group">
								<label>Deskripsi Produk</label>
								<textarea class="form-control" name="deskripsi" rows="7"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
							</div>
						</form>
					</div>
				</div>				
				


