				<div class="col-md-5 produk">
					<h1><b>Data Pelanggan</b></h1>
				</div>
				<table class="col-md-7 table table-bordered">
					<tr>
						<th>No</th>
						<th>Email</th>
						<th>Nama</th>
						<th>Telepon</th>
						<th>Aksi</th>
					</tr>

					<?php 

					$ambilData = $koneksi->query("SELECT * FROM pelanggan");

					$x = 1;
					while($pecahData = $ambilData->fetch_assoc()){
					?>

					<tr>
						<td><?php echo $x++; ?></td>
						<td><?php echo $pecahData["email_pelanggan"]; ?></td>
						<td><?php echo $pecahData["nama_pelanggan"]; ?></td>
						<td><?php echo $pecahData["telepon_pelanggan"]; ?></td>
						<td>
							<a href="index.php?halaman=hapus_pelanggan&id=<?php echo $pecahData["id_pelanggan"]; ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					<?php } ?>	
				</table>