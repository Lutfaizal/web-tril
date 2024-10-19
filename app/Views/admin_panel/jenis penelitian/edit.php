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
                        <li class="breadcrumb-item"><a href="/dashboard/jenispenelitian">Data Jenis Penelitian</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Jenis</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form method="post" action="<?= base_url('/dashboard/jenispenelitian/update/' . $jenis->id_jenis) ?>">
                        <?= csrf_field(); ?>
                        <div class="card-header">
                            <h3>Edit Jenis</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="nama_jenis">Nama Jenis</label>
                                <input type="text" class="form-control <?= $validation->hasError('nama_jenis') ? 'is-invalid' : '' ?>" id="nama_jenis" name="nama_jenis" value="<?= (old('nama_jenis')) ? old('nama_jenis') : $jenis->nama_jenis ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('nama_jenis') ?></div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('dashboard/jenispenelitian'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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