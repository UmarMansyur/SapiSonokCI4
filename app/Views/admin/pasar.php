<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<div class="row row-sm">
  <div class="col-xl-2 col-lg-2 col-12">
    <div class="card">
      <div class="card-body p-2">
        <a class="btn btn-info btn-block" href="/penawaran">Penawaran</a>
      </div>
    </div>
  </div>
  <div class="col-xl-7 col-lg-7 col-12 d-none d-sm-block"></div>
  <div class="col-xl-3 col-lg-3 col-md-12 col-12 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search ...">
          <span class="input-group-append">
            <button class="btn btn-danger" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-12 col-lg-9 col-md-12">
    <div class="row row-sm">
      <?php foreach ($penawaran as $key => $p) : ?>
      <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body h-100  product-grid6">
            <div class="pro-img-box product-image">
              <a href="<?= base_url('detail_penawaran') .'/'. $p['id_penawaran'] ?>">
                <img class=" pic-1" src="<?= base_url('uploads/penawaran/') .'/foto_' . $p['foto']?>" alt="product-image">
                <img class="pic-2" src="<?= base_url('uploads/penawaran/') .'/foto_' . $p['foto']?>" alt="product-image-1">
              </a>
              <ul class="icons">
                <li><a href="<?= base_url('detail_penawaran') .'/'. $p['id_penawaran'] ?>" class="primary-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="Quick View"><i class="fas fa-eye"></i></a></li>
              </ul>
            </div>
            <div class="text-center pt-2">
              <span class="badge badge-<?= $p['status_penawaran'] == 0 ? 'success' : 'danger'?>"><?= $p['status_penawaran'] == 0 ? 'Belum Terjual' : 'Terjual'?></span>
              <span class="mt-1 font-weight-bold text-uppercase d-block"><?= $p['nama_pasangan'] ?></span>
              <span class="mb-0 text-center text-secondary"><?= $p['nominal_pembayaran'] ?></span>
              <h3 class="h6 font-weight-bold"><?= $p['nama_peternak'] ?></h3>
              <div class="row mt-2">
                <div class="col-12 text-end">
                  <a href="detail_penawaran" class="btn btn-sm btn-info"><i class="fa fa-search-plus"></i> Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <ul class="pagination product-pagination ms-auto float-end">
      <li class="page-item page-prev disabled">
        <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
      </li>
      <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
      <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
      <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
      <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
      <li class="page-item page-next">
        <a class="page-link" href="javascript:void(0);">Next</a>
      </li>
    </ul>
  </div>
</div>
<?= $this->endSection() ?>