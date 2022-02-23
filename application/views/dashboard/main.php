<!-- Card -->
<div class="card">
  <div class="card-body row">
    <div class="col-3">
      <div class="form-group">
        <label for="periode">Periode</label>
        <select class="form-control" id="periode">
          <option value="Bulan">Bulan</option>
          <option value="Tahun">Tahun</option>
        </select>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label for="bulan">Bulan</label>
        <select class="form-control" id="bulan">
          <option <?= date("m") == 1 ? "selected" : "" ?> value="1">Januari</option>
          <option <?= date("m") == 2 ? "selected" : "" ?> value="2">Februari</option>
          <option <?= date("m") == 3 ? "selected" : "" ?> value="3">Maret</option>
          <option <?= date("m") == 4 ? "selected" : "" ?> value="4">April</option>
          <option <?= date("m") == 5 ? "selected" : "" ?> value="5">Mei</option>
          <option <?= date("m") == 6 ? "selected" : "" ?> value="6">Juni</option>
          <option <?= date("m") == 7 ? "selected" : "" ?> value="7">Juli</option>
          <option <?= date("m") == 8 ? "selected" : "" ?> value="8">Agustus</option>
          <option <?= date("m") == 9 ? "selected" : "" ?> value="9">September</option>
          <option <?= date("m") == 10 ? "selected" : "" ?> value="10">Oktober</option>
          <option <?= date("m") == 11 ? "selected" : "" ?> value="11">November</option>
          <option <?= date("m") == 12 ? "selected" : "" ?> value="12">Desember</option>
        </select>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label for="tahun">Tahun</label>
        <select class="form-control" id="tahun">
          <?php
            for($i=date("Y"); $i > 2000; $i--){
              echo "<option value='{$i}'>{$i}</option>";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label for="pic">PIC</label>
        <select class="form-control" id="pic">
          <option value="0">Semua PIC</option>
          <?php
          foreach ($pic as $value) {
            echo "<option value='{$value->pic_id}'>{$value->pic_nama}</option>";
          }
          ?>

        </select>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-primary card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="icon-big text-center">
              <i class="flaticon-users"></i>
            </div>
          </div>
          <div class="col-8 col-stats">
            <div class="numbers">
              <p class="card-category" style="font-weight: bold;">Jumlah Pengaduan</p>
              <p class="card-category" id="jumlah-pengaduan">0</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-success card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-4">
            <div class="icon-big text-center">
              <i class="flaticon-analytics"></i>
            </div>
          </div>
          <div class="col-8 col-stats">
            <div class="numbers">
              <p class="card-category">Pengaduan Ditanggapi</p>
              <h4 class="card-title" id="jumlah-pengaduan-ditanggapi">0</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-info card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <div class="icon-big text-center">
              <i class="flaticon-interface-6"></i>
            </div>
          </div>
          <div class="col-8 col-stats">
            <div class="numbers">
              <p class="card-category" style="font-weight: bold;">Aduan Terbanyak</p>
              <p class="card-category" id="aduan-terbanyak">Bidang Transportasi Darat</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-default card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-4">
            <div class="icon-big text-center" id="icon-media">
              <i class="la flaticon-twitter"></i>
            </div>
          </div>
          <div class="col-8 col-stats">
            <div class="numbers">
              <p class="card-category">Media Teramai</p>
              <h4 class="card-title" id="nama-media">Twitter</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Charts -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-head-row">
          <div class="card-title">Statistik Pengaduan</div>
          <div class="card-tools">
            <a id="export" href="<?= base_url('laporan/export?periode=tahun&pic=0') ?>" class="btn btn-info btn-border btn-round btn-sm mr-2">
              <span class="btn-label">
                <i class="fas fa-file-excel"></i>
              </span>
              Export Excel
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="multipleLineChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Charts -->