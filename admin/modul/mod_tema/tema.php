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
                                Kelola Tema/Kategori
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
$aksi="modul/mod_tema/aksi_tema.php";
switch($_GET[act]){
  // Tampil Soal
  default:
    echo "<h2>Tema/Kategori</h2>";
  // Tombol Tambah Soal
  echo "<div style='text-align:left;padding-left:30px;'>
          <input class='btn btn-primary' type=button value='Tambah Tema/Kategori'
          onclick=\"window.location.href='?module=tema&act=tambahtema';\">";


  //Form Pencarian Data
  echo "<div style='text-align:right;padding-right:30px;'>
         <form method='POST' action=?module=tema&act=caritema>
     <input type=text name='cari'  placeholder='Masukkan Acara' list='auto' size=40 required/> <input type=submit class='btn btn-danger' value='Cari'>";
    echo"<datalist id='auto'>";
     $qry=mysqli_query($config,"SELECT * FROM tbl_tema");
     while ($t=mysqli_fetch_array($qry)) {
      echo "<option value='$t[tema]'>";
     }
  echo"</datalist></form>
      </div>";
  //Tampil Data Soal
     echo" <table class='table table-striped table-bordered table-hover'>
          <tr><th>No</th><th>Nama Tema</th><th>Date Added</th><th>aksi</th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_tema ORDER BY id_tema DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$r[tema]</td>
       <td>$r[date_added]</td>
         <td>
        <a href=?module=tema&act=edittema&id=$r[id_tema]><i class='fa fa-pencil-square-o'></i></a> |
        <a href=$aksi?module=tema&act=hapus&id=$r[id_tema]><i class='fa fa-trash'></i></a></td>
        
        </tr>";
      $no++;
    }
    echo "</table>";
    break;


  // Form Tambah Soal
  case "tambahtema":
     $tampil=mysqli_query($config,"SELECT * FROM tbl_tema");
    echo "<h2>Tambah Tema/Kategori</h2>
          <form method=POST class='form-horizontal' action='$aksi?module=tema&act=input'>

          
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Kategori</label>
                          <div class='col-sm-4'>
                             <input list='browsers' name='tema' id='tema' class='form-control'>
                                  <datalist id='browsers'>
                                      <option value='Digital Art'>
                                      <option value='Traditional Art'>
                                      <option value='Photography'>
                                      <option value='Artisan Arts'>
                                      <option value='Animation'>
                                      <option value='Literature'>
                                      <option value='Cartoons'>
                                   </datalist>
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
  case "edittema":
    $edit=mysqli_query($config,"SELECT * FROM tbl_tema WHERE id_tema='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Acara</h2>
          <form method=POST action=$aksi?module=tema&act=update class='form-horizontal' enctype='multipart/form-data'>
          <input type=hidden name='id' value='$r[id_tema]'>
  
          <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Nama Kategori</label>
                          <div class='col-sm-4'>
                             <input list='browsers' name='tema' value = '$r[tema]' id='tema' class='form-control'>
                                  <datalist id='browsers'>
                                      <option value='Digital Art'>
                                      <option value='Traditional Art'>
                                      <option value='Photography'>
                                      <option value='Artisan Arts'>
                                      <option value='Animation'>
                                      <option value='Literature'>
                                      <option value='Cartoons'>
                                   </datalist>
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

  case "caritema":
       echo"<h2>Berikut adalah  Hasil Pencarian Yang ditemukan</h2>
       <table class='table table-striped table-bordered table-hover'>
    <tr><th>No</th><th>Nama Tema</th><th>Date Added</th><th>aksi</th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_tema WHERE tema LIKE '%$_POST[cari]%'");
    $no=1;
     while ($r=mysqli_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$r[tema]</td>
       <td>$r[date_added]</td>
         <td>
        <a href=?module=tema&act=edittema&id=$r[id]><i class='fa fa-pencil-square-o'></i></a> |
        <a href=$aksi?module=tema&act=hapus&id=$r[id]><i class='fa fa-trash'></i></a></td>
        
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