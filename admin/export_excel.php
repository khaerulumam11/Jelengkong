

<div class="panel-body">
  <?php
$config =  mysqli_connect("103.28.53.243", "praktiku_root", "Bpadlab2018","praktiku_db_ujianonline");
// Tampil Hasil Ujian Users
$tampil = mysqli_query($config,"SELECT tbl_nilaiakhir.benar, tbl_nilaiakhir.salah, tbl_nilaiakhir.kosong, tbl_nilaiakhir.keterangan as ket, tbl_nilaiakhir.score, tbl_nilaiakhir.tanggal, tbl_nilaiakhir.kode_asisten, tbl_user.id_user, tbl_user.nama, tbl_user.nim, tbl_user.kelas, tbl_modul.id_modul, tbl_modul.id_modulprak, tbl_modulprak.id_modul, tbl_modulprak.nama_modul FROM tbl_nilaiakhir,tbl_user,tbl_modul,tbl_modulprak WHERE tbl_nilaiakhir.id_user=tbl_user.id_user AND tbl_nilaiakhir.id_modul = tbl_modul.id_modul AND tbl_modul.id_modulprak = tbl_modulprak.id_modul ORDER BY tbl_nilaiakhir.kode_asisten ASC");
echo "<h1>Hasil Tes Akhir</h1>
<table border=1 style='width:100%'>
<tr><th>No</th><th>Nama</th><th>NIM</th><th>Kelas</th><th>Benar</th><th>Salah</th><th>Kosong</th><th>Nilai</th><th>Modul</th><th>Tanggal</th><th>Keterangan</th></tr>";
$no=1;
while ($r=mysqli_fetch_array($tampil)){

echo "<tr><td style='text-align:center'>$no</td>
<td style='text-align:center'>$r[nama]</td>
<td style='text-align:center'>$r[nim]</td>
<td style='text-align:center'>$r[kelas]</td>
<td style='text-align:center'>$r[benar]</td>
<td style='text-align:center'>$r[salah]</td>
<td style='text-align:center'>$r[kosong]</td>
<td style='text-align:center'>$r[score]</td>
<td style='text-align:center'>$r[nama_modul]</td>
<td style='text-align:center'>$r[tanggal]</td>
<td style='text-align:center'>$r[ket]</td>
</td>
</tr>";
$no++;
}
echo "</table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
?>

<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Hasil Tes Akhir.xls");

?>


</div>
