<?php
include '../config/koneksi.php';
$view = mysqli_query( $config, "SELECT * FROM tbl_portofolio, tbl_user  WHERE tbl_portofolio.idPelukis = tbl_user.idUser AND id='$_GET[id]'" );
$t = mysqli_fetch_array( $view );
echo "  <table width='60%'>
    <tr><th colspan=2 align='center'>DETAIL PORTOFOLIO</th></tr>
    <tr><td>Nama Lukisan</td><td>$t[namaLukisan]</td></tr>
     <tr><td>Foto Pelukis </td><td><img src='../../../../pelukis/assets/img/portfolio/$t[gambarLukisan]' style='width:200px;height:200px;' ></td> </tr>
    <tr><td>Deskripsi Lukisan</td><td>$t[password]</td></tr>
    <tr><td>Ukuran Lukisan</td><td>$t[namaLengkap]</td></tr>
    <tr><td>Media Lukisan</td><td>$t[mediaLukisan]</td></tr>
    <tr><td>Harga Lukisan</td><td>$t[harga]</td></tr>
    <tr><td>Nama Pelukis </td><td>$t[namaLengkap]</td></tr>
    <tr><td>Nama Penjual</td><td>$t[namaPenjual]</td> </tr>
     </table>";

?>