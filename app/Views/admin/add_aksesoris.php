<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
  <div class="col-12 col-sm-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah aksesoris</h3>
        <p class="mb-2">Pastikan data yang ingin anda tambahkan telah benar!</p>
      </div>
      <div class="card-body">
        <form action="<?=base_url('admin/Aksesoris/save') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <?=csrf_field() ?>
          <div class="form-group">
            <input type="text" class="form-control <?= ($validation->hasError('aksesoris')) ? 'is-invalid' :'' ?>" name="aksesoris" placeholder="Aksesoris">
            <div class="invalid-feedback">Judul belum di isi</div>
          </div>
          <div class="form-group">
            <textarea name="deksripsi" cols="20" rows="10" class="form-control <?= ($validation->hasError('deksripsi')) ? 'is-invalid' :'' ?>" placeholder="Deksripsi"></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="file_aksesoris" class="dropify is-invalid" />
            <small>File yang diupload harus berekstensi gambar/foto seperti .jpeg, .png, dll</small>
          </div>
          <div class="form-group mb-0 mt-3 text-end">
            <a href="<?=base_url('aksesoris') ?>" class="btn btn-secondary btn-sm ">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm ms-2">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>