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
    if ( $module == 'acara' AND $act == 'input' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand( 1, 99 );
        $nama_file_unik = $acak.$nama_file;

        // Apabila ada gambar yang diupload
        if ( !empty( $lokasi_file ) ) {
            $vdir_upload = '../../../pelukis/assets/img/acara/';
            $vfile_upload = $vdir_upload . $nama_file_unik;
            move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
            mysqli_query( $config, "INSERT INTO tbl_acara(namaAcara,deskripsiAcara,posterAcara,waktuAcara,lokasiAcara,namaPenyelenggara,hargaTiket)
  				VALUES('$_POST[namaAcara]',
					   '$_POST[deskripsiAcara]',
             '$nama_file_unik',
					   '$_POST[waktuAcara]',
					   '$_POST[lokasiAcara]',
					   '$_POST[namaPenyelenggara]',
					   '$_POST[hargaTiket]')" );
        } else {
            mysqli_query( $config, "INSERT INTO tbl_acara(namaAcara,deskripsiAcara,waktuAcara,lokasiAcara,namaPenyelenggara,hargaTiket)
  				VALUES('$_POST[namaAcara]',
					   '$_POST[deskripsiAcara]',
					   '$_POST[waktuAcara]',
					   '$_POST[lokasiAcara]',
					   '$_POST[namaPenyelenggara]',
					   '$_POST[hargaTiket]')" );
        }
        header( 'location:../../media.php?module='.$module );
    }
    //Hapus Soal
    elseif ( $module == 'acara' AND $act == 'hapus' ) {
        mysqli_query( $config, "DELETE FROM tbl_acara WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
    }
    // Update soal
    elseif ( $module == 'acara' AND $act == 'update' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand( 1, 99 );
        $nama_file_unik = $acak.$nama_file;

        // Apabila gambar tidak diganti
        if ( empty( $lokasi_file ) ) {

            mysqli_query( $config, "UPDATE tbl_acara SET
  				namaAcara = '$_POST[namaAcara]',
					  deskripsiAcara = '$_POST[deskripsiAcara]',
					  waktuAcara = '$_POST[waktuAcara]',
					   lokasiAcara = '$_POST[lokasiAcara]',
					   namaPenyelenggara ='$_POST[namaPenyelenggara]',
					   hargaTiket = '$_POST[hargaTiket]' WHERE id='$_POST[id]'" );
        } else {
            $vdir_upload = '../../../pelukis/assets/img/acara/';
            $vfile_upload = $vdir_upload . $nama_file_unik;
            move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
            mysqli_query( $config, "UPDATE tbl_acara SET
  				namaAcara = '$_POST[namaAcara]',
					  deskripsiAcara = '$_POST[deskripsiAcara]',
            posterAcara = '$_POST[posterAcara]',
					  waktuAcara = '$_POST[waktuAcara]',
					   lokasiAcara = '$_POST[lokasiAcara]',
					   namaPenyelenggara ='$_POST[namaPenyelenggara]',
					   hargaTiket = '$_POST[hargaTiket]' WHERE id='$_POST[id]'" );
        }
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