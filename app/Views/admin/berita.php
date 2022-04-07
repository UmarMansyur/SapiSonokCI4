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
        <h3 class="card-title">Berita</h3>
        <p class="text-muted card-sub-title">Data yang anda tambahkan di bawah ini akan ditampilkan pada menu beranda, pastikan data yang anda tambahkan telah benar!</p>
      </div>
      <div class="card-body">
        <div class="row mb-3 justify-content-between">
          <div class="col-2 text-center-sm">
            <a class="btn btn-info btn-md" href="<?= base_url('add_berita') ?>">Tambah</a>
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
          <div id='swalUpdate' data-swal="<?= session()->getFlashdata('update') ?>"></div>

          <table class="table table-bordered text-nowrap mb-0">
            <thead>
              <tr>
                <th class="text-md-center" style="width:5%;">No</th>
                <th style="width:25%"> Judul Berita</th>
                <th style="width:25%">Deskripsi Berita</th>
                <th class="text-center" style="width: 15%">Tanggal Berita</th>
                <th class="text-center" style="width: 15%">Ditampilkan</th>
                <th class="text-center" style="width: 15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($berita as $key => $b) : ?>
                <tr>
                  <td class="text-center" style="width:5%;"><?= (($key + (5 * ($currentPage - 1))) + 1) ?></td>
                  <td style="width:25%"><?= $b['judul_berita'] ?> </td>
                  <td style="width:25%"><?= $b['deskripsi_berita'] ?></td>
                  <td class="text-center" style="width:15%;"><?= $b['tanggal_berita'] ?></td>
                  <td class="text-center" style="width:15%;">
                    <?php if ($b['ditampilkan'] == 1) : ?>
                      <a href="berita/status/<?= $b['id_berita'] ?>" class="btn btn-sm btn-danger">Sembunyikan</a>
                    <?php else : ?>
                      <a href="berita/status/<?= $b['id_berita'] ?>" class="btn btn-sm btn-primary">Tampilkan</a>
                    <?php endif ?>
                  </td>

                  <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="" id="editNews" data-bs-toggle="modal" data-bs-target="#editBerita" data-id_berita="<?= $b['id_berita'] ?>" data-nama_berita="<?= $b['judul_berita'] ?>" data-tanggal_berita="<?= $b['tanggal_berita'] ?>" data-deskripsi_berita="<?= $b['deskripsi_berita'] ?>">
                      <i class="far fa-edit text-sm-center"></i>
                    </a>
                    <a class="btn btn-sm btn-danger delete" href="delete_berita/<?= $b['id_berita'] ?>"><i class="far fa-trash-alt text-sm-center"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>

          </table>
        </div>
        <div class="mt-3 item-align-end">
          <?= $pager->links('berita', 'pagination') ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editBerita" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Ubah Berita</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" action="/edit_berita" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-group mb-3">
            <input type="hidden" class="form-control" id="id_berita" name="id_berita" autofocus required>
          </div>
          <div class="form-group mb-3">
            <label for="nama_berita" class="col-form-label">Judul berita :</label>
            <input type="text" class="form-control form-control-sm" id="nama_berita" name="nama_berita" autofocus required>
          </div>
          <div class="form-group mb-3">
            <label for="deskripsi_berita" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi_berita" name="deskripsi_berita" rows="10" required></textarea>
          </div>
          <div class="form-group mb-3 ">
            <label for="tanggal_berita" class="col-form-label">Tanggal berita :</label>
            <input type="datetime-local" class="form-control" id="tanggal_berita" name="tanggal_berita" placeholder="Masukkan Tanggal berita" required>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
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