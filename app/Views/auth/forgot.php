<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Forgot Password | UMSI</title>
	<link rel="icon" href="<?= base_url(); ?>/web_tril/img/logo.png" type="image/png" />
	<link href="<?= base_url(); ?>/web_tril/dash/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url(); ?>/web_tril/dash/js/pace.min.js"></script>
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/icons.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>/web_tril/dash/css/app.css" />
</head>

<body class="bg-login">
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card shadow-lg forgot-box">
				<div class="card-body p-md-5">
					<div class="text-center">
						<img src="<?= base_url(); ?>/web_tril/img/forgot.png" width="140" alt="">
					</div>
					<h4 class="mt-5 font-weight-bold"><?= lang('Auth.forgotPassword') ?></h4>
					<?= view('Myth\Auth\Views\_message_block') ?>
					<p class="text-muted"><?= lang('Auth.enterEmailForInstructions') ?></p>
					<form action="<?= url_to('forgot') ?>" method="post">
						<?= csrf_field() ?>
						<div class="mb-3 mt-4">
							<label class="form-label"><?= lang('Auth.emailAddress') ?></label>
							<input name="email" type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> form-control-lg radius-30" placeholder="example@gmail.com" />
							<div class="invalid-feedback">
								<?= session('errors.email') ?>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-success btn-lg radius-30">Send</button>
							<a href="/login" class="btn btn-light radius-30"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?= base_url(); ?>/web_tril/dash/js/jquery.min.js"></script>

</html>