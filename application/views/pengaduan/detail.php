<div class="col-md-12">
  <div class="card">
    <?php 
        $data = $pengaduan[0];
    ?>
    <div class="card-header">
      <h1>Detail</h1>
    </div>
    <div class="card-body">
      <div class="col-12 form-inline">
        <div class="col-6 col-lg-2">
          <strong><p>Media</p></strong>
        </div>
        <div class="col-6">
          <p>: <?= $data->media_nama ?></p>
        </div>
      </div>
      <div class="col-12 form-inline">
        <div class="col-6 col-lg-2">
          <strong><p>Pemohon</p></strong>
        </div>
        <div class="col-6">
          <p>: <?= $data->aduan_pemohon ?></p>
        </div>
      </div>
      <div class="col-12 form-inline">
        <div class="col-6 col-lg-2">
          <strong><p>Tanggal Aduan</p></strong>
        </div>
        <div class="col-6">
          <p>: <?= $data->aduan_tanggal ?></p>
        </div>
      </div>
      <div class="col-12 form-inline">
        <div class="col-6 col-lg-2">
          <strong><p>PIC/Penanggung Jawab</p></strong>
        </div>
        <div class="col-6">
          <p>: <?= $data->pic_nama ?></p>
        </div>
      </div>
      <div class="col-12 form-inline">
        <div class="col-6 col-lg-2">
          <strong><p>Perihal</p></strong>
        </div>
        <div class="col-6">
          <p>: <?= $data->aduan_perihal ?></p>
        </div>
      </div>
      <div class="col-12 form-inline">
        <div class="col-6 col-lg-2">
          <strong><p>Status</p></strong>
        </div>
        <div class="col-6">
          <p>: <?= $data->aduan_status ?></p>
        </div>
      </div>
      <strong><u><h4>Bukti Foto Aduan</h4></u></strong>
      <img src="<?= base_url('./uploads/'.$data->aduan_gambar) ?>" alt="aduan gambar" class="img-detail"/>
      <strong><u><h4>Bukti Foto Sudah Diproses</h4></u></strong>
      <?php 
        if($data->verifikasi_gambar == null){ 
          echo "<i><p>Tidak ada foto yang diproses</p></i>";
        } else {
          echo "<img src='".base_url('./uploads/verifikasi/'.$data->verifikasi_gambar)."' alt='verifikasi gambar' class='img-detail'/>";
        }
      ?>
    </div>
    <div class="card-footer">
      <button onclick="history.back()" class="btn btn-default">Kembali</button>
    </div>
  </div>
</div>