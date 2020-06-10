<?php
include '../config/koneksi.php';
include '../config/library.php';
include '../config/fungsi_indotgl.php';

// Bagian User
if ( $_GET[module] == 'home' ) {
    include 'sidebar.php';
    include 'modul/mod_home/home.php';
} elseif ( $_GET[module] == 'acara' ) {
    include 'sidebar.php';
    include 'modul/mod_acara/acara.php';
} elseif ( $_GET[module] == 'galeri' ) {
    include 'sidebar.php';
    include 'modul/mod_galeri/galeri.php';
} elseif ( $_GET[module] == 'profil' ) {
    include 'sidebar.php';
    include 'modul/mod_profil/profil.php';
} elseif ( $_GET[module] == 'komentar' ) {
    include 'sidebar.php';
    include 'modul/mod_komentar/komentar.php';
} elseif ( $_GET[module] == 'profile_desa' ) {
    include 'sidebar.php';
    include 'modul/mod_profil_desa/profile_desa.php';
} elseif ( $_GET[module] == 'tema' ) {
    include 'sidebar.php';
    include 'modul/mod_tema/tema.php';
} elseif ( $_GET[module] == 'modulprak' ) {
    include 'sidebar.php';
    include 'modul/mod_modulprak/modulprak.php';
} elseif ( $_GET[module] == 'jurnal' ) {
    include 'sidebar.php';
    include 'modul/mod_jurnal/jurnal.php';
} elseif ( $_GET[module] == 'pengaturanujian' ) {
    include 'sidebar.php';
    include 'modul/mod_pengaturanujian/pengaturanujian.php';
} elseif ( $_GET[module] == 'panduan' ) {
    include 'sidebar.php';
    include 'modul/mod_panduan/panduan.php';
} elseif ( $_GET[module] == 'users' ) {
    include 'sidebar.php';
    include 'modul/mod_users/users.php';
}
// Apabila modul tidak ditemukan
else {
    echo '<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>';
}
?>