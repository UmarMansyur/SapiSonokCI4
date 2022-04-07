<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card custom-card">
      <div class="card-body d-md-flex">
        <div class="">
          <span class="profile-image pos-relative">
            <img class="br-5" alt="" src="<?= user_login()->foto == null ? base_url('assets/img/faces/farmer_profile.jpg') : 'uploads/profile/profile_' . user_login()->foto ?>">
            <span class="bg-success text-white wd-1 ht-1 rounded-pill profile-online"></span>
          </span>
        </div>
        <div class="my-md-auto mt-4 prof-details">
          <h4 class="font-weight-semibold ms-md-4 ms-0 mb-1 pb-0"><?= user_login()->nama_peternak ?></h4>
          <p class="tx-13 text-muted ms-md-4 ms-0 mb-2 pb-2 ">
            <span class="me-3"><i class="fa fa-user-secret me-2"></i><?= user_login()->status_admin == 1 ? 'Admin' : 'Peternak' ?></span>
            <span class="me-3"><i class="fa fa-map-marker me-2"></i><?= user_login()->alamat == null ? 'Tidak diketahui' : user_login()->alamat ?></span>
          </p>
          <p class="text-muted ms-md-4 ms-0 mb-2">
            <span class="badge badge-<?= user_login()->status_akun == 0 ? 'success' : 'danger' ?>"><?= user_login()->status_akun == 0 ? 'Aktif' : 'Non Aktif' ?></span>
          </p>
          <p class="text-muted ms-md-4 ms-0 mb-2">
            <span><i class="fa fa-phone me-2"></i></span>
            <span class="font-weight-semibold me-2">Phone:</span>
            <span><?= user_login()->nomor_telpon == null ? 'Tidak diketahui' : user_login()->nomor_telpon ?></span>
          </p>
          <p class="text-muted ms-md-4 ms-0 mb-2">
            <span><i class="fa fa-envelope me-2"></i></span>
            <span class="font-weight-semibold me-2">Email:</span>
            <span><?= user_login()->email == null ? 'Tidak diketahui' : user_login()->email ?></span>
          </p>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row row-sm">
  <div class="col-lg-12 col-md-12">
    <div class="card productdesc">
      <div class="card-body">
        <div class="panel panel-primary">
          <div class=" tab-menu-heading">
            <div class="tabs-menu1">
              <!-- Tabs -->
              <ul class="nav panel-tabs">
                <li><a href="#tab5" class="tx-15 active" data-bs-toggle="tab">Biodata</a></li>
                <li><a href="#tab6" data-bs-toggle="tab">Akun</a></li>
              </ul>
            </div>
          </div>
          <div class="panel-body tabs-menu-body">
            <div class="tab-content">
              <div class="tab-pane active" id="tab5">
                <form action="<?= base_url('profile/verifikasi') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" >
                  <?= csrf_field() ?>
                  <div class="form-group ">
                    <div class="row row-sm">
                      <div class="col-md-3">
                        <label class="form-label">Nama</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nama" value="<?= user_login()->nama_peternak ?>" name="nama_peternak">
                      </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <div class="row row-sm">
                      <div class="col-md-3">
                        <label class="form-label">Alamat</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Alamat" value="<?= user_login()->alamat ?>" name="alamat_peternak">
                      </div>
                    </div>
                  </div>
                  <?php if (user_login()->status_admin == 1) : ?>
                    <div class="form-group ">
                      <div class="row row-sm">
                        <div class="col-md-3">
                          <label class="form-label">Status</label>
                        </div>
                        <div class="col-md-9">
                          <select name="status" id="status_peternak" class="form-control form-select">
                            <option class="form-control form-select" value="1">Admin</option>
                            <option class="form-control form-select" value="0">Peternak</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="form-group ">
                      <div class="row row-sm">
                        <div class="col-md-3">
                          <label class="form-label">Status</label>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" placeholder="Status" name="status" value="Peternak" disabled>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>
                  <div class="form-group ">
                    <div class="row row-sm">
                      <div class="col-md-3">
                        <label class="form-label">Foto</label>
                      </div>
                      <div class="col-md-9">
                        <input type="file" class="form-control" placeholder="Foto" name="foto">
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="tab6">
                <form class="form-horizontal" action="<?= base_url('profile/verifikasi') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                  <div class="form-group ">
                    <div class="row row-sm">
                      <div class="col-md-3">
                        <label class="form-label">Nomor Telpon</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nomor Telpon" value="<?= user_login()->nomor_telpon ?>" name="nomor_telpon">
                      </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <div class="row row-sm">
                      <div class="col-md-3">
                        <label class="form-label">Email</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Email" value="<?= user_login()->email ?>" name="email">
                      </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <div class="row row-sm">
                      <div class="col-md-3">
                        <label class="form-label">Password</label>
                      </div>
                      <div class="col-md-9">
                        <input type="password" class="form-control" placeholder="Password" value="<?= session()->get('temp_password') ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="form-group ">
                    <div class="row row-sm">
                      <div class="col-md-3">
                        <label class="form-label">Password Baru</label>
                      </div>
                      <div class="col-md-9">
                        <input type="password" class="form-control" placeholder="Password Baru" name="password">
                      </div>
                    </div>
                  </div>
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>