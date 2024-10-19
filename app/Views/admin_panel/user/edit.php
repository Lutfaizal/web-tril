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
                        <li class="breadcrumb-item active" aria-current="page">Edit Data User</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <form enctype="multipart/form-data" method="post" action="<?= base_url('/dashboard/user/update/' . $user->user_id) ?>">
                        <?= csrf_field(); ?>
                        <div class="card-header">
                            <h3>Edit User</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" name="username" placeholder="Username" value="<?= (old('username')) ? old('username') : $user->username ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                            </div>

                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('fullname') ? 'is-invalid' : '' ?>" name="fullname" placeholder="Fullname" value="<?= (old('fullname')) ? old('fullname') : $user->fullname ?>">
                                <div class="invalid-feedback"><?= $validation->getError('fullname') ?></div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control mb-3 <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" name="email" placeholder="Email" value="<?= (old('email')) ? old('email') : $user->email ?>">
                                <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control mb-3 <?= $validation->hasError('level') ? 'is-invalid' : '' ?>" name="level" id="level" placeholder="Pilih" value="<?= (old('group_id')) ? old('group_id') : $user->group_id ?>">

                                    <?php if ($user->group_id == "1") { ?>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    <?php
                                    }  ?>
                                    <?php if ($user->group_id == "2") { ?>
                                        <option value="2">User</option>
                                        <option value="1">Admin</option>
                                    <?php
                                    } ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('level') ?></div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control mb-3 <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" name="password" placeholder="password">
                                <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-select mb-3 <?= $validation->hasError('status') ? 'is-invalid' : '' ?>" name="status" id="status" placeholder="Pilih status" value="<?= (old('status')) ? old('status') : $user->active ?>">

                                    <?php if ($user->active == "1") { ?>
                                        <option value="1">Aktif</option>
                                        <option value="0">Non Aktif</option>
                                    <?php
                                    }  ?>
                                    <?php if ($user->active == "0") { ?>
                                        <option value="0">Non Aktif</option>
                                        <option value="1">Aktif</option>
                                    <?php
                                    } ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('status') ?></div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="foto_lama" value="<?= $user->user_image; ?>">
                                <label for="foto" class="col-form-label col-sm-1">Foto</label>
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input name="foto" type="file" class="custom-file-input<?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" id="foto" onchange="previewimg()" accept=".png, .jpg, .jpeg">
                                        <label class="custom-file-label" for="foto"> <?= $user->user_image; ?></label>
                                    </div>
                                    <br>
                                    <p class="text-red"> <?= $validation->getError('foto') ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <img src="<?= base_url(); ?>/web_tril/img/<?= $user->user_image; ?>" class="img-thumbnail img-preview">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= base_url('dashboard/user'); ?>" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali</a>
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