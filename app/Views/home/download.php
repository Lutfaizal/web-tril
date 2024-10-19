<?php

use App\Models\MenuModel;
use App\Models\KonfigurasiModel;

$menu = new MenuModel();
$konfigurasi  = new KonfigurasiModel();
$konfigs        = $konfigurasi->show_data();
$konfigsambutan        = $konfigurasi->show_sambutan();
?>
<?= $this->extend('layouts/index'); ?>
<?= $this->section('contents'); ?>
<div class="subscribe-area pt-30 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('/'); ?>" class="fg-red"><i class="fa fa-home"></i></a></li>
                    <li> <?= $jenis  ?></li>
                </ol>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center">Keterangan</th>
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
                                            <td><?= $data->nama_dokumen;  ?></td>
                                            <td align="center">
                                                <form class="d-inline" action="<?= base_url(); ?>/web_tril/doc/<?php echo $data->file; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method">
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-download"></i></button>
                                                </form>
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