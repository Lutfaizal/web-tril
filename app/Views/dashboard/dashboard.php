<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-12 col-lg-3">
				<div class="card radius-15 bg-gradient-success">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">Agenda</h2>
							</div>
							<div class="ms-auto font-35 text-white"><i class="bx bx-file"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white"><?= $jumlah_agenda; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3">
				<div class="card radius-15 bg-gradient-danger">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">Berita</h2>
							</div>
							<div class="ms-auto font-35 text-white"><i class="bx bx-file"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white"><?= $jumlah_berita; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3">
				<div class="card radius-15 bg-primary">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">Dokumen</h2>
							</div>
							<div class="ms-auto font-35 text-white"><i class="bx bx-file"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white"><?= $jumlah_dokumen; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3">
				<div class="card radius-15 bg-sunset">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">Users<i class='ms-auto font-14 text-white'></i> </h2>
							</div>
							<div class="ms-auto font-35 text-white"><i class="bx bx-user"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white"><?= $jumlah_user; ?> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>