<!DOCTYPE html>
<html lang="en">

<?php
include "config/koneksi.php";
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php
    $id = $_GET['id'];
    $show=mysqli_query($config,"SELECT * FROM tbl_berita WHERE id = '$id'");
    $y=mysqli_fetch_array($show);
    ?>
    <title><?php echo $y['judulBerita']; ?></title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
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

    <link href="news/css/media_query.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link href="news/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="news/css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="news/css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="news/css/style_1.css" rel="stylesheet" type="text/css" />
    <!-- Modernizr JS -->
    <script src="news/js/modernizr-3.5.0.min.js"></script>


    <!-- Template Main CSS File -->
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

    <!-- =======================================================
  * Template Name: Amoeba - v2.0.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
/**
* Template Name: Amoeba - v2.0.0
* Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
body {
    font-family: "Open Sans", sans-serif;
    color: #777;
}

a {
    color: #43aea0;
}

a:hover {
    color: #00d3b8;
    text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6,
.font-primary {
    font-family: "Lato", sans-serif;
}

/*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
.back-to-top {
    position: fixed;
    display: none;
    width: 40px;
    height: 40px;
    border-radius: 3px;
    right: 15px;
    bottom: 15px;
    background: #70b9b0;
    color: #fff;
    transition: display 0.5s ease-in-out;
    z-index: 99999;
}

.back-to-top i {
    font-size: 24px;
    position: absolute;
    top: 8px;
    left: 8px;
}

.back-to-top:hover {
    color: #fff;
    background: #8bc6bf;
    transition: background 0.2s ease-in-out;
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
    height: 80px;
    transition: all 0.5s;
    z-index: 997;
    transition: all 0.5s;
    padding: 20px 0;
    background: #63372C;
}

#header.header-scrolled {
    background: #63372C;
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

#main {
    margin-top: 80px;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/* Desktop Navigation */
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
    color: #fff;
    padding: 10px 15px;
    transition: 0.3s;
    font-size: 14px;
    font-family: "Open Sans", sans-serif;
}

.nav-menu a:hover,
.nav-menu .active>a,
.nav-menu li:hover>a {
    color: #FFF;
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

/* Mobile Navigation */
.mobile-nav {
    position: fixed;
    top: 0;
    bottom: 0;
    z-index: 9999;
    overflow-y: auto;
    left: -260px;
    width: 260px;
    padding-top: 18px;
    background: #01292a;
    transition: 0.4s;
}

.mobile-nav * {
    margin: 0;
    padding: 0;
    list-style: none;
}

.mobile-nav a {
    display: block;
    position: relative;
    color: #d2ece9;
    padding: 10px 20px;
    font-weight: 500;
}

.mobile-nav a:hover,
.mobile-nav .active>a,
.mobile-nav li:hover>a {
    color: #9cd5ce;
    text-decoration: none;
}

.mobile-nav .drop-down>a:after {
    content: "\ea99";
    font-family: IcoFont;
    padding-left: 10px;
    position: absolute;
    right: 15px;
}

.mobile-nav .active.drop-down>a:after {
    content: "\eaa0";
}

.mobile-nav .drop-down>a {
    padding-right: 35px;
}

.mobile-nav .drop-down ul {
    display: none;
    overflow: hidden;
}

.mobile-nav .drop-down li {
    padding-left: 20px;
}

.mobile-nav-toggle {
    position: fixed;
    right: 15px;
    top: 15px;
    z-index: 9998;
    border: 0;
    background: none;
    font-size: 24px;
    transition: all 0.4s;
    outline: none !important;
    line-height: 1;
    cursor: pointer;
    text-align: right;
}

.mobile-nav-toggle i {
    color: #fff;
}

.mobile-nav-overly {
    width: 100%;
    height: 100%;
    z-index: 9997;
    top: 0;
    left: 0;
    position: fixed;
    background: rgba(1, 41, 42, 0.9);
    overflow: hidden;
    display: none;
}

.mobile-nav-active {
    overflow: hidden;
}

.mobile-nav-active .mobile-nav {
    left: 0;
}

.mobile-nav-active .mobile-nav-toggle i {
    color: #fff;
}

/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/

/*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
section {
    padding: 60px 0;
}

.section-bg {
    background-color: #f2f9f8;
}

.section-title {
    text-align: center;
    padding-bottom: 30px;
}

.section-title h2 {
    font-size: 32px;
    font-weight: 300;
    margin-bottom: 20px;
    padding-bottom: 0;
    color: #555;
}

.section-title p {
    margin-bottom: 0;
}

/*--------------------------------------------------------------
# About Us
--------------------------------------------------------------*/
.about h3 {
    font-weight: 400;
    font-size: 26px;
}

.about ul {
    list-style: none;
    padding: 0;
}

.about ul li {
    padding-bottom: 10px;
}

.about ul i {
    font-size: 20px;
    padding-right: 4px;
    color: #70b9b0;
}

.about p:last-child {
    margin-bottom: 0;
}

/*--------------------------------------------------------------
# Services
--------------------------------------------------------------*/
.services .icon-box {
    margin-bottom: 20px;
    text-align: center;
}

.services .icon {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
}

.services .icon i {
    color: #70b9b0;
    font-size: 42px;
}

.services .title {
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 18px;
    text-transform: uppercase;
}

.services .title a {
    color: #343a40;
    transition: 0.3s;
}

.services .icon-box:hover .title a {
    color: #70b9b0;
}

.services .description {
    line-height: 24px;
    font-size: 14px;
}

/*--------------------------------------------------------------
# Call To Action
--------------------------------------------------------------*/
.call-to-action {
    background: linear-gradient(rgba(1, 41, 42, 0.5), rgba(7, 56, 57, 0.5)), url("../img/call-to-action-bg.jpg") fixed center center;
    background-size: cover;
    padding: 60px 0;
}

.call-to-action h3 {
    color: #fff;
    font-size: 28px;
    font-weight: 700;
}

.call-to-action p {
    color: #fff;
}

.call-to-action .cta-btn {
    font-family: "Lato", sans-serif;
    font-weight: 400;
    font-size: 16px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 8px 28px;
    border-radius: 25px;
    transition: 0.5s;
    margin-top: 10px;
    border: 2px solid #fff;
    color: #fff;
}

.call-to-action .cta-btn:hover {
    background: #70b9b0;
    border: 2px solid #70b9b0;
}

/*--------------------------------------------------------------
# Our Portfolio
--------------------------------------------------------------*/
.portfolio {
    padding: 60px 0;
}

.portfolio #portfolio-flters {
    padding: 0;
    margin: 0 0 35px 0;
    list-style: none;
    text-align: center;
}

.portfolio #portfolio-flters li {
    cursor: pointer;
    margin: 0 15px 15px 0;
    display: inline-block;
    padding: 10px 20px;
    font-size: 12px;
    line-height: 20px;
    color: #777;
    border-radius: 4px;
    text-transform: uppercase;
    background: white;
    margin-bottom: 5px;
    transition: all 0.3s ease-in-out;
}

.portfolio #portfolio-flters li:hover,
.portfolio #portfolio-flters li.filter-active {
    background: #70b9b0;
    color: #fff;
}

.portfolio #portfolio-flters li:last-child {
    margin-right: 0;
}

.portfolio .portfolio-item {
    background: #073839;
    overflow: hidden;
    min-height: 200px;
    position: relative;
    border-radius: 4px;
    margin: 0 0 30px 0;
}

.portfolio .portfolio-item img {
    transition: all 0.3s ease-in-out;
}

.portfolio .portfolio-item .portfolio-info {
    opacity: 0;
    position: absolute;
    transition: all .3s linear;
    text-align: center;
    top: 10%;
    left: 0;
    right: 0;
}

.portfolio .portfolio-item .portfolio-info h3 {
    font-size: 22px;
}

.portfolio .portfolio-item .portfolio-info h3 a {
    color: #fff;
    font-weight: bold;
}

.portfolio .portfolio-item .portfolio-info a i {
    color: #70b9b0;
    font-size: 24px;
}

.portfolio .portfolio-item:hover img {
    opacity: 0.4;
    transform: scale(1.1);
}

.portfolio .portfolio-item:hover .portfolio-info {
    opacity: 1;
    top: calc(50% - 30px);
}

/*--------------------------------------------------------------
# Frequently Asked Questions
--------------------------------------------------------------*/
.faq {
    padding: 60px 0;
}

.faq .faq-list {
    padding: 0;
    list-style: none;
}

.faq .faq-list li {
    padding: 0 0 20px 25px;
}

.faq .faq-list a {
    display: block;
    position: relative;
    font-family: #70b9b0;
    font-size: 18px;
    font-weight: 500;
}

.faq .faq-list i {
    font-size: 18px;
    position: absolute;
    left: -25px;
    top: 6px;
}

.faq .faq-list p {
    margin-bottom: 20px;
    font-size: 15px;
}

.faq .faq-list a.collapse {
    color: #70b9b0;
}

.faq .faq-list a.collapsed {
    color: #343a40;
}

.faq .faq-list a.collapsed:hover {
    color: #70b9b0;
}

.faq .faq-list a.collapsed i::before {
    content: "\eab2" !important;
}

/*--------------------------------------------------------------
# Our Team
--------------------------------------------------------------*/
.team .member {
    text-align: center;
    margin-bottom: 20px;
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
    padding: 30px 20px;
    background: #fff;
}

.team .member img {
    max-width: 60%;
    border-radius: 50%;
    margin: 0 0 30px 0;
}

.team .member h4 {
    font-weight: 700;
    margin-bottom: 2px;
    font-size: 18px;
}

.team .member span {
    font-style: italic;
    display: block;
    font-size: 13px;
}

.team .member p {
    padding-top: 10px;
    font-size: 14px;
    font-style: italic;
    color: #aaaaaa;
}

.team .member .social {
    margin-top: 15px;
}

.team .member .social a {
    color: #92cac3;
    transition: 0.3s;
}

.team .member .social a:hover {
    color: #3c8b81;
}

.team .member .social i {
    font-size: 18px;
    margin: 0 2px;
}

/*--------------------------------------------------------------
# Contact Us
--------------------------------------------------------------*/
.contact .contact-about h3 {
    font-size: 36px;
    margin: 0 0 10px 0;
    padding: 0;
    line-height: 1;
    font-weight: 500;
    letter-spacing: 1px;
    color: #70b9b0;
}

.contact .contact-about p {
    font-size: 14px;
    line-height: 24px;
    font-family: "Lato", sans-serif;
    color: #888;
}

.contact .social-links {
    padding-bottom: 20px;
}

.contact .social-links a {
    font-size: 18px;
    display: inline-block;
    background: #fff;
    color: #70b9b0;
    line-height: 1;
    padding: 8px 0;
    margin-right: 4px;
    border-radius: 50%;
    text-align: center;
    width: 36px;
    height: 36px;
    transition: 0.3s;
    border: 1px solid #70b9b0;
}

.contact .social-links a:hover {
    background: #70b9b0;
    color: #fff;
}

.contact .info {
    color: #777;
}

.contact .info i {
    font-size: 32px;
    color: #70b9b0;
    float: left;
    line-height: 1;
}

.contact .info label {
    font-size: 16px;
    float: left;
    line-height: 28px;
}

.contact .info p {
    line-height: 28px;
    font-size: 16px;
}

.contact .php-email-form .validate {
    display: none;
    color: red;
    margin: 0 0 15px 0;
    font-weight: 400;
    font-size: 13px;
}

.contact .php-email-form .error-message {
    display: none;
    color: #fff;
    background: #ed3c0d;
    text-align: center;
    padding: 15px;
    font-weight: 600;
}

.contact .php-email-form .sent-message {
    display: none;
    color: #fff;
    background: #18d26e;
    text-align: center;
    padding: 15px;
    font-weight: 600;
}

.contact .php-email-form .loading {
    display: none;
    background: #fff;
    text-align: center;
    padding: 15px;
}

.contact .php-email-form .loading:before {
    content: "";
    display: inline-block;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    margin: 0 10px -6px 0;
    border: 3px solid #18d26e;
    border-top-color: #eee;
    -webkit-animation: animate-loading 1s linear infinite;
    animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input,
.contact .php-email-form textarea {
    border-radius: 0;
    box-shadow: none;
    font-size: 14px;
}

.contact .php-email-form button[type="submit"] {
    background: #70b9b0;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
}

.contact .php-email-form button[type="submit"]:hover {
    background: #92cac3;
}

@-webkit-keyframes animate-loading {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

@keyframes animate-loading {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

/*--------------------------------------------------------------
# Map
--------------------------------------------------------------*/
.map {
    padding: 0;
    margin-bottom: -10px;
}

.map iframe {
    width: 100%;
    height: 380px;
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
#footer {
    background: #63372C;
    padding: 30px 0;
    color: #fff;
    font-size: 14px;
}

#footer .copyright {
    text-align: center;
}

#footer .credits {
    padding-top: 10px;
    text-align: center;
    font-size: 13px;
    color: #fff;
}

#hero {
    width: 100%;
    height: 100vh;
    background: url("assets/img/header.jpg") top center;
    background-size: cover;
    position: relative;
    margin-bottom: -80px;
}

#hero:before {
    content: "";
    background: rgba(100, 150, 120, 0.45);
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
}

#hero .hero-container {
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    display: flex;
    padding-top: 80px;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
}

#hero h1 {
    margin: 0 0 10px 0;
    font-size: 48px;
    font-weight: 300;
    line-height: 56px;
    color: #fff;
}

#hero h2 {
    color: #eee;
    margin-bottom: 50px;
    font-size: 20px;
    font-weight: 300;
}

#hero .btn-get-started {
    font-family: "Cormorant Garamond", sans-serif;
    font-weight: 400;
    font-size: 16px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 8px 28px 10px 28px;
    border-radius: 50px;
    transition: 0.5s;
    border: 1px solid #fff;
    color: #fff;
}

#hero .btn-get-started:hover {
    background: #fff;
    color: #70b9b0;
    border: 1px solid #70b9b0;
}

@media (min-width: 1024px) {
    #hero {
        background-attachment: fixed;
    }
}

@media (max-width: 768px) {
    #hero h1 {
        font-size: 28px;
        line-height: 36px;
    }

    #hero h2 {
        font-size: 18px;
        line-height: 24px;
        margin-bottom: 30px;
    }
}

button {
    border-radius: 4px;
    background-color: #F2E5D7;
    border-color: #63372C;
    color: black;
    text-align: center;
    font-size: 23px;
    border: inactive;
    padding: 10px;
    width: 200px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
}

.button2 {
    background-color: #F9ECCC;
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

* {
    box-sizing: border-box;
}

body {
    font-family: Verdana, sans-serif;
}

.mySlides {
    display: none;
}

img {
    vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
    max-width: 100%;
    position: relative;
    margin: auto;
}

/* Caption text */
.text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* The dots/bullets/indicators */
.dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active {
    background-color: #717171;
}

/* Fading animation */
.fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 5.5s;
    animation-name: fade;
    animation-duration: 5.5s;
}

@-webkit-keyframes fade {
    from {
        opacity: .3
    }

    to {
        opacity: 1
    }
}

@keyframes fade {
    from {
        opacity: .3
    }

    to {
        opacity: 1
    }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
    .text {
        font-size: 11px
    }
}
</style>

<body class="single">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <h1 class="text-light"><a href="index.php"><span>Jelekong</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block" style="margin-left:3%">
                <ul>
                    <li class="text-light"><a href="index.php#about">Sampurasun</a></li>
                    <li><a href="all_galeri.php">Galeri</a></li>
                    <li><a href="all_acara.php">Acara</a></li>
                    <li><a href="#">Pasar Seni</a></li>
                    <li><a href="all_berita.php">Berita</a></li>
                    <li><a href="login.php">Masuk</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End #header -->

    <!-- ======= Hero Section ======= -->


    <div id="fh5co-title-box"
        style="background-image: url(assets/img/berita/thumbnail/<?php echo $y[gambarPertama]?>); background-position: 50% 90.5px; height:500px; margin-bottom:4%"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="page-title">
            <img src="news/images/user.png" alt="Free HTML5 by FreeHTMl5.co">
            <span><?php echo $y[date_added]?></span>
            <h2><?php echo $y[judulBerita]?></h2>
            <h6 style="color:white"><?php echo $y[typeBerita]?> , <?php echo $y[kategori]?></h6>
        </div>
    </div>
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <?php if ($y[gambarKedua] != '' && $y[gambarKetiga] != ''){
                        echo "
                        <img src='assets/img/berita/gambar/$y[gambarKedua]' width='300px' height='300px'>
                          
                        <img src='assets/img/berita/gambar/$y[gambarKetiga]' width='300px' height='300px'>
                         ";
                    } else if ($y[gambarKedua] != ''){
                        echo "
                        <img src='assets/img/berita/gambar/$y[gambarKedua]' width='300px' height='300px'>
                        ";
                    } else if ($y[gambarKetiga] != ''){
                        echo "
                        <img src='assets/img/berita/gambar/$y[gambarKetiga]' width='300px' height='300px'>
                        ";
                    }
                    ?>
                    <p style="margin-top:2%">
                        <?php echo $y[isiBerita]?>
                    </p>
                    <?php if ($y[video] != ''){
                        echo "
                      <video width='600' controls>
                          <source src='assets/img/berita/video/$y[video]' type='video/mp4'>
                             Your browser does not support HTML video.
                         </video>  ";
                    } 
                    ?>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        <a href="#" class="fh5co_tagg">Business</a>
                        <a href="#" class="fh5co_tagg">Technology</a>
                        <a href="#" class="fh5co_tagg">Sport</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                        <a href="#" class="fh5co_tagg">Photography</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Education</a>
                        <a href="#" class="fh5co_tagg">Social</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    <?php
                         $show=mysqli_query($config,"SELECT * FROM tbl_berita");
                         while ($y=mysqli_fetch_array($show)){
                        ?>
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="assets/img/berita/thumbnail/<?php echo $y[gambarPertama]?>" alt="img"
                                class="fh5co_most_trading" />
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> <a href="detailBerita.php?id=<?php echo $y[id]?>"
                                    class="d-block fh5co_small_post_heading"> <?php echo $y[judulBerita]?> </a>
                            </div>
                            <div class="most_fh5co_treding_font_123"> <?php echo $y[date_added]?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5" style="margin-bottom:5%">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2" style="background-color:#ffffff00">
                <?php
                         $show=mysqli_query($config,"SELECT * FROM tbl_berita");
                         while ($y=mysqli_fetch_array($show)){
                        ?>
                <div class="item px-2" style="background-color:#ffffff">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img">
                            <img src="assets/img/berita/thumbnail/<?php echo $y[gambarPertama]?>" alt="" />
                        </div>
                        <div>
                            <a href="detailBerita.php?id=<?php echo $y[id]?>"
                                class="d-block fh5co_small_post_heading"><span
                                    class=""><?php echo $y[judulBerita]?></span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> <?php echo $y[date_added]?></div>
                        </div>
                    </div>
                </div>

                <?php }
                         ?>
            </div>
        </div>
    </div>


    <!-- ======= Frequently Asked Questions Section ======= -->




    <!-- ======= Map Section ======= -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Amoeba</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End #footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {

        // Format mata uang.
        $('.uang').mask('000.000.000', {
            reverse: true
        });

    })
    </script>

    <script>
    filterSelection("all")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("tombol");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="news/js/owl.carousel.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
    <!-- Waypoints -->
    <script src="news/js/jquery.waypoints.min.js"></script>
    <!-- Main -->
    <script src="news/js/main.js"></script>


</body>

</html>