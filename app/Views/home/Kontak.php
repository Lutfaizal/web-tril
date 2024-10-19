<?php

use App\Models\MenuModel;
use App\Models\KonfigurasiModel;

$menu = new MenuModel();
$konfigurasi  = new KonfigurasiModel();
$konfigs        = $konfigurasi->show_data();
?>
<?= $this->extend('layouts/index'); ?>
<?= $this->section('contents'); ?>
<style>
    .social-link {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .social-link img {
        margin-right: 10px;
        width: 25px;
        /* Sesuaikan ukuran ikon */
        height: 25px;
    }

    .social-link a {
        font-size: 18px;
        text-decoration: none;
        color: #000;
        font-family: Times New Roman, Times, serif;
    }
</style>

<div class="subscribe-area pt-30 pb-20">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?= base_url('/'); ?>" class="fg-red"><i class="fa fa-home"></i></a></li>
                <li><a href="<?= base_url('/'); ?>">Home</a></li>
                <li><a href="<?= base_url('/kontak'); ?>">Kontak</a></li>
            </ol>
            <div class="col-md-8">
                <div class="blog-details">
                    <div class="blog-details-content">
                        <h2>Kontak</h2>
                        <br>
                        <div class="boxcontent">
                            <div class="social-link">
                                <img src="<?= base_url(); ?>/web_tril/img/LOGO%20DUNIA.png" alt="Website" />
                                <a href="<?= base_url(); ?>"><b><?= $konfigs['web'] ?></b></a>
                            </div>

                            <div class="social-link">
                                <img src="<?= base_url(); ?>/web_tril/img/facebook_logos_PNG19751.png" alt="Facebook" />
                                <a href="<?= $konfigs['facebook'] ?>"><b><?= $konfigs['facebook'] ?></b></a>
                            </div>

                            <div class="social-link">
                                <img src="<?= base_url(); ?>/web_tril/img/580b57fcd9996e24bc43c545.png" alt="YouTube" />
                                <a href="<?= $konfigs['youtube'] ?>"><b><?= $konfigs['youtube'] ?></b></a>

                            </div>

                            <div class="social-link">
                                <img src="<?= base_url(); ?>/web_tril/img/1200px-Twitter_bird_logo_2012_svg.png" alt="Twitter" />
                                <a href="<?= $konfigs['twitter'] ?>"><b><?= $konfigs['twitter'] ?></b></a>
                            </div>

                            <div class="social-link">
                                <img src="<?= base_url(); ?>/web_tril/img/1024px-Instagram_logo_2016_svg.png" alt="Instagram" />
                                <a href="<?= $konfigs['instagram'] ?>"><b><?= $konfigs['instagram'] ?></b></a>
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






<?= $this->endSection(); ?>