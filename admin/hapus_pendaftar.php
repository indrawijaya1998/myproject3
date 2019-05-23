<?php
require 'function.php';

 $iduser = $_GET["id_user"];

if( hapuspendaftar ($iduser) > 0) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'table_pendaftar.php';
			</script>";
}else {
	echo "<script>
		alert('data gagal dihapus!');
		document.location.href = 'table_pendaftar.php';
		</script>
	";
}

?>