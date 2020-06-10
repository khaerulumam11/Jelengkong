<?php
include '../config/koneksi.php';
session_start();
if ( isset( $_POST['submit'] ) ) {
    $id = $_SESSION['id'];
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file      = $_FILES['fupload']['type'];
    $nama_file      = $_FILES['fupload']['name'];
    $acak           = rand( 1, 99 );
    $nama_file_unik = $acak.$nama_file;
    if ( !empty( $lokasi_file ) ) {
        $vdir_upload = 'assets/img/portfolio/';
        $vfile_upload = $vdir_upload . $nama_file_unik;
        move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
        $simpan = "INSERT INTO tbl_portofolio SET namaLukisan='$_POST[judulLukisan]',
                                  deskripsiLukisan='$_POST[deskripsiLukisan]',
                                  temaLukisan='$_POST[tema]',
                                  ukuranLukisan='$_POST[ukuran]',
                                  mediaLukisan='$_POST[mediaLukisan]',
                                  harga='$_POST[hargaLukisan]',
                                      namaPenjual = '$_POST[namaPenjual]',
                                      
                                      link = '$_POST[link]',
                                  gambarLukisan='$nama_file_unik',
                                  idPelukis='$id'";
        mysqli_query( $config, $simpan );
    } else {
        $simpan = "INSERT INTO tbl_portofolio SET namaLukisan='$_POST[judulLukisan]',
                                  deskripsiLukisan='$_POST[deskripsiLukisan]',
                                  
                                  temaLukisan='$_POST[tema]',
                                  ukuranLukisan='$_POST[ukuran]',
                                  mediaLukisan='$_POST[mediaLukisan]',
                                  harga='$_POST[hargaLukisan]',
                                  
                                      link = '$_POST[link]',
                                      namaPenjual = '$_POST[namaPenjual]'
                                  idPelukis='$id'";
        mysqli_query( $config, $simpan );
    }
    echo '<script language="javascript">
alert("Anda Berhasil Menambahkan Portofolio");
window.location="index.php";
</script>';
    exit();
}

?>