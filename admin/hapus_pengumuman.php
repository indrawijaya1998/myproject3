<?php
require 'function.php';

 $idpengumuman = $_GET["id_pengumuman"];

if( hapuspengumuman ($idpengumuman) > 0) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'table_pengumuman.php';
			</script>";
}else {
	echo "<script>
		alert('data gagal dihapus!');
		document.location.href = 'table_pengumuman.php';
		</script>
	";
}

?>