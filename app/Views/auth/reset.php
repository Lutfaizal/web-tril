<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Reset Password | UMSI</title>
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
					<h4 class="mt-5 font-weight-bold"><?= lang('Auth.resetYourPassword') ?></h4>
					<?= view('Myth\Auth\Views\_message_block') ?>
					<p><?= lang('Auth.enterCodeEmailPassword') ?></p>
					<form action="<?= url_to('reset-password') ?>" method="post">
						<?= csrf_field() ?>
						<div class="form-group mb-3">
							<label for="token"><?= lang('Auth.token') ?></label>
							<input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
							<div class="invalid-feedback">
								<?= session('errors.token') ?>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="email"><?= lang('Auth.email') ?></label>
							<input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
							<div class="invalid-feedback">
								<?= session('errors.email') ?>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="password"><?= lang('Auth.newPassword') ?></label>
							<input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="pass_confirm"><?= lang('Auth.newPasswordRepeat') ?></label>
							<input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
							<div class="invalid-feedback">
								<?= session('errors.pass_confirm') ?>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-success btn-lg radius-30"><?= lang('Auth.resetPassword') ?></button>
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