<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Website</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Konfigurasi Kampus</li>
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
                                    <img class="rounded-circle shadow" src="<?= base_url(); ?>/web_tril/img/logo.png" width="130" height="130" alt="">
                                </div>
                                <div class="ms-md-4 flex-grow-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <h4 class="mb-0"><i class="bx bx-user"></i> <?= $kampus->singkatan; ?></h4>
                                    </div>
                                    <h5 class="mb-0 text-primary"><i class="bx bx-user-circle"></i> <?= $kampus->nama_web; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="Edit-Profile">
                            <?php if (session()->getFlashData('Pesan')) : ?>
                                <div id="success-alert" class="alert alert-success border-0 bg-success alert-dismissible fade show">
                                    <div class="text-white"><?= session()->getFlashData('Pesan') ?></div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <div class="card shadow-none border mb-0 radius-15">
                                <div class="card-body">
                                    <div class="row">
                                        <form enctype="multipart/form-data" class="row g-3" method="post" action="<?= base_url('/dashboard/konfigweb/update') ?>">
                                            <?= csrf_field(); ?>
                                            <div class="col-12 col-lg-6 border-right">
                                                <div class="col-12">
                                                    <label class="form-label">Nama Web</label>
                                                    <input type="text" class="form-control mb-3 <?= $validation->hasError('nama_web') ? 'is-invalid' : '' ?>" name="nama_web" placeholder="Nama Kampus" value="<?= (old('nama_web')) ? old('nama_web') : $kampus->nama_web; ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('nama_web') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Telepon</label>
                                                    <input type="text" class="form-control mb-3 <?= $validation->hasError('telepon') ? 'is-invalid' : '' ?>" name="telepon" placeholder="Telepon" value="<?= (old('telepon')) ? old('telepon') : $kampus->telepon ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('telepon') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control mb-3 <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" name="email" placeholder="Email" value="<?= (old('email')) ? old('email') : $kampus->email ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea name="alamat" class="form-control kontens <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>"><?= (old('alamat')) ? old('alamat') : $kampus->alamat ?></textarea>
                                                    <div class="invalid-feedback"><?= $validation->getError('alamat') ?></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="col-12">
                                                    <label class="form-label">Singkatan</label>
                                                    <input type="text" class="form-control mb-3 <?= $validation->hasError('singkatan') ? 'is-invalid' : '' ?>" name="singkatan" placeholder="Fullname" value="<?= (old('singkatan')) ? old('singkatan') : $kampus->singkatan ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('singkatan') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Nomor HP</label>
                                                    <input type="text" class="form-control mb-3 <?= $validation->hasError('hp') ? 'is-invalid' : '' ?>" name="hp" placeholder="Nomor HP" value="<?= (old('hp')) ? old('hp') : $kampus->hp ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('hp') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Email Cadangan</label>
                                                    <input type="text" class="form-control mb-3 <?= $validation->hasError('email_cadangan') ? 'is-invalid' : '' ?>" name="email_cadangan" placeholder="Email Cadangan" value="<?= (old('email_cadangan')) ? old('email_cadangan') : $kampus->email_cadangan ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('email_cadangan') ?></div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Tagline</label>
                                                    <input type="text" class="form-control mb-3 <?= $validation->hasError('tagline') ? 'is-invalid' : '' ?>" name="tagline" placeholder="Tagline" value="<?= (old('tagline')) ? old('tagline') : $kampus->tagline ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('tagline') ?></div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Dosen</label>
                                                        <input type="text" class="form-control mb-3 <?= $validation->hasError('dosen') ? 'is-invalid' : '' ?>" name="dosen" placeholder="dosen" value="<?= (old('dosen')) ? old('dosen') : $kampus->dosen ?>">
                                                        <div class="invalid-feedback"><?= $validation->getError('dosen') ?></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Prodi</label>
                                                        <input type="text" class="form-control mb-3 <?= $validation->hasError('prodi') ? 'is-invalid' : '' ?>" name="prodi" placeholder="Prodi" value="<?= (old('prodi')) ? old('prodi') : $kampus->prodi ?>">
                                                        <div class="invalid-feedback"><?= $validation->getError('prodi') ?></div>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Mahasiswa</label>
                                                        <input type="text" class="form-control mb-3 <?= $validation->hasError('mahasiswa') ? 'is-invalid' : '' ?>" name="mahasiswa" placeholder="Mahasiswa" value="<?= (old('mahasiswa')) ? old('mahasiswa') : $kampus->mahasiswa ?>">
                                                        <div class="invalid-feedback"><?= $validation->getError('mahasiswa') ?></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Lab</label>
                                                        <input type="text" class="form-control mb-3 <?= $validation->hasError('lab') ? 'is-invalid' : '' ?>" name="lab" placeholder="Lab" value="<?= (old('lab')) ? old('lab') : $kampus->lab ?>">
                                                        <div class="invalid-feedback"><?= $validation->getError('lab') ?></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success"> <i class="bx bx-save"></i> Simpan </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>