<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<!-- /breadcrumb -->

<!--Row-->
<!-- Row -->
<div class="row row-sm">
  <div class="col-lg-12">
    <div class="card custom-card">
      <div class="card-body">
        <div class="row justify-content-end mt-3 mb-4">
          <div class="col-12 col-lg-4 ">
            <form action="" method="get">
              <div class="input-group">
                <input class="form-control form-control" placeholder="cari..." type="text" name="cari">
                <button class="btn btn-primary" type="submit">cari</button>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive deleted-table">
          <table id="user-datatable" class="table table-bordered text-nowrap border-bottom Userlist">
            <thead>
              <tr>
                <th class="text-center" style="width: 2%;">No </th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($peternak == null) : ?>
                <tr>
                  <td class="text-center" colspan="6">Data Tidak ada</td>
                </tr>
              <?php endif ?>
              <?php foreach ($peternak as $key => $p) : ?>
                <tr>
                  <td class="text-center" style="width: 2%;">
                    <?= (($key + (5 * ($currentPage - 1))) + 1) ?>
                  </td>
                  <td style="width: 30%;">
                    <p class="tx-14 font-weight-semibold text-dark mb-1"><?= $p['nama_peternak'] ?></p>
                  </td>
                  <td style="width: 30%;">
                    <span class="text-muted tx-13"><?= $p['alamat'] ?></span>
                  </td>
                  <td style="width: 30%;">
                    <p class="tx-13 text-muted mb-0"><?= $p['email'] ?></p>

                  </td>
                  <td style="width: 6%;" class="text-center">
                    <span class="text-muted tx-13"><?= $p['status_admin'] == '1' ? 'Admin' : 'Peternak' ?></span>
                  </td>
                  <td class="text-center">
                    <a href="peternak/changeStatus/<?= $p['id_peternak'] ?>" class="badge badge-<?= $p['status_akun'] == '1' ? 'danger' : 'success' ?>">
                      <span><?= $p['status_akun'] == '1' ? 'Non Aktif' : 'Aktif' ?></span>
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="row mt-2 justify-content-center">
          <div class="col">
            <?= $pager->links('peternak', 'pagination') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>