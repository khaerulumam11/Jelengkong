        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!--   <h3 class="page-header"> Peraturan </h3> -->

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Kelola Acara
                            </div>
                            <div class="panel-body">



                                <script language="JavaScript">
                                function bukajendela(url) {
                                    window.open(url, "window_baru",
                                        "width=800,height=500,left=120,top=10,resizable=1,scrollbars=1");
                                }
                                </script>

                                <?php
include "../../../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_acara/aksi_acara.php";
switch($_GET[act]){
  // Tampil Soal
  default:
    echo "<h2>Acara</h2>";
  // Tombol Tambah Soal
  echo "<div style='text-align:left;padding-left:30px;'>
          <input class='btn btn-primary' type=button value='Tambah Acara'
          onclick=\"window.location.href='?module=acara&act=tambahacara';\">";


  //Form Pencarian Data
  echo "<div style='text-align:right;padding-right:30px;'>
         <form method='POST' action=?module=acara&act=cariacara>
     <input type=text name='cari'  placeholder='Masukkan Acara' list='auto' size=40 required/> <input type=submit class='btn btn-danger' value='Cari'>";
    echo"<datalist id='auto'>";
     $qry=mysqli_query($config,"SELECT * FROM tbl_soal");
     while ($t=mysqli_fetch_array($qry)) {
      echo "<option value='$t[soal]'>";
     }
  echo"</datalist></form>
      </div>";
  //Tampil Data Soal
     echo" <table class='table table-striped table-bordered table-hover'>
          <tr><th>No</th><th>Nama Acara</th><th>Poster Acara</th><th>Waktu Acara</th><th>Lokasi Acara</th><th>Nama Penyelenggara</th><th>Status</th><th>aksi</th><th>View</th><th></th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_acara ORDER BY id DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$r[namaAcara]</td>
       <td>$r[posterAcara]</td>
            <td> $r[waktuAcara] </td>
        <td> $r[lokasiAcara]</td>
         <td> $r[namaPenyelenggara]</td>
          <td> $r[status]</td>
         <td>
        <a href=?module=acara&act=editacara&id=$r[id]><i class='fa fa-pencil-square-o'></i></a> |
        <a href=$aksi?module=acara&act=hapus&id=$r[id]><i class='fa fa-trash'></i></a></td>
        <td> <a href='#' onclick=\"bukajendela('zoom1.php?id=$r[id]')\"><i class='fa fa-eye'></i></a></td>
        ";
        if ($r[status]=="Y") {
          echo"<td><input type=button class='btn btn-default' value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=acara&act=nonaktif&id=$r[id]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=acara&act=aktif&id=$r[id]';\"></td>";
        }

        echo"   </td>
    </tr>";
      $no++;
    }
    echo "</table>";
    break;


  // Form Tambah Soal
  case "tambahacara":
    echo "<h2>Tambah Acara</h2>
          <form method=POST class='form-horizontal' action='$aksi?module=acara&act=input' enctype='multipart/form-data'>



                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Acara</label>
                          <div class='col-sm-4'>
                            <input type='text' name='namaAcara' class='form-control'></input>
                          </div>
                        </div>
                        
                    
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-4'>
                            <input type=file name='fupload' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                         <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Deskripsi Acara</label>
            <div class='col-sm-4'>
            <textarea name='deskripsiAcara' style='width: 550px; height: 200px;'></textarea>                        
            </div>
          </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Waktu Acara</label>
                          <div class='col-sm-4'>
                            <input type=datetime-local name='waktuAcara' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Lokasi Acara</label>
                          <div class='col-sm-4'>
                            <input type=text name='lokasiAcara' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Penyelenggara</label>
                          <div class='col-sm-4'>
                            <input type=text name='namaPenyelenggara' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Harga Tiket</label>
                          <div class='col-sm-4'>
                            <input type=number name='hargaTiket' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-4'>
                        <input type=submit name=submit value=Simpan class='btn btn-primary'>
                        <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
                        </div>
                        </div>
                  </form>";
     break;


  // Form Edit Soal
  case "editacara":
    $edit=mysqli_query($config,"SELECT * FROM tbl_acara WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Acara</h2>
          <form method=POST action=$aksi?module=acara&act=update class='form-horizontal' enctype='multipart/form-data'>
          <input type=hidden name='id' value='$r[id]'>

                       <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Acara</label>
                          <div class='col-sm-4'>
                            <input type='text' name='namaAcara'  value ='$r[namaAcara]' class='form-control'></input>
                          </div>
                        </div>";
                        if ($r[posterAcara]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../../.../pelukis/assets/img/acara/$r[posterAcara]'>
                          </div>
                        </div>

                        ";
                        }

                        echo"
                         <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-4'>
                            <input type=file name='fupload' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                         <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Deskripsi Acara</label>
            <div class='col-sm-4'>
            <textarea name='deskripsiAcara' style='width: 550px; height: 200px;'>$r[deskripsiAcara]</textarea>                        
            </div>
          </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Waktu Acara</label>
                          <div class='col-sm-4'>
                            <input type=datetime-local value ='$r[waktuAcara]' name='waktuAcara' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Lokasi Acara</label>
                          <div class='col-sm-4'>
                            <input type=text name='lokasiAcara' value ='$r[lokasiAcara]' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Penyelenggara</label>
                          <div class='col-sm-4'>
                            <input type=text name='namaPenyelenggara' value ='$r[namaPenyelenggara]' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Harga Tiket</label>
                          <div class='col-sm-4'>
                            <input type=number name='hargaTiket' value ='$r[hargaTiket]' class='form-control' required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-4'>
                        <input type=submit name=submit value=Simpan class='btn btn-primary'>
                        <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
                        </div>
                        </div>
                  </form>";
    break;

  case "viewsoal":
    $view=mysqli_query($config,"SELECT * FROM tbl_soal WHERE id_soal='$_GET[id]'");
    $t=mysqli_fetch_array($view);
    echo "<h2>Soal :</h2>
    $t[soal]</br>";
          if ($t[gambar]!=''){
              echo "<img src='../foto/$t[gambar]'>";
          }
    echo"<h2>Jawaban :</h2>
    a. $t[a] </br>
    b. $t[b] </br>
    c. $t[c] </br>
    d. $t[d] </br>";
  break;

  case "cariacara":
       echo"<h2>Berikut adalah  Hasil Pencarian Yang ditemukan</h2>
       <table class='table table-striped table-bordered table-hover'>
    <tr><th>No</th><th>Nama Acara</th><th>Poster Acara</th><th>Waktu Acara</th><th>Lokasi Acara</th><th>Nama Penyelenggara</th><th>Status</th><th>aksi</th><th>View</th><th></th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_acara WHERE namaAcara LIKE '%$_POST[cari]%'");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$r[namaAcara]</td>
       <td>$r[posterAcara]</td>
            <td> $r[waktuAcara] </td>
        <td> $r[lokasiAcara]</td>
         <td> $r[namaPenyelenggara]</td>
          <td> $r[status]</td>
         <td>
        <a href=?module=acara&act=editacara&id=$r[id]><i class='fa fa-pencil-square-o'></i></a> |
        <a href=$aksi?module=acara&act=hapus&id=$r[id]><i class='fa fa-trash'></i></a></td>
        <td> <a href='#' onclick=\"bukajendela('zoom1.php?id=$r[id]')\"><i class='fa fa-eye'></i></a></td>
        ";
        if ($r[status]=="Y") {
          echo"<td><input type=button class='btn btn-default' value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=acara&act=nonaktif&id=$r[id]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=acara&act=aktif&id=$r[id]';\"></td>";
        }

        echo"   </td>
    </tr>";
      $no++;
    }
    echo "</table>";
    break;


  }
}
?>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


        <script type="text/javascript">
var $ = jQuery;
$('#knc_jawaban').val('<?php echo $r['
    knc_jawaban '];?>');
        </script>

        <script>
Filevalidation = () => {
    const fi = document.getElementById('file');
    // Check if any file is selected. 
    if (fi.files.length > 0) {
        for (const i = 0; i <= fi.files.length - 1; i++) {

            const fsize = fi.files.item(i).size;
            const file = Math.round((fsize / 1024));
            // The size of the file. 
            if (file >= 4096) {
                alert(
                    "File too Big, please select a file less than 4mb");
            } else if (file < 2048) {
                alert(
                    "File too small, please select a file greater than 2mb");
            } else {

            }
        }
    }
}
        </script>