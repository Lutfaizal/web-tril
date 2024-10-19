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
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Prodi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form enctype="multipart/form-data" method="post" action="<?= base_url('/dashboard/prodi/update/' . $prodi->id_prodi) ?>">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                                <input placeholder="Nama Prodi" type="text" class="form-control mb-3 <?= $validation->hasError('nama_prodi') ? 'is-invalid' : '' ?>" id="nama_prodi" name="nama_prodi" value="<?= (old('nama_prodi')) ? old('nama_prodi') : $prodi->nama_prodi ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('nama_prodi') ?></div>
                            </div>
                            <div class="form-group ">
                                <label for="link" class="form-label">Link Prodi</label>
                                <input placeholder="Link Prodi" type="text" class="form-control mb-3 <?= $validation->hasError('link') ? 'is-invalid' : '' ?>" id="link" name="link" value="<?= (old('link')) ? old('link') : $prodi->link ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('link') ?></div>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control konten"><?= $prodi->deskripsi; ?></textarea>
                                <div class="invalid-feedback"><?= $validation->getError('deskripsi') ?></div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="hidden" name="foto_lama" value="<?= $prodi->gambar; ?>">
                                <label for="foto" class="form-label">Foto</label>
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input name="foto" type="file" class="custom-file-input<?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" id="foto" onchange="previewimg()" accept=".png, .jpg, .jpeg">
                                        <label class="custom-file-label" for="foto"> <?= $prodi->gambar; ?></label>
                                    </div>
                                    <br>
                                    <p class="text-red"> <?= $validation->getError('foto') ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <img src="<?= base_url(); ?>/web_tril/img/<?= $prodi->gambar; ?>" class="img-thumbnail img-preview">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('/dashboard/prodi'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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