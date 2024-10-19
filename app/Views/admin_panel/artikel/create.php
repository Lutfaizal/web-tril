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
						<li class="breadcrumb-item"><a href="/dashboard/artikel">Data Artikel </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Input Data Artikel</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 mx-auto">
				<hr>
				<div class="card">
					<form enctype="multipart/form-data" action="<?= base_url('/dashboard/artikel/store') ?>" method="post">
						<?= csrf_field(); ?>
						<div class="card-header">
							<h3>Tambah Artikel</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="form-label">Judul Artikel</label>
								<input type="text" class="form-control mb-3 <?= $validation->hasError('judul_artikel') ? 'is-invalid' : '' ?>" id="judul_artikel" name="judul_artikel" value="<?= old('judul_artikel'); ?>" autofocus>
								<div class="invalid-feedback"><?= $validation->getError('judul_artikel') ?></div>
							</div>


							<div class="form-group">
								<label class="form-label">Foto</label>
								<input name="foto" class="form-control mb-3" type="file" id="foto" accept=".png, .jpg, .jpeg">
								<p class="text-red"><?= $validation->getError('foto') ?></p>
							</div>

							<div class="form-group ">
								<div class="row g-2">
									<div class="col-md-4">
										<label for="tanggal" class="form-label">Tanggal</label>
										<input type="date" class="form-control mb-3 <?= $validation->hasError('tanggal') ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
										<div class="invalid-feedback"><?= $validation->getError('tanggal') ?></div>
									</div>
									<div class="col-md-4">
										<label for="jenis" class="form-label">Jenis</label>
										<select class="form-select mb-3 <?= $validation->hasError('jenis') ? 'is-invalid' : '' ?>" name="jenis" placeholder="Pilih jenis" value="<?= old('jenis'); ?>">
											<option value="">-- Pilih Jenis --</option>
											<?php foreach ($jenisData as $jenis): ?>
												<option value="<?= $jenis->nama_jenis ?>" <?= old('jenis') == $jenis->nama_jenis ? 'selected' : '' ?>>
													<?= $jenis->nama_jenis ?>
												</option ption>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback"><?= $validation->getError('jenis') ?></div>
									</div>
									<div class="col-md-4">
										<label for="status" class="form-label">Status</label>
										<select class="form-select mb-3 <?= $validation->hasError('status') ? 'is-invalid' : '' ?>" name="status" placeholder="Pilih status" value="<?= old('status'); ?>">
											<option value="">-- Pilih Status --</option>
											<option value="Draft">Draft</option>
											<option value="Publish">Publish</option>
										</select>
										<div class="invalid-feedback"><?= $validation->getError('status') ?></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="konten" class="form-label">Konten</label>
								<textarea class="form-control konten mb-3 <?= $validation->hasError('konten') ? 'is-invalid' : '' ?>" id="konten" name="konten"><?= old('konten'); ?></textarea>
								<div class=" invalid-feedback"><?= $validation->getError('konten') ?></div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<div class="form-group">
									<a href="<?= base_url('/dashboard/artikel'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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