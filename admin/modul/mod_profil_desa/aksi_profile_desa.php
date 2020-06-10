<?php
session_start();
if ( empty( $_SESSION['username'] ) AND empty( $_SESSION['passuser'] ) ) {
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
    if ( $module == 'profile_desa' AND $act == 'tambah' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand( 1, 99 );
        $nama_file_unik = $acak.$nama_file;

        // Apabila ada gambar yang diupload
        if ( !empty( $lokasi_file ) ) {
            $vdir_upload = '../assets/img/profil_desa/';
            $vfile_upload = $vdir_upload . $fupload_name;
            move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
            mysqli_query( $config, "INSERT INTO tbl_profil_desa(namaDesa,alamatDesa,emailDesa,noTelp,deskripsiDesa,namaKepalaDesa,sambutanKades,fotoKades)
  				VALUES('$_POST[namaDesa]',
					   '$_POST[alamatDesa]',
					   '$_POST[emailDesa]',
					   '$_POST[telpDesa]',
					   '$_POST[deskripsiDesa]',
					   '$_POST[namaKades]',
             	'$_POST[sambutanKades]',
                       '$nama_file_unik'
                      )" );
        } else {
            mysqli_query( $config, "INSERT INTO tbl_profil_desa(namaDesa,alamatDesa,emailDesa,noTelp,deskripsiDesa,namaKepalaDesa,sambutanKades)
  				VALUES('$_POST[namaDesa]',
					   '$_POST[alamatDesa]',
					   '$_POST[emailDesa]',
					   '$_POST[telpDesa]',
					   '$_POST[deskripsiDesa]',
					   '$_POST[namaKades]',
             	'$_POST[sambutanKades]'
                      )" );
        }
        header( 'location:../../media.php?module='.$module );
    }
    //Hapus Soal
    elseif ( $module == 'soal' AND $act == 'hapus' ) {
        mysqli_query( $config, "DELETE FROM tbl_soal WHERE id_soal='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
    }
    // Update soal
    elseif ( $module == 'profile_desa' AND $act == 'edit' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand( 1, 99 );
        $nama_file_unik = $acak.$nama_file;

        // Apabila gambar tidak diganti
        if ( empty( $lokasi_file ) ) {
            mysqli_query( $config, "UPDATE tbl_profil_desa SET namaDesa = '$_POST[namaDesa]',
					   alamatDesa = '$_POST[alamatDesa]',
					   emailDesa = '$_POST[emailDesa]',
					   noTelp = '$_POST[telpDesa]',
					   deskripsiDesa = '$_POST[deskripsiDesa]',
					   namaKepalaDesa = '$_POST[namaKades]',
             sambutanKades = '$_POST[sambutanKades]'
                             WHERE id   = '$_POST[id]'" );
        } else {
            $vdir_upload = '../assets/img/profil_desa/';
            $vfile_upload = $vdir_upload . $fupload_name;
            move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
            mysqli_query( $config, "UPDATE tbl_profil_desa SET namaDesa = '$_POST[namaDesa]',
					   alamatDesa = '$_POST[alamatDesa]',
					   emailDesa = '$_POST[emailDesa]',
					   noTelp = '$_POST[telpDesa]',
					   deskripsiDesa = '$_POST[deskripsiDesa]',
					   namaKepalaDesa = '$_POST[namaKades]',
             sambutanKades = '$_POST[sambutanKades]',
             fotoKades = '$nama_file_unik'
                             WHERE id   = '$_POST[id]'" );
        }
        header( 'location:../../media.php?module='.$module );
    }
    //Pengaktifan dan Pengnonaktifan
    elseif ( $module == 'soal' AND $act == 'nonaktif' ) {
        $aktif = 'N';
        mysqli_query( $config, "UPDATE tbl_soal SET aktif  = '$aktif'  WHERE id_soal='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    } elseif ( $module == 'soal' AND $act == 'aktif' ) {
        $aktif = 'Y';
        mysqli_query( $config, "UPDATE tbl_soal SET aktif  = '$aktif'  WHERE id_soal='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    }

}
?>