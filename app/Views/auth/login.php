<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Login | UMSI</title>
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
		<div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
			<div class="row">
				<div class="col-12 col-lg-8 mx-auto">
					<div class="card radius-15 overflow-hidden">
						<div class="row g-0">
							<div class="col-xl-12">
								<div class="card-body p-5">
									<div class="text-center">
										<img src="<?= base_url(); ?>/web_tril/img/logo.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Login</h3>
									</div>
									<div class="">
										<div class="form-body">
											<?= view('Myth\Auth\Views\_message_block') ?>
											<form class="row g-3" action="<?= url_to('login') ?>" method="post">
												<?= csrf_field() ?>
												<?php if ($config->validFields === ['email']) : ?>
													<div class="col-12">
														<label for="inputEmailAddress" class="form-label">Email Address</label>
														<input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
														<div class="invalid-feedback">
															<?= session('errors.login') ?>
														</div>
													</div>
												<?php else : ?>
													<div class="col-12">
														<label for="inputEmailAddress" class="form-label">Email Address</label>
														<!-- <input type="email" class="form-control" id="inputEmailAddress" placeholder="Email Address"> -->
														<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
														<div class="invalid-feedback">
															<?= session('errors.login') ?>
														</div>
													</div>

												<?php endif; ?>

												<div class="col-12">
													<label for="inputChoosePassword" class="form-label">Enter Password</label>
													<div class="input-group" id="show_hide_password">
														<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
														<a href="javascript:;" class="input-group-text bg-transparent">
															<i class="bx bx-hide">
															</i>
														</a>
													</div>
													<div class="invalid-feedback">
														<?= session('errors.password') ?>
													</div>

												</div>
												<?php if ($config->allowRemembering) : ?>
													<div class="col-md-6">
														<div class="form-check form-switch">
															<input type="checkbox" id="remember" name="remember" class="ml-2 form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
															<label class="ml-4" for="remember">
																<?= lang('Auth.rememberMe') ?>
															</label>
														</div>
													</div>
												<?php endif; ?>
												<!-- <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
												</div> -->
												<div class="col-12">
													<div class="d-grid">
														<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i><?= lang('Auth.loginAction') ?></button>
													</div>
												</div>
											</form>
											<hr>
											<?php if ($config->allowRegistration) : ?>
												<p><a class="mb-1" href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
											<?php endif; ?>
											<?php if ($config->activeResetter) : ?>
												<p><a class="mb-0" href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
											<?php endif; ?>
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
</body>

<script src="<?= base_url(); ?>/web_tril/dash/js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$("#show_hide_password a").on('click', function(event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bx-hide");
				$('#show_hide_password i').removeClass("bx-show");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bx-hide");
				$('#show_hide_password i').addClass("bx-show");
			}
		});
	});
</script>

</html>