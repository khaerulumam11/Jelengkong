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
                                Daftar User
                            </div>
                            <div class="panel-body">



                                <?php
$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysqli_query($config,"SELECT * FROM tbl_user WHERE role ='Pelukis'");
      echo "<h2> Daftar User</h2>
    <table class='table table-striped table-bordered table-hover'>
          <tr><th>no</th><th>Username</th><th>Nama Pelukis</th><th>Email</th><th>No Telepom</th><th>Jenis Kelamin</th><th>Lihat</th><th>aksi</th></tr>";
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
            <td>$r[namaLengkap]</td>
            <td>$r[email]</td>
            <td>$r[nohp]</td>
        <td>$r[jk]</td>
        <td><a href='?module=users&act=lihat&id=$r[id]'>View</a></td>
             <td><a href=$aksi?module=users&act=hapus&id=$r[id]>Hapus</a></td>";
        echo"</tr>";
      $no++;
    }
    echo "
    </table>
    <br>
    <a href='../admin/modul/export_excel2.php' class='btn btn-primary'>Download List User</a>

    <br/>";
    break;

  case "lihat":
       $tampil = mysqli_query($config,"SELECT * FROM tbl_user WHERE idUser='$_GET[id]'");
    $t=mysqli_fetch_array($tampil);
    echo "
  <table width='60%'>
    <tr><th colspan=2 align='center'>DETAIL USER</th></tr>
    <tr><td>Username</td><td>$t[username]</td></tr>
    <tr><td>Password</td><td>$t[password]</td></tr>
    <tr><td>Nama Pelukis</td><td>$t[namaLengkap]</td></tr>
    <tr><td>Email</td><td>$t[email]</td></tr>
    <tr><td>No Hp</td><td>$t[nohp]</td></tr>
    <tr><td>Tentang </td><td>$t[tentang]</td></tr>
    <tr><td>Jenis Kelamin </td><td>$t[jk]</td> </tr>
     <tr><td>Foto Pelukis </td><td><img src=../../../pelukis/assets/img/portfolio/$t[jk]></td> </tr>
  </table>";
  break;
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