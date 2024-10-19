<?php

use App\Models\MenuModel;
use App\Models\KonfigurasiModel;

$menu = new MenuModel();
$konfigurasi  = new KonfigurasiModel();
$konfigs        = $konfigurasi->show_data();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>TRIL | FT-UMSi</title>
    <!-- <meta name="description" content=" Program Studi Teknik Sipil FT-UMSi didirikan pada 1981. Program Studi Teknik Sipil mendapat Surat Keputuan dari Menteri Pendidikan dan Kebudayaan untuk status Diakui pada tahun 1989. Di bawah naungan Fakultas Teknik, Te" />
    <meta name="keywords" content="umm,muhammadiyah,malang,kampus,putih,indonesia,1964,dari muhammadiyah untuk bangsa,organisasi,universitas,perguruan tinggi,ptm,institusi,jawa timur,east java,fakultas,program studi,akademik,sekolah tinggi" /> -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no" />
    <meta name="robots" content="index, follow" />
    <!-- <meta name="copyright" content="Copyright 2018. University of Muhammadiyah Malang. All Rights Reserved." /> -->
    <link rel="shortcut icon" type="image/ico" href="<?= base_url(); ?>/web_tril/temp_tril/favicon.ico" />

    <!-- <link rel="canonical" href="<?= base_url('/'); ?>" />
    <meta property="og:title" content="TRIL | FT-UMSi" />
    <meta property="og:url" content="<?= base_url('/'); ?>" />
    <meta property="og:image" content="https://sipil.umm.ac.id/files/image/1_%20Landscape%20UMM.jpg" />
    <meta property="og:image:secure_url" content="https://sipil.umm.ac.id/files/image/1_%20Landscape%20UMM.jpg" />
    <meta property="og:site_name" content="<?= base_url('/'); ?>" />
    <meta property="og:description" content=" Program Studi Teknik Sipil Universitas Muhammadiyah Malang didirikan pada 1981. Program Studi Teknik Sipil mendapat Surat Keputuan dari Menteri Pendidikan dan Kebudayaan untuk status Diakui pada tahun 1989. Di bawah naungan Fakultas Teknik, Te" />
    <meta name="twitter:title" content="Selamat Datang di Program Studi Teknik Sipil - Prodi Teknik Sipil | Universitas Muhammadiyah Malang" />
    <meta name="twitter:description" content=" Program Studi Teknik Sipil Universitas Muhammadiyah Malang didirikan pada 1981. Program Studi Teknik Sipil mendapat Surat Keputuan dari Menteri Pendidikan dan Kebudayaan untuk status Diakui pada tahun 1989. Di bawah naungan Fakultas Teknik, Te" />
    <meta name="twitter:image" content="https://sipil.umm.ac.id/files/image/1_%20Landscape%20UMM.jpg" />
    <meta itemprop="image" content="https://sipil.umm.ac.id/files/image/1_%20Landscape%20UMM.jpg" /> -->

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
    <script src="<?= base_url(); ?>/web_tril/temp_tril/satu/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c5ff7bf99.js" crossorigin="anonymous"></script>

    <style type="text/css">
        .header-top {
            background: ;
        }

        .header-top:after,
        .header-top-right::after {
            background: ;
        }

        .header-area,
        .mobile-menu,
        .mobile-menu-nav,
        .main-menu ul li ul {
            background: !important;
        }

        .header-area.two .main-menu nav>ul>li>a,
        .main-menu nav ul li ul li a,
        .mobile-menu-nav ul li a,
        .mobile-menu-nav ul li a i,
        .mobile-menu-nav a.closebtn,
        .mobile-menu-nav ul li i {
            color: !important;
        }

        .mobile-menu-nav a.closebtn,
        .mobile-menu-nav ul li,
        .mobile-menu-nav ul li i {
            border-color: !important;
        }

        /*body*/


        .cn-content .subscribe-area {
            background: ;
        }

        .cn-content .subscribe-area .blog-details .blog-details-content h2,
        .cn-content .subscribe-area .blog-details .link-terkait h3 span,
        .cn-content .subscribe-area .blog-details .boxinfo .title2 a,
        .cn-content .subscribe-area .section-title h2,
        .cn-content .subscribe-area .course-content h3,
        .cn-content .subscribe-area .notice-left-wrapper h3,
        .cn-content .subscribe-area .single-notice-left h4 {
            color: ;
        }

        .cn-content .subscribe-area .course-content .default-btn {
            background: ;
        }

        .cn-content .subscribe-area .course-content {
            box-shadow: 0px 0px 6px 0px;
        }

        .cn-content .subscribe-area .blog-details .boxcontent p,
        .cn-content .subscribe-area .blog-details .link-terkait ul li,
        .cn-content .subscribe-area .blog-details .link-terkait ul li a,
        .cn-content .subscribe-area .blog-details .blog-details-content p,
        .cn-content .subscribe-area .blog-details .blog-details-content p a,
        .cn-content .subscribe-area .course-content p,
        .cn-content .subscribe-area .course-content .default-btn,
        .cn-content .subscribe-area .single-notice-left p,
        .cn-content .subscribe-area .blog-details .boxcontent,
        .cn-content .subscribe-area .blog-details .boxcontent table,
        .cn-content .subscribe-area .blog-details .boxcontent table h2 span {
            color: ;
        }

        .cn-content .notice-area {
            background: ;
        }

        .cn-content .notice-area .blog-details .blog-details-content h2,
        .cn-content .notice-area .blog-details .link-terkait h3 span,
        .cn-content .notice-area .blog-details .boxinfo .title2 a,
        .cn-content .notice-area .section-title h2,
        .cn-content .notice-area .course-content h3,
        .cn-content .notice-area .notice-left-wrapper h3,
        .cn-content .notice-area .single-notice-left h4 {
            color: ;
        }

        .cn-content .notice-area .course-content .default-btn {
            background: ;
        }

        .cn-content .notice-area .course-content {
            box-shadow: 0px 0px 6px 0px;
        }

        .cn-content .notice-area .blog-details .boxcontent p,
        .cn-content .notice-area .blog-details .link-terkait ul li,
        .cn-content .notice-area .blog-details .link-terkait ul li a,
        .cn-content .notice-area .blog-details .blog-details-content p,
        .cn-content .notice-area .blog-details .blog-details-content p a,
        .cn-content .notice-area .course-content p,
        .cn-content .notice-area .course-content .default-btn,
        .cn-content .notice-area .single-notice-left p,
        .cn-content .notice-area .blog-details .boxcontent,
        .cn-content .notice-area .blog-details .boxcontent table,
        .cn-content .notice-area .blog-details .boxcontent table h2 span {
            color: ;
        }

        .cn-content .subscribe-area1 {
            background: ;
        }

        .cn-content .subscribe-area1 .blog-details .blog-details-content h2,
        .cn-content .subscribe-area1 .blog-details .link-terkait h3 span,
        .cn-content .subscribe-area1 .blog-details .boxinfo .title2 a,
        .cn-content .subscribe-area1 .section-title h2,
        .cn-content .subscribe-area1 .course-content h3,
        .cn-content .subscribe-area1 .notice-left-wrapper h3,
        .cn-content .subscribe-area1 .single-notice-left h4 {
            color: ;
        }

        .cn-content .subscribe-area1 .course-content .default-btn {
            background: ;
        }

        .cn-content .subscribe-area1 .course-content {
            box-shadow: 0px 0px 6px 0px;
        }

        .cn-content .subscribe-area1 .blog-details .boxcontent p,
        .cn-content .subscribe-area1 .blog-details .link-terkait ul li,
        .cn-content .subscribe-area1 .blog-details .link-terkait ul li a,
        .cn-content .subscribe-area1 .blog-details .blog-details-content p,
        .cn-content .subscribe-area1 .blog-details .blog-details-content p a,
        .cn-content .subscribe-area1 .course-content p,
        .cn-content .subscribe-area1 .course-content .default-btn,
        .cn-content .subscribe-area1 .single-notice-left p,
        .cn-content .subscribe-area1 .blog-details .boxcontent,
        .cn-content .subscribe-area1 .blog-details .boxcontent table,
        .cn-content .subscribe-area1 .blog-details .boxcontent table h2 span {
            color: ;
        }

        .cn-content .notice-area-galeri {
            background: ;
        }

        .cn-content .notice-area-galeri .blog-details .blog-details-content h2,
        .cn-content .notice-area-galeri .blog-details .link-terkait h3 span,
        .cn-content .notice-area-galeri .blog-details .boxinfo .title2 a,
        .cn-content .notice-area-galeri .section-title h2,
        .cn-content .notice-area-galeri .course-content h3,
        .cn-content .notice-area-galeri .notice-left-wrapper h3,
        .cn-content .notice-area-galeri .single-notice-left h4 {
            color: ;
        }

        .cn-content .notice-area-galeri .course-content .default-btn {
            background: ;
        }

        .cn-content .notice-area-galeri .course-content {
            box-shadow: 0px 0px 6px 0px;
        }

        .cn-content .notice-area-galeri .blog-details .boxcontent p,
        .cn-content .notice-area-galeri .blog-details .link-terkait ul li,
        .cn-content .notice-area-galeri .blog-details .link-terkait ul li a,
        .cn-content .notice-area-galeri .blog-details .blog-details-content p,
        .cn-content .notice-area-galeri .blog-details .blog-details-content p a,
        .cn-content .notice-area-galeri .course-content p,
        .cn-content .notice-area-galeri .course-content .default-btn,
        .cn-content .notice-area-galeri .single-notice-left p,
        .cn-content .notice-area-galeri .blog-details .boxcontent,
        .cn-content .notice-area-galeri .blog-details .boxcontent table,
        .cn-content .notice-area-galeri .blog-details .boxcontent table h2 span {
            color: ;
        }

        /*footer*/
        .subscribe-area-footer {
            background: ;
        }

        .subscribe-area-footer .single-widget ul li,
        .subscribe-area-footer .single-widget ul li a,
        .subscribe-area-footer p,
        .subscribe-area-footer .single-widget h3 {
            color: !important;
        }

        .subscribe-area-footer .single-widget h3::after,
        .subscribe-area-footer .single-widget h3::before {
            background: !important;
        }

        .footer-bottom {
            background: ;
        }

        .footer-bottom p {
            color: !important;
        }
    </style>
</head>

<body>

    <header class="top">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="header-top-left">
                            <a href="<?= base_url('/'); ?>">
                                <p>Prodi. <?= $konfigs['nama_web'] ?></p>
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
                        <div class="content-wrapper"> <!--text-right-->
                            <!-- Main Menu Start -->
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li class="pagehome"><a href="<?= base_url('/'); ?>"><i class="fa fa-home"></i></a></li>
                                        <li>
                                            <a href="<?= base_url('/'); ?>">Home</a>
                                            <ul>
                                                <li><a href="https://sipil.umm.ac.id/id/pages/halaman-utama-2-12736.html">Halaman Utama</a></li>
                                                <li><a href="https://sipil.umm.ac.id/id/artikel.html">Berita</a></li>
                                                <li><a href="https://sipil.umm.ac.id/id/agenda.html">Agenda</a></li>
                                                <li><a href="https://sipil.umm.ac.id/id/pengumuman.html">Pengumuman</a></li>
                                                <li><a href="/id/pages/galeri.html">Galeri</a></li>
                                                <li><a href="/id/pages/kontak-46-9607.html">Kontak</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/profil-186-9664.html">Profil</a>
                                            <ul>
                                                <li><a href="/id/pages/sejarah-114-9665.html">Sejarah</a></li>
                                                <li><a href="/id/pages/profil-singkat-2-9666.html">Profil Singkat</a></li>
                                                <li><a href="/id/pages/visi-dan-misi-98.html">Visi dan Misi</a></li>
                                                <li><a href="https://sipil.umm.ac.id/id/pages/organisasi-25.html">Organisasi &amp; Staff</a></li>
                                                <li><a href="/id/pages/program-unggulan-2-9669.html">Program Unggulan</a></li>
                                                <li><a href="/id/pages/prestasi-5-9670.html">Prestasi</a></li>
                                                <li><a href="https://youtu.be/SS-YBgdP_DM">Video Profile</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/akademik-4-9613.html">Akademik</a>
                                            <ul>
                                                <li><a href="/id/pages/tujuan-output-2.html">Tujuan & Output</a></li>
                                                <li><a href="/id/pages/gelar-lulusan-2.html">Gelar Lulusan</a></li>
                                                <li><a href="/id/pages/prospek-lulusan-2.html">Prospek Lulusan</a></li>
                                                <li><a href="/id/pages/kurikulum-mata-kuliah-2.html">Kurikulum & Mata Kuliah</a></li>
                                                <li><a href="/id/pages/jadwal-kuliah-28.html">Jadwal Kuliah</a></li>
                                                <li><a href="/id/pages/tugas-akhir-6.html">Tugas Akhir</a></li>
                                                <li><a href="/id/pages/krs-online-3.html">KRS Online</a></li>
                                                <li><a href="/id/pages/khs-2.html">KHS</a></li>
                                                <li><a href="/id/pages/pusat-studi-3.html">Pusat Studi</a></li>
                                                <li><a href="/id/pages/elearning-2.html">E-Learning</a></li>
                                                <li><a href="/id/pages/wisuda-3.html">Wisuda</a></li>
                                                <li><a href="/id/pages/profil-lulusan-2.html">Profil Lulusan</a></li>
                                                <li><a href="/id/pages/capaian-pembelajaran-lulusan-cpl-2.html">Capaian Pembelajaran Lulusan (CPL)</a></li>
                                                <li><a href="/id/pages/profil-profesional-mandiri.html">Profil Profesional Mandiri</a></li>
                                                <li><a href="https://spmi.umm.ac.id/evevents_list.php?page=list">Penjaminan Mutu</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/pendaftaran-3.html">Pendaftaran</a>
                                            <ul>
                                                <li><a href="https://pmb.umm.ac.id/">Info Pendaftaran</a></li>
                                                <li><a href="https://pmb.umm.ac.id/">Daftar</a></li>
                                                <li><a href="/id/pages/bookletbrosur-2.html">Booklet/Brosur</a></li>
                                                <li><a href="https://nuni.mobi/merdeka-belajar/">Program Merdeka Belajar</a></li>
                                                <li><a href="/id/pages/lomba-2.html">Lomba Karya Tulis Ilmiah SMA/SMK</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/mahasiswa-2.html">Mahasiswa</a>
                                            <ul>
                                                <li><a href="/id/pages/data-mahasiswa-4.html">Data Mahasiswa</a></li>
                                                <li><a href="/id/pages/penelitian-mahasiswa-2.html">Penelitian Mahasiswa</a></li>
                                                <li><a href="/id/pages/pengabdian-mahasiswa-2.html">Pengabdian Mahasiswa</a></li>
                                                <li><a href="/id/pages/aktivitas-mahasiswa-3.html">Aktivitas Mahasiswa</a></li>
                                                <li><a href="https://sipil.umm.ac.id/files/file/Data%20prestasi%20mahasiswa%20sipil.pdf">Prestasi Mahasiswa</a></li>
                                                <li><a href="/id/pages/organisasi-mahasiswa-2.html">Organisasi Mahasiswa</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/download-15.html">Download</a>
                                            <ul>
                                                <li><a href="/id/pages/panduanpanduan-2-9695.html">Panduan-Panduan</a></li>
                                                <li><a href="/id/pages/iabee-evaluation.html">IABEE Evaluation</a></li>
                                                <li><a href="/id/pages/formulir-akademik-2.html">Formulir Akademik</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/penelitian-publikasi-2.html">Penelitian &amp; Publikasi</a>
                                            <ul>
                                                <li><a href="https://ejournal.umm.ac.id/index.php/jmts">Penelitan</a></li>
                                                <li><a href="/id/pages/pengabdian-2.html">Pengabdian</a></li>
                                                <li><a href="/id/pages/publikasi-60.html">Publikasi</a></li>
                                                <li><a href="/id/pages/jurnaljurnal-2.html">Jurnal-Jurnal</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/fasilitas-64.html">Fasilitas</a>
                                            <ul>
                                                <li><a href="/id/pages/fasilitas-pbm-2.html">Fasilitas PBM</a></li>
                                                <li><a href="/id/pages/laboratorium-12.html">Laboratorium</a></li>
                                                <li><a href="/id/pages/fasilitas-umum-2.html">Fasilitas Umum</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/portal-2-9646.html">Portal</a>
                                            <ul>
                                                <li><a href="https://infokhs.umm.ac.id">Portal Mahasiswa</a></li>
                                                <li><a href="https://portal-kardos.umm.ac.id">Portal Dosen &amp; Karyawan</a></li>
                                                <li><a href="https://webmail.umm.ac.id">UMM Mail</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/alumni-43.html">Alumni</a>
                                            <ul>
                                                <li><a href="/id/pages/data-profil-alumni-2.html">Data &amp; Profil Alumni</a></li>
                                                <li><a href="/id/pages/pendaftaran-3-9652.html">Pendaftaran</a></li>
                                                <li><a href="/id/pages/lowongan-kerja-3.html">Lowongan Kerja</a></li>
                                                <li><a href="/id/pages/info-kegiatan-2.html">Info Kegiatan</a></li>
                                                <li><a href="/id/pages/tracer-study-2.html">Tracer Study</a></li>
                                                <li><a href="/id/pages/alumni-sukses-2.html">Alumni Sukses</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/id/pages/center-of-excellence-2.html">Center of Excellence</a>
                                            <ul>
                                                <li><a href="/id/pages/profil-singkat-center-of-excellent.html">Profil Singkat</a></li>
                                                <li><a href="/id/pages/kurikulum-11.html">Kurikulum</a></li>
                                                <li><a href="/id/pages/dudi-2.html">Mitra/DUDI</a></li>
                                                <li><a href="/id/pages/implementasi.html">Implementasi</a></li>
                                                <li><a href="/id/pages/testimoni.html">Testimoni</a></li>
                                                <li><a href="/id/pages/dokumentasi-4.html">Dokumentasi</a></li>
                                                <li><a href="https://youtu.be/AKCfBN8Gg_Y">Video Profile</a></li>
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

    <div class="mobile-menu hidden-lg hidden-md hidden-sm header-sticky" style="background: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-wrapper text-right" onclick="scrolltotop()">
                        <button class="" onclick="openNav()">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu-nav" id="MobileSlideMenu" style="background: #fff;">
        <a href="javascript:void(0)" class="closebtn fa fa-close fa-1x" onclick="closeNav()"></a>
        <ul>
            <li><a href="<?= base_url('/'); ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?= base_url('/'); ?>">Home </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9599"></i></li>
            <ul class="collapse" id="navbar9599">
                <li><a href="https://sipil.umm.ac.id/id/pages/halaman-utama-2-12736.html">Halaman Utama</a></li>
                <li><a href="https://sipil.umm.ac.id/id/artikel.html">Berita</a></li>
                <li><a href="https://sipil.umm.ac.id/id/agenda.html">Agenda</a></li>
                <li><a href="https://sipil.umm.ac.id/id/pengumuman.html">Pengumuman</a></li>
                <li><a href="/id/pages/galeri.html">Galeri</a></li>
                <li><a href="/id/pages/kontak-46-9607.html">Kontak</a></li>
            </ul>
            <li><a href="/id/pages/profil-186-9664.html">Profil </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9664"></i></li>
            <ul class="collapse" id="navbar9664">
                <li><a href="/id/pages/sejarah-114-9665.html">Sejarah</a></li>
                <li><a href="/id/pages/profil-singkat-2-9666.html">Profil Singkat</a></li>
                <li><a href="/id/pages/visi-dan-misi-98.html">Visi dan Misi</a></li>
                <li><a href="https://sipil.umm.ac.id/id/pages/organisasi-25.html">Organisasi &amp; Staff</a></li>
                <li><a href="/id/pages/program-unggulan-2-9669.html">Program Unggulan</a></li>
                <li><a href="/id/pages/prestasi-5-9670.html">Prestasi</a></li>
                <li><a href="https://youtu.be/SS-YBgdP_DM">Video Profile</a></li>
            </ul>
            <li><a href="/id/pages/akademik-4-9613.html">Akademik </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9613"></i></li>
            <ul class="collapse" id="navbar9613">
                <li><a href="/id/pages/tujuan-output-2.html">Tujuan & Output</a></li>
                <li><a href="/id/pages/gelar-lulusan-2.html">Gelar Lulusan</a></li>
                <li><a href="/id/pages/prospek-lulusan-2.html">Prospek Lulusan</a></li>
                <li><a href="/id/pages/kurikulum-mata-kuliah-2.html">Kurikulum & Mata Kuliah</a></li>
                <li><a href="/id/pages/jadwal-kuliah-28.html">Jadwal Kuliah</a></li>
                <li><a href="/id/pages/tugas-akhir-6.html">Tugas Akhir</a></li>
                <li><a href="/id/pages/krs-online-3.html">KRS Online</a></li>
                <li><a href="/id/pages/khs-2.html">KHS</a></li>
                <li><a href="/id/pages/pusat-studi-3.html">Pusat Studi</a></li>
                <li><a href="/id/pages/elearning-2.html">E-Learning</a></li>
                <li><a href="/id/pages/wisuda-3.html">Wisuda</a></li>
                <li><a href="/id/pages/profil-lulusan-2.html">Profil Lulusan</a></li>
                <li><a href="/id/pages/capaian-pembelajaran-lulusan-cpl-2.html">Capaian Pembelajaran Lulusan (CPL)</a></li>
                <li><a href="/id/pages/profil-profesional-mandiri.html">Profil Profesional Mandiri</a></li>
                <li><a href="https://spmi.umm.ac.id/evevents_list.php?page=list">Penjaminan Mutu</a></li>
            </ul>
            <li><a href="/id/pages/pendaftaran-3.html">Pendaftaran </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9626"></i></li>
            <ul class="collapse" id="navbar9626">
                <li><a href="https://pmb.umm.ac.id/">Info Pendaftaran</a></li>
                <li><a href="https://pmb.umm.ac.id/">Daftar</a></li>
                <li><a href="/id/pages/bookletbrosur-2.html">Booklet/Brosur</a></li>
                <li><a href="https://nuni.mobi/merdeka-belajar/">Program Merdeka Belajar</a></li>
                <li><a href="/id/pages/lomba-2.html">Lomba Karya Tulis Ilmiah SMA/SMK</a></li>
            </ul>
            <li><a href="/id/pages/mahasiswa-2.html">Mahasiswa </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9630"></i></li>
            <ul class="collapse" id="navbar9630">
                <li><a href="/id/pages/data-mahasiswa-4.html">Data Mahasiswa</a></li>
                <li><a href="/id/pages/penelitian-mahasiswa-2.html">Penelitian Mahasiswa</a></li>
                <li><a href="/id/pages/pengabdian-mahasiswa-2.html">Pengabdian Mahasiswa</a></li>
                <li><a href="/id/pages/aktivitas-mahasiswa-3.html">Aktivitas Mahasiswa</a></li>
                <li><a href="https://sipil.umm.ac.id/files/file/Data%20prestasi%20mahasiswa%20sipil.pdf">Prestasi Mahasiswa</a></li>
                <li><a href="/id/pages/organisasi-mahasiswa-2.html">Organisasi Mahasiswa</a></li>
            </ul>
            <li><a href="/id/pages/download-15.html">Download </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9657"></i></li>
            <ul class="collapse" id="navbar9657">
                <li><a href="/id/pages/panduanpanduan-2-9695.html">Panduan-Panduan</a></li>
                <li><a href="/id/pages/iabee-evaluation.html">IABEE Evaluation</a></li>
                <li><a href="/id/pages/formulir-akademik-2.html">Formulir Akademik</a></li>
            </ul>
            <li><a href="/id/pages/penelitian-publikasi-2.html">Penelitian &amp; Publikasi </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9637"></i></li>
            <ul class="collapse" id="navbar9637">
                <li><a href="https://ejournal.umm.ac.id/index.php/jmts">Penelitan</a></li>
                <li><a href="/id/pages/pengabdian-2.html">Pengabdian</a></li>
                <li><a href="/id/pages/publikasi-60.html">Publikasi</a></li>
                <li><a href="/id/pages/jurnaljurnal-2.html">Jurnal-Jurnal</a></li>
            </ul>
            <li><a href="/id/pages/fasilitas-64.html">Fasilitas </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9642"></i></li>
            <ul class="collapse" id="navbar9642">
                <li><a href="/id/pages/fasilitas-pbm-2.html">Fasilitas PBM</a></li>
                <li><a href="/id/pages/laboratorium-12.html">Laboratorium</a></li>
                <li><a href="/id/pages/fasilitas-umum-2.html">Fasilitas Umum</a></li>
            </ul>
            <li><a href="/id/pages/portal-2-9646.html">Portal </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9646"></i></li>
            <ul class="collapse" id="navbar9646">
                <li><a href="https://infokhs.umm.ac.id">Portal Mahasiswa</a></li>
                <li><a href="https://portal-kardos.umm.ac.id">Portal Dosen &amp; Karyawan</a></li>
                <li><a href="https://webmail.umm.ac.id">UMM Mail</a></li>
            </ul>
            <li><a href="/id/pages/alumni-43.html">Alumni </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9650"></i></li>
            <ul class="collapse" id="navbar9650">
                <li><a href="/id/pages/data-profil-alumni-2.html">Data &amp; Profil Alumni</a></li>
                <li><a href="/id/pages/pendaftaran-3-9652.html">Pendaftaran</a></li>
                <li><a href="/id/pages/lowongan-kerja-3.html">Lowongan Kerja</a></li>
                <li><a href="/id/pages/info-kegiatan-2.html">Info Kegiatan</a></li>
                <li><a href="/id/pages/tracer-study-2.html">Tracer Study</a></li>
                <li><a href="/id/pages/alumni-sukses-2.html">Alumni Sukses</a></li>
            </ul>
            <li><a href="/id/pages/center-of-excellence-2.html">Center of Excellence </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar15034"></i></li>
            <ul class="collapse" id="navbar15034">
                <li><a href="/id/pages/profil-singkat-center-of-excellent.html">Profil Singkat</a></li>
                <li><a href="/id/pages/kurikulum-11.html">Kurikulum</a></li>
                <li><a href="/id/pages/dudi-2.html">Mitra/DUDI</a></li>
                <li><a href="/id/pages/implementasi.html">Implementasi</a></li>
                <li><a href="/id/pages/testimoni.html">Testimoni</a></li>
                <li><a href="/id/pages/dokumentasi-4.html">Dokumentasi</a></li>
                <li><a href="https://youtu.be/AKCfBN8Gg_Y">Video Profile</a></li>
            </ul>
        </ul>
    </div>
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
                            <h2><span>Selamat Datang di Program Studi <?= $konfigs['nama_web'] ?> </span></h2>
                            <p>&nbsp; Program Studi TRIL Universitas Muhammadiyah Malang didirikan pada 1981. Program Studi Teknik Sipil mendapat Surat Keputuan dari Menteri Pendidikan dan Kebudayaan untuk status Diakui pada tahun 1989. Di bawah naungan Fakultas Teknik, Te...</p>
                            <a class="default-btn" href="/id/pages/beranda-2.html">Detail</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="about-img">
                            <img src="https://sipil.umm.ac.id/files/image/1_%20Landscape%20UMM.jpg" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe-area two pt-5 pb-10 text-center">
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
                                        $isi = substr($data->isi, 0, 200);
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
                                    <!-- <div class="ukuran" style="background:#fff !important;"> -->
                                    <div class="ukuran" style="background:#fff">
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
                                        $isi = substr($data->isi, 0, 200);
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
        <section class="subscribe-area1 two pt-80 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="notice-left-wrapper">
                            <h3><a href="<?= base_url('/Pengumuman'); ?>">Pengumuman</a></h3>
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
                            <h3><a href="<?= base_url('/karir'); ?>">Karir</a></h3>
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
    </div>
    <div class="subscribe-area-footer pt-10 pb-5">
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="single-widget pr-60">
                            <div class="footer-logo pb-25">
                                <a href="<?= base_url('/'); ?>"><img src="https://sipil.umm.ac.id/themes/Template FIKES/images/Logo_UMM.webp" /></a>
                            </div>
                            <p>Prodi Teknologi Rekayasa Instalasi Listrik</p>
                            <ul class="list-unstyled company-info">
                                <li style="display:none;"><i class="fa fa-user"></i> </li>
                                <li style="display:none;"><i class="fa fa-phone"></i> </li>
                                <li style="display:none;"><i class="fa fa-envelope"></i> </li>
                            </ul>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                            <ul class="list-unstyled double_plugin"> </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="single-widget">
                            <h3>Menu</h3>
                            <ul>
                                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                                <li><a href="<?= base_url('/'); ?>">Profil</a></li>
                                <li><a href="<?= base_url('/'); ?>">Akademik</a></li>
                                <li><a href="<?= base_url('/'); ?>">Pendaftaran</a></li>
                                <li><a href="<?= base_url('/'); ?>">Mahasiswa</a></li>
                                <li><a href="<?= base_url('/'); ?>">Download</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-12">
                        <div class="single-widget">
                            <h3>Kategori</h3>
                            <ul>
                                <li><a href="<?= base_url('/'); ?>">Berita</a></li>
                                <li><a href="<?= base_url('/'); ?>">Agenda</a></li>
                                <li><a href="<?= base_url('/Pengumuman'); ?>">Pengumuman</a></li>
                                <li><a href="<?= base_url('/'); ?>">Karir</a></li>
                                <li><a href="<?= base_url('/'); ?>">Beasiswa</a></li>
                                <li><a href="<?= base_url('/'); ?>">Galeri</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="none">
                        <div class="single-widget">
                            <h3>Quicklink</h3>
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
                        <p>Developed by <a href="mailto:lutfaizal.informatika@gmail.com">STI FT-UMSi</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/web_tril/temp_tril/js/bootstrap.min.js"></script>
    <!--bayu-->
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
    </script>
    <script type=" text/javascript">
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
</body>

</html>