<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="filter/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="filter/css/style.css"> <!-- Resource style -->
    <script src="filter/js/modernizr.js"></script> <!-- Modernizr -->

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

    <title>Content Filters | CodyHouse</title>
</head>

<style>
.nav-menu,
.nav-menu * {
    margin: 0;
    padding: 0;
    list-style: none;
}

.nav-menu>ul>li {
    position: relative;
    white-space: nowrap;
    float: left;
}

.nav-menu a {
    display: block;
    position: relative;
    color: #d2ece9;
    padding: 10px 15px;
    transition: 0.3s;
    font-size: 16px;
    font-family: "Open Sans", sans-serif;
}

.nav-menu a:hover,
.nav-menu .active>a,
.nav-menu li:hover>a {
    color: #9cd5ce;
    text-decoration: none;
}

.nav-menu .drop-down ul {
    display: block;
    position: absolute;
    left: 0;
    top: calc(100% - 30px);
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    padding: 10px 0;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: ease all 0.3s;
}

.nav-menu .drop-down:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
}

.nav-menu .drop-down li {
    min-width: 180px;
    position: relative;
}

.nav-menu .drop-down ul a {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 500;
    text-transform: none;
    color: #25564f;
}

.nav-menu .drop-down ul a:hover,
.nav-menu .drop-down ul .active>a,
.nav-menu .drop-down ul li:hover>a {
    color: #70b9b0;
}

.nav-menu .drop-down>a:after {
    content: "\ea99";
    font-family: IcoFont;
    padding-left: 5px;
}

.nav-menu .drop-down .drop-down ul {
    top: 0;
    left: calc(100% - 30px);
}

.nav-menu .drop-down .drop-down:hover>ul {
    opacity: 1;
    top: 0;
    left: 100%;
}

.nav-menu .drop-down .drop-down>a {
    padding-right: 35px;
}

.nav-menu .drop-down .drop-down>a:after {
    content: "\eaa0";
    font-family: IcoFont;
    position: absolute;
    right: 15px;
}

@media (max-width: 1366px) {
    .nav-menu .drop-down .drop-down ul {
        left: -90%;
    }

    .nav-menu .drop-down .drop-down:hover>ul {
        left: -100%;
    }

    .nav-menu .drop-down .drop-down>a:after {
        content: "\ea9d";
    }
}


#header {
    height: 80px;
    transition: all 0.5s;
    z-index: 997;
    transition: all 0.5s;
    padding: 20px 0;
    background: #2d6760;
}

#header.header-scrolled {
    background: #1d443f;
    height: 60px;
    padding: 10px 0;
}

#header .logo h1 {
    font-size: 30px;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-weight: 700;
    letter-spacing: 1px;
}

#header .logo h1 a,
#header .logo h1 a:hover {
    color: #fff;
    text-decoration: none;
}

#header .logo img {
    padding: 0;
    margin: 0;
    max-height: 40px;
}

@media (max-width: 768px) {
    #header .logo h1 {
        font-size: 28px;
        padding: 8px 0;
    }
}
</style>

<body>
    <header class="cd-header">
        <div class="container">

            <div class="float-left">
                <h1><a style="text-decoration:none" href="index.php"><strong><span
                                style="color:white; font-family: Open Sans, sans-serif; padding:10 15;">Jelengkong</span></strong></a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <ul style="margin-top:5%">
                    <li class="text-light"><a href="index.php #about">Profil Desa</a></li>
                    <li><a href="index.php #portfolio">Galeri Lukisan</a></li>
                    <li><a href="index.php #team">Acara</a></li>
                    <li><a href="index.php #contact">Kontak</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header>

    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
                <ul class="cd-filters">
                    <li class="placeholder">
                        <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
                    </li>
                    <li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
                    <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Color 1</a></li>
                    <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Color 2</a></li>
                </ul> <!-- cd-filters -->
            </div> <!-- cd-tab-filter -->
        </div> <!-- cd-tab-filter-wrapper -->

        <section class="cd-gallery">
            <ul>
                <li class="mix color-1 check1 radio2 option3"><img src="filter/img/img-1.jpg" alt="Image 1"></li>
                <li class="mix color-2 check2 radio2 option2"><img src="filter/img/img-2.jpg" alt="Image 2"></li>
                <li class="mix color-1 check3 radio3 option1"><img src="filter/img/img-3.jpg" alt="Image 3"></li>
                <li class="mix color-1 check3 radio2 option4"><img src="filter/img/img-4.jpg" alt="Image 4"></li>
                <li class="mix color-1 check1 radio3 option2"><img src="filter/img/img-5.jpg" alt="Image 5"></li>
                <li class="mix color-2 check2 radio3 option3"><img src="filter/img/img-6.jpg" alt="Image 6"></li>
                <li class="mix color-2 check2 radio2 option1"><img src="filter/img/img-7.jpg" alt="Image 7"></li>
                <li class="mix color-1 check1 radio3 option4"><img src="filter/img/img-8.jpg" alt="Image 8"></li>
                <li class="mix color-2 check1 radio2 option3"><img src="filter/img/img-9.jpg" alt="Image 9"></li>
                <li class="mix color-1 check3 radio2 option4"><img src="filter/img/img-10.jpg" alt="Image 10"></li>
                <li class="mix color-1 check3 radio3 option2"><img src="filter/img/img-11.jpg" alt="Image 11"></li>
                <li class="mix color-2 check1 radio3 option1"><img src="filter/img/img-12.jpg" alt="Image 12"></li>
                <li class="gap"></li>
                <li class="gap"></li>
                <li class="gap"></li>
            </ul>
            <div class="cd-fail-message">No results found</div>
        </section> <!-- cd-gallery -->

        <div class="cd-filter">
            <form>
                <div class="cd-filter-block">
                    <h4>Search</h4>

                    <div class="cd-filter-content">
                        <input type="search" placeholder="Try color-1...">
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Check boxes</h4>

                    <ul class="cd-filter-content cd-filters list">
                        <li>
                            <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
                            <label class="checkbox-label" for="checkbox1">Option 1</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
                            <label class="checkbox-label" for="checkbox2">Option 2</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
                            <label class="checkbox-label" for="checkbox3">Option 3</label>
                        </li>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Select</h4>

                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <select class="filter" name="selectThis" id="selectThis">
                                <option value="">Choose an option</option>
                                <option value=".option1">Option 1</option>
                                <option value=".option2">Option 2</option>
                                <option value=".option3">Option 3</option>
                                <option value=".option4">Option 4</option>
                            </select>
                        </div> <!-- cd-select -->
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block">
                    <h4>Radio buttons</h4>

                    <ul class="cd-filter-content cd-filters list">
                        <li>
                            <input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
                            <label class="radio-label" for="radio1">All</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
                            <label class="radio-label" for="radio2">Choice 2</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
                            <label class="radio-label" for="radio3">Choice 3</label>
                        </li>
                    </ul> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->
            </form>

            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-filter -->

        <a href="#0" class="cd-filter-trigger">Filters</a>
    </main> <!-- cd-main-content -->
    <script src="filter/js/jquery-2.1.1.js"></script>
    <script src="filter/js/jquery.mixitup.min.js"></script>
    <script src="filter/js/main.js"></script> <!-- Resource jQuery -->
</body>

</html>