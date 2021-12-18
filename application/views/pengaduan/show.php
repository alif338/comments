<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-3">
          <label style="padding: 8px;" class="font-weight-bold">Pemohon : </label><br>
          <select onchange="searchData(1, this.value)" class="form-control option" style="width: 100%" id="status-pengajuan">
            <option value="">Semua Pemohon</option>
            <option value="<?= INDV ?>"><?= INDV ?></option>
            <option value="<?= HUKUM ?>"><?= HUKUM ?></option>
            <option value="<?= KELOMPOK ?>"><?= KELOMPOK ?></option>
          </select>
        </div>
        <div class="col-3">
          <label style="padding: 8px;" class="font-weight-bold">Media : </label><br>
          <select onchange="searchData(2, this.value)" class="form-control option" style="width: 100%" id="status-pengajuan">
            <option value="">Semua Media</option>
            <?php
              foreach($media as $val):
                echo "<option value='{$val->media_nama}'>{$val->media_nama}</option>";
              endforeach;
            ?>
          </select>
        </div>
        <div class="col-3">
          <label style="padding: 8px;" class="font-weight-bold">PIC : </label><br>
          <select onchange="searchData(3, this.value)" class="form-control option" style="width: 100%" id="status-pengajuan">
            <option value="">Semua PIC</option>
            <?php
              foreach($pic as $val):
                echo "<option value='{$val->pic_nama}'>{$val->pic_nama}</option>";
              endforeach;
            ?>
          </select>
        </div>
        <div class="col-3">
          <label style="padding: 8px;" class="font-weight-bold">Status : </label><br>
          <select onchange="searchData(5, this.value)" class="form-control option" style="width: 100%" id="status-pengajuan">
            <option value="">Semua Status</option>
            <option value="SUDAH DITANGGAPI">SUDAH DITANGGAPI</option>
            <option value="BELUM DITANGGAPI">BELUM DITANGGAPI</option>
          </select>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="multi-filter-select" class="display table table-striped table-hover" >
          <thead>
            <tr>
              <th>Perihal</th>
              <th>Pemohon</th>
              <th>Media</th>
              <th>PIC</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($pengaduan as $val):
              ?>
              <tr>
                <td>
                  <b class="text-danger"><?= tanggalIndo($val->aduan_tanggal) ?></b><br>
                  <b><?= $val->aduan_perihal ?></b> - <?= $val->aduan_keterangan ?>                  
                </td>
                <td>
                  <?= $val->aduan_pemohon ?><br>
                  <em class="text-bold">(<?= $val->aduan_fitur; ?>)</em>    
                </td>
                <td>
                  <span class="badge badge-default">
                    <i class="<?= $val->media_icon ?>"></i> 
                    <?= $val->media_nama ?>
                  </span>
                </td>
                <td><?= $val->pic_nama ?></td>
                <td>
                  <span class='badge <?= $val->aduan_status == DITANGGAPI ? "badge-success" : "badge-danger" ?>'>
                    <i class="fa fa-check"></i> <?= $val->aduan_status ?>
                  </span>
                </td>
                <td>-</td>
              </tr>
              <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>