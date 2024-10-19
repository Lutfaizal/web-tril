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
                        <li class="breadcrumb-item"><a href="/dashboard/user">Data User </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Input Data User</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form enctype="multipart/form-data" action="<?= base_url('dashboard/user/store') ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="card-header">
                            <h3>Tambah User</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" name="username" placeholder="Username" value="<?= old('username'); ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Fullname</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('fullname') ? 'is-invalid' : '' ?>" name="fullname" placeholder="Fullname" value="<?= old('fullname'); ?>">
                                <div class="invalid-feedback"><?= $validation->getError('fullname') ?></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" name="email" placeholder="Email" value="<?= old('email'); ?>">
                                <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <select class="form-select mb-3 <?= $validation->hasError('level') ? 'is-invalid' : '' ?>" name="level" id="level" placeholder="Pilih" value="<?= old('level'); ?>">
                                    <option value="">-- Pilih Level --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('level') ?></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" required class="form-control mb-3 <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" name="password" placeholder="password">
                                <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                            </div>

                            <div class="form-group">
                                <label for="foto" class="form-label">Foto</label>
                                <input name="foto" class="form-control mb-3" type="file" accept=".png, .jpg, .jpeg">
                                <p class="text-red"> <?= $validation->getError('foto') ?></p>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('dashboard/user'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Simpan </button>
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