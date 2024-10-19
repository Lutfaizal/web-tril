<!DOCTYPE html>
<html lang="en" class="dark-sidebar">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title><?= $title; ?></title>
	<!--favicon-->
	<link rel="icon" href="<?= base_url(); ?>/web_tril/img/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?= base_url(); ?>/web_tril/dash/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>/web_tril/dash/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>/web_tril/dash/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?= base_url(); ?>/web_tril/dash/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url(); ?>/web_tril/dash/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/bootstrap.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--Data Tables -->
	<link href="<?= base_url(); ?>/web_tril/dash/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>/web_tril/dash/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<!-- Icons CSS -->
	<link href="<?= base_url(); ?>/web_tril/dash/landing/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/app.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/dark-sidebar.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/dark-theme.css" />
	<script src="<?= base_url(); ?>/web_tril/dash/tinymce/tinymce.min.js"></script>
</head>

<body>
	<div class="wrapper">
		<?= $this->include('template/sidebar'); ?>
		<?= $this->include('template/header'); ?>
		<div class="page-wrapper">
			<?= $this->renderSection("content"); ?>
		</div>
		<div class="overlay toggle-btn-mobile"></div>
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<?= $this->include('template/footer'); ?>
	</div>
	<!-- Bootstrap JS -->
	<script src="<?= base_url(); ?>/web_tril/dash/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= base_url(); ?>/web_tril/dash/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>/web_tril/dash/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= base_url(); ?>/web_tril/dash/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url(); ?>/web_tril/dash/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Data Tables js-->
	<script src="<?= base_url(); ?>/web_tril/dash/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
			});
			table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
			$("#success-alert").slideUp(500);
		});
		tinymce.init({
			selector: '.konten',
			menubar: true,
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table paste code help wordcount'
			],
			toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat code',
			content_style: 'body { font-family:Arial,sans-serif; font-size:14px }'
		});
		tinymce.init({
			selector: '.kontens',
			menubar: false,
			toolbar: false,
			content_style: 'body { font-family:Arial,sans-serif; font-size:14px }'
		});

		function previewimg() {
			const foto = document.querySelector('#foto');
			const fotoLabel = document.querySelector('.custom-file-label');
			const imgPreview = document.querySelector('.img-preview');
			fotoLabel.textContent = foto.files[0].name;
			const filefoto = new FileReader();
			filefoto.readAsDataURL(foto.files[0]);
			filefoto.onload = function(e) {
				imgPreview.src = e.target.result;
			}
		};
	</script>
	<!-- App JS -->
	<script src="<?= base_url(); ?>/web_tril/dash/js/app.js"></script>
</body>

</html>