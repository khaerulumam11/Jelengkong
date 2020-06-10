<?php
include '../config/koneksi.php';
$id = $_GET['id'];
if ($deleted = mysqli_query( $config, "DELETE FROM tbl_portofolio WHERE id='$id'")){
    echo '<script language="javascript">
	alert("Data Portofolio Berhasil DiHapus");
	window.location="index.php";
	</script>';
}
?>