<?php
require 'function.php';

 $idujian = $_GET["id_jadwal_ujian"];

if( hapusujian ($idujian) > 0) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'table_ujian.php';
			</script>";
}else {
	echo "<script>
		alert('data gagal dihapus!');
		document.location.href = 'table_ujian.php';
		</script>
	";
}

?>