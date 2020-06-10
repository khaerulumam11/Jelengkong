<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/xls");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=List User.xls");

?>

<div class="panel-body">
  <?php
$config =  mysqli_connect("103.28.53.243", "praktiku_root", "Bpadlab2018","praktiku_db_ujianonline");
// Tampil Hasil Ujian Users
$tampil = mysqli_query($config,"SELECT * FROM tbl_user");
echo "<h1>List User</h1>
<table border=1 style='width:100%'>
<tr><th>No</th><th>Nama</th><th>NIM</th><th>Kelas</th><th>Username</th><th>Password</th></tr>";
$no=1;
while ($r=mysqli_fetch_array($tampil)){

echo "<tr><td style='text-align:center'>$no</td>
<td style='text-align:center'>$r[nama]</td>
<td style='text-align:center'>$r[nim]</td>
<td style='text-align:center'>$r[kelas]</td>
<td style='text-align:center'>$r[username]</td>
<td style='text-align:center'>$r[password]</td>
</td>
</tr>";
$no++;
}
echo "</table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
?>




</div>
