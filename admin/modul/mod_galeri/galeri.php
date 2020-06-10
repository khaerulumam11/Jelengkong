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
                                Daftar Galeri
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
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_galeri/aksi_galeri.php";
switch($_GET[act]){
  // Tampil Soal
  default:
    echo "<h2>Daftar Galeri</h2>";
  // Tombol Tambah Soal

  //Form Pencarian Data
  echo "<div style='text-align:right;padding-right:30px;'>
         <form method='POST' action=?module=galeri&act=carikeyword>
     <input type=text name='cari'  placeholder='Masukkan Keyword' list='auto' size=40 required/> <input type=submit class='btn btn-danger' value='Cari'></form>";
    echo"<datalist id='auto'>";
     $qry=mysqli_query($config,"SELECT * FROM tbl_portofolio, tbl_user");
     while ($t=mysqli_fetch_array($qry)) {
      echo "<option value='$t[soal]'>";
     }
  echo"</datalist></form>
      </div>";
  //Tampil Data Soal
     echo" <table class='table table-striped table-bordered table-hover'>
          <tr><th>No</th><th>Nama Lukisan</th><th>Gambar Lukisan</th><th>Deskripsi Lukisan</th><th>Ukuran Lukisan</th><th>Media Lukisan</th><th>Harga Lukisan</th><th>Nama Pelukis</th><th>Aksi</th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_portofolio,tbl_user where tbl_portofolio.idPelukis = tbl_user.idUser  ORDER BY tbl_portofolio.id DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$r[namaLukisan]</td>
       <td><img src='../../../../pelukis/assets/img/portfolio/$r[gambarLukisan]' style='width:200px;height:200px;'/></td>
         <td> $r[deskripsiLukisan] </td>
        <td> $r[ukuranLukisan]</td>
        <td> $r[mediaLukisan]</td>
        
        <td> $r[harga]</td>
        
        <td> $r[namaLengkap]</td>
        <td> <a href='#' onclick=\"bukajendela('zoom.php?id=$r[id]')\"><i class='fa fa-eye'></i></a></td>
      ";
        echo"   </td>
    </tr>";
      $no++;
    }
    echo "</table>";
    break;


  // Form Tambah Soal
  case "tambahsoal":
    echo "<h2>Tambah Soal</h2>
          <form method=POST class='form-horizontal' action='$aksi?module=soal&act=input' enctype='multipart/form-data'>

          <div class='form-group'>
          <label for='inputEmail3' class='col-sm-2 control-label'>Pilihan Modul</label>
          <div class='col-sm-4'>
          <select name='pilihan_modul' class='form-control'>
          <option value='0' disabled selected>--Pilihan Modul--</option>";
          $tampil1=mysqli_query($config,"SELECT tbl_modul.id_modul, tbl_modulprak.id_modul as id, tbl_modul.id_modulprak, tbl_modul.pilihan_tes, tbl_modulprak.nama_modul FROM tbl_modul,tbl_modulprak where tbl_modul.id_modulprak = tbl_modulprak.id_modul");
          while ($r1=mysqli_fetch_array($tampil1)){
          echo "<option value='$r1[id_modul]'>$r1[nama_modul]&nbsp$r1[pilihan_tes]</option>";
          };
          echo "
          </select>
          </div>
          </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Pertanyaan</label>
                          <div class='col-sm-10'>
                            <input type='text' name='soal' style='width: 500px; height: 100px;'></input>
                          </div>
                        </div>
                        
                    
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-10'>
                            <input type=file name='fupload' size=40>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
                          </div>
                        </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban A</label>
                          <div class='col-sm-4'>
                            <input type=text name='a' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban B</label>
                          <div class='col-sm-4'>
                            <input type=text name='b' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban C</label>
                          <div class='col-sm-4'>
                            <input type=text name='c' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban D</label>
                          <div class='col-sm-4'>
                            <input type=text name='d' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Kunci Jawaban</label>
                          <div class='col-sm-4'>
                            <select name='knc_jawaban' class='form-control'>
                            <option value='a'>A</option>
                            <option value='b'>B</option>
                            <option value='c'>C</option>
                            <option value='d'>D</option>
                            </select>
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
  case "editsoal":
    $edit=mysqli_query($config,"SELECT * FROM tbl_soal WHERE id_soal='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Soal</h2>
          <form method=POST action=$aksi?module=soal&act=update class='form-horizontal' enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id_soal]'>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Pertanyaan</label>
                          <div class='col-sm-10'>
                            <textarea name='soal' style='width: 500px; height: 100px;'>$r[soal]</textarea>
                          </div>
                        </div>";
                        if ($r[gambar]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../foto/$r[gambar]'>
                          </div>
                        </div>

                        ";
                        }

                        echo"
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-10'>
                            <input type=file name='fupload' size=40>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
                          </div>
                        </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban A</label>
                          <div class='col-sm-4'>
                            <input type=text name='a' class='form-control' value='$r[a]' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban B</label>
                          <div class='col-sm-4'>
                            <input type=text name='b' value='$r[b]' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban C</label>
                          <div class='col-sm-4'>
                            <input type=text name='c' value='$r[c]' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban D</label>
                          <div class='col-sm-4'>
                            <input type=text name='d' value='$r[d]' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Kunci Jawaban</label>
                          <div class='col-sm-4'>
                            <select name='knc_jawaban' id='knc_jawaban' class='form-control'>
                            <option value='a'>A</option>
                            <option value='b'>B</option>
                            <option value='c'>C</option>
                            <option value='d'>D</option>
                            </select>
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
    $view=mysqli_query($config,"SELECT * FROM tbl_portofolio, tbl_user  WHERE tbl_portofolio.idPelukis = tbl_user.id AND id='$_GET[id]'");
    $t=mysqli_fetch_array($view);
    echo "  <table width='60%'>
    <tr><th colspan=2 align='center'>DETAIL PORTOFOLIO</th></tr>
    <tr><td>Nama Lukisan</td><td>$t[username]</td></tr>
     <tr><td>Foto Pelukis </td><td><img src='../../../../pelukis/assets/img/portfolio/$t[gambarLukisan]' style='width:200px;height:200px;' ></td> </tr>
    <tr><td>Deskripsi Lukisan</td><td>$t[password]</td></tr>
    <tr><td>Ukuran Lukisan</td><td>$t[namaLengkap]</td></tr>
    <tr><td>Media Lukisan</td><td>$t[email]</td></tr>
    <tr><td>Harga Lukisan</td><td>$t[nohp]</td></tr>
    <tr><td>Nama Pelukis </td><td>$t[namaLengkap]</td></tr>
    <tr><td>Nama Penjual</td><td>$t[namaPenjual]</td> </tr>
     </table>";
  break;

  case "carikeyword":
       echo"<h2>Berikut adalah  Hasil Pencarian Yang ditemukan</h2>
     <table class='table table-striped table-bordered table-hover'>
          <tr><th>No</th><th>Nama Lukisan</th><th>Gambar Lukisan</th><th>Deskripsi Lukisan</th><th>Ukuran Lukisan</th><th>Media Lukisan</th><th>Harga Lukisan</th><th>Nama Pelukis</th><th>Aksi</th></tr>";
       $tampil=mysqli_query($config,"SELECT * FROM tbl_portofolio, tbl_user WHERE tbl_portofolio.idPelukis = tbl_user.idUser AND namaLukisan LIKE '%$_POST[cari]%'");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[namaLukisan]</td>
       <td><img src='../../../../pelukis/assets/img/portfolio/$r[gambarLukisan]' style='width:200px;height:200px;'/></td>
         <td> $r[deskripsiLukisan] </td>
        <td> $r[ukuranLukisan]</td>
        <td> $r[mediaLukisan]</td>
        
        <td> $r[harga]</td>
        
        <td> $r[namaLengkap]</td>
        <td> <a href='#' onclick=\"bukajendela('zoom.php?id=$r[id]')\"><i class='fa fa-eye'></i></a></td>
      ";
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
                            <div class="panel-footer">

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