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
        <h3 class="card-title">Prestasi</h3>
        <p class="text-muted card-sub-title">Pastikan data yang anda tambahkan telah benar!</p>
      </div>
      <div class="card-body">
        <div class="row mb-3 justify-content-between">
          <div class="col-2 text-center-sm">
            <a class="btn btn-info btn-md" href="" data-bs-target="#tambahPrestasi" data-bs-toggle="modal">Tambah</a>
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
                <th width="30%">Nama Pasangan</th>
                <th width="30%">Prestasi</th>
                <th width="15%" class="text-center">Tahun</th>
                <th width="10%" class="text-center">File</th>
                <th width="10%" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($prestasi as $key => $p) : ?>
                <tr>
                  <td class="text-center" ><?= $key + 1 ?></td>
                  <td><?= $p['nama_pasangan'] ?></td>
                  <td><?= $p['prestasi'] ?></td>
                  <td class="text-center"><?= $p['tahun_prestasi'] ?></td>
                  <td class="text-center">
                    <a href="prestasi/lihat/<?= $p['id_prestasi'] ?>" class="btn btn-outline-info btn-sm"> Lihat
                    </a>
                  <td class="text-center">
                    <a href="#" 
                    class="btn btn-info btn-sm" 
                    id="edit_data_prestasi" 
                    data-bs-target="#editPrestasi" 
                    data-bs-toggle="modal"
                    data-edit_id_prestasi = "<?= $p['id_prestasi'] ?>"
                    data-edit_nama_pasangan = "<?= $p['id_pasangan'] ?>"
                    data-edit_nama_prestasi = "<?= $p['prestasi'] ?>"
                    data-edit_tahun_prestasi = "<?= $p['tahun_prestasi'] ?>"
                    data-edit_file_prestasi = "<?= $p['file_prestasi'] ?>"
                    ><i class="fe fe-edit-2"></i></a>
                    <a href="prestasi/delete/<?= $p['id_prestasi'] ?>" class="btn btn-danger delete btn-sm"><i class="fe fe-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3 item-align-end">
          <h1></h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="tambahPrestasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Prestasi</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" action="prestasi/tambah" method="post" enctype="multipart/form-data" autocomplete="off">
          <?= csrf_field() ?>
          <div class="form-group mb-2">
            <input type="hidden" class="form-control" id="id_prestasi" name="id_prestasi">
          </div>
          <div class="form-group mb-2">
            <label for="nama_pasangan" class="col-form-label">Nama Pasangan :</label>
            <select name="nama_pasangan" id="nama_pasangan" class="form-control form-select" required>
              <?php foreach ($pasangan as $key => $p) : ?>
                <option class="form-control form-select" value="<?= $p['id_pasangan'] ?>"><?= $p['nama_pasangan'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-2">
            <label for="nama_prestasi" class="col-form-label">Prestasi:</label>
            <input type="text" class="form-control form-control" id="nama_prestasi" placeholder="Prestasi yang pernah diraih" name="nama_prestasi" required>
          </div>
          <div class="form-group mb-2">
            <label for="tahun_prestasi" class="col-form-label">Tahun Prestasi:</label>
            <input type="text" class="form-control form-control" id="tahun_prestasi" placeholder="Tahun Prestasi" name="tahun_prestasi" required>
          </div>
          <div class="form-group mb-2 ">
            <label class="col-form-label" for="file_prestasi">file Prestasi:</label>
            <input type="file" name="file_prestasi" class="dropify is-invalid" />
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
<div class="modal fade" id="editPrestasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="modalTambahLabel">Update Prestasi</h5>
        <button type="reset" class="btn btn-close" data-bs-dismiss="modal" aria-bs-label="Close">&times;</button>
      </div>
      <div class="modal-body">
      <form role="form" action="prestasi/edit" method="post" enctype="multipart/form-data" autocomplete="off">
          <?= csrf_field() ?>
          <div class="form-group mb-2">
            <input type="hidden" class="form-control" id="edit_id_prestasi" name="edit_id_prestasi">
          </div>
          <div class="form-group mb-2">
            <label for="edit_nama_pasangan" class="col-form-label">Nama Pasangan :</label>
            <select name="edit_nama_pasangan" id="edit_nama_pasangan" class="form-control form-select" required>
              <?php foreach ($pasangan as $key => $p) : ?>
                <option class="form-control form-select" value="<?= $p['id_pasangan'] ?>"><?= $p['nama_pasangan'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group mb-2">
            <label for="edit_nama_prestasi" class="col-form-label">Prestasi:</label>
            <input type="text" class="form-control form-control" id="edit_nama_prestasi" name="edit_nama_prestasi" placeholder="Prestasi yang pernah diraih" required>
          </div>
          <div class="form-group mb-2">
            <label for="edit_tahun_prestasi" class="col-form-label">Tahun Prestasi:</label>
            <input type="text" class="form-control form-control" id="edit_tahun_prestasi" name="edit_tahun_prestasi" placeholder="Tahun Prestasi" required>
          </div>
          <div class="form-group mb-2 ">
            <label class="col-form-label" for="edit_file_prestasi">file Prestasi:</label>
            <input type="file" name="edit_file_prestasi"  class="dropify is-invalid" />
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