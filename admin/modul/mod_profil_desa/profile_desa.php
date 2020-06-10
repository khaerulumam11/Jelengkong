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
                                Kelola Profil Desa
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
$aksi="modul/mod_profil_desa/aksi_profile_desa.php";
switch($_GET[act]){
   default:
    $sql  = mysqli_query($config,"SELECT * FROM tbl_profil_desa");
    $r    = mysqli_fetch_array($sql);
  $sql_nilai_l  = mysqli_query( $config, "SELECT count(*) as jum FROM tbl_profil_desa" );
  $r_nilai_l    = mysqli_fetch_array( $sql_nilai_l );
  if($r_nilai_l['jum'] == 0) {
     echo "<h2>Tambah Profil Desa</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=profile_desa&act=tambah class='form-horizontal'>
        
         
          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Nama Desa</label>
            <div class='col-sm-4'>
             <input type=text class='form-control' name='namaDesa'>
            </div>
          </div>

             <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Alamat Desa</label>
            <div class='col-sm-4'>
            <textarea name='alamatDesa' style='width: 550px; height: 200px;'></textarea>                        
            </div>
          </div>


                 <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Email Desa</label>
            <div class='col-sm-4'>
             <input type=email class='form-control'  name='emailDesa'>
            </div>
          </div>

               <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>No Telepon Desa</label>
            <div class='col-sm-4'>
             <input type=text class='form-control'  name='telpDesa'>
            </div>
          </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Deskripsi Desa</label>
                          <div class='col-sm-10'>
                            <textarea name='deskripsiDesa' style='width: 550px; height: 300px;'></textarea>
                          </div>
                        </div>
                        

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Nama Kepala Desa</label>
            <div class='col-sm-4'>
             <input type=text class='form-control'  name='namaKades'>
            </div>
          </div>

          
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Sambutan Kepala Desa</label>
                          <div class='col-sm-10'>
                            <textarea name='sambutanKades' style='width: 550px; height: 300px;'></textarea>
                          </div>
                        </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Background Profil</label>
            <div class='col-sm-4'>
             <input type=file size=30 class='form-control' name='fupload'>
            </div>
          </div>

      
          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'></label>
            <div class='col-sm-4'>
             <input type=submit value=Tambah class='btn btn-primary'>
            </div>
          </div>


         </form>";
  } else { 
    echo "<h2>Edit Profil Desa</h2>
           <form method=POST enctype='multipart/form-data' action=$aksi?module=profile_desa&act=edit class='form-horizontal'>
         <input type=hidden class='form-control' value=$r[id] name='id'>
           
         
          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Nama Desa</label>
            <div class='col-sm-4'>
             <input type=text class='form-control' value=$r[namaDesa] name='namaDesa'>
            </div>
          </div>

             <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Alamat Desa</label>
            <div class='col-sm-4'>
            <textarea name='alamatDesa' style='width: 550px; height: 200px;'>$r[alamatDesa]</textarea>                        
            </div>
          </div>


                 <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Email Desa</label>
            <div class='col-sm-4'>
             <input type=email class='form-control' value=$r[emailDesa] name='emailDesa'>
            </div>
          </div>

               <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>No Telepon Desa</label>
            <div class='col-sm-4'>
             <input type=text class='form-control' value=$r[noTelp]  name='telpDesa'>
            </div>
          </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Deskripsi Desa</label>
                          <div class='col-sm-10'>
                            <textarea name='deskripsiDesa' style='width: 550px; height: 300px;'>$r[deskripsiDesa]</textarea>
                          </div>
                        </div>
                        

        <div class='form-group' style='display:none'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Nama Kepala Desa</label>
            <div class='col-sm-4'>
             <input type=text class='form-control' value=$r[namaKepalaDesa] name='namaKades'>
            </div>
          </div>

          
                        <div class='form-group' style='display:none'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Sambutan Kepala Desa</label>
                          <div class='col-sm-10'>
                            <textarea name='sambutanKades' style='width: 550px; height: 300px;'>$r[sambutanKades]</textarea>
                          </div>
                        </div>

          <div class='form-group' style = 'display : none'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Background Profil</label>
            <div class='col-sm-4'>
             <input type=file size=30 class='form-control' name='fupload'>
            </div>
          </div>

      
          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'></label>
            <div class='col-sm-4'>
             <input type=submit value=Update class='btn btn-warning'>
            </div>
          </div>

         </form>";
  }
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