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
                                         <!-- <img src="<?= base_url(); ?>/web_tril/temp_tril/images/Logo_prodi.png" /> -->
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
                     <div class="content-wrapper"> <!--text-right-->
                         <div class="main-menu">
                             <nav>
                                 <ul>
                                     <!-- <li class="pagehome"><a href="<?= base_url('/'); ?>"><i class="fa fa-home"></i></a></li> -->
                                     <li>
                                         <a href="<?= base_url('/'); ?>">Home</a>
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
                                             <li><a href="#">Tujuan & Output</a></li>
                                             <li><a href="#">Gelar Lulusan</a></li>
                                             <li><a href="#">Prospek Lulusan</a></li>
                                             <li><a href="#">Kurikulum & Mata Kuliah</a></li>
                                             <li><a href="#">Jadwal Kuliah</a></li>
                                             <li><a href="#">Tugas Akhir</a></li>
                                             <li><a href="#">KRS Online</a></li>
                                             <li><a href="#">KHS</a></li>
                                             <li><a href="#">Pusat Studi</a></li>
                                             <li><a href="#">E-Learning</a></li>
                                             <li><a href="#">Wisuda</a></li>
                                             <li><a href="#">Profil Lulusan</a></li>
                                             <li><a href="#">Capaian Pembelajaran Lulusan (CPL)</a></li>
                                             <li><a href="#">Profil Profesional Mandiri</a></li>
                                             <li><a href="#">Penjaminan Mutu</a></li>
                                         </ul>
                                     </li>
                                     <li>
                                         <a href="/id/pages/pendaftaran-3.html">Pendaftaran</a>
                                         <ul>
                                             <li><a href="https://pmb.umsi.ac.id/">Info Pendaftaran</a></li>
                                             <li><a href="https://pmb.umsi.ac.id/">Daftar</a></li>
                                         </ul>
                                     </li>
                                     <li>
                                         <a href="/id/pages/mahasiswa-2.html">Mahasiswa</a>
                                         <ul>
                                             <li><a href="#">Data Mahasiswa</a></li>
                                             <li><a href="#">Penelitian Mahasiswa</a></li>
                                             <li><a href="#">Pengabdian Mahasiswa</a></li>
                                             <li><a href="#">Aktivitas Mahasiswa</a></li>
                                             <li><a href="#">Prestasi Mahasiswa</a></li>
                                             <li><a href="#">Organisasi Mahasiswa</a></li>
                                         </ul>
                                     </li>
                                     <li>
                                         <a href="#">Download</a>
                                         <ul>
                                             <li><a href="#">Panduan-Panduan</a></li>
                                             <li><a href="#">IABEE Evaluation</a></li>
                                             <li><a href="#">Formulir Akademik</a></li>
                                         </ul>
                                     </li>
                                     <li>
                                         <a href="#">Penelitian &amp; Publikasi</a>
                                         <ul>
                                             <li><a href="#">Penelitan</a></li>
                                             <li><a href="#">Pengabdian</a></li>
                                             <li><a href="#">Publikasi</a></li>
                                             <!-- <li><a href="#">Jurnal-Jurnal</a></li> -->
                                         </ul>
                                     </li>
                                     <li>
                                         <a href="#">Fasilitas</a>
                                         <ul>
                                             <li><a href="#">Fasilitas PBM</a></li>
                                             <li><a href="#">Laboratorium</a></li>
                                             <li><a href="#">Fasilitas UMSi</a></li>
                                         </ul>
                                     </li>
                                     <li>
                                         <a href="#">Portal</a>
                                         <ul>
                                             <li><a href="#">Portal Mahasiswa</a></li>
                                             <li><a href="#">Portal Dosen &amp; Karyawan</a></li>
                                             <li><a href="https://webmail.umsi.ac.id">UMSi Mail</a></li>
                                         </ul>
                                     </li>
                                     <!-- <li>
                                         <a href="#">Alumni</a>
                                         <ul>
                                             <li><a href="#">Data &amp; Profil Alumni</a></li>
                                             <li><a href="#">Pendaftaran</a></li>
                                             <li><a href="#">Lowongan Kerja</a></li>
                                             <li><a href="#">Info Kegiatan</a></li>
                                             <li><a href="#">Tracer Study</a></li>
                                             <li><a href="#">Alumni Sukses</a></li>
                                         </ul>
                                     </li> -->
                                     <li>
                                         <a href="#">Center of Excellence</a>
                                         <ul>
                                             <li><a href="#">Profil Singkat</a></li>
                                             <li><a href="#">Kurikulum</a></li>
                                             <li><a href="#">Mitra/DUDI</a></li>
                                             <li><a href="#">Implementasi</a></li>
                                             <li><a href="#">Testimoni</a></li>
                                             <li><a href="#">Dokumentasi</a></li>
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
             <li><a href="<?= base_url('/'); ?>">Halaman Utama</a></li>
             <li><a href="<?= base_url('/berita'); ?>">Berita</a></li>
             <li><a href="<?= base_url('/agenda'); ?>">Agenda</a></li>
             <li><a href="<?= base_url('/pengumuman'); ?>">Pengumuman</a></li>
             <li><a href="<?= base_url('/kontak'); ?>">Kontak</a></li>
         </ul>
         <li><a href="/id/pages/profil-186-9664.html">Profil </a><i class="fa fa-plus" data-toggle="collapse" data-target="#navbar9664"></i></li>
         <ul class="collapse" id="navbar9664">
             <?php
                $profil = $menu->profil();
                foreach ($profil as $profil) { ?>
                 <li><a href="<?= base_url('pages/' . $profil->slug_artikel); ?>"><?= $profil->judul_artikel; ?></a></li>
             <?php } ?>
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