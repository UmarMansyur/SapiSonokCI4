<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<div class="row row-sm">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body ">
        <div class="row row-sm ">
          <div class=" col-xl-6 col-lg-12 col-md-12">
            <div class="row">
              <div class="col-xl-12">
                <div class="product-carousel  border br-5">
                  <div id="Slider" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"><img src="<?= base_url('uploads/penawaran/product')?>/<?= $penawaran['foto'] ?>" alt="img" class="img-fluid mx-auto d-block">
                        <div class="text-center mt-5 mb-5 btn-list">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center  mt-4">
                  <a href="https://api.whatsapp.com/send?phone=62<?= $penawaran['nomor_telpon'] ?>" class="btn ripple btn-primary me-2"><i class="fe fe-phone"> </i> WhatsApp</a>
                </div>
              </div>
            </div>
          </div>
          <div class="details col-xl-6 col-lg-12 col-md-12 mt-4 mt-xl-0">
            <h4 class="product-title mb-1"><?= $penawaran['nama_pasangan'] ?></h4>
            <p class="text-muted tx-13 mb-1">Rp. <?= $penawaran['nominal_pembayaran'] ?></p>
            <h6 class="price"><?= $penawaran['nama_peternak'] ?></h6>
            <div class="row row-sm">
              <div class="col-lg-12 col-md-12">
                <div class="card productdesc">
                  <div class="card-body">
                    <div class="panel panel-primary">
                      <div class=" tab-menu-heading">
                        <div class="tabs-menu1">
                          <!-- Tabs -->
                          <ul class="nav panel-tabs">
                            <li><a href="#tab6" class="active" data-bs-toggle="tab">Prestasi</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab6">
                            <?php if ($prestasi == null) : ?>
                            <h5 class="mb-2 mt-1 fw-semibold">Tidak ada prestasi yang diraih</h5>
                            <?php else : ?>
                            <h5 class="mb-2 mt-1 fw-semibold">Prestasi <?= $penawaran['nama_pasangan'] ?> :</h5>
                            <ol class="order-list">
                              <?php foreach ($prestasi as $key => $p) : ?>
                              <li><?= $p['prestasi'] ?></li>
                              <?php endforeach ?>
                            </ol>
                            <?php endif ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row row-sm">
  <div class="col-lg-12 col-md-12">
    <div class="card productdesc">
      <div class="card-body">
        <div class="panel panel-primary">
          <div class=" tab-menu-heading">
            <div class="tabs-menu1">
              <!-- Tabs -->
              <ul class="nav panel-tabs">
                <li><a href="#tab5" class="active" data-bs-toggle="tab">Silsilah</a></li>
              </ul>
            </div>
          </div>
          <div class="panel-body tabs-menu-body">
            <div class="tab-content">
              <div class="tab-pane active" id="tab5">
                <h5 class="mb-2 mt-1 fw-semibold">Pasangan Kanan :</h5>
                <p class="mb-3 tx-13">Induk Betina: <?= $induk_betina_kanan ?></p>
                <p class="mb-3 tx-13">Induk Jantan: <?= $induk_jantan_kanan ?> </p>
                <h5 class="mb-2 mt-1 fw-semibold">Pasangan Kiri :</h5>
                <p class="mb-3 tx-13">Induk Betina: <?= $induk_betina_kiri ?></p>
                <p class="mb-3 tx-13">Induk Jantan: <?= $induk_jantan_kiri ?> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>