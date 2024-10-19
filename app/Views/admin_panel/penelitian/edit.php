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
                        <li class="breadcrumb-item"><a href="/dashboard/penelitian">Data Penelitian </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Penelitian</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form enctype="multipart/form-data" method="post" action="<?= base_url('/dashboard/penelitian/update/' . $penelitian->id_penelitian) ?>">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tim_pelaksana">Tim Pelaksana</label>
                                <textarea autofocus class="form-control mb-3 <?= $validation->hasError('tim_pelaksana') ? 'is-invalid' : '' ?>" id="tim_pelaksana" name="tim_pelaksana"><?= (old('tim_pelaksana')) ? old('tim_pelaksana') : $penelitian->tim_pelaksana ?></textarea>
                                <div class="invalid-feedback"><?= $validation->getError('tim_pelaksana') ?></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Judul Penelitian</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $penelitian->judul; ?>">
                                <div class="invalid-feedback"><?= $validation->getError('judul') ?></div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-8">
                                    <label for="jenis" class="form-label">Luaran</label>
                                    <select class="form-select mb-3 <?= $validation->hasError('jenis') ? 'is-invalid' : '' ?>" name="jenis" placeholder="Pilih jenis" value="<?= old('jenis'); ?>">
                                        <option value="<?= $penelitian->id_jenis; ?>"><?= $penelitian->nama_jenis; ?></option>
                                        <?php
                                        foreach ($jenisData as $datas) {
                                        ?>
                                            <option value="<?= $datas->id_jenis; ?>" <?= $penelitian->id_jenis == $datas->id_jenis ? 'selected' : ''; ?>>
                                                <?= $datas->nama_jenis; ?>
                                            </option>


                                        <?php } ?>

                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('jenis') ?></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" min="1900" max="9999" class="form-control mb-3 <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" id="tahun" name="tahun" value="<?= (old('tahun')) ? old('tahun') : $penelitian->tahun; ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tahun') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Link Dokumen</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('dokumen') ? 'is-invalid' : '' ?>" id="dokumen" name="dokumen" value="<?= (old('dokumen')) ? old('dokumen') : $penelitian->dokumen; ?>">
                                <div class="invalid-feedback"><?= $validation->getError('dokumen') ?></div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('/dashboard/penelitian'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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