<!DOCTYPE html>

<?php
include "../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses ini, Anda harus login <br>";
  echo "<a href=../login.php><b>LOGIN</b></a></center>";
} else {
  
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Portofolio</title>
    <!-- Font Awesome icons (free version)-->
    <!-- <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script> -->
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Profil Pelukis</a><button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#portfolio">Edit Portofolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->


    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio" style="margin-top:5%">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edit Portofolio</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row">
                <!-- Portfolio Item 1-->

                <div class="container" id="formInput" name="formInput">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-12">

                            <?php 
            $id=$_GET['id'];
             $tampil=mysqli_query($config,"SELECT * FROM tbl_portofolio WHERE id='$id'");
             $r=mysqli_fetch_array($tampil);
            ?>

                            <div class="login-panel panel panel-default rounded" style="margin-top:2%">

                                <div class="panel-body">
                                    <div id="loading" style="text-align: center"></div>
                                    <form name="form" action="edit_portofolio.php?id=<?php echo $r[id]?>" id="loginF"
                                        method="post" enctype='multipart/form-data'>

                                        <fieldset>
                                            <div class="form-group">
                                                <label>Judul Lukisan</label>
                                                <input type="text" class="form-control" id="judulLukisan"
                                                    name="judulLukisan" value="<?php echo $r[namaLukisan]?>"
                                                    placeholder="Judul Lukisan">
                                            </div>

                                            <div class="form-group">
                                                <label>Gambar Lukisan</label>
                                                <input type="file" class="form-control" id="fupload" size=100
                                                    name="fupload">
                                            </div>

                                            <div class="form-group">
                                                <label>Tema Lukisan</label>
                                                <select class="form-control" name="tema" id="tema">
                                                    <option value="<?php echo $r[temaLukisan]?>">
                                                        <?php echo $r[temaLukisan]?></option>
                                                    <?php 
                                                          $next=mysqli_query($config,"SELECT * FROM tbl_tema");
                                                         while ($o=mysqli_fetch_array($next)){
                                                    ?>
                                                    <option value="<?php echo $o[tema] ?>"><?php echo $o[tema] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Deskripsi Lukisan </label>
                                                <textarea class="form-control" id="deskripsiLukisan"
                                                    name="deskripsiLukisan" rows="10" cols="30"
                                                    placeholder="Deskripsi Lukisan"><?php echo $r[deskripsiLukisan]?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Ukuran Lukisan</label>
                                                <input type="text" class="form-control" id="ukuran" name="ukuran"
                                                    value="<?php echo $r[ukuranLukisan]?>"
                                                    placeholder="Ukuran Lukisan (ex: 100x100 cm)">
                                            </div>

                                            <div class="form-group">
                                                <label>Media Lukisan</label>
                                                <input type="text" class="form-control" id="mediaLukisan"
                                                    value="<?php echo $r[mediaLukisan]?>" name="mediaLukisan"
                                                    placeholder="Ex: Akrilik diatas">
                                            </div>

                                            <div class="form-group">
                                                <label>Harga Lukisan</label>
                                                <input type="number" class="form-control" id="hargaLukisan"
                                                    name="hargaLukisan" value="<?php echo $r[harga]?>"
                                                    placeholder="Ex:50000000">
                                            </div>


                                            <div class="form-group">
                                                <label>Nama Penjual</label>
                                                <input type="text" class="form-control" id="namaPenjual"
                                                    name="namaPenjual" value="<?php echo $r[namaPenjual]?>"
                                                    placeholder="Ex: Sun Art Gallery">
                                            </div>


                                            <!-- Change this to a button or input when using this as a form -->


                                            <input type="submit" class="btn btn-lg btn-success btn-block" name="submit"
                                                value="Simpan">
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>


    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Your Website 2020</small></div>
    </section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
                class="fa fa-chevron-up"></i></a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

<?php
}
?>