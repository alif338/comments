<!-- Card -->
<div class="card">
  <div class="card-body row">
    <div class="col-6">
      <div class="form-group">
        <label for="time">Periode</label>
        <select class="form-control" id="time">
          <option value="Bulan">Bulan</option>
          <option value="Tahun">Tahun</option>
        </select>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="time">PIC</label>
        <select class="form-control" id="time">
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
              <p class="card-category">Jumlah Pengaduan</p>
              <h4 class="card-title" id="jumlah-pengaduan">0</h4>
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
              <p class="card-category">Aduan Terbanyak</p>
              <p class="text-small" id="aduan-terbanyak">Bidang Transportasi Darat</p>
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
            <div class="icon-big text-center">
              <i class="la flaticon-twitter"></i>
            </div>
          </div>
          <div class="col-8 col-stats">
            <div class="numbers">
              <p class="card-category">Media Terbanyak</p>
              <h4 class="card-title" id="jumlah-media">Twitter</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Card With Icon States Color -->
<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-chart-pie text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Number</p>
              <h4 class="card-title">150GB</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-coins text-success"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Revenue</p>
              <h4 class="card-title">$ 1,345</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-error text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Errors</p>
              <h4 class="card-title">23</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-twitter text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Followers</p>
              <h4 class="card-title">+45K</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Card With Icon States Background -->
<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-primary bubble-shadow-small">
              <i class="flaticon-users"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Visitors</p>
              <h4 class="card-title">1,294</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-info bubble-shadow-small">
              <i class="flaticon-interface-6"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Subscribers</p>
              <h4 class="card-title">1303</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-success bubble-shadow-small">
              <i class="flaticon-graph"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Sales</p>
              <h4 class="card-title">$ 1,345</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-secondary bubble-shadow-small">
              <i class="flaticon-success"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Order</p>
              <h4 class="card-title">576</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Row Card No Padding -->
<div class="row row-card-no-pd">
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-chart-pie text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Number</p>
              <h4 class="card-title">150GB</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-coins text-success"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Revenue</p>
              <h4 class="card-title">$ 1,345</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-error text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Errors</p>
              <h4 class="card-title">23</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-twitter text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-stats">
            <div class="numbers">
              <p class="card-category">Followers</p>
              <h4 class="card-title">+45K</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card card-secondary">
      <div class="card-body skew-shadow">
        <h1>3,072</h1>
        <h5 class="op-8">Total conversations</h5>
        <div class="pull-right">
          <h3 class="fw-bold op-8">88%</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-dark bg-secondary-gradient">
      <div class="card-body bubble-shadow">
        <h1>188</h1>
        <h5 class="op-8">Total Sales</h5>
        <div class="pull-right">
          <h3 class="fw-bold op-8">25%</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-dark bg-secondary2">
      <div class="card-body curves-shadow">
        <h1>12</h1>
        <h5 class="op-8">New Users</h5>
        <div class="pull-right">
          <h3 class="fw-bold op-8">70%</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card card-dark bg-secondary-gradient">
      <div class="card-body skew-shadow">
        <img src="<?= base_url('assets/img/visa.svg'); ?>" height="12.5" alt="Visa Logo">
        <h2 class="py-4 mb-0">1234 **** **** 5678</h2>
        <div class="row">
          <div class="col-8 pr-0">
            <h3 class="fw-bold mb-1">Sultan Ghani</h3>
            <div class="text-small text-uppercase fw-bold op-8">Card Holder</div>
          </div>
          <div class="col-4 pl-0 text-right">
            <h3 class="fw-bold mb-1">4/26</h3>
            <div class="text-small text-uppercase fw-bold op-8">Expired</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-dark bg-secondary-gradient">
      <div class="card-body bubble-shadow">
        <img src="<?= base_url('assets/img/visa.svg'); ?>" height="12.5" alt="Visa Logo">
        <h2 class="py-4 mb-0">1234 **** **** 5678</h2>
        <div class="row">
          <div class="col-8 pr-0">
            <h3 class="fw-bold mb-1">Sultan Ghani</h3>
            <div class="text-small text-uppercase fw-bold op-8">Card Holder</div>
          </div>
          <div class="col-4 pl-0 text-right">
            <h3 class="fw-bold mb-1">4/26</h3>
            <div class="text-small text-uppercase fw-bold op-8">Expired</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-dark bg-secondary-gradient">
      <div class="card-body curves-shadow">
        <img src="<?= base_url('assets/img/visa.svg'); ?>" height="12.5" alt="Visa Logo">
        <h2 class="py-4 mb-0">1234 **** **** 5678</h2>
        <div class="row">
          <div class="col-8 pr-0">
            <h3 class="fw-bold mb-1">Sultan Ghani</h3>
            <div class="text-small text-uppercase fw-bold op-8">Card Holder</div>
          </div>
          <div class="col-4 pl-0 text-right">
            <h3 class="fw-bold mb-1">4/26</h3>
            <div class="text-small text-uppercase fw-bold op-8">Expired</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body pb-0">
        <div class="h1 fw-bold float-right text-primary">+5%</div>
        <h2 class="mb-2">17</h2>
        <p class="text-muted">Users online</p>
        <div class="pull-in sparkline-fix">
          <div id="lineChart"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body pb-0">
        <div class="h1 fw-bold float-right text-danger">-3%</div>
        <h2 class="mb-2">27</h2>
        <p class="text-muted">New Users</p>
        <div class="pull-in sparkline-fix">
          <div id="lineChart2"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body pb-0">
        <div class="h1 fw-bold float-right text-warning">+7%</div>
        <h2 class="mb-2">213</h2>
        <p class="text-muted">Transactions</p>
        <div class="pull-in sparkline-fix">
          <div id="lineChart3"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card card-dark bg-primary-gradient">
      <div class="card-body pb-0">
        <div class="h1 fw-bold float-right">+5%</div>
        <h2 class="mb-2">17</h2>
        <p>Users online</p>
        <div class="pull-in sparkline-fix chart-as-background">
          <div id="lineChart4"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-default">
      <div class="card-body pb-0">
        <div class="h1 fw-bold float-right">-3%</div>
        <h2 class="mb-2">27</h2>
        <p>New Users</p>
        <div class="pull-in sparkline-fix chart-as-background">
          <div id="lineChart5"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-dark bg-success2">
      <div class="card-body pb-0">
        <div class="h1 fw-bold float-right">+7%</div>
        <h2 class="mb-2">213</h2>
        <p>Transactions</p>
        <div class="pull-in sparkline-fix chart-as-background">
          <div id="lineChart6"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>Todays Income</b></h5>
            <p class="text-muted">All Customs Value</p>
          </div>
          <h3 class="text-info fw-bold">$170</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">75%</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>Total Revenue</b></h5>
            <p class="text-muted">All Customs Value</p>
          </div>
          <h3 class="text-success fw-bold">$120</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">25%</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>New Orders</b></h5>
            <p class="text-muted">Fresh Order Amount</p>
          </div>
          <h3 class="text-danger fw-bold">15</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">50%</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>New Users</b></h5>
            <p class="text-muted">Joined New User</p>
          </div>
          <h3 class="text-secondary fw-bold">12</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">25%</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row row-card-no-pd mt--2">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>Todays Income</b></h5>
            <p class="text-muted">All Customs Value</p>
          </div>
          <h3 class="text-info fw-bold">$170</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">75%</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>Total Revenue</b></h5>
            <p class="text-muted">All Customs Value</p>
          </div>
          <h3 class="text-success fw-bold">$120</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">25%</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>New Orders</b></h5>
            <p class="text-muted">Fresh Order Amount</p>
          </div>
          <h3 class="text-danger fw-bold">15</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">50%</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5><b>New Users</b></h5>
            <p class="text-muted">Joined New User</p>
          </div>
          <h3 class="text-secondary fw-bold">12</h3>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between mt-2">
          <p class="text-muted mb-0">Change</p>
          <p class="text-muted mb-0">25%</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="text-right text-success">
          6%
          <i class="fa fa-chevron-up"></i>
        </div>
        <div class="h1 m-0">43</div>
        <div class="text-muted mb-3">New Tickets</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="text-right text-danger">
          -3%
          <i class="fa fa-chevron-down"></i>
        </div>
        <div class="h1 m-0">17</div>
        <div class="text-muted mb-3">Closed Today</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="text-right text-success">
          9%
          <i class="fa fa-chevron-up"></i>
        </div>
        <div class="h1 m-0">7</div>
        <div class="text-muted mb-3">New Replies</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="text-right text-success">
          3%
          <i class="fa fa-chevron-up"></i>
        </div>
        <div class="h1 m-0">27.3K</div>
        <div class="text-muted mb-3">Followers</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="text-right text-danger">
          -2%
          <i class="fa fa-chevron-down"></i>
        </div>
        <div class="h1 m-0">$95</div>
        <div class="text-muted mb-3">Daily Earnings</div>
      </div>
    </div>
  </div>
  <div class="col-6 col-sm-4 col-lg-2">
    <div class="card">
      <div class="card-body p-3 text-center">
        <div class="text-right text-danger">
          -1%
          <i class="fa fa-chevron-down"></i>
        </div>
        <div class="h1 m-0">621</div>
        <div class="text-muted mb-3">Products</div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-secondary mr-3">
          <i class="fa fa-dollar-sign"></i>
        </span>
        <div>
          <h5 class="mb-1"><b><a href="#">132 <small>Sales</small></a></b></h5>
          <small class="text-muted">12 waiting payments</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-success mr-3">
          <i class="fa fa-shopping-cart"></i>
        </span>
        <div>
          <h5 class="mb-1"><b><a href="#">78 <small>Orders</small></a></b></h5>
          <small class="text-muted">32 shipped</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-danger mr-3">
          <i class="fa fa-users"></i>
        </span>
        <div>
          <h5 class="mb-1"><b><a href="#">1,352 <small>Members</small></a></b></h5>
          <small class="text-muted">163 registered today</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-warning mr-3">
          <i class="fa fa-comment-alt"></i>
        </span>
        <div>
          <h5 class="mb-1"><b><a href="#">132 <small>Comments</small></a></b></h5>
          <small class="text-muted">16 waiting</small>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Customized Card -->
<h4 class="page-title">Customized Card</h4>
<div class="row">
  <div class="col-md-4">
    <div class="card card-info card-annoucement card-round">
      <div class="card-body text-center">
        <div class="card-opening">Welcome Rian,</div>
        <div class="card-desc">
          Congrats and best wishes for success in your brand new life!
          I knew that you would do this!
        </div>
        <div class="card-detail">
          <div class="btn btn-light btn-rounded">View Detail</div>
        </div>
      </div>
    </div>
    <div class="card card-round">
      <div class="card-body">
        <div class="card-title fw-mediumbold">Suggested People</div>
        <div class="card-list">
          <div class="item-list">
            <div class="avatar">
              <img src="<?= base_url('assets/img/jm_denis.jpg'); ?>" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info-user ml-3">
              <div class="username">Jimmy Denis</div>
              <div class="status">Graphic Designer</div>
            </div>
            <button class="btn btn-icon btn-primary btn-round btn-xs">
              <i class="fa fa-plus"></i>
            </button>
          </div>
          <div class="item-list">
            <div class="avatar">
              <img src="<?= base_url('assets/img/chadengle.jpg'); ?>" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info-user ml-3">
              <div class="username">Chad</div>
              <div class="status">CEO Zeleaf</div>
            </div>
            <button class="btn btn-icon btn-primary btn-round btn-xs">
              <i class="fa fa-plus"></i>
            </button>
          </div>
          <div class="item-list">
            <div class="avatar">
              <img src="<?= base_url('assets/img/talha.jpg'); ?>" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info-user ml-3">
              <div class="username">Talha</div>
              <div class="status">Front End Designer</div>
            </div>
            <button class="btn btn-icon btn-primary btn-round btn-xs">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-post card-round">
      <img class="card-img-top" src="<?= base_url('assets/img/blogpost.jpg'); ?>" alt="Card image cap">
      <div class="card-body">
        <div class="d-flex">
          <div class="avatar">
            <img src="<?= base_url('assets/img/profile2.jpg'); ?>" alt="..." class="avatar-img rounded-circle">
          </div>
          <div class="info-post ml-2">
            <p class="username">Joko Subianto</p>
            <p class="date text-muted">20 Jan 18</p>
          </div>
        </div>
        <div class="separator-solid"></div>
        <p class="card-category text-info mb-1"><a href="#">Design</a></p>
        <h3 class="card-title">
          <a href="#">
            Best Design Resources This Week
          </a>
        </h3>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-profile">
      <div class="card-header" style="background-image: url('<?= base_url('assets/img/blogpost.jpg'); ?>')">
        <div class="profile-picture">
          <div class="avatar avatar-xl">
            <img src="<?= base_url('assets/img/profile.jpg'); ?>" alt="..." class="avatar-img rounded-circle">
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="user-profile text-center">
          <div class="name">Hizrian, 19</div>
          <div class="job">Frontend Developer</div>
          <div class="desc">A man who hates loneliness</div>
          <div class="social-media">
            <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
              <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
            </a>
            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
              <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
            </a>
            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
              <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
            </a>
            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
              <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
            </a>
          </div>
          <div class="view-profile">
            <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row user-stats text-center">
          <div class="col">
            <div class="number">125</div>
            <div class="title">Post</div>
          </div>
          <div class="col">
            <div class="number">25K</div>
            <div class="title">Followers</div>
          </div>
          <div class="col">
            <div class="number">134</div>
            <div class="title">Following</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>