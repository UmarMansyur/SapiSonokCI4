<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-solid-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> <?= session()->getFlashdata('success') ?>
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
  </div>
<?php endif ?>
<?php if (session()->getFlashdata('error')) : ?>
  <div class="alert alert-solid-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong> Data tidak dapat ditambahkan!
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
  </div>
<?php endif ?>
<div class="row mt-4">
  <div class="col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pasangan</h3>
        <p class="text-muted card-sub-title">Pastikan data yang anda masukkan telah benar!</p>
      </div>
      <div class="card-body">
        <div class="row mb-3 justify-content-between">
          <div class="col-2 text-center-sm">
            <a class="btn btn-info text-white btn-md" data-bs-target="#tambahPasangan" data-bs-toggle="modal">Tambah</a>
          </div>
          <div class="col-7 col-lg-3 text-end">
            <form action="" method="get">
              <div class="input-group">
                <input class="form-control form-control" placeholder="cari..." type="text" name="cari">
                <button class="btn btn-outline-light" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div id='swalUpdate' data-swal="<?= session()->getFlashdata('update') ?>"></div>
        <div class="table-responsive">
          <table class="table table-bordered text-nowrap mb-0">
            <thead>
              <tr>
                <th class="text-center" widht="5%">No</th>
                <th width="25%">Nama Pasangan</th>
                <th width="25%">Sapi Kanan</th>
                <th width="25%">Sapi Kiri</th>
                <th class="text-center" width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pasangan as $key => $p) : ?>
                <tr>
                  <td><?= (($key + (5 * ($currentPage - 1))) + 1) ?></td>
                  <td><?= $p['nama_pasangan'] ?></td>
                  <td><?= $p['nama_sapi'] ?></td>
                  <td><?= $p['sapi'] ?></td>
                  <td class="text-center">
                    <a href="#" class="btn btn-warning btn-sm" id="editPasangan" data-bs-target="#editParent" data-bs-toggle="modal" 
                    data-edit_id_pasangan="<?= $p['id_pasangan'] ?>" 
                    data-edit_id_pasangan_kanan="<?= $p['id_pasangan_kanan'] ?>" 
                    data-edit_id_pasangan_kiri="<?= $p['id_pasangan_kiri'] ?>" 
                    data-edit_nama_pasangan="<?= $p['nama_pasangan'] ?>" 
                    data-edit_nama_sapi_kanan="<?= $p['id_sapi_kanan'] ?>" 
                    data-edit_nama_sapi_kiri="<?= $p['id_sapi_kiri'] ?>">
                      <i class="fe fe-edit-2"></i>
                    </a>
                    <a href="pasangan/delete/<?= $p['id_pasangan'] ?>" class="btn btn-danger delete btn-sm"><i class="fe fe-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3 item-align-end">
          <?= $pager->links('pasangan', 'pagination') ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editParent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Update Pasangan</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" action="pasangan/edit" method="post">
          <?= csrf_field() ?>
          <div class="form-group mb-3">
            <label for="edit_nama_pasangan" class="form-label">Nama Pasangan:</label>
            <input type="text" class="form-control" id="edit_nama_pasangan" name="edit_nama_pasangan" placeholder="Nama Pasangan" autofocus required>
            <input type="hidden" class="form-control" id="edit_id_pasangan" name="edit_id_pasangan" placeholder="Nama Pasangan" autofocus required>
            <input type="hidden" class="form-control" id="edit_id_pasangan_kanan" name="edit_id_pasangan_kanan" placeholder="Nama Pasangan" autofocus required>
            <input type="hidden" class="form-control" id="edit_id_pasangan_kiri" name="edit_id_pasangan_kiri" placeholder="Nama Pasangan" autofocus required>
          </div>
          <div class="form-group mb-3">
            <label for="edit_nama_pasangan_kanan" class="form-label">Pasangan Kanan:</label>
            <select name="edit_nama_pasangan_kanan" id="edit_nama_pasangan_kanan" class="form-control form-select">
              <?php foreach ($sapi as $key => $s) : ?>
                <option class="form-control form-select" value="<?= $s['id_sapi'] ?>"><?= $s['nama_sapi'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="edit_nama_pasangan_kiri" class="form-label">Pasangan Kiri:</label>
            <select name="edit_nama_pasangan_kiri" id="edit_nama_pasangan_kiri" class="form-control form-select">
              <?php foreach ($sapi as $key => $s) : ?>
                <option class="form-control form-select" value="<?= $s['id_sapi'] ?>"><?= $s['nama_sapi'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="text-end">
            <button type="reset" class="btn btn-danger mx-2" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="tambahPasangan">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Pasangan</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" action="pasangan/tambah" method="post">
          <?= csrf_field() ?>
          <div class="form-group mb-3">
            <label for="nama_pasangan" class="form-label">Nama Pasangan:</label>
            <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" placeholder="Nama Pasangan" autofocus required>
          </div>
          <div class="form-group mb-3">
            <label for="pasangan_kanan" class="form-label">Pasangan Kanan:</label>
            <select name="pasangan_kanan" id="pasangan_kanan" class="form-control form-select">
              <?php foreach ($sapi as $key => $s) : ?>
                <option class="form-control form-select" value="<?= $s['id_sapi'] ?>"><?= $s['nama_sapi'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="pasangan_kiri" class="form-label">Pasangan Kiri:</label>
            <select name="pasangan_kiri" id="pasangan_kiri" class="form-control form-select">
              <?php foreach ($sapi as $key => $s) : ?>
                <option class="form-control form-select" value="<?= $s['id_sapi'] ?>"><?= $s['nama_sapi'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="text-end">
            <button type="reset" class="btn btn-danger mx-2" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="hapusAksesoris">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-body">
        <p>Apakah anda yakin menghapus item ini ?</p>
        <button class="btn ripple btn-primary" type="button">Hapus</button>
        <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
      </div>
    </div>
  </div>
</div>
</div>
<?= $this->endSection() ?>