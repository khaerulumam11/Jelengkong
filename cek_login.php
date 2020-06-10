<?php
include 'config/koneksi.php';

if ( isset( $_POST['submit'] ) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = mysqli_query( $config, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'" );
    $r = mysqli_fetch_array( $qry );

    if ( $username == $r['username'] && $password == $r['password'] && $r['role'] == 'pelukis' ) {
        // code...
        session_start();
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['nama'] = $r['namaLengkap'];
        $_SESSION['id'] = $r['idUser'];
        $_SESSION['role'] = $r['role'];
        header( 'location:pelukis/index.php' );
    } else if ( $username == $r['username'] && $password == $r['password'] && $r['role'] == 'admin' ) {
        session_start();
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['nama'] = $r['namaLengkap'];
        $_SESSION['id'] = $r['idUser'];
        $_SESSION['role'] = $r['role'];
        header( 'location:admin/media.php?module=home' );
    } else {
        echo '<script language="javascript">
	alert("Userid atau Password Yang anda Masukkan Salah atau Acount Sudah Diblokir");
	window.location="login.php";
	</script>';
        exit();
    }
}
?>