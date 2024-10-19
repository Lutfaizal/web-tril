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
						<li class="breadcrumb-item"><a href="/dashboard/pengabdian">Data Pengabdian </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Input Data Pengabdian</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 mx-auto">
				<hr>
				<div class="card">
					<form enctype="multipart/form-data" action="<?= base_url('/dashboard/pengabdian/store') ?>" method="post">
						<?= csrf_field(); ?>
						<div class="card-header">
							<h3>Tambah Pengabdian</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="form-label">Tim Pelaksana</label>
								<textarea autofocus class="form-control mb-3 <?= $validation->hasError('tim_pelaksana') ? 'is-invalid' : '' ?>" id="tim_pelaksana" name="tim_pelaksana"><?= old('tim_pelaksana'); ?></textarea>
								<div class="invalid-feedback"><?= $validation->getError('tim_pelaksana') ?></div>
							</div>
							<div class="form-group">
								<label class="form-label">Judul Pengabdian</label>
								<input type="text" class="form-control mb-3 <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul'); ?>">
								<div class="invalid-feedback"><?= $validation->getError('judul') ?></div>
							</div>



							<div class="form-group ">
								<div class="row g-2">

									<div class="col-md-8">
										<label for="jenis" class="form-label">Jenis</label>
										<select class="form-select mb-3 <?= $validation->hasError('jenis') ? 'is-invalid' : '' ?>" name="jenis" placeholder="Pilih jenis" value="<?= old('jenis'); ?>">
											<option value="">-- Pilih Jenis --</option>
											<?php foreach ($jenisData as $jenis): ?>
												<option value="<?= $jenis->id_jenis ?>" <?= old('jenis') == $jenis->nama_jenis ? 'selected' : '' ?>>
													<?= $jenis->nama_jenis ?>
												</option ption>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback"><?= $validation->getError('jenis') ?></div>
									</div>
									<div class="col-md-4">
										<label for="tahun" class="form-label">Tahun</label>
										<input type="number" min="1900" max="9999" class="form-control mb-3 <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" id="tahun" name="tahun" value="<?= old('tahun', date('Y')); ?>">
										<div class="invalid-feedback"><?= $validation->getError('tahun') ?></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Link Dokumen</label>
								<input type="text" class="form-control mb-3 <?= $validation->hasError('dokumen') ? 'is-invalid' : '' ?>" id="dokumen" name="dokumen" value="<?= old('dokumen'); ?>">
								<div class="invalid-feedback"><?= $validation->getError('dokumen') ?></div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<div class="form-group">
									<a href="<?= base_url('/dashboard/pengabdian'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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