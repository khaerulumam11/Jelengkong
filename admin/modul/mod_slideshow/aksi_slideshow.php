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
    if ( $module == 'slideshow' AND $act == 'input' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand( 1, 99 );
        $nama_file_unik = $acak.$nama_file;

        // Apabila ada gambar yang diupload
        if ( !empty( $lokasi_file ) ) {
            $vdir_upload = '../../../assets/img/slideshow/';
            $vfile_upload = $vdir_upload . $nama_file_unik;
            move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
            mysqli_query( $config, "INSERT INTO tbl_slideshow(judul,slideshow)
  				VALUES('$_POST[judul]',
             '$nama_file_unik')" );
        } else {
            mysqli_query( $config, "INSERT INTO tbl_slideshow(judul)
  				VALUES('$_POST[judul]')" );
        }
        header( 'location:../../media.php?module='.$module );
    }
    //Hapus Soal
    elseif ( $module == 'slideshow' AND $act == 'hapus' ) {
        mysqli_query( $config, "DELETE FROM tbl_slideshow WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
    }
    // Update soal
    elseif ( $module == 'slideshow' AND $act == 'update' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand( 1, 99 );
        $nama_file_unik = $acak.$nama_file;

        // Apabila gambar tidak diganti
        if ( empty( $lokasi_file ) ) {

            mysqli_query( $config, "UPDATE tbl_slideshow SET
  				judul = '$_POST[judul]',
					 WHERE id='$_POST[id]'" );
        } else {
            $vdir_upload = '../../../assets/img/slideshow/';
            $vfile_upload = $vdir_upload . $nama_file_unik;
            move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
            mysqli_query( $config, "UPDATE tbl_slideshow SET
  				judul = '$_POST[judul]',
					  slideshow = '$nama_file_unik' WHERE id='$_POST[id]'" );
        }
        header( 'location:../../media.php?module='.$module );
    }
    //Pengaktifan dan Pengnonaktifan
    elseif ( $module == 'slideshow' AND $act == 'nonaktif' ) {
        $aktif = 'N';
        mysqli_query( $config, "UPDATE tbl_slideshow SET status  = '$aktif'  WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    } elseif ( $module == 'slideshow' AND $act == 'aktif' ) {
        $aktif = 'Y';
        mysqli_query( $config, "UPDATE tbl_slideshow SET status  = '$aktif'  WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    }

}
?>