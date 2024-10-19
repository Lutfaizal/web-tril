<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="user-profile-page">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-7 border-right">
                            <div class="d-md-flex align-items-center">
                                <div class="mb-md-0 mb-3">
                                    <img class="rounded-circle shadow" src="<?= base_url(); ?>/web_tril/img/<?= user()->user_image; ?>" width="130" height="130" alt="">
                                </div>
                                <div class="ms-md-4 flex-grow-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <h4 class="mb-0"><i class="bx bx-user"></i> <?= user()->username; ?></h4>
                                    </div>
                                    <h5 class="mb-0 text-primary"><i class="bx bx-user-circle"></i> <?= user()->fullname; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <table class="table table-sm table-borderless mt-md-0 mt-3">
                                <tbody>
                                    <br>
                                    <tr>
                                        <th><i class="bx bx-calendar-plus"></i> Registrasi:</th>
                                        <td><?= user()->created_at; ?></td>
                                    </tr>
                                    <tr>
                                        <th><i class="bx bx-calendar-check"></i> Akses:</th>
                                        <?php
                                        foreach ($logs as $row) { ?>
                                            <td><?= $row->date; ?></td>
                                            <!-- $dat=  -->
                                        <?php } ?>

                                    </tr>
                                </tbody>
                            </table>
                            <div class="mb-3 mb-lg-0">
                                <a href="javascript:;" class="btn btn-sm btn-link"><i class='bx bxl-github'></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-link"><i class='bx bxl-twitter'></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-link"><i class='bx bxl-facebook'></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-link"><i class='bx bxl-linkedin'></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-link"><i class='bx bxl-dribbble'></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-link"><i class='bx bxl-stack-overflow'></i></a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <ul class="nav nav-pills">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="javascript:;"><span class="p-tab-name">Edit Profile</span><i class='bx bx-donate-blood font-24 d-sm-none'></i></a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="Edit-Profile">
                            <div class="card shadow-none border mb-0 radius-15">
                                <div class="card-body">
                                    <div class="row">
                                        <?php if (session()->getFlashData('Pesan')) : ?>
                                            <div id="success-alert" class="alert alert-success border-0 bg-success alert-dismissible fade show">
                                                <div class="text-white"><?= session()->getFlashData('Pesan') ?></div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12 col-lg-5 border-right">
                                            <form enctype="multipart/form-data" class="row g-3" method="post" action="<?= base_url('/dashboard/profile/update') ?>">
                                                <?= csrf_field(); ?>
                                                <div class="col-12">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" name="username" placeholder="Username" value="<?= (old('username')) ? old('username') : user()->username; ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Fullname</label>
                                                    <input type="text" class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : '' ?>" name="fullname" placeholder="Fullname" value="<?= (old('fullname')) ? old('fullname') : user()->fullname ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('fullname') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" name="email" placeholder="Email" value="<?= (old('email')) ? old('email') : user()->email ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <input type="hidden" name="foto_lama" value="<?= user()->user_image; ?>">
                                                    <label for="foto" class="form-label col-sm-1 ">Foto</label>
                                                    <div class="custom-file">
                                                        <input name="foto" type="file" class="custom-file-input<?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" id="foto" onchange="previewimg()" accept=".png, .jpg, .jpeg">
                                                        <label class="custom-file-label" for="foto"> <?= user()->user_image; ?></label>
                                                    </div>
                                                    <br>
                                                    <div class="invalid-feedback"><?= $validation->getError('foto') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-success"> <i class="bx bx-save"></i> Simpan </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-12 col-lg-7">
                                            <form class="row g-3" method="post" action="<?= base_url('/dashboard/profile/updatepas') ?>">
                                                <?= csrf_field(); ?>
                                                <div class="col-12">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" name="password" placeholder="password">
                                                    <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Konfirm Password</label>
                                                    <input type="password" class="form-control <?= $validation->hasError('password_') ? 'is-invalid' : '' ?>" name="password_" placeholder="password">
                                                    <div class="invalid-feedback"><?= $validation->getError('password_') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="col-sm-offset-3 col-sm-12">
                                                        <button type="submit" class="btn btn-success"> <i class="bx bx-save"></i> Simpan </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="Biography">

                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>