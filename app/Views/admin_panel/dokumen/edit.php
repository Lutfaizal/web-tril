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
                        <li class="breadcrumb-item"><a href="/dashboard/dokumen">Data Dokumen </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Dokumen</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form enctype="multipart/form-data" method="post" action="<?= base_url('/dashboard/dokumen/update/' . $dokumen->id_dokumen) ?>">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="nama_dokumen">Nama Dokumen</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('nama_dokumen') ? 'is-invalid' : '' ?>" id="nama_dokumen" name="nama_dokumen" value="<?= (old('nama_dokumen')) ? old('nama_dokumen') : $dokumen->nama_dokumen ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('nama_dokumen') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-select mb-3 <?= $validation->hasError('jenis') ? 'is-invalid' : '' ?>" name="jenis" placeholder="Pilih jenis" value="<?= old('jenis'); ?>">
                                    <option value="<?= $dokumen->jenis_dokumen; ?>"><?= $dokumen->jenis_dokumen; ?></option>
                                    <?php
                                    foreach ($jenisData as $datas) {
                                    ?>

                                        <option value="<?= $datas->nama_jenis; ?>" <?= $dokumen->jenis_dokumen == $datas->nama_jenis ? 'selected' : ''; ?>>
                                            <?= $datas->nama_jenis; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('jenis') ?></div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="file_lama" value="<?= $dokumen->file; ?>">
                                <label for="file">File : <?= $dokumen->file; ?></label>
                                <input name="file" type="file" class="form-control <?= $validation->hasError('file_lama') ? 'is-invalid' : '' ?>" id="file" accept=".pdf" value="<?= old('file'); ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('/dashboard/dokumen'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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