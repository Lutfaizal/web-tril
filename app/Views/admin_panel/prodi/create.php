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
						<li class="breadcrumb-item"><a href="/dashboard/prodi">Data Prodi </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Input Data Prodi</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 mx-auto">
				<hr>
				<div class="card">
					<form enctype="multipart/form-data" action="<?= base_url('/dashboard/prodi/store') ?>" method="post">
						<?= csrf_field(); ?>
						<div class="card-header">
							<h3>Tambah Prodi</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="form-label">Nama Prodi</label>
								<input placeholder="Nama Prodi" type="text" class="form-control mb-3 <?= $validation->hasError('nama_prodi') ? 'is-invalid' : '' ?>" id="nama_prodi" name="nama_prodi" value="<?= old('nama_prodi'); ?>" autofocus>
								<div class="invalid-feedback"><?= $validation->getError('nama_prodi') ?></div>
							</div>
							<div class="form-group">
								<label class="form-label">Link Prodi</label>
								<input placeholder="Link Prodi" type="text" class="form-control mb-3 <?= $validation->hasError('link') ? 'is-invalid' : '' ?>" id="link" name="link" value="<?= old('link'); ?>" autofocus>
								<div class="invalid-feedback"><?= $validation->getError('link') ?></div>
							</div>
							<div class="form-group">
								<label class="form-label">Foto</label>
								<input name="foto" class="form-control mb-3" type="file" id="foto" accept=".png, .jpg, .jpeg">
								<p class="text-red"><?= $validation->getError('foto') ?></p>
							</div>
							<div class="form-group">
								<label for="deskripsi" class="form-label">Deskripsi</label>
								<textarea class="form-control konten mb-3 <?= $validation->hasError('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi"><?= old('deskripsi'); ?></textarea>
								<div class=" invalid-feedback"><?= $validation->getError('deskripsi') ?></div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<div class="form-group">
									<a href="<?= base_url('/dashboard/prodi'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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