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
                        <li class="breadcrumb-item"><a href="/dashboard/pimpinan">Data Pimpinan </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Pimpinan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form enctype="multipart/form-data" method="post" action="<?= base_url('/dashboard/pimpinan/update/' . $pimpinan->id_pimpinan) ?>">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="nama_pimpinan">Nama Pimpinan</label>
                                <input type="text" placeholder="Nama pimpinan" class="form-control mb-3 <?= $validation->hasError('nama_pimpinan') ? 'is-invalid' : '' ?>" id="nama_pimpinan" name="nama_pimpinan" value="<?= (old('nama_pimpinan')) ? old('nama_pimpinan') : $pimpinan->nama_pimpinan ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('nama_pimpinan') ?></div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="hidden" name="foto_lama" value="<?= $pimpinan->gambar; ?>">
                                <label for="foto" class="form-label">Foto</label>
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input name="foto" type="file" class="custom-file-input<?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" id="foto" onchange="previewimg()" accept=".png, .jpg, .jpeg">
                                        <label class="custom-file-label" for="foto"> <?= $pimpinan->gambar; ?></label>
                                    </div>
                                    <br>
                                    <p class="text-red"> <?= $validation->getError('foto') ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <img src="<?= base_url(); ?>/web_tril/img/<?= $pimpinan->gambar; ?>" class="img-thumbnail img-preview">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('/dashboard/pimpinan'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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