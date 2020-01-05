<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
 
session_start();

unset($_SESSION["admin"]);
session_destroy();

echo "
	<script>
		alert('Terimakasih');
		location='intro.php?halaman=login';
	</script>
";




?>