<!-- Card -->
<div class="card">
  <div class="card-body row">
    <div class="col-6">
      <div class="form-group">
        <label for="periode">Periode</label>
        <select class="form-control" id="periode">
          <option value="Bulan">Bulan</option>
          <option value="Tahun">Tahun</option>
        </select>
      </div>
    </div>
    <div class="col-6">
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
      <div class="card-body">
        <div class="chart-container">
          <canvas id="multipleLineChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Charts -->