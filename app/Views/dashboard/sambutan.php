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
                        <li class="breadcrumb-item"><a href="/dashboard/sambutan">Sambutan </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <?php if (session()->getFlashData('Pesan')) : ?>
                    <div id="success-alert" class="alert alert-success border-0 bg-success alert-dismissible fade show">
                        <div class="text-white"><?= session()->getFlashData('Pesan') ?></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <form enctype="multipart/form-data" method="post" action="<?= base_url('/dashboard/konfigsambutan/update') ?>">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="judul_sambutan">Judul</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('judul_sambutan') ? 'is-invalid' : '' ?>" id="judul_sambutan" name="judul_sambutan" value="<?= (old('judul_sambutan')) ? old('judul_sambutan') : $sambutan->judul_artikel ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('judul_akreditasi') ?></div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control mb-3 <?= $validation->hasError('tanggal') ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $sambutan->tanggal ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tanggal') ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="konten" class="form-label">Konten</label>
                                    <textarea name="konten" class="form-control konten"><?= $sambutan->isi; ?></textarea>
                                    <div class="invalid-feedback"><?= $validation->getError('konten') ?></div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="hidden" name="foto_lama" value="<?= $sambutan->gambar; ?>">
                                    <label for="foto" class="form-label">Foto</label>
                                    <div class="col-sm-12">
                                        <div class="custom-file">
                                            <input name="foto" type="file" class="custom-file-input<?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" id="foto" onchange="previewimg()" accept=".png, .jpg, .jpeg">
                                            <label class="custom-file-label" for="foto"> <?= $sambutan->gambar; ?></label>
                                        </div>
                                        <br>
                                        <p class="text-red"> <?= $validation->getError('foto') ?></p>
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="<?= base_url(); ?>/web_tril/img/<?= $sambutan->gambar; ?>" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"> <i class="bx bx-edit"></i> Update </button>
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