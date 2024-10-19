   <?php

    use App\Models\KonfigurasiModel;

    $konfigurasi  = new KonfigurasiModel();
    $konfigs        = $konfigurasi->show_data();
    ?>
   <?= $this->extend('layouts/index'); ?>
   <?= $this->section('contents'); ?>

   <div class="subscribe-area pt-30 pb-20">
       <div class="container">
           <div class="row">
               <div class="col-sm-12">
                   <ol class="breadcrumb">
                       <li><a href="<?= base_url('/'); ?>" class="fg-red"><i class="fa fa-home"></i></a></li>
                       <li><?= $title; ?></li>
                   </ol>
               </div>
               <div class="col-md-8">
                   <div class="row">
                       <?php
                        foreach ($data_artikel as $data) {
                        ?>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <div class="single-blog mb-30">

                                   <div class="blog-img">
                                       <div class="ukuran">
                                           <a href="<?= base_url('pages/' . $data->slug_artikel) ?>">
                                               <?php if ($data->gambar == "") {
                                                    echo '-';
                                                } else { ?>
                                                   <img src="<?= base_url(); ?>/web_tril/img/<?= $data->gambar ?>" alt="blog">
                                               <?php } ?>
                                           </a>
                                           <div class="blog-hover">
                                               <i class="fa fa-link"></i>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="blog-content">
                                       <div class="blog-top">
                                           <p><?= $data->fullname ?> / <?= date('d F Y', strtotime($data->tanggal)) ?></p>
                                       </div>
                                       <div class="blog-bottom">
                                           <h2><a href="<?= base_url('pages/' . $data->slug_artikel) ?>"><?= $data->judul_artikel ?></a></h2>
                                           <p><?php
                                                $isi = substr($data->isi, 0, 20);
                                                $isi = substr($isi, 0, strrpos($isi, " "));
                                                ?>
                                               <?= $isi ?></p>
                                           <a href="<?= base_url('pages/' . $data->slug_artikel) ?>">read more</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       <?php
                        }
                        ?>

                   </div>
                   <?php if ($totalPages > 1): ?>
                       <div class="pagenavi-wrapper">
                           <div class="pagenavi">
                               <?= $pager->makeLinks($page, $perPage, $total, 'custom_pagination') ?>
                           </div>
                       </div>
                   <?php endif; ?>


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