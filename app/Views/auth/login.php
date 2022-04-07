
<?= $this->extend('admin/layout/header') ?>
<?= $this->section('header') ?>
<body class="ltr error-page1">
  <div class="bg-primary">
    <!-- Loader -->
    <div id="global-loader">
      <img src="assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-45 justify-content-center">
              <div class="card-sigin mt-5 mt-md-0">
                <!-- Demo content-->
                <div class="main-card-signin d-md-flex">
                  <div class="wd-100p">
                    <div class="text-center"><a href="/profile"><img src="assets/img/brand/sapi.png" alt="logo"></a></div>
                    <div class="">
                      <div class="main-signup-header">
                        <h2 class="text-center">SILAPAR</h2>
                        <h6 class="font-weight-semibold mb-4 text-center">Silsilah Prestasi Pasar</h6>
                        <div class="panel panel-light">
                          <div class="panel-body tabs-menu-body border-0 p-3">
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab5">
                                <?= $this->renderSection('form_login') ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php if (uri_string() == 'login'): ?>
                        <div class="main-signin-footer text-center mt-3">
                          <p><a href="forgot.html" class="mb-3">Lupa password?</a></p>
                          <p>Belum punya akun ? <a href="<?=base_url('registrasi') ?>">Buat akun</a></p>
                        </div>
                        <?php endif ?>
                        <?php if (uri_string() == 'registrasi'): ?>
                        <div class="main-signin-footer text-center mt-3">
                          <p>Sudah memiliki akun ? <a href="<?=base_url('login') ?>">Masuk</a></p>
                        </div>
                        <?php endif ?>
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
  </div>
<?= $this->endSection() ?>