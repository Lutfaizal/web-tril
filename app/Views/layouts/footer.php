	<?php

	use App\Models\KonfigurasiModel;

	$konfigurasi  = new KonfigurasiModel();
	$konfigs        = $konfigurasi->show_data();
	?>
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
								<li><a href="https://simak.umsi.ac.id/">Akademik</a></li>
								<li><a href="https://pmb.umsi.ac.id/">Pendaftaran</a></li>
								<li><a href="javascript:void(0);">Download</a></li>
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