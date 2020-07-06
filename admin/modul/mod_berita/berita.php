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
                                Kelola Berita
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
$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil Soal
  default:
    echo "<h2>Berita</h2>";
  // Tombol Tambah Soal
  echo "<div style='text-align:left;padding-left:30px;'>
          <input class='btn btn-primary' type=button value='Tambah Berita'
          onclick=\"window.location.href='?module=berita&act=tambahberita';\">";


  //Form Pencarian Data
  echo "<div style='text-align:right;padding-right:30px;'>
         <form method='POST' action=?module=berita&act=cariberita>
     <input type=text name='cari'  placeholder='Masukkan Judul Berita' list='auto' size=40 required/> <input type=submit class='btn btn-danger' value='Cari'>";
    echo"<datalist id='auto'>";
     $qry=mysqli_query($config,"SELECT * FROM tbl_berita");
     while ($t=mysqli_fetch_array($qry)) {
      echo "<option value='$t[judulBerita]'>";
     }
  echo"</datalist></form>
      </div>";
  //Tampil Data Soal
     echo" <table class='table table-striped table-bordered table-hover'>
          <tr><th>No</th><th>Judul Berita</th><th>Isi Berita</th><th>Kategori Berita</th><th>Tipe Berita</th><th>Date Added</th><th>Status</th><th>aksi</th><th></th></tr>";
    $tampil=mysqli_query($config,"SELECT * FROM tbl_berita ORDER BY id DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$r[judulBerita]</td>
       <td>$r[isiBerita]</td>
            <td> $r[kategori] </td>
        <td> $r[typeBerita]</td>
         <td> $r[date_added]</td>
          <td> $r[status]</td>
         <td>
        <a href=?module=berita&act=editberita&id=$r[id]><i class='fa fa-pencil-square-o'></i></a> |
        <a href=$aksi?module=berita&act=hapus&id=$r[id]><i class='fa fa-trash'></i></a></td>
         ";
        if ($r[status]=="Y") {
          echo"<td><input type=button class='btn btn-default' value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=berita&act=nonaktif&id=$r[id]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=berita&act=aktif&id=$r[id]';\"></td>";
        }

        echo"   </td>
    </tr>";
      $no++;
    }
    echo "</table>";
    break;


  // Form Tambah Soal
  case "tambahberita":
    echo "<h2>Tambah Berita</h2>
          <form method=POST class='form-horizontal' action='$aksi?module=berita&act=input' enctype='multipart/form-data'>



                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Judul Berita  </label>
                          <div class='col-sm-6'>
                            <input type='text' name='judulBerita' class='form-control'></input>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Tipe Berita  </label>
                          <div class='col-sm-6'>
                           <select name='pilihan_tipe_berita' id='pilihan_tipe_berita' onClick='cekKategori()' class='form-control'>
                           <option value='0' disabled selected>Pilih Tipe Berita</option>
                           <option value='Text & Gambar'>Text & Gambar</option>
                           <option value='Video'>Video</option>
                           </select>
                          </div>
                        </div>

                          <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Kategori Berita </label>
                          <div class='col-sm-6'>
                           <select name='pilihan_kategori_berita' class='form-control'>
                           <option value='0' disabled selected>Pilih Kategori Berita</option>
                           <option value='Sport'>Sport</option>
                           <option value='Business'>Business</option>
                            <option value='Art'>Art</option>
                             <option value='Photography'>Photography</option>
                              <option value='Education'>Education</option>
                              <option value='Other'>Other</option>
                              </select>
                          </div>
                        </div>
                        
                    
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Thumbnail Berita</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload' id ='file' accept='image/*' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                            <div class='form-group'  id='divGambar2' style='display:none'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 2</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload2' id ='file' accept='image/*' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                        <div class='form-group'  id='divGambar3' style='display:none'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 3</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload3' id ='file' accept='image/*' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                         <div class='form-group'  id='divVideo' style='display:none'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Video</label>
                          <div class='col-sm-6'>
                            <input type=file name='fvideo' id ='file' class='form-control' type=file' accept='video/*'>
                          </div>
                        </div>

                         <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Isi Berita</label>
            <div class='col-sm-4'>
            <textarea name='isiBerita' style='width: 600px; height: 400px;'></textarea>                        
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
  case "editberita":
    $edit=mysqli_query($config,"SELECT * FROM tbl_berita WHERE id='$_GET[id]'");
    $r=mysqli_fetch_array($edit);

    echo "<h2>Edit Berita</h2>
          <form method=POST action=$aksi?module=berita&act=update class='form-horizontal' enctype='multipart/form-data'>
          <input type=hidden name='id' value='$r[id]'>

                          <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Judul Berita  </label>
                          <div class='col-sm-6'>
                            <input type='text' name='judulBerita' value='$r[judulBerita]' class='form-control'></input>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Tipe Berita  </label>
                          <div class='col-sm-6'>
                           <select name='pilihan_tipe_berita' id='pilihan_tipe_berita' onClick='cekKategori()' class='form-control'>
                           <option value='$r[typeBerita]'>$r[typeBerita]</option>
                           <option value='Text & Gambar'>Text & Gambar</option>
                           <option value='Video'>Video</option>
                           </select>
                          </div>
                        </div>

                          <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Kategori Berita </label>
                          <div class='col-sm-6'>
                           <select name='pilihan_kategori_berita' class='form-control'>
                           <option value='$r[kategori]'>$r[kategori]</option>
                           <option value='Sport'>Sport</option>
                           <option value='Business'>Business</option>
                            <option value='Art'>Art</option>
                             <option value='Photography'>Photography</option>
                              <option value='Education'>Education</option>
                              <option value='Other'>Other</option>
                              </select>
                          </div>
                        </div>";
                        if ($r[gambarPertama]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../../../jelengkong/assets/img/berita/thumbnail/$r[gambarPertama]' width='300px' height='300px'>
                          </div>
                        </div>

                        ";
                        }

                        echo"
                           <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Thumbnail Berita</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>";


                             if ($r[gambarKedua]!='' && $r[gambarKetiga]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../../../jelengkong/assets/img/berita/gambar/$r[gambarKedua]' width='300px' height='300px'>
                          </div>
                        </div>

                         <div class='form-group'  id='divGambar2' style='display:block'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 2</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload2' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                         <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../../../jelengkong/assets/img/berita/gambar/$r[gambarKetiga]' width='300px' height='300px'>
                          </div>
                        </div>

                        <div class='form-group'  id='divGambar3' style='display:block'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 3</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload3' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>


                        ";
                        }  else if ($r[gambarKedua]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../../../jelengkong/assets/img/berita/gambar/$r[gambarKedua]' width='300px' height='300px'>
                          </div>
                        </div>

                         <div class='form-group'  id='divGambar2' style='display:block'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 2</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload2' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                        <div class='form-group'  id='divGambar3' style='display:block'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 3</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload3' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>


                        ";
                        }  else if ($r[gambarKetiga]!=''){

                        echo "
                         <div class='form-group'  id='divGambar2' style='display:block'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 2</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload2' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>

                         <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../../../jelengkong/assets/img/berita/gambar/$r[gambarKetiga]' width='300px' height='300px'>
                          </div>
                        </div>

                        <div class='form-group'  id='divGambar3' style='display:block'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar 3</label>
                          <div class='col-sm-6'>
                            <input type=file name='fupload3' id ='file' class='form-control' onchange='Filevalidation()' type=file'>
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 4 MB
                          </div>
                        </div>


                        ";
                        }  else if ($r[video]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                         <video width='400' controls>
                          <source src='../../../jelengkong/assets/img/berita/video/$r[video]' type='video/mp4'>
                             Your browser does not support HTML video.
                         </video>
                            </div>
                        </div>
                     <div class='form-group'  id='divVideo' style='display:block'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Video</label>
                          <div class='col-sm-6'>
                            <input type=file name='fvideo' id ='file' class='form-control' type=file'>
                          </div>
                        </div>


                        ";
                        }

                        echo "
                          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Isi Berita</label>
            <div class='col-sm-4'>
            <textarea name='isiBerita' style='width: 600px; height: 400px;'>$r[isiBerita]</textarea>                        
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
            } else {

            }
        }
    }
}

function cekKategori() {

    var s = document.getElementById('pilihan_tipe_berita');
    var gambar1 = document.getElementById('divGambar2');
    var gambar2 = document.getElementById('divGambar3');
    var video = document.getElementById('divVideo');

    if (s.value == 'Text & Gambar') {
        gambar1.style.display = "block";
        gambar2.style.display = "block";
        video.style.display = "none";
    } else if (s.value == 'Video') {
        video.style.display = "block";
        gambar1.style.display = "none";
        gambar2.style.display = "none";
    }
}
        </script>