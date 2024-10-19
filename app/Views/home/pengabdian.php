<?= $this->extend('layouts/index'); ?>
<?= $this->section('contents'); ?>
<div class="subscribe-area pt-30 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('/'); ?>" class="fg-red"><i class="fa fa-home"></i></a></li>
                    <li> <?= $title  ?></li>
                </ol>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tim Pelaksana</th>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center" width="10%">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    foreach ($data as $data) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ . '.'; ?></td>
                                            <td>
                                                <div class="border p-2 rounded" style="background-color: #f9f9f9;">
                                                    <?= nl2br($data->tim_pelaksana); ?>
                                                </div>

                                            </td>
                                            <td><?= $data->judul;  ?></td>
                                            <td><?= $data->nama_jenis;  ?></td>
                                            <td><?= $data->tahun;  ?></td>
                                            <td align="center">
                                                <?php if (empty($data->dokumen) || $data->dokumen == '#'): ?>
                                                    <button class="btn btn-sm btn-secondary" disabled>
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                <?php else: ?>
                                                    <a href="<?= $data->dokumen; ?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>