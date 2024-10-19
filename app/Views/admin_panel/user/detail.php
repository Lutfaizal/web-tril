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
                        <li class="breadcrumb-item"><a href="/dashboard/user">Detail Data User </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Data User</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <hr>
                <div class="card">
                    <div class="card-header">
                        <h3>Detail User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-10">
                                <label>Username</label>
                                <input type="text" class="form-control" value="<?= $user->username; ?>" readonly>
                                <label>Fullname</label>
                                <input type="text" class="form-control" value="<?= $user->fullname; ?>" readonly>
                            </div>
                            <div class="col-md-2">
                                <img width="120" height="120" src="<?= base_url(); ?>/web_tril/img/<?= $user->user_image; ?>" class="rounded-circle shadow">
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <label name="email">Email</label>
                            <input type="text" class="form-control" value="<?= $user->email; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12">
                            <label>Tgl. daftar</label>
                            <input type="text" class="form-control" value="<?= $user->created_at; ?>" readonly>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>