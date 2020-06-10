<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Ujian Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="pelukis/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="pelukis/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="pelukis/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="pelukis/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php
include "config/koneksi.php";
if(isset($_POST['submit'])){
    $cekdata = mysqli_query($config,"SELECT * FROM tbl_user where username = '$_POST[username]'");
    if(mysqli_num_rows($cekdata)>0){
        echo '<script language="javascript">
    alert("Anda Sudah Melakukan Registrasi");
    window.location="index.php";
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
    window.location="login.php";
    </script>';
    exit();
    }
}
?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">
                    <br>
                    <center>

                    </center>
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <div id="loading" style="text-align: center"></div>
                        <form name="form" action="" id="loginF" method="post" enctype='multipart/form-data'>

                            <fieldset>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                </div>

                                <div class="form-group">
                                    <label>Tentang</label>
                                    <textarea class="form-control" id="tentang" name="tentang" rows="10" cols="30"
                                        placeholder="Tentang"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label>No Handphone/No Whatsapp</label>
                                    <input type="tel" class="form-control" id="nohp" name="nohp">
                                </div>

                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <input type="file" class="form-control" id="fupload" name="fupload">
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                        <option selected>----Pilih----</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>


                                <div class="checkbox">
                                    <label>
                                        Sudah punya akun ? masuk <a href="login.php">disini</a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->


                                <input type="submit" class="btn btn-lg btn-success btn-block" name="submit"
                                    value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="pelukis/vendor/jquery/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="pelukis/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="pelukis/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="pelukis/dist/js/sb-admin-2.js"></script>



</body>

</html>