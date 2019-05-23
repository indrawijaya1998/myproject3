<?php
require 'function.php';

 $iduser = $_GET["id_user"];

if( hapususer ($iduser) > 0) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'data_user.php';
			</script>";
}else {
	echo "<script>
		alert('data gagal dihapus!');
		document.location.href = 'data_user.php';
		</script>
	";
}

?>