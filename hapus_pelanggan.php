<?php 

$id = $_GET["id"];

$hapusData = $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id' ");
var_dump($hapusData);

if($hapusData == TRUE){
	echo "
		<script>
			alert('Pelanggan Terhapus');
			document.location.href='index.php?halaman=pelanggan';
		</script>
	";
}


?>
