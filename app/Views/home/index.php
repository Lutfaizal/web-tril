<?php

use App\Models\MenuModel;
use App\Models\KonfigurasiModel;

$menu = new MenuModel();
$konfigurasi  = new KonfigurasiModel();
$konfigs        = $konfigurasi->show_data();
$konfigsambutan        = $konfigurasi->show_sambutan();
?>
<?= $this->extend('layouts/index'); ?>
<?= $this->section('contents'); ?>
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

<?= $this->endSection(); ?>