<header class="top-header">
	<nav class="navbar navbar-expand">
		<div class="left-topbar d-flex align-items-center">
			<a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
			</a>
		</div>
		<div class="topbar d-flex align-items-center">
			<a href="<?= base_url('/'); ?>" target="_blank" class="btn btn-info"> <i class="bx bx-send"></i> Homepage</a>
			<label for="" class="text-white">#</label>
		</div>
		<div class="flex-lg-grow-1 search-bar">
			<div class="input-group">
				<input type="text" class="form-control ml-5" placeholder="search" />
				<button class="btn btn-search-back search-arrow-back" type="button"><i class="bx bx-arrow-back"></i></button>
				<button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
			</div>
		</div>
		<div class="right-topbar ms-auto">
			<ul class="navbar-nav">
				<li class="nav-item search-btn-mobile">
					<a class="nav-link position-relative" href="javascript:;"> <i class="bx bx-search vertical-align-middle"></i>
					</a>
				</li>
				<li class="nav-item dropdown dropdown-user-profile">
					<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
						<div class="d-flex user-box align-items-center">
							<div class="user-info">
								<p class="user-name mb-0"><?= user()->fullname; ?></p>
								<p class="designattion mb-0 text-success text-center"> Online</p>
							</div>
							<img src="<?= base_url(); ?>/web_tril/img/<?= user()->user_image; ?>" class="user-img" alt="user avatar">
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a class="dropdown-item" href="<?= base_url('/dashboard/profile'); ?>"><i class="bx bx-user"></i><span>Profile</span></a>
						<div class="dropdown-divider mb-0"></div>
						<a class="dropdown-item" href="<?= base_url('logout'); ?>"><i class="bx bx-power-off"></i><span>Logout</span></a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</header>