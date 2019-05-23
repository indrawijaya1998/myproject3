<?php
require 'function.php';

 $idbiaya = $_GET["id_biaya"];

if( hapusbiaya ($idbiaya) > 0) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'table_biaya.php';
			</script>";
}else {
	echo "<script>
		alert('data gagal dihapus!');
		document.location.href = 'table_biaya.php';
		</script>
	";
}

?>