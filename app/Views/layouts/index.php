<?php

use App\Models\KonfigurasiModel;
use App\Models\MenuModel;

$konfigurasi  = new KonfigurasiModel();
$menu         = new MenuModel();
$konfigs        = $konfigurasi->show_data();
?>

<!DOCTYPE html>
<html lang="en">

<?= $this->include('layouts/head'); ?>


<body>
	<?= $this->include('layouts/header'); ?>
	<?= $this->renderSection("contents"); ?>
	<?= $this->include('layouts/footer'); ?>
	<?= $this->include('layouts/script'); ?>
</body>

</html>