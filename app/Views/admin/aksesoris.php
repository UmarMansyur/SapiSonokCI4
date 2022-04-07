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
        <h3 class="card-title">Aksesoris</h3>
        <p class="text-muted card-sub-title">Data yang anda tambahkan di bawah ini akan ditampilkan pada menu beranda, pastikan data yang anda tambahkan telah benar!</p>
      </div>
      <div class="card-body">
        <div class="row mb-3 justify-content-between">
          <div class="col-2 text-center-sm">
            <a class="btn btn-info btn-md" href="<?= base_url('add_aksesoris') ?>">Tambah</a>
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
                <th width="25%">Aksesoris</th>
                <th width="55%">Deskripsi</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($aksesoris as $key => $a) : ?>
                <tr>
                  <td class="text-center"> <?= (($key + (5 * ($currentPage - 1))) + 1) ?> </td>
                  <td> <?= $a['nama_aksesoris'] ?></td>
                  <td><?= $a['deksripsi_aksesoris'] ?> </td>
                  <td class="text-center">
                    <a href="#" class="btn btn-warning btn-sm" id="editAksesoris" data-bs-target="#modalEdit" data-bs-toggle="modal" data-id_aksesoris="<?= $a['id_aksesoris'] ?>" data-nama_aksesoris="<?= $a['nama_aksesoris'] ?>" data-gambar="<?= $a['file_aksesoris'] ?>" data-deksripsi_aksesoris="<?= $a['deksripsi_aksesoris'] ?>" data-file_aksesoris="<?= $a['file_aksesoris'] ?>"><i class="fe fe-edit-2"></i></a>
                    <a href="delete_aksesoris/<?= $a['id_aksesoris'] ?>" class="btn btn-danger delete btn-sm"><i class="fe fe-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3 item-align-end">
          <?= $pager->links('aksesoris', 'pagination') ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Update Aksesoris</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" action="/edit_aksesoris" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-group mb-3">
            <input type="hidden" class="form-control" id="id_aksesoris" name="id_aksesoris" autofocus required>
          </div>
          <div class="form-group mb-3">
            <label for="nama_aksesoris" class="col-form-label">Judul aksesoris :</label>
            <input type="text" class="form-control form-control-sm" id="nama_aksesoris" name="nama_aksesoris" autofocus required>
          </div>
          <div class="form-group mb-3">
            <label for="deksripsi_aksesoris" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" id="deksripsi_aksesoris" name="deksripsi_aksesoris" rows="3" required></textarea>
          </div>
          <div class="form-group mb-3 ">
            <label class="col-form-label" for="file_aksesoris">file Aksesoris :</label>
            <div class="row">
              <div class="col-xl-4">
                <img src="assets/img/faces/3.jpg" id="gambar" name="gambar" class="img-fluid img-thumbnail img-preview" data-heigth="50px" alt="">
              </div>
              <div class="col-xl-8 m-b-1">
                <input type="file" class="form-control" id="file_aksesoris" name="file_aksesoris" onchange="previewImg()">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-sm btn-info btn-primary">Simpan</button>
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