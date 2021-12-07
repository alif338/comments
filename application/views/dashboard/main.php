<section>
  <div class="row container-fluid">
    <div class="col-md-4">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>Kepala keluarga</h3>
          <p>Terdapat <em><strong><?= $count_keluarga; ?></strong></em> keluarga yang terdaftar didalam sistem</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="<?= base_url("keluarga/"); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>Penduduk</h3>
          <p>Terdapat <em><strong><?= $count_penduduk; ?></strong></em> penduduk yang terdaftar didalam sistem</p>
        </div>
        <div class="icon">
          <i class="fa fa-id-card"></i>
        </div>
        <a href="<?= base_url("penduduk/"); ?>" class="small-box-footer" target="_blank">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-warning" style="color:#fff !important;">
        <div class="inner">
          <h3>Layanan<sup style="font-size: 20px"></sup></h3>
          <p>Terdapat <em><strong><?= countPengajuanBaru() ?></strong></em> pengajuan baru oleh penduduk kedalam sistem.</p>
        </div>
        <div class="icon">
          <i class="fa fa-paste"></i>
        </div>
        <a href="<?= base_url("layanan/pengajuan"); ?>" class="small-box-footer" style="color:#fff !important;" target="_blank">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</section>