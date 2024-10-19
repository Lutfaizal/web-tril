<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Data</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Data Penelitian</li>
					</ol>
				</nav>
			</div>

		</div>
		<!--end breadcrumb-->
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<?php if (session()->getFlashData('Pesan')) : ?>

						<div id="success-alert" class="alert alert-success border-0 bg-success alert-dismissible fade show">
							<div class="text-white"><?= session()->getFlashData('Pesan') ?></div>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>
					<a href="<?= base_url('/dashboard/penelitian/create'); ?>" class="btn btn-success ms-auto radius-10"><i class="bx bx-plus"></i> TAMBAH DATA</a>
				</div>
				<hr />
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th width="3%">No</th>
								<th>Tim Pelaksana</th>
								<th>Judul</th>
								<th width="10%">Luaran - Tahun</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($penelitian as $data) {
							?>
								<tr>
									<td><?= $no++ . '.'; ?></td>

									<td><?= $data->tim_pelaksana ?></td>
									<td><?= $data->judul ?></td>
									<td><small>
											<i class="bx bx-list-ul"> <?= $data->nama_jenis ?></i>
											<br>
											<i class="bx bx-time"> <?= $data->tahun ?></i>
										</small>
									</td>
									<td>
										<a href=" <?= $data->dokumen ?>" class="btn btn-info btn-sm" target="_blank"><i class="bx bx-show"></i> </a>
										<a href="<?= base_url('/dashboard/penelitian/edit/' . $data->id_penelitian); ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
										<form class="d-inline" action="/dashboard/penelitian/<?= $data->id_penelitian; ?>" method="post">
											<?= csrf_field(); ?>
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" onclick="return confirm('Anda yakin ingin menghapus data?')" class="btn btn-sm btn-danger">
												<i class="bx bx-trash"></i>
											</button>
										</form>
									</td>
								<?php
							}
								?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
<?= $this->endSection(); ?>