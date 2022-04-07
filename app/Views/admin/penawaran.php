<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-solid-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> <?= session()->getFlashdata('success') ?>
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
  </div>
<?php endif ?>
<?php if (session()->getFlashdata('gagal')) : ?>
  <div class="alert alert-solid-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong> Anda tidak boleh menghapus data yang berstatus terjual!
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
  </div>
<?php endif ?>
<?php if (session()->getFlashdata('error')) : ?>
  <div class="alert alert-solid-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong> Data tidak dapat ditambahkan!
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
  </div>
<?php endif ?>
<div class="row">
  <div class="col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Penawaran</h3>
        <p>Data yang anda tambahkan ada ditampilkan pada menu pasar</p>
      </div>
      <div class="card-body">
        <div class="row mb-3 justify-content-between">
          <div class="col-2 text-center-sm">
            <button type="button" class="btn btn-primary mx-2 button-icon" data-bs-target="#tambahPenawaran" data-bs-toggle="modal">
              <i class="fe fe-plus me-2"></i>
              Tambah
            </button>
          </div>
          <div class="col-7 col-lg-3 text-end">
            <form action="" method="GET">
            <div class="input-group">
              <input class="form-control form-control" name="cari" placeholder="cari..." type="text">
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
                <th class="text-md-center" style="width:5%;">No</th>
                <th style="width:25%"> Tanggal</th>
                <th style="width:25%">Nama Pasangan</th>
                <th style="width:25%">Nominal</th>
                <th class="text-center" style="width: 15%">Status</th>
                <th class="text-center" style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($penawaran as $key => $p) : ?>
              <tr>
                <td class="text-center"><?= (($key + (5 * ($currentPage - 1))) + 1) ?></td>
                <td style="width:25%"><?= $p['update_at'] ?></td>
                <td style="width:25%"><?= $p['nama_pasangan'] ?></td>
                <td style="width:25%"><?= 'Rp. ' . $p['nominal_pembayaran'] ?></td>
                <td class=" text-center width:25%" style="width:10%"> <strong class="badge badge-<?= $p['status_penawaran'] == 0 ? 'info' : 'danger'?>"><?= $p['status_penawaran'] == 0 ? 'Belum Terjual' : 'Terjual'?></strong></td>
                <td class="text-center">
                  <a class="btn btn-rounded btn-sm btn-info-light text-info" 
                  id="updatePenawaran" 
                  data-bs-toggle="modal" 
                  data-bs-target="#editPenawaran"
                  data-id_penawaran = "<?= $p['id_penawaran']?>"
                  data-gambar = "<?= $p['foto']?>"
                  data-edit_pasangan = "<?= $p['id_pasangan'] ?>"
                  data-status = "<?= $p['status_penawaran'] ?>"
                  data-nominal = "<?= $p['nominal_pembayaran'] ?>"
                  data-file_aksesoris = "<?= $p['foto'] ?>"
                  ><i class="si si-pencil text-sm-center"></i></a>
                  <a class="btn btn-rounded btn-sm btn-danger-light hapus" href="penawaran/delete/<?= $p['id_penawaran'] ?>"><i class="si si-trash text-sm-center"></i></a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3 item-align-end">
          <?= $pager->links('penawaran', 'pagination') ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="tambahPenawaran" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Penawaran</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form action="penawaran/tambah" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-group mb-3">
            <select name="nama_pasangan" class="form-control form-select">
              <?php foreach ($pasangan as $key => $p) : ?>
                <option class="form-control form-select" value="<?= $p['id_pasangan'] ?>"><?= $p['nama_pasangan'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <select name="status_penawaran" class="form-control form-select">
              <option value="" class="form-control form-select">-- Pilih Status Penawaran --</option>
              <option class="form-control form-select" value="0">Belum terjual</option>
              <option class="form-control form-select" value="1">Terjual</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" placeholder="Nominal" name="nominal" required>
          </div>
          <div class="form-group mb-3 ">
            <div class="row">
              <div class="col-xl-4">
                <img src="assets/img/faces/3.jpg" id="gambar" name="gambar" class="img-fluid img-thumbnail img-preview" data-heigth="50px" alt="">
              </div>
              <div class="col-xl-8 m-b-1">
                <input type="file" class="form-control" id="file_aksesoris" name="file_aksesoris" onchange="previewImg()">
              </div>
            </div>
          </div>
          <div class="text-end">
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="editPenawaran" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Update Penawaran</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form action="penawaran/edit" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-group mb-3">
            <input type="hidden" id="id_penawaran" name="id_penawaran">
            <select name="edit_pasangan" id="edit_pasangan" class="form-control form-select">
              <option value="">-- Pilih Pasangan --</option>
              <?php foreach ($pasangan as $key => $p) : ?>
                <option class="form-control form-select" value="<?= $p['id_pasangan'] ?>"><?= $p['nama_pasangan'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <select name="status" id="status" class="form-control form-select">
              <option value="" class="form-control form-select">-- Pilih Status Penawaran --</option>
              <option class="form-control form-select" value="0">Belum terjual</option>
              <option class="form-control form-select" value="1">Terjual</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" name="nominal" required>
          </div>
          <div class="form-group mb-3 ">
            <div class="row">
              <div class="col-xl-4">
                <img src="assets/img/faces/3.jpg" id="gambar" name="gambar" class="img-fluid img-thumbnail img-preview" data-heigth="50px" alt="">
              </div>
              <div class="col-xl-8 m-b-1">
                <input type="file" class="form-control" id="file_aksesoris" name="file_aksesoris" onchange="previewImg()">
              </div>
            </div>
          </div>
          <div class="text-end">
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>