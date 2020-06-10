<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Daftar Akun</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<style>
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #ffffff;
    resize: none;
}
</style>

<body>

    <?php
include "../config/koneksi.php";
if(isset($_POST['submit'])){
    $cekdata = mysqli_query($config,"SELECT * FROM tbl_user where username = '$_POST[username]'");
    if(mysqli_num_rows($cekdata)>0){
        echo '<script language="javascript">
    alert("Anda Sudah Melakukan Registrasi");
    window.location="../login.php";
    </script>';
    } else{
        $id = uniqid();
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
  if (!empty($lokasi_file)){
    $vdir_upload = "assets/img/profile/";
    $vfile_upload = $vdir_upload . $nama_file_unik;
    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
    $simpan="INSERT INTO tbl_user SET username='$_POST[username]',
                                      password='$_POST[password]',
                                      namaLengkap='$_POST[nama]',
                                      tentang='$_POST[tentang]',
                                      idUser='$id',
                                      email='$_POST[email]',
                                      nohp = '$_POST[nohp]',
                                      role = 'pelukis',
                                      fotoProfil='$nama_file_unik',
                                      jk='$_POST[jk]'";
    mysqli_query($config,$simpan);
  } else {
    $simpan="INSERT INTO tbl_user SET username='$_POST[username]',
    password='$_POST[password]',
    namaLengkap='$_POST[nama]',
    tentang='$_POST[tentang]',
    email='$_POST[email]',
     nohp = '$_POST[nohp]',
    role = 'pelukis',
    idUser='$id',
    jk='$_POST[jk]'";
  mysqli_query($config,$simpan);
  }
    echo '<script language="javascript">
    alert("Anda Berhasil Melakukan Registrasi");
    window.location="../login.php";
    </script>';
    exit();
    }
}
?>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Daftar</h2>
                    <form name="form" action="" id="loginF" method="post" enctype='multipart/form-data'>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="USERNAME" name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAMA LENGKAP" name="nama">
                        </div>

                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="jk">
                                    <option disabled="disabled" selected="selected">JENIS KELAMIN</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="" style="margin-bottom:3%">
                            <textarea id="tentang" name="tentang" rows="10" cols="62" placeholder="Tentang"></textarea>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="EMAIL" name="email">
                                    <i class="zmdi zmdi-mail-note input-icon js-btn-mail"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="tel" placeholder="NO HANDPHONE/WHATSAPP"
                                        name="nohp">

                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label>Foto Profil</label>
                                    <input class="input--style-1" type="file" id="fupload" name="fupload"
                                        placeholder="Foto Profil">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <input type="submit" class="btn btn--radius btn--green" name="submit"
                                value="Daftar"></input>
                        </div>
                        <div class="checkbox" style="margin-top:5%">
                            <label>
                                Sudah punya akun ? masuk <a href="login.php">disini</a>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->