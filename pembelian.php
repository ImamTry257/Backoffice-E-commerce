				<div class="col-md-5 produk">
					<h1><b>Data Pembelian</b></h1>
				</div>
				<table class="col-md-7 table table-bordered">
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>

					<?php 
					$ambilData = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");

					$x=1;

					while($pecahData = $ambilData->fetch_assoc()){ 
					?>

					<tr>
						<td><?php echo $x++; ?></td>
						<td><?php echo $pecahData["nama_pelanggan"]; ?></td>
						<td><?php echo $pecahData["tanggal_pembelian"]; ?></td>
						<td>Rp. <?php echo number_format($pecahData["total_pembelian"]); ?></td>
						<td>
							<a href="data.php?halaman=detail_pembelian&id=<?php echo $pecahData["id_pembelian"]; ?>" class="btn btn-primary">Detail</a>
						</td>
					</tr>
					<?php } ?>
					
				</table>