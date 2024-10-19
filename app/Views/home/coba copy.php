<?php

use App\Models\KonfigurasiModel;
use App\Models\MenuModel;

$konfigurasi  = new KonfigurasiModel();
$menu         = new MenuModel();
$konfigs        = $konfigurasi->show_data();
?>

<!DOCTYPE html>
<html lang="en">

<!-- head -->

<head>
    <title>TRIL | FT-UMSi</title>
    <meta name="description" content="Program Studi Teknologi Rekayasa Instalasi Listrik didirikan pada tahun 2022. Program Studi Teknologi Rekayasa Instalasi Listrik mendapat Surat Keputuan dari Menteri Pendidikan dan Kebudayaan untuk status Diakui pada tahun 2022. Di bawah naungan Fakultas Teknik Universitas Muhammadiyah Sinjai" />
    <meta name="keywords" content="ft-umsi,teknik,muhammadiyah,sinjai,kampus,indonesia,2020,maju bersama,organisasi,universitas,perguruan tinggi,ptm,institusi,sulawesi selatan,fakultas,program studi,akademik,sekolah tinggi" />

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no" />
    <meta name="robots" content="index, follow" />
    <meta name="copyright" content="Copyright 2024.FT UMSi. All Rights Reserved." />
    <link rel="shortcut icon" type="image/ico" href="<?= base_url(); ?>/web_tril/temp_tril/favicon.ico" />

    <meta property="og:title" content="Teknologi Rekayasa Instalasi Listrik | Universitas Muhammadiyah Sinjai" />
    <meta property="og:url" content="<?= base_url('/'); ?>" />
    <meta property="og:image" content="<?= base_url('/'); ?>/web_ft/landing/favicon.ico" />
    <meta property="og:image:secure_url" content="<?= base_url('/'); ?>/web_ft/landing/favicon.ico" />
    <meta property="og:site_name" content="<?= base_url('/'); ?>" />
    <meta property="og:description" content="Program Studi Teknologi Rekayasa Instalasi Listrik didirikan pada tahun 2022. Program Studi Teknologi Rekayasa Instalasi Listrik mendapat Surat Keputuan dari Menteri Pendidikan dan Kebudayaan untuk status Diakui pada tahun 2022. Di bawah naungan Fakultas Teknik Universitas Muhammadiyah Sinjai" />
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/meanmenu.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/et-line-icon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/reset.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/material-design-iconic-font.min.css">
    <link href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/style1.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/responsive.css">
    <link href="<?= base_url(); ?>/web_tril/dash/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c5ff7bf99.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/eks.css">
</head>
<!-- head -->

<body>
    <!-- header -->
    <header class="top">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="header-top-left">
                            <a href="<?= base_url('/'); ?>">
                                <p>Prodi <?= $konfigs['nama_web'] ?></p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="header-top-right text-right">
                            <ul>
                                <li>
                                    <a href="<?= base_url('/'); ?>">
                                        <div class="logo">
                                            <img src="<?= base_url(); ?>/web_tril/temp_tril/images/Logo_UMM.webp" />
                                        </div>
                                    </a>
                                    <ul class="list-unstyled   text-center">
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-area two header-sticky hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div class="content-wrapper">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="<?= base_url('/'); ?>"><i class="fa fa-home"></i> Home</a>
                                            <ul>
                                                <li><a href="<?= base_url('/'); ?>">Halaman Utama</a></li>
                                                <li><a href="<?= base_url('/berita'); ?>">Berita</a></li>
                                                <li><a href="<?= base_url('/agenda'); ?>">Agenda</a></li>
                                                <li><a href="<?= base_url('/pengumuman'); ?>">Pengumuman</a></li>
                                                <li><a href="<?= base_url('/kontak'); ?>">Kontak</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Profil</a>
                                            <ul>
                                                <?php
                                                $profil = $menu->profil();
                                                foreach ($profil as $profil) { ?>
                                                    <li><a href="<?= base_url('pages/' . $profil->slug_artikel); ?>"><?= $profil->judul_artikel; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Akademik</a>
                                            <ul>
                                                <?php
                                                $akademik = $menu->akademik();
                                                foreach ($akademik as $akademik) { ?>
                                                    <li><a href="<?= base_url('pages/' . $akademik->slug_artikel); ?>"><?= $akademik->judul_artikel; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Pendaftaran</a>
                                            <ul>
                                                <li><a href="https://pmb.umsi.ac.id/">Info Pendaftaran</a></li>
                                                <li><a href="https://pmb.umsi.ac.id/">Daftar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Mahasiswa</a>
                                            <ul>
                                                <li><a href="<?= base_url('/mahasiswa/penelitian') ?>">Penelitian Mahasiswa</a></li>
                                                <li><a href="<?= base_url('/mahasiswa/pengabdian') ?>">Pengabdian Mahasiswa</a></li>
                                                <li><a href="<?= base_url('/mahasiswa/prestasi') ?>">Prestasi Mahasiswa</a></li>
                                                <li><a href="<?= base_url('/mahasiswa/organisasi') ?>">Organisasi Mahasiswa</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Penelitian &amp; Publikasi</a>
                                            <ul>
                                                <li><a href="<?= base_url('/penelitian') ?>">Penelitan</a></li>
                                                <li><a href="<?= base_url('/pengabdian') ?>">Pengabdian</a></li>
                                                <li><a href="<?= base_url('/publikasi') ?>">Publikasi</a></li>
                                                <li><a href="https://jurnal-umsi.ac.id/">Jurnal-Jurnal</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Portal</a>
                                            <ul>
                                                <?php
                                                $layanan = $menu->layanan();
                                                foreach ($layanan as $menu_layanan) { ?>
                                                    <li><a href="<?= $menu_layanan->link ?>" target="_blank"><?= $menu_layanan->nama_layanan ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Download</a>
                                            <ul>
                                                <?php
                                                $dokumens = $menu->dokumens();
                                                foreach ($dokumens as $dokumens) { ?>
                                                    <li><a href="<?= base_url('download/' . $dokumens->nama_jenis); ?>"><?= $dokumens->nama_jenis; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header -->
    <!-- content -->
    <div class="cn-content">
        <section id="slider-container" class="slider-area two">
            <div class="slider-owl owl-theme owl-carousel">
                <?php
                $konfigslide        = $konfigurasi->hero();
                foreach ($konfigslide as $konfigslide) { ?>
                    <div class="single-slide item" style="background-image: url('<?= base_url(); ?>/web_tril/img/<?= $konfigslide->gambar ?>"></div>
                <?php } ?>
            </div>
        </section>
        <div class="blog-details-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="about-content">

                            <h2><span><?= $konfigsambutan['judul_artikel'] ?> </span></h2>
                            <p><?php
                                $isi = substr($konfigsambutan['isi'], 0, 150);
                                $isi = substr($isi, 0, strrpos($isi, " "));
                                ?>
                                <?= $isi ?>...</p>
                            <a class="default-btn" href="<?= base_url('/sambutan') ?>">Detail</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="about-img">
                            <img src="<?= base_url(); ?>/web_tril/img/<?= $konfigsambutan['gambar'] ?>" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe-area two pt-1 pb-10 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title">
                            <h2><a href="<?= base_url('/berita'); ?>">Berita</a></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $list_berita = $konfigurasi->list_berita();
                    foreach ($list_berita as $data) { ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-course">
                                <div class="course-img">
                                    <div class="ukuran">
                                        <a href="<?= base_url('pages/' . $data->slug_artikel) ?>"><img src="<?= base_url(); ?>/web_tril/img/<?= $data->gambar ?>" alt="course">
                                            <div class="course-hover">
                                                <i class="fa fa-link"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="course-content">
                                    <h3><a href="<?= base_url('pages/' . $data->slug_artikel) ?>"><?= $data->judul_artikel ?></a></h3>
                                    <p><?php
                                        $isi = substr($data->isi, 0, 150);
                                        $isi = substr($isi, 0, strrpos($isi, " "));
                                        ?>
                                        <?= $isi ?>
                                    </p>
                                    <a class="default-btn" href="<?= base_url('pages/' . $data->slug_artikel) ?>">read more</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="notice-area two pt-80 pb-10 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title">
                            <h2><a href="<?= base_url('/agenda'); ?>">Agenda</a></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $list_agenda = $konfigurasi->list_agenda();
                    foreach ($list_agenda as $data) { ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-course">
                                <div class="course-img">
                                    <div class="ukuran">
                                        <a href="<?= base_url('pages/' . $data->slug_artikel) ?>"><img src="<?= base_url(); ?>/web_tril/img/<?= $data->gambar ?>" alt="course">
                                            <div class="course-hover">
                                                <i class="fa fa-link"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="course-content">
                                    <h3><a href="<?= base_url('pages/' . $data->slug_artikel) ?>"><?= $data->judul_artikel ?></a></h3>
                                    <p>
                                        <?php
                                        $isi = substr($data->isi, 0, 150);
                                        $isi = substr($isi, 0, strrpos($isi, " "));
                                        ?>
                                        <?= $isi ?>
                                    </p>
                                    <a class="default-btn" href="<?= base_url('pages/' . $data->slug_artikel) ?>">read more</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <section class="subscribe-area1 two pt-80 pb-10 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="notice-left-wrapper">
                            <h3 class="text-center"><a href="<?= base_url('/pengumuman'); ?>">Pengumuman</a></h3>
                            <div class="notice-left">
                                <?php
                                $list_pengumuman = $konfigurasi->list_pengumuman();
                                foreach ($list_pengumuman as $data) { ?>
                                    <div class="single-notice-left mb-23 pb-20">
                                        <h4><?= date('d F Y', strtotime($data->tanggal)) ?></h4>
                                        <p><a href="<?= base_url('pages/' . $data->slug_artikel) ?>"><?= $data->judul_artikel ?></a></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="notice-left-wrapper">
                            <h3 class="text-center"><a href="<?= base_url('/karir'); ?>">Karir</a></h3>
                            <div class="notice-left">
                                <?php
                                $list_karir = $konfigurasi->list_karir();
                                foreach ($list_karir as $data) { ?>
                                    <div class="single-notice-left mb-23 pb-20">
                                        <h4><?= date('d F Y', strtotime($data->tanggal)) ?></h4>
                                        <p><a href="<?= base_url('pages/' . $data->slug_artikel) ?>"><?= $data->judul_artikel ?></a></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="notice-area-galeri two pt-80 pb-100 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title">
                            <h2><a href="<?= base_url('/'); ?>">Galeri</a></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $konfigs = $konfigurasi->galeri();
                    foreach ($konfigs as $galeri) { ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-course">
                                <div class="course-img">
                                    <div class="ukuran1">
                                        <a href="<?= base_url(); ?>/web_tril/img/<?= $galeri->gambar; ?>"><img src="<?= base_url(); ?>/web_tril/img/<?= $galeri->gambar; ?>" alt="course">
                                            <div class="course-hover">
                                                <i class="fa fa-link"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <!-- footer -->
    <div class="subscribe-area-footer">
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="single-widget">
                            <div class="footer-logo">
                                <a href="<?= base_url('/'); ?>"><img src="<?= base_url(); ?>/web_tril/temp_tril/images/Logo_prodi.png" /></a>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="<?= $konfigs['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?= $konfigs['youtube'] ?>"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="<?= $konfigs['instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="<?= $konfigs['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="single-widget">
                            <h3>Menu</h3>
                            <ul>
                                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                                <li><a href="<?= base_url('/'); ?>">Akademik</a></li>
                                <li><a href="<?= base_url('/'); ?>">Pendaftaran</a></li>
                                <li><a href="<?= base_url('/'); ?>">Download</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="single-widget">
                            <h3>Kategori</h3>
                            <ul>
                                <li><a href="<?= base_url('/berita'); ?>">Berita</a></li>
                                <li><a href="<?= base_url('/agenda'); ?>">Agenda</a></li>
                                <li><a href="<?= base_url('/pengumuman'); ?>">Pengumuman</a></li>
                                <li><a href="<?= base_url('/karir'); ?>">Karir</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <footer class="footer-area">
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="copy">&copy; 2024 Teknologi Rekayasa Instalasi Listrik</p>
                        <p>Developed by <a href="mailto:lutfaizal.informatika@gmail.com">LF-Soft</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    <!-- script -->
    <script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/js/bootstrap.min.js"></script>
    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }
    </script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("bmySlides");
            var dots = document.getElementsByClassName("bdemo");
            var captionText = document.getElementById("bcaption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" bactive", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.meanmenu.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.magnific-popup.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/ajax-mail.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.mb.YTPlayer.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/plugins.js"></script>
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/main.js"></script>
    <script type="text/javascript">
        (function($) {
            "use strict";
            $.scrollUp({
                scrollText: '<i class="fa fa-angle-up"></i>',
                easingType: 'linear',
                scrollSpeed: 900,
                animation: 'fade'
            });
        })(jQuery);
    </script>
    <script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/jquery.min.js"></script>
    <script type=" text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/owl.carousel.js"></script>
    <script src="<?= base_url(); ?>/web_tril/dash/plugins/datatable/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true
            });
        })
        $(document).ready(function() {
            $('#example').DataTable();
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });
            table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script type="text/javascript">
        function openNav() {
            document.getElementById("MobileSlideMenu").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("MobileSlideMenu").style.width = "0";
        }
        (function($) {
            $(window).on("load", function() {

                var content = $("#content"),
                    autoScrollTimer = 8000,
                    autoScrollTimerAdjust, autoScroll;

                content.mCustomScrollbar({
                    scrollButtons: {
                        enable: true
                    },
                    callbacks: {
                        whileScrolling: function() {
                            autoScrollTimerAdjust = autoScrollTimer * this.mcs.topPct / 100;
                        },
                        onScroll: function() {
                            if ($(this).data("mCS").trigger === "internal") {
                                AutoScrollOff();
                            }
                        }
                    }
                });
            });
        })(jQuery);
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(window).scrollTop() > 100) {
                    $('#tombolScrollTop').fadeIn();
                } else {
                    $('#tombolScrollTop').fadeOut();
                }
            });
        });

        function scrolltotop() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        }
    </script>
    <script type="text/javascript">
        function open_show() {
            document.getElementById("my_show").style.display = "block";
            document.getElementById("close").style.display = "none";
        }

        function close_show() {
            document.getElementById("my_show").style.display = "none";
            document.getElementById("close").style.display = "block";
        }
    </script>
    <!-- script -->
</body>

</html>