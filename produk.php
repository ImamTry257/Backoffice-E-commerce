<div class="col-md-3 produk">
	<h1><b>Data Produk</b></h1>
</div>

<table class="col-md-5 table table-bordered">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Harga</th>
		<th>Berat (gr)</th>
		<th>Foto</th>
		<th>Stok</th>
		<th>Aksi</th>
	</tr>

	<?php 
	$ambilData = $koneksi->query("SELECT * FROM produk"); 
	$x=1;

	while($pecahData = $ambilData->fetch_assoc()){
	?>
		<tr>
			<td><?php echo $x++; ?></td>
			<td><?php echo $pecahData["nama_produk"]; ?></td>
			<td>Rp. <?php echo number_format($pecahData["harga_produk"]); ?></td>
			<td><?php echo $pecahData["berat_produk"];  ?></td>
			<td><a href="dist/foto_produk/<?php echo $pecahData["foto_produk"]; ?>" target=blank><?php echo $pecahData["foto_produk"]; ?></a></td>
			<td>
				<?php echo $pecahData["stok_produk"];  ?>
			</td>
			<td>
				<a href="data.php?halaman=ubah_produk&id=<?php echo $pecahData["id_produk"]; ?>" class="btn btn-primary">Ubah</a> |
				<a href="data.php?halaman=hapus_produk&id=<?php echo $pecahData["id_produk"]; ?>" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
	<?php } ?>
</table>

<div class="col-md-4" >
	<a class="btn btn-primary" href="data.php?halaman=tambah_produk">Tambah Produk</a>
</div>