<?php
require 'function.php';

 $idjadwal = $_GET["id_jadwal"];

if( hapusjadwal ($idjadwal) > 0) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'table_jadwal.php';
			</script>";
}else {
	echo "<script>
		alert('data gagal dihapus!');
		document.location.href = 'ubah_jadwal.php';
		</script>
	";
}

?>