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
            <span class="me-3"></i>Semoga harimu menyangkan</span>
          </p>
          <p class="text-muted ms-md-4 ms-0 mb-2">
            <span class="badge badge-<?= user_login()->status_akun == 0 ? 'success' : 'danger' ?>"><?= user_login()->status_akun == 0 ? 'Aktif' : 'Non Aktif' ?></span>
          </p>
          
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>