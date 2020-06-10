<?php
session_start();
if ( empty( $_SESSION['username'] ) AND empty( $_SESSION['password'] ) ) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
    echo '<a href=../../index.php><b>LOGIN</b></a></center>';
} else {
    include '../../../config/koneksi.php';
    include '../../../config/library.php';
    include '../../../config/fungsi_thumb.php';

    $module = $_GET[module];
    $act = $_GET[act];

    // Input soal
    if ( $module == 'tema' AND $act == 'input' ) {
        mysqli_query( $config, "INSERT INTO tbl_tema(tema)
  				VALUES('$_POST[tema]')" );

        header( 'location:../../media.php?module='.$module );
    }
    //Hapus Soal
    elseif ( $module == 'tema' AND $act == 'hapus' ) {
        mysqli_query( $config, "DELETE FROM tbl_tema WHERE id_tema='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
    }
    // Update soal
    elseif ( $module == 'tema' AND $act == 'update' ) {

        mysqli_query( $config, "UPDATE tbl_tema SET
  				tema = '$_POST[tema]' WHERE id_tema='$_POST[id]'" );

        header( 'location:../../media.php?module='.$module );
    }
    //Pengaktifan dan Pengnonaktifan
    elseif ( $module == 'acara' AND $act == 'nonaktif' ) {
        $aktif = 'N';
        mysqli_query( $config, "UPDATE tbl_acara SET status  = '$aktif'  WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    } elseif ( $module == 'acara' AND $act == 'aktif' ) {
        $aktif = 'Y';
        mysqli_query( $config, "UPDATE tbl_acara SET status  = '$aktif'  WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    }

}
?>