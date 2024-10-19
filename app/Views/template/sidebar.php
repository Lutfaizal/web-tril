<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div class="">
			<img src="<?php base_url() ?> /web_tril/img/logo_dash.png" class="logo-icon-2" alt="" />
		</div>

		<a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
		</a>
	</div>
	<ul class="metismenu" id="menu">
		<li>
			<a href="<?= base_url('/dashboard'); ?>">
				<div class="parent-icon icon-color-7">

					<i class="bx bx-home-alt"></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<?php if (in_groups('Admin')) : ?>
			<li>
				<a class="has-arrow" href="javascript:;">
					<div class="parent-icon icon-color-11"><i class="bx bx-archive"></i>
					</div>
					<div class="menu-title">Master Data</div>
				</a>
				<ul>
					<!-- <li> <a href="<?= base_url('/dashboard/pimpinan'); ?>"><i class="bx bx-right-arrow-alt"></i>Pimpinan</a></li> -->

					<!-- <li> <a href="<?= base_url('/dashboard/prodi'); ?>"><i class="bx bx-right-arrow-alt"></i>Prodi</a></li> -->
					<li> <a href="<?= base_url('/dashboard/jenis'); ?>"><i class="bx bx-right-arrow-alt"></i>Jenis Artikel</a></li>
					<li> <a href="<?= base_url('/dashboard/jenisdokumen'); ?>"><i class="bx bx-right-arrow-alt"></i>Jenis Dokumen</a></li>
					<li> <a href="<?= base_url('/dashboard/jenispenelitian'); ?>"><i class="bx bx-right-arrow-alt"></i>Jenis Penelitian</a></li>
					<li> <a href="<?= base_url('/dashboard/jenispkm'); ?>"><i class="bx bx-right-arrow-alt"></i>Jenis Pengabdian</a></li>
					<li> <a href="<?= base_url('/dashboard/jenispublikasi'); ?>"><i class="bx bx-right-arrow-alt"></i>Jenis Publikasi</a></li>
					<li> <a href="<?= base_url('/dashboard/layanan'); ?>"><i class=" bx bx-right-arrow-alt"></i>Layanan</a></li>

					<li> <a href="<?= base_url('/dashboard/user'); ?>"><i class="bx bx-right-arrow-alt"></i>User</a></li>
				</ul>
			</li>
		<?php endif ?>
		<li>
			<a href="<?= base_url('/dashboard/artikel'); ?>">
				<div class="parent-icon icon-color-3"><i class="bx bx-file"></i>
				</div>
				<div class="menu-title">Artikel</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('/dashboard/dokumen'); ?>">
				<div class="parent-icon icon-color-4"><i class="bx bx-file"></i>
				</div>
				<div class="menu-title">Dokumen</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('/dashboard/penelitian'); ?>">
				<div class="parent-icon icon-color-5"><i class="bx bx-file"></i>
				</div>
				<div class="menu-title">Penelitian</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('/dashboard/pengabdian'); ?>">
				<div class="parent-icon icon-color-6"><i class="bx bx-file"></i>
				</div>
				<div class="menu-title">Pengabdian</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('/dashboard/publikasi'); ?>">
				<div class="parent-icon icon-color-7"><i class="bx bx-file"></i>
				</div>
				<div class="menu-title">Publikasi</div>
			</a>
		</li>
		<?php if (in_groups('Admin')) : ?>
			<li>
				<a class="has-arrow" href="javascript:;">
					<div class="parent-icon icon-color-8"><i class="bx bx-cog"></i>
					</div>
					<div class="menu-title">Konfigurasi</div>
				</a>
				<ul>
					<li> <a href="<?= base_url('/dashboard/galeri'); ?>"><i class="bx bx-right-arrow-alt"></i>Galeri</a></li>
					<li> <a href="<?= base_url('/dashboard/konfigweb'); ?>"><i class="bx bx-right-arrow-alt"></i>Website</a></li>
					<li> <a href="<?= base_url('/dashboard/sambutan'); ?>"><i class="bx bx-right-arrow-alt"></i>Sambutan</a></li>
					<li> <a href="<?= base_url('/dashboard/slide'); ?>"><i class="bx bx-right-arrow-alt"></i>Slide</a></li>
				</ul>
			</li>
		<?php endif ?>
		<li>
			<a href="<?= base_url('/dashboard/profile'); ?>">
				<div class="parent-icon icon-color-9"><i class="bx bx-user-circle"></i>
				</div>
				<div class="menu-title">My Profile</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('logout'); ?>">
				<div class="parent-icon icon-color-1"> <i class="bx bx-power-off"></i>
				</div>
				<div class="menu-title">Logout</div>
			</a>
		</li>
	</ul>
</div>