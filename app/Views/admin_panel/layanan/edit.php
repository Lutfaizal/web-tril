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
                        <li class="breadcrumb-item"><a href="/dashboard/layanan">Data Layanan </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Layanan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form method="post" action="<?= base_url('/dashboard/layanan/update/' . $layanan->id_layanan) ?>">
                        <?= csrf_field(); ?>
                        <div class="card-header">
                            <h3>Edit Layanan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="nama_layanan">Nama Layanan</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('nama_layanan') ? 'is-invalid' : '' ?>" id="nama_layanan" name="nama_layanan" value="<?= (old('nama_layanan')) ? old('nama_layanan') : $layanan->nama_layanan ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('nama_layanan') ?></div>
                            </div>
                            <div class="form-group ">
                                <label for="link">Situs</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('link') ? 'is-invalid' : '' ?>" placeholder="https://link.ac.id/" id="link" name="link" value="<?= (old('link')) ? old('link') : $layanan->link ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('link') ?></div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('dashboard/layanan'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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