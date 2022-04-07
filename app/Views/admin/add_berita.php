<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
      <form action="<?=base_url('admin/Berita/save') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <?=csrf_field() ?>
          <div class="form-group mb-3">
            <label for="judul_berita" class="col-form-label">Judul Berita :</label>
            <input type="text" class="form-control" name="judul_berita" autofocus placeholder="Masukkan Judul berita">
          </div>
          <div class="form-group mb-3">
            <label for="deskripsi_berita" class="col-form-label">Deskripsi :</label>
            <textarea name="deskripsi_berita" class="form-control" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group mb-3">
            <label for="tanggal_berita" class="col-form-label">Tanggal berita :</label>
            <input type="datetime-local" class="form-control" id="tanggal_berita" name="tanggal_berita" placeholder="Masukkan Tanggal berita" required>
          </div>
          <div class="text-end mt-5">
            <button type="reset" class="btn btn-danger me-2">Batal</button>
            <button type="submit" class="btn btn-primary btn-info">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
