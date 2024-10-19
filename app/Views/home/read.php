<?php

use App\Models\KonfigurasiModel;
use App\Models\MenuModel;

$konfigurasi  = new KonfigurasiModel();
$menu         = new MenuModel();
$konfigs        = $konfigurasi->show_data();
?>

<!DOCTYPE html>

<head>
    <title><?= $data_artikel->judul_artikel; ?> </title>
    <meta name="description" content="<?= $data_artikel->judul_artikel; ?>" />
    <meta name="keywords" content="ft-umsi,teknik,muhammadiyah,sinjai,kampus,indonesia,2020,maju bersama,organisasi,universitas,perguruan tinggi,ptm,institusi,sulawesi selatan,fakultas,program studi,akademik,sekolah tinggi" />

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/ico" href="<?= base_url(); ?>/web_tril/temp_tril/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no" />
    <meta name="robots" content="index, follow" />
    <meta name="copyright" content="Copyright 2024.FT UMSi. All Rights Reserved." />

    <meta property="og:title" content="Teknologi Rekayasa Instalasi Listrik | Universitas Muhammadiyah Sinjai" />
    <meta property="og:url" content="<?= base_url('/'); ?>" />
    <meta property="og:image" content="<?= base_url(); ?>/web_tril/img/<?= $data_artikel->gambar ?>" />
    <meta property="og:image:secure_url" content="<?= base_url(); ?>/web_tril/img/<?= $data_artikel->gambar ?>" />
    <meta property="og:site_name" content="<?= base_url('/'); ?>" />
    <meta property="og:description" content="<?= $data_artikel->judul_artikel; ?>" />
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
    <link rel="stylesheet" href="<?= base_url(); ?>/web_tril/temp_tril/satu/css/eks.css">
</head>


<body>
    <?= $this->include('layouts/header'); ?>
    <div class="subscribe-area pt-30 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url('/'); ?>" class="fg-red"><i class="fa fa-home"></i></a></li>
                        <li><?= $data_artikel->jenis_artikel; ?></li>
                    </ol>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="blog-details">
                                <div class="blog-details-content">
                                    <h2><?= $data_artikel->judul_artikel; ?></h2>
                                    <h6><?= substr($data_artikel->tanggal, 0, 10) ?></h6>
                                    <p class="MsoNormal"><span><img src="<?= base_url(); ?>/web_tril/img/<?= $data_artikel->gambar ?>" alt="" width="1280" height="720"></span></p>
                                    <p> <?= $data_artikel->isi; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar right">
                        <div class="single-blog-widget mb-50">
                            <h3>Berita Populer</h3>
                            <ul>
                                <?php foreach ($data__populer as $d_populer) { ?>
                                    <li><a href="<?= base_url('pages/' . $d_populer->slug_artikel); ?>"><?= $d_populer->judul_artikel; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="single-blog-widget mb-50">
                            <a href="<?= base_url('/pengumuman'); ?>">
                                <h3>Pengumuman</h3><a>
                                    <ul>
                                        <?php foreach ($data_sidebar as $d_sidebar) { ?>
                                            <li><a href="<?= base_url('pages/' . $d_sidebar->slug_artikel); ?>"><?= $d_sidebar->judul_artikel; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('layouts/footer'); ?>
    <?= $this->include('layouts/script'); ?>
</body>

</html>