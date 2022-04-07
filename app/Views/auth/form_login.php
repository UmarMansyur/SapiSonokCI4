<?= $this->extend('auth/login') ?>
<?= $this->Section('form_login') ?>
<form action="Login/signin" method="POST">
  <?= csrf_field() ?>
  <?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> <?= session()->getFlashdata('success') ?>
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
  </div>
  <?php endif ?>
  <?php if (session()->getFlashdata('error')) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong> <?= session()->getFlashdata('error') ?>
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
  </div>
  <?php endif ?>
  <div class="form-group">
    <label>Email</label> 
    <input class="form-control" placeholder="Email" name="email" type="text">
  </div>
  <div class="form-group">
    <label>Password</label> 
    <input class="form-control" placeholder="Password" name="password" type="password">
  </div>
  <button type="submit" class="btn btn-primary btn-block">Masuk</button>
</form>
<?= $this->endSection() ?>