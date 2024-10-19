 <?php

    use App\Models\KonfigurasiModel;
    use App\Models\MenuModel;

    $konfigurasi  = new KonfigurasiModel();
    $menu         = new MenuModel();
    $konfigs        = $konfigurasi->show_data();
    ?>
 <header class="top">
     <div class="header-top">
         <div class="container">
             <div class="row">
                 <div class="col-md-8 col-sm-8 col-xs-12">
                     <div class="header-top-left">
                         <a href="<?= base_url('/'); ?>">
                             <p>Prodi Teknologi Rekayasa Instalasi Listrik</p>
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