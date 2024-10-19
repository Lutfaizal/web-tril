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
						<li class="breadcrumb-item active" aria-current="page">Data Artikel</li>
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
					<a href="<?= base_url('/dashboard/artikel/create'); ?>" class="btn btn-success ms-auto radius-10"><i class="bx bx-plus"></i> TAMBAH DATA</a>
				</div>
				<hr />
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th width="3%">No</th>
								<th width="8%">Gambar</th>
								<th width="30%">Judul</th>
								<th width="10%">Jenis</th>
								<th width="15%">Author - Status</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($artikel as $data) {
							?>
								<tr>
									<td><?= $no++ . '.'; ?></td>

									<td>
										<?php if ($data->gambar == "") {
											echo '-';
										} else { ?>
											<img src="<?= base_url(); ?>/web_tril/img/<?= $data->gambar ?>" class=" img img-thumbnail">

										<?php } ?>
									</td>
									<td><a href="<?= base_url('/dashboard/artikel/edit/' . $data->id_artikel) ?>">
											<?= $data->judul_artikel;  ?>
										</a>
										<small>
											<br><i class="bx bx-show"></i> Hits : <?= $data->hits ?>
											<br><i class="bx bx-calendar-check"></i> Publish : <?= $data->tanggal ?>
											<br><i class="bx bx-calendar-edit"></i> Updated : <?= $data->updated_at ?>
										</small>
									</td>
									<td>
										<i class="bx bx-list-ul"></i> <a href="#"> <?= $data->jenis_artikel ?></a>
									</td>
									<td><small>
											<i class="bx bx-user"></i> <a href="#"> <?= $data->fullname ?> </a>
											</a>
											<br>
											<?php
											if ($data->status_artikel == 'Publish') { ?>
												<i class="bx bx-check"></i> <a href="#" class="text-success"> <?= $data->status_artikel ?></a>
											<?php } else { ?>
												<i class="bx bx-check"></i> <a href="#" class="text-warning"> <?= $data->status_artikel ?></a>
											<?php }	?>

										</small>
									</td>
									<td>
										<a href="<?= base_url('pages/' . $data->slug_artikel) ?>" class="btn btn-info btn-sm" target="_blank"><i class="bx bx-show"></i> </a>
										<a href="<?= base_url('/dashboard/artikel/edit/' . $data->id_artikel); ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
										<?php if ($data->jenis_artikel != 'Profile') : ?>
											<form class="d-inline" action="/dashboard/artikel/<?= $data->id_artikel; ?>" method="post">
												<?= csrf_field(); ?>
												<input type="hidden" name="_method" value="DELETE">
												<button type="submit" onclick="return confirm('Anda yakin ingin menghapus data?')" class="btn btn-sm btn-danger">
													<i class="bx bx-trash"></i>
												</button>
											</form>
										<?php else : ?>
											<button class="btn btn-sm btn-danger" disabled><i class="bx bx-trash"></i></button>
										<?php endif; ?>

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