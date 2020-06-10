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
    <title>Profil Pelukis</title>
    <!-- Font Awesome icons (free version)-->
    <!-- <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script> -->
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<style>
.button {
    border-radius: 4px;
    background-color: #FFFFFF;
    border-color: #2196F3;
    color: dodgerblue;
    text-align: center;
    font-size: 23px;
    padding: 10px;
    width: 200px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
}

.button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}

.button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
}

.button:hover span {
    padding-right: 25px;
}

.button:hover span:after {
    opacity: 1;
    right: 0;
}
</style>

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
                            href="#portfolio">Portofolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <?php 
            $id = $_SESSION['id'];
             $tampil=mysqli_query($config,"SELECT * FROM tbl_user WHERE idUser='$id'");
             $r=mysqli_fetch_array($tampil);
             if($r['fotoProfil'] == ""){
             ?>
            <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
            <!-- Masthead Heading-->
            <?php } else {
               ?>
            <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5"
                src="assets/img/<?php echo $r['fotoProfil']?>" alt="" /><!-- Masthead Heading-->
            <?php }
               ?>
            <h1 class="masthead-heading text-uppercase mb-0"><?php echo $r['namaLengkap'] ?></h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0"><?php echo $r['tentang']?></p>

            <div class="text-center mt-4 portfolio-item mx-auto" data-toggle="modal" data-target="#editProfileModal">
                <a class="btn btn-xl btn-outline-dark">Edit Profile</a>
            </div>
        </div>
    </header>
    <div class="portfolio-modal modal fade" id="editProfileModal" tabindex="-1" role="dialog"
        aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-l" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <!-- Portfolio Modal - Title-->
                                <div class="login-panel panel panel-default">

                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Profile</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div id="loading" style="text-align: center"></div>
                                        <form name="form" action="update_profile.php" id="loginF" method="post"
                                            enctype='multipart/form-data'>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" value="<?php echo $r['username']?>"
                                                        placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" id="password" name="password"
                                                        value="<?php echo $r['password']?>" class="form-control"
                                                        placeholder="Password">
                                                    <input type="checkbox" onclick="showPassword()">Show Password
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        value="<?php echo $r['namaLengkap']?>" name="nama"
                                                        placeholder="Nama">
                                                </div>

                                                <div class="form-group">
                                                    <label>Tentang</label>
                                                    <textarea class="form-control" id="tentang" name="tentang" rows="10"
                                                        cols="30"
                                                        placeholder="Tentang"><?php echo $r['tentang']?></textarea>
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
                                                    <input type="file" class="form-control" id="fupload" size=100
                                                        name="fupload">
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select name="jk" id="jk" class="form-control">
                                                        <option value="<?php echo $r['jk']?>"><?php echo $r['jk']?>
                                                        </option>
                                                        <option disabled>----Pilih----</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>


                                                <!-- Change this to a button or input when using this as a form -->


                                                <input type="submit" class="btn btn-lg btn-success btn-block"
                                                    name="submit" value="Update">
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <button class="btn btn-primary" style="margin-top:5%" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portofolio</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" onclick="myFunction()">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/add.png" alt="" />
                    </div>
                </div>

                <?php
                    $show=mysqli_query($config,"SELECT * FROM tbl_portofolio WHERE idPelukis='$id'");
                    while ($y=mysqli_fetch_array($show)){
                ?>
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item" data-toggle="modal" data-target="#portfolioModale<?php echo $y[id]?>">
                        <div class="portfolio-item-caption align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="rounded" width="auto" height="300"
                            src="assets/img/portfolio/<?php echo $y[gambarLukisan]?>" alt="" />
                    </div>
                </div>


                <div class="portfolio-modal modal fade" id="portfolioModale<?php echo $y[id]?>" tabindex="-1"
                    role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                            <div class="modal-body text-center">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <!-- Portfolio Modal - Title-->
                                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">
                                                <?php echo $y[namaLukisan]?></h2>
                                            <!-- Icon Divider-->
                                            <div class="divider-custom">
                                                <div class="divider-custom-line"></div>
                                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                                <div class="divider-custom-line"></div>
                                            </div>
                                            <!-- Portfolio Modal - Image-->
                                            <img class="img-fluid rounded mb-5"
                                                src="assets/img/portfolio/<?php echo $y[gambarLukisan]?>" alt="" />
                                            <!-- Portfolio Modal - Text-->
                                            <p class="mb-5"><?php echo $y[deskripsiLukisan]?></p>

                                            <a href="ubah_portofolio.php?id=<?php echo $y[id]?>"
                                                style="text-decoration:none"> <button
                                                    class="btn btn-lg btn-warning btn-block" name="edit"
                                                    value="Edit">Edit</button></a>
                                            <a href="delete_portofolio.php?id=<?php echo $y[id]?>"
                                                style="text-decoration:none"> <button
                                                    class="btn btn-lg btn-danger btn-block" style="margin-top:2%"
                                                    name="delete" value="Delete">Delete</button></a>

                                            <button class="btn btn-primary" style="margin-top:3%" href="#"
                                                data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close
                                                Window</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <?php } ?>

            </div>


            <?php 

/*
            $show=mysqli_query($config,"SELECT COUNT(*) as jum FROM tbl_portofolio WHERE idPelukis='$id'");
            $u    = mysqli_fetch_array( $show );
            if ($u[jum] > 9) {
                echo "
                 <center> <button class='button'><span>See All </span></button> </center>
                ";
            } else {
                echo "
                 <center> <button style ='display : none' class='button'><span>See All </span></button> </center>
                ";
            }
            */
            ?>




            <div class="container" id="formInput" name="formInput" style="display:none">
                <div class="row">
                    <div class="col-md-12 col-md-offset-12">

                        <div class="login-panel panel panel-default rounded" style="margin-top:10%">

                            <center>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Tambah Portofolio</h3>
                                </div>
                            </center <div class="panel-body">
                            <div id="loading" style="text-align: center"></div>
                            <form name="form" action="input_portofolio.php" id="loginF" method="post"
                                enctype='multipart/form-data'>

                                <fieldset>
                                    <div class="form-group">
                                        <label>Judul Lukisan</label>
                                        <input type="text" class="form-control" id="judulLukisan" name="judulLukisan"
                                            placeholder="Judul Lukisan">
                                    </div>

                                    <div class="form-group">
                                        <label>Gambar Lukisan</label>
                                        <input type="file" class="form-control" id="fupload" size=100 name="fupload">
                                    </div>

                                    <div class="form-group">
                                        <label>Tema Lukisan</label>
                                        <select class="form-control" name="tema" id="tema">
                                            <option value="noselected">Pilih Tema</option>
                                            <?php 
                                         $next=mysqli_query($config,"SELECT * FROM tbl_tema");
                                         while ($o=mysqli_fetch_array($next)){
                                        ?>
                                            <option value="<?php echo $o[tema] ?>"><?php echo $o[tema] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Deskripsi Lukisan </label>
                                        <textarea class="form-control" id="deskripsiLukisan" name="deskripsiLukisan"
                                            rows="10" cols="30" placeholder="Deskripsi Lukisan"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Ukuran Lukisan</label>
                                        <input type="text" class="form-control" id="ukuran" name="ukuran"
                                            placeholder="Ukuran Lukisan (ex: 100x100 cm)">
                                    </div>

                                    <div class="form-group">
                                        <label>Media Lukisan</label>
                                        <input type="text" class="form-control" id="mediaLukisan" name="mediaLukisan"
                                            placeholder="Ex: Akrilik diatas">
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Lukisan</label>
                                        <input type="number" class="form-control" id="hargaLukisan" name="hargaLukisan"
                                            placeholder="Ex:50000000">
                                    </div>


                                    <div class="form-group">
                                        <label>Nama Penjual</label>
                                        <input type="text" class="form-control" id="namaPenjual" name="namaPenjual"
                                            placeholder="Ex: Sun Art Gallery">
                                    </div>

                                    <div class="form-group">
                                        <label>Link Tokopedia/Shopee</label>
                                        <input type="text" class="form-control" id="link" name="link"
                                            placeholder="Ex: http://www.tokopedia...">
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
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog"
        aria-labelledby="portfolioModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <!-- Portfolio Modal - Title-->

                                <button class="btn btn-primary" style="margin-top:2%" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2-->

    <!-- Portfolio Modal 3-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog"
        aria-labelledby="portfolioModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Circus Tent</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image--><img class="img-fluid rounded mb-5"
                                    src="assets/img/portfolio/circus.png" alt="" /><!-- Portfolio Modal - Text-->
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.
                                </p>
                                <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 4-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog"
        aria-labelledby="portfolioModal4Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image--><img class="img-fluid rounded mb-5"
                                    src="assets/img/portfolio/game.png" alt="" /><!-- Portfolio Modal - Text-->
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.
                                </p>
                                <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 5-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog"
        aria-labelledby="portfolioModal5Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image--><img class="img-fluid rounded mb-5"
                                    src="assets/img/portfolio/safe.png" alt="" /><!-- Portfolio Modal - Text-->
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.
                                </p>
                                <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 6-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog"
        aria-labelledby="portfolioModal6Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image--><img class="img-fluid rounded mb-5"
                                    src="assets/img/portfolio/submarine.png" alt="" /><!-- Portfolio Modal - Text-->
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque
                                    assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam
                                    velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.
                                </p>
                                <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                        class="fas fa-times fa-fw"></i>Close Window</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
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
<script>
function myFunction() {
    var x = document.getElementById("formInput");

    if (x.style.display === "none") {
        x.style.display = "block";
        x.scrollIntoView();
    } else {
        x.style.display = "none";
    }
}

function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>


<?php
}
?>