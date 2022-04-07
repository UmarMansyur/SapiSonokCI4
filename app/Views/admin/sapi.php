<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<div class="col-xl-12">
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-solid-success alert-dismissible fade show" role="alert">
      <strong>Sukses!</strong> <?= session()->getFlashdata('success') ?>
      <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
    </div>
  <?php endif ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-solid-danger alert-dismissible fade show" role="alert">
      <strong>Gagal!</strong> <?= session()->getFlashdata('error') ?>
      <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
    </div>
  <?php endif ?>
  <div class="row mb-3 justify-content-between">
    <div class="col-2 text-center-sm">
      <button class="btn btn-primary" data-bs-target="#tambahSapi" data-bs-toggle="modal">Tambah</button>
    </div>
    <div class="col-7 col-lg-3 text-end">
      <form action="" method="get">
        <div class="input-group">
          <input class="form-control" placeholder="cari..." type="text" name="cari">
          <button class="btn btn-outline-light " type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
  </div>
  <div class="card">
    <div class="card-header pb-0">
      <div class="d-flex justify-content-between">
        <h4 class="card-title mg-b-0">Sape Sonok</h4>
      </div>
      <p class="tx-12 tx-gray-500 mb-2">Sapi yang didaftarkan direkomendasikan untuk menambahkan silsilah</p>
    </div>
    <div class="card-body">
      <div id='swalUpdate' data-swal="<?= session()->getFlashdata('update') ?>"></div>
      <div id='swalInsert' data-swal="<?= session()->getFlashdata('silsilahSuccess') ?>"></div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0 text-md-nowrap">
          <thead>
            <tr>
              <th style="width: 2%;">No</th>
              <th style="width: 30%;">Nama Sapi</th>
              <th style="width: 15%;">Jenis Kelamin</th>
              <th style="width: 20%;">Tanggal Lahir</th>
              <th class="text-center" style="width: 13%;">Status</th>
              <th class="text-center" style="width: 20%;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sapi as $key => $s) : ?>
              <tr>
                <th class="text-center"><?= (($key + (5 * ($currentPage - 1))) + 1) ?></th>
                <td><?= $s['nama_sapi'] ?></td>
                <td><?= $s['jenis_kelamin'] == 1 ? 'Jantan' : 'Betina' ?></td>
                <td><?= $s['tanggal_lahir'] ?></td>
                <td style="text-align:center">
                  <?php
                  if ($s['status_sapi'] == '1') {
                    echo 'Sehat';
                  } elseif ($s['status_sapi'] == '2') {
                    echo 'Sakit';
                  } else {
                    echo 'Mati';
                  }
                  ?>
                </td>
                <td class="text-center">
                  <a href="" class="btn btn-warning btn-sm" data-bs-target="#silsilah" data-bs-toggle="modal" id="Silsilah" data-nama_sapi="<?= $s['nama_sapi'] ?>" data-id_sapi="<?= $s['id_sapi'] ?>">
                    silsilah
                  </a>
                  <a href="" class="btn btn-info btn-sm" data-bs-target="#editdataSapi" data-bs-toggle="modal" id="editSapi" data-edit_id_sapi="<?= $s['id_sapi'] ?>" data-edit_nama_sapi="<?= $s['nama_sapi'] ?>" data-edit_jenis_kelamin="<?= $s['jenis_kelamin'] ?>" data-edit_tanggal_lahir="<?= $s['tanggal_lahir'] ?>" data-edit_status_sapi="<?= $s['status_sapi'] ?>" data-edit_tanggal_kepemilikan="<?= $s['tanggal_awal_kepemilikan'] ?>">
                    edit
                  </a>
                  <a href="sapi/delete/<?= $s['id_sapi'] ?>" class="btn btn-danger btn-sm delete">hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="mt-3 item-align-end">
        <?= $pager->links('peternak', 'pagination') ?>
      </div>
    </div>
  </div>
</div>
<div id="tambahSapi" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Sapi</h5>
      </div>
      <div class="modal-body">
        <form action="sapi/tambah" method="post">
          <?= csrf_field() ?>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama/Julukan" name="nama_sapi" id="nama_sapi" required>
          </div>
          <div class="form-group ">
            <div class="custom-controls-stacked" required>
              <label class="custom-control custom-radio d-inline ml-2">
                <input type="radio" class="custom-control-input" name="jenis_kelamin" value="1" checked="">
                <span class="custom-control-label">Jantan</span>
              </label>
              <label class="custom-control custom-radio d-inline">
                <input type="radio" class="custom-control-input" name="jenis_kelamin" value="2">
                <span class="custom-control-label">Betina</span>
              </label>
            </div>
          </div>
          <div class="form-group">
            <input placeholder="Tanggal Lahir Sapi" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date" name="tanggal_lahir" required>
          </div>
          <div class="form-group">
            <select name="status_sapi" id="status_sapi" class="form-control" required>
              <option value="">Status</option>
              <option value="1">Sehat</option>
              <option value="2">Sakit</option>
              <option value="3">Mati</option>
            </select>
          </div>
          <div class="form-group">
            <input placeholder="Tanggal awal kepemilikan" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date" name="tanggal_kepemilikan" required>
          </div>
          <div class="text-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="mx-2 btn btn-info btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="silsilah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Silsilah Sapi</h5>
      </div>
      <div class="modal-body">
        <form action="sapi/silsilah" method="POST">
          <?= csrf_field() ?>
          <div class="row row-sm">
            <input type="hidden" name="id_sapi" id="id_sapi">
            <div class="col-lg">
              <select name="induk_betina" id="induk_betina" class="form-control SlectBox SumoUnder">
                <?php foreach ($sapi as $key => $s) : ?>
                  <option class="CaptionCont SelectBox" value="<?= $s['id_sapi'] ?>"><?= $s['nama_sapi'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-lg-2 mg-t-10 mg-lg-t-0">
              <label for="" class="form-label text-center"> > < </label>
            </div>
            <div class="col-lg mg-t-10 mg-lg-t-0">
              <select name="induk_jantan" id="induk_jantan" class="form-control SlectBox SumoUnder">
                <?php foreach ($sapi as $key => $s) : ?>
                  <option class="form-control form-select" value="<?= $s['id_sapi'] ?>"><?= $s['nama_sapi'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col text-center">
              <h4 id="silsilah_nama_sapi"></h4>
            </div>
          </div>
          <div class="text-end">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="editdataSapi" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Sapi</h5>
      </div>
      <div class="modal-body">
        <form action="sapi/edit" method="POST">
          <?= csrf_field() ?>
          <input type="hidden" name="edit_id_sapi" id="edit_id_sapi">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama/Julukan" name="edit_nama_sapi" id="edit_nama_sapi" required>
          </div>
          <div class="form-group ">
            <div class="custom-controls-stacked">
              <label class="custom-control custom-radio d-inline ml-2">
                <input type="radio" class="custom-control-input" id="jantan" name="edit_jenis_kelamin" value="1">
                <span class="custom-control-label">Jantan</span>
              </label>
              <label class="custom-control custom-radio d-inline">
                <input type="radio" class="custom-control-input" id="betina" name="edit_jenis_kelamin" value="2">
                <span class="custom-control-label">Betina</span>
              </label>
            </div>
          </div>
          <div class="form-group">
            <input placeholder="Tanggal lahir" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="edit_tanggal_lahir" name="edit_tanggal_lahir">
          </div>
          <div class="form-group">
            <select name="edit_status_sapi" id="edit_status_sapi" class="form-control" required>
              <option value="">Status</option>
              <option value="1">Sehat</option>
              <option value="2">Sakit</option>
              <option value="3">Mati</option>
            </select>
          </div>
          <div class="form-group">
            <input placeholder="Tanggal awal kepemilikan" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="edit_tanggal_kepemilikan" name="edit_tanggal_kepemilikan">
          </div>
          <div class="text-end mt-2">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info btn-primary" data-dismiss="modal">Simpan</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>