<?php 
$id = $_GET["id"];
$hapusData = $koneksi->query("DELETE FROM produk WHERE id_produk = '$id' ");

if($hapusData == TRUE){
	echo "
		<script>
			alert('Produk Terhapus');
			document.location.href='data.php?halaman=produk';
		</script>
	";
}
?>