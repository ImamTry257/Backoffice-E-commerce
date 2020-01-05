<?php 

$id_pembelian = $_GET["id"];

$ambilData = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE id_pembelian = $id_pembelian ");

$dataPecah = $ambilData->fetch_assoc();


?>				
			
				<div class="col-md-5 produk">
					<h1><b>Detail Pembelian</b></h1>
					<h4>Nama Pembeli : <?php echo $dataPecah["nama_pelanggan"]; ?></h4>
					<h4>Email : <?php echo $dataPecah["email_pelanggan"]; ?></h4>
				</div>
				<table class="col-md-7 table table-bordered">
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah Pembelian</th>
						<th>Subharga</th>
					</tr>

					<?php 
					
					$x = 1;

					$ambilData2 = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = $id_pembelian ");

					while($pecahData = $ambilData2->fetch_assoc()){
						// var_dump($pecahData["id_produk"]);
						$id_produk = $pecahData["id_produk"];
						$ambilData3 = $koneksi->query("SELECT * FROM produk WHERE id_produk = $id_produk ");
						
						while($pecahData2 = $ambilData3->fetch_assoc()){
							$total_pembelian = 0;
							$subharga_pembelian = $pecahData2["harga_produk"]*$pecahData["jumlah"];
					?>

						<tr>
							<td><?php echo $x++; ?></td>
							<td><?php echo $pecahData2["nama_produk"]; ?></td>
							<td>Rp. <?php echo number_format($pecahData2["harga_produk"]); ?></td>
							<td><?php echo $pecahData["jumlah"]; ?></td>
							<td>Rp. <?php echo number_format($subharga_pembelian); ?></td>
						</tr>
						<?php
						}
					}
					?>
					
				</table>
				<div class="col-md-4" >
					<a class="btn btn-primary" href="data.php?halaman=pembelian">Kembali</a>
				</div>	