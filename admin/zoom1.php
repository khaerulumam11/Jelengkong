<?php
include '../config/koneksi.php';
$view = mysqli_query( $config, "SELECT * FROM tbl_acara  WHERE  id='$_GET[id]'" );
$t = mysqli_fetch_array( $view );
echo "  <table width='60%'>
    <tr><th colspan=2 align='center'>DETAIL ACARA</th></tr>
    <tr><td>Nama Acara</td><td>$t[namaAcara]</td></tr>
     <tr><td>Poster Acara </td><td><img src='../../../../pelukis/assets/img/acara/$t[posterAcara]' style='width:200px;height:200px;' ></td> </tr>
    <tr><td>Deskripsi Acara</td><td>$t[deskripsiAcara]</td></tr>
    <tr><td>Waktu Acara</td><td>$t[waktuAcara]</td></tr>
    <tr><td>Lokasi Acara</td><td>$t[lokasiAcara]</td></tr>
    <tr><td>Harga Tiket</td><td>$t[hargaTiket]</td></tr>
    <tr><td>Nama Penyelenggara </td><td>$t[namaPenyelenggara]</td></tr>
     </table>";

?>