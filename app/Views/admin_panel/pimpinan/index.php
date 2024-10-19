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
						<li class="breadcrumb-item active" aria-current="page">Data Pimpinan</li>
					</ol>
				</nav>
			</div>

		</div>
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
				</div>
				<div class="table-responsive">
					<table id="" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th width="5%">No</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th width="10%">Gambar</th>
								<th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($pimpinan as $data) {
							?>
								<tr>
									<td><?= $no++ . '.'; ?></td>
									<td><?= $data->nama_pimpinan;  ?></td>
									<td><?= $data->jabatan;  ?></td>
									<td>
										<?php if ($data->gambar == "") {
											echo '-';
										} else { ?>
											<img src="<?= base_url(); ?>/web_tril/img/<?= $data->gambar ?>" class=" img img-thumbnail">

										<?php } ?>
									</td>

									<td class="text-center">
										<a href="<?= base_url('/dashboard/pimpinan/edit/' . $data->id_pimpinan); ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
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