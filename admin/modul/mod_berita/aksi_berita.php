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
    if ( $module == 'berita' AND $act == 'input' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];

        $lokasi_file_2    = $_FILES['fupload2']['tmp_name'];
        $tipe_file_2    = $_FILES['fupload2']['type'];
        $nama_file_2      = $_FILES['fupload2']['name'];

        $lokasi_file_3    = $_FILES['fupload3']['tmp_name'];
        $tipe_file_3      = $_FILES['fupload3']['type'];
        $nama_file_3      = $_FILES['fupload3']['name'];

        $lokasi_file_video    = $_FILES['fvideo']['tmp_name'];
        $tipe_file_video      = $_FILES['fvideo']['type'];
        $nama_file_video      = $_FILES['fvideo']['name'];

        $acak           = rand( 1, 99 );

        $nama_file_unik = $acak.$nama_file;
        $nama_file_unik_2 = $acak.$nama_file_2;
        $nama_file_unik_3 = $acak.$nama_file_3;
        $nama_file_unik_video = $acak.$nama_file_video;

        // Apabila ada gambar yang diupload
        if ( !empty( $lokasi_file ) ) {
            $vdir_upload = '../../../assets/img/berita/thumbnail/';
            $vfile_upload = $vdir_upload . $nama_file_unik;

            if ( !empty( $lokasi_file_2 ) && !empty( $lokasi_file_3 ) ) {
                $vdir_upload_2 = '../../../assets/img/berita/gambar/';
                $vfile_upload_2 = $vdir_upload_2 . $nama_file_unik_2;

                $vdir_upload_3 = '../../../assets/img/berita/gambar/';
                $vfile_upload_3 = $vdir_upload_3 . $nama_file_unik_3;

                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
                move_uploaded_file( $_FILES['fupload2']['tmp_name'], $vfile_upload_2 );
                move_uploaded_file( $_FILES['fupload3']['tmp_name'], $vfile_upload_3 );
                mysqli_query( $config, "INSERT INTO tbl_berita(judulBerita,isiBerita,gambarPertama,gambarKedua,gambarKetiga,kategori,typeBerita)
  				VALUES('$_POST[judulBerita]',
					   '$_POST[isiBerita]',
             '$nama_file_unik',
             '$nama_file_unik_2',
             '$nama_file_unik_3',
					   '$_POST[pilihan_kategori_berita]',
					   '$_POST[pilihan_tipe_berita]')" );
            } else if ( !empty( $lokasi_file_2 ) ) {

                $vdir_upload_2 = '../../../assets/img/berita/gambar/';
                $vfile_upload_2 = $vdir_upload_2 . $nama_file_unik_2;

                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
                move_uploaded_file( $_FILES['fupload2']['tmp_name'], $vfile_upload_2 );
                mysqli_query( $config, "INSERT INTO tbl_berita(judulBerita,isiBerita,gambarPertama,gambarKedua,kategori,typeBerita)
  				VALUES('$_POST[judulBerita]',
					   '$_POST[isiBerita]',
             '$nama_file_unik',
             '$nama_file_unik_2',
					   '$_POST[pilihan_kategori_berita]',
					   '$_POST[pilihan_tipe_berita]')" );

            } else if ( !empty( $lokasi_file_3 ) ) {
                $vdir_upload_3 = '../../../assets/img/berita/gambar/';
                $vfile_upload_3 = $vdir_upload_3 . $nama_file_unik_3;

                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );

                move_uploaded_file( $_FILES['fupload3']['tmp_name'], $vfile_upload_3 );
                mysqli_query( $config, "INSERT INTO tbl_berita(judulBerita,isiBerita,gambarPertama,gambarKetiga,kategori,typeBerita)
  				VALUES('$_POST[judulBerita]',
					   '$_POST[isiBerita]',
             '$nama_file_unik',
             '$nama_file_unik_3',
					   '$_POST[pilihan_kategori_berita]',
					   '$_POST[pilihan_tipe_berita]')" );
            } else if ( !empty( $lokasi_file_video ) ) {
                $vdir_upload_video = '../../../assets/img/berita/video/';
                $vfile_upload_video = $vdir_upload_video . $nama_file_unik_video;
                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );

                move_uploaded_file( $_FILES['fvideo']['tmp_name'], $vfile_upload_video );
                mysqli_query( $config, "INSERT INTO tbl_berita(judulBerita,isiBerita,gambarPertama,video,kategori,typeBerita)
  				VALUES('$_POST[judulBerita]',
					   '$_POST[isiBerita]',
             '$nama_file_unik',
             '$nama_file_unik_video',
					   '$_POST[pilihan_kategori_berita]',
					   '$_POST[pilihan_tipe_berita]')" );
            } else {
                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );

                mysqli_query( $config, "INSERT INTO tbl_berita(judulBerita,isiBerita,gambarPertama,kategori,typeBerita)
  				VALUES('$_POST[judulBerita]',
					   '$_POST[isiBerita]',
             '$nama_file_unik',
					   '$_POST[pilihan_kategori_berita]',
					   '$_POST[pilihan_tipe_berita]')" );
            }

        } else {
            mysqli_query( $config, "INSERT INTO tbl_berita(judulBerita,isiBerita,kategori,typeBerita)
  				VALUES('$_POST[judulBerita]',
					   '$_POST[isiBerita]',
					   '$_POST[pilihan_kategori_berita]',
					   '$_POST[pilihan_tipe_berita]')" );
        }
        header( 'location:../../media.php?module='.$module );
    }
    //Hapus Soal
    elseif ( $module == 'berita' AND $act == 'hapus' ) {
        mysqli_query( $config, "DELETE FROM tbl_berita WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
    }
    // Update soal
    elseif ( $module == 'berita' AND $act == 'update' ) {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];

        $lokasi_file_2    = $_FILES['fupload2']['tmp_name'];
        $tipe_file_2    = $_FILES['fupload2']['type'];
        $nama_file_2      = $_FILES['fupload2']['name'];

        $lokasi_file_3    = $_FILES['fupload3']['tmp_name'];
        $tipe_file_3      = $_FILES['fupload3']['type'];
        $nama_file_3      = $_FILES['fupload3']['name'];

        $lokasi_file_video    = $_FILES['fvideo']['tmp_name'];
        $tipe_file_video      = $_FILES['fvideo']['type'];
        $nama_file_video      = $_FILES['fvideo']['name'];

        $acak           = rand( 1, 99 );

        $nama_file_unik = $acak.$nama_file;
        $nama_file_unik_2 = $acak.$nama_file_2;
        $nama_file_unik_3 = $acak.$nama_file_3;
        $nama_file_unik_video = $acak.$nama_file_video;

        // Apabila ada gambar yang diupload
        if ( !empty( $lokasi_file ) ) {
            $vdir_upload = '../../../assets/img/berita/thumbnail/';
            $vfile_upload = $vdir_upload . $nama_file_unik;

            if ( !empty( $lokasi_file_2 ) && !empty( $lokasi_file_3 ) ) {
                $vdir_upload_2 = '../../../assets/img/berita/gambar/';
                $vfile_upload_2 = $vdir_upload_2 . $nama_file_unik_2;

                $vdir_upload_3 = '../../../assets/img/berita/gambar/';
                $vfile_upload_3 = $vdir_upload_3 . $nama_file_unik_3;

                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
                move_uploaded_file( $_FILES['fupload2']['tmp_name'], $vfile_upload_2 );
                move_uploaded_file( $_FILES['fupload3']['tmp_name'], $vfile_upload_3 );
                mysqli_query( $config, "UPDATE tbl_berita SET
  				judulBerita = '$_POST[judulBerita]',
					  isiBerita = '$_POST[isiBerita]',
					  gambarPertama = '$nama_file_unik',
                      gambarKedua = '$nama_file_unik_2',
                      gambarKetiga = '$nama_file_unik_3',
					   kategori = '$_POST[pilihan_kategori_berita]',
					   typeBerita ='$_POST[pilihan_tipe_berita]'
					   WHERE id='$_POST[id]'" );
            } else if ( !empty( $lokasi_file_2 ) ) {

                $vdir_upload_2 = '../../../assets/img/berita/gambar/';
                $vfile_upload_2 = $vdir_upload_2 . $nama_file_unik_2;

                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
                move_uploaded_file( $_FILES['fupload2']['tmp_name'], $vfile_upload_2 );
                mysqli_query( $config, "UPDATE tbl_berita SET
  				judulBerita = '$_POST[judulBerita]',
					  isiBerita = '$_POST[isiBerita]',
					  gambarPertama = '$nama_file_unik',
                      gambarKedua = '$nama_file_unik_2',
					   kategori = '$_POST[pilihan_kategori_berita]',
					   typeBerita ='$_POST[pilihan_tipe_berita]'
					   WHERE id='$_POST[id]'" );
            } else if ( !empty( $lokasi_file_3 ) ) {
                $vdir_upload_3 = '../../../assets/img/berita/gambar/';
                $vfile_upload_3 = $vdir_upload_3 . $nama_file_unik_3;

                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );

                move_uploaded_file( $_FILES['fupload3']['tmp_name'], $vfile_upload_3 );
                mysqli_query( $config, "UPDATE tbl_berita SET
  				judulBerita = '$_POST[judulBerita]',
					  isiBerita = '$_POST[isiBerita]',
					  gambarPertama = '$nama_file_unik',
                      gambarKetiga = '$nama_file_unik_3',
					   kategori = '$_POST[pilihan_kategori_berita]',
					   typeBerita ='$_POST[pilihan_tipe_berita]'
					   WHERE id='$_POST[id]'" );
            } else if ( !empty( $lokasi_file_video ) ) {
                $vdir_upload_video = '../../../assets/img/berita/video/';
                $vfile_upload_video = $vdir_upload_video . $nama_file_unik_video;
                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );

                move_uploaded_file( $_FILES['fvideo']['tmp_name'], $vfile_upload_video );
                mysqli_query( $config, "UPDATE tbl_berita SET
  				judulBerita = '$_POST[judulBerita]',
					  isiBerita = '$_POST[isiBerita]',
					  gambarPertama = '$nama_file_unik',
                      video = '$nama_file_unik_video',
					   kategori = '$_POST[pilihan_kategori_berita]',
					   typeBerita ='$_POST[pilihan_tipe_berita]'
					   WHERE id='$_POST[id]'" );
            } else {
                move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );

                mysqli_query( $config, "UPDATE tbl_berita SET
  				judulBerita = '$_POST[judulBerita]',
					  isiBerita = '$_POST[isiBerita]',
					  gambarPertama = '$nama_file_unik',
					   kategori = '$_POST[pilihan_kategori_berita]',
					   typeBerita ='$_POST[pilihan_tipe_berita]'
					   WHERE id='$_POST[id]'" );
            }

        } else {
            mysqli_query( $config, "UPDATE tbl_berita SET
  				judulBerita = '$_POST[judulBerita]',
					  isiBerita = '$_POST[isiBerita]',
					   kategori = '$_POST[pilihan_kategori_berita]',
					   typeBerita ='$_POST[pilihan_tipe_berita]'
					   WHERE id='$_POST[id]'" );
        }

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
    elseif ( $module == 'berita' AND $act == 'nonaktif' ) {
        $aktif = 'N';
        mysqli_query( $config, "UPDATE tbl_berita SET status  = '$aktif'  WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    } elseif ( $module == 'berita' AND $act == 'aktif' ) {
        $aktif = 'Y';
        mysqli_query( $config, "UPDATE tbl_berita SET status  = '$aktif'  WHERE id='$_GET[id]'" );
        header( 'location:../../media.php?module='.$module );
        echo 'tes';

    }

}
?>