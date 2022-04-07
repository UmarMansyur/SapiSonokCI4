<?= $this->extend('auth/login') ?>
<?= $this->Section('form_login') ?>
<form action="Login/create" method="POST">
  <?= csrf_field() ?>
  <div class="form-group">
    <label>Nama</label> 
    <input class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' :'' ?>" name="nama" placeholder="Nama" type="text">
    <div class="invalid-feedback"><?= $validation->getError('nama') ?> </div>
  </div>
  <div class="form-group">
    <label>Alamat</label> 
    <input class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' :'' ?>" placeholder="Alamat" name="alamat" type="text">
    <div class="invalid-feedback"><?= $validation->getError('alamat') ?> </div>
  </div>
  <div class="form-group">
    <label>Email</label> 
    <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' :'' ?>" placeholder="Email" name="email" type="text">
    <div class="invalid-feedback"><?= $validation->getError('email') ?> </div>
  
  </div>
  <div class="form-group">
    <label>Password</label> 
    <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' :'' ?>" placeholder="Password" name="password" type="password">
    <div class="invalid-feedback"><?= $validation->getError('password') ?> </div>

  </div>
  <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
</form>
<?= $this->endSection() ?>