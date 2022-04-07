<?= $this->extend('admin/layout/header') ?>
<?= $this->section('header') ?>

<body class="ltr main-body app sidebar-mini">
	<!-- Loader -->
	<div id="global-loader">
		<img src="<?= base_url('assets/img/loader.svg')?>" class="loader-img" alt="Loader">
	</div>
	<!-- /Loader -->

	<!-- main-header -->
	<div class="main-header side-header sticky nav nav-item">
		<div class=" main-container container-fluid">
			<div class="main-header-left ">
				<div class="responsive-logo">
					<a href="index-2.html" class="header-logo">
						<img src="<?= base_url('assets/img/brand/logo.png') ?>" class="mobile-logo logo-1" alt="logo">
						<img src="<?= base_url('assets/img/brand/logo-white.png') ?>" class="mobile-logo dark-logo-1" alt="logo">
					</a>
				</div>
				<div class="app-sidebar__toggle" data-bs-toggle="sidebar">
					<a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left"></i></a>
					<a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
				</div>
				<div class="logo-horizontal">
					<a href="index-2.html" class="header-logo">
						<img src="<?= base_url('assets/img/brand/logo.png') ?>" class="mobile-logo logo-1" alt="logo">
						<img src="<?= base_url('assets/img/brand/logo-white.png') ?>" class="mobile-logo dark-logo-1" alt="logo">
					</a>
				</div>
			</div>
			<div class="main-header-right">
				<a href="/profile" class=" main-img-user d-md-none ms-auto" type="button">
					<img alt="" src="<?= user_login()->foto == null ? base_url('assets/img/faces/farmer_profile.jpg') : base_url('uploads/profile/icon_') . user_login()->foto ?>" class="">
				</a>
				<a class="navbar-toggler nav-responsive-toggler d-md-none ms-auto" type="button" href="/logout">
					<span class="navbar-toggler-icon fe fe-power"></span>
				</a>
				<div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<ul class="nav nav-item header-icons navbar-nav-right ms-auto">
							<li class="dropdown main-profile-menu nav nav-item nav-link ps-lg-2">
								<a class="new nav-link profile-user d-flex" href="/profile" data-bs-toggle="dropdown"><img alt="" src="<?= user_login()->foto == null ? base_url('assets/img/faces/farmer_profile.jpg') : base_url('uploads/profile/icon_') . user_login()->foto ?>" class=""></a>
								<div class="dropdown-menu">
									<div class="menu-header-content p-3 border-bottom">
										<div class="d-flex wd-100p">
											<div class="main-img-user">
												<img alt="" src="<?= user_login()->foto == null ? base_url('assets/img/faces/farmer_profile.jpg') : base_url('uploads/profile/icon_') . user_login()->foto ?>" class="">
											</div>
											<div class="ms-3 my-auto">
												<h6 class="tx-15 font-weight-semibold mb-0">
													<?= user_login()->nama_peternak ?></h6>
												<span class="dropdown-title-text subtext op-6  tx-12"><?= user_login()->status_admin == 1 ? 'Admin' : 'Peternak' ?></span>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<a class="new nav-link text-dark" href="/logout">
									<i class="fe fe-log-out"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /main-header -->

	<!-- main-sidebar -->
	<div class="sticky">
		<aside class="app-sidebar">
			<div class="main-sidebar-header active">
				<a class="header-logo active" href="index-2.html">
					<img src="<?= base_url('assets/img/brand/logo.png') ?>" class="main-logo  desktop-logo" alt="logo">
					<img src="<?= base_url('assets/img/brand/logo-white.png') ?>" class="main-logo  desktop-dark" alt="logo">
					<img src="<?= base_url('assets/img/brand/favicon.png') ?>" class="main-logo  mobile-logo" alt="logo">
					<img src="<?= base_url('assets/img/brand/favicon-white.png') ?>" class="main-logo  mobile-dark" alt="logo">
				</a>
			</div>
			<div class="main-sidemenu">
				<div class="col-lg mt-4">
					<a href="/profile">
					<div class="media mt-0">
						<img class="avatar-md rounded-circle ms-1 me-3 my-auto shadow" src="<?= user_login()->foto == null ? base_url('assets/img/faces/farmer_profile.jpg') : base_url('uploads/profile/icon_') . user_login()->foto ?>" alt="Image description">
						<div class="media-body">
							<div class="d-flex align-items-center">
								<div class="mt-0">
									<h5 class="mb-1 tx-13 font-weight-sembold text-dark"><?= user_login()->nama_peternak ?></h5>
									<p class="mb-0 tx-12 text-muted">User ID: #<?= user_login()->id_peternak ?></p>
								</div>
								<span class="ms-auto wd-45p tx-14">
									<span class="float-end badge badge-success-transparent">
										<span class="op-7 text-success font-weight-semibold">Online</span>
									</span>
								</span>
							</div>
						</div>
					</div>
				</a>
				</div>

				<ul class="side-menu mt-4">
					<li class="side-item side-item-category mt-4">Main</li>
					<li class="slide">
						<a href="<?= base_url('/dashboard') ?>" class="side-menu__item">
							<span class="side-menu__icon">
								<i class="fa fa-home"></i>
							</span>
							<span class="side-menu__label">Dashboard</span>
						</a>
					</li>
					<?php if (user_login()->status_admin == '1') : ?>
						<li class="slide">
							<a href="<?= base_url('/aksesoris') ?>" class="side-menu__item">
								<span class="side-menu__icon">
									<i class="fa fa-shopping-bag"></i>
								</span>
								<span class="side-menu__label">Aksesoris</span>
							</a>
						</li>
						<li class="slide">
							<a href="<?= base_url('/berita') ?>" class="side-menu__item">
								<span class="side-menu__icon">
									<i class="far fa-newspaper"></i>
								</span>
								<span class="side-menu__label">Berita</span>
							</a>
						</li>
						<li class="side-item side-item-category">User</li>
						<li class="slide">
							<a href="<?= base_url('/peternak') ?>" class="side-menu__item">
								<span class="side-menu__icon">
									<i class="fa fa-users"></i>
								</span>
								<span class="side-menu__label">Peternak</span>
							</a>
						</li>
					<?php endif ?>
					<li class="side-item side-item-category">Store</li>
					<li class="slide">
						<a href="<?= base_url('sapi') ?>" class="side-menu__item">
							<span class="side-menu__icon">
								<i class="fab fa-stumbleupon"></i>
							</span>
							<span class="side-menu__label">Sapi</span>
						</a>
					</li>
					<li class="slide">
						<a href="<?= base_url('pasangan') ?>" class="side-menu__item">
							<span class="side-menu__icon">
								<i class="fa fa-sitemap"></i>
							</span>
							<span class="side-menu__label">Pasangan</span>
						</a>
					</li>
					<li class="slide">
						<a href="<?= base_url('prestasi') ?>" class="side-menu__item">
							<span class="side-menu__icon">
								<i class="fa fa-trophy"></i>
							</span>
							<span class="side-menu__label">Prestasi</span>
						</a>
					</li>
					<li class="slide">
						<a href="<?= base_url('pasar') ?>" class="side-menu__item">
							<span class="side-menu__icon">
								<i class="fa fa-shopping-cart"></i>
							</span>
							<span class="side-menu__label">Pasar</span>
						</a>
					</li>
				</ul>
			</div>
		</aside>
	</div>
	<!-- main-sidebar -->
	<!-- main-content -->
	<div class="main-content app-content">
		<!-- container -->
		<div class="main-container container-fluid">
			<!-- breadcrumb -->
			<div class="breadcrumb-header justify-content-between">
				<div class="left-content">
					<span class="main-content-title mg-b-0 mg-b-lg-1"><?= $title ?></span>
				</div>
				<div class="justify-content-center mt-2">
					<ol class="breadcrumb">
						<li class="breadcrumb-item tx-15"><a href="#"><?= $title ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $subtitle ?></li>
					</ol>
				</div>
			</div>
			<!-- /breadcrumb -->
			<?= $this->renderSection('content') ?>
		</div>
		<!-- Container closed -->
	</div>
	<!-- main-content closed -->


	<!-- Footer opened -->
	<div class="main-footer">
		<div class="container-fluid pd-t-0-f ht-100p">
			Copyright © 2022 <a href="javascript:void(0);" class="text-primary">SILAPAR</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> ProJs </a> Universitas Madura
		</div>
	</div>
	<!-- Footer closed -->

	</div>
	<!-- End Page -->
	<?= $this->endSection() ?>