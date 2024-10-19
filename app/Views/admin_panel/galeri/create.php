<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Forms</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item"><a href="/dashboard/galeri">Data Galeri </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Input Data Galeri</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 mx-auto">
				<hr>
				<div class="card">
					<form enctype="multipart/form-data" action="<?= base_url('/dashboard/galeri/store') ?>" method="post">
						<?= csrf_field(); ?>
						<div class="card-header">
							<h3>Tambah Galeri</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="form-label">Foto</label>
								<input name="foto" class="form-control mb-3" type="file" id="foto" accept=".png, .jpg, .jpeg">
								<p class="text-red"><?= $validation->getError('foto') ?></p>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<div class="form-group">
									<a href="<?= base_url('/dashboard/galeri'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
									<button type="submit" class="btn btn-success"> <i class="bx bx-save"></i> Simpan </button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>