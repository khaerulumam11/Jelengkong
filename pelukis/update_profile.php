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
        $vdir_upload = '../assets/img/profile/';
        $vfile_upload = $vdir_upload . $nama_file_unik;
        move_uploaded_file( $_FILES['fupload']['tmp_name'], $vfile_upload );
        $simpan = "UPDATE tbl_user SET username='$_POST[username]',
                                  password='$_POST[password]',
                                  namaLengkap='$_POST[nama]',
                                  tentang='$_POST[tentang]',
                                  email='$_POST[email]',
                                      nohp = '$_POST[nohp]',
                                  fotoProfil='$nama_file_unik',
                                  jk='$_POST[jk]' WHERE id='$id'";
        mysqli_query( $config, $simpan );
    } else {
        $simpan = "UPDATE tbl_user SET username='$_POST[username]',
password='$_POST[password]',
namaLengkap='$_POST[nama]',
tentang='$_POST[tentang]',
email='$_POST[email]',
nohp = '$_POST[nohp]',
jk='$_POST[jk]' WHERE id='$id'";
        mysqli_query( $config, $simpan );
    }
    echo '<script language="javascript">
alert("Anda Berhasil Merubah data");
window.location="index.php";
</script>';
    exit();
}

?>