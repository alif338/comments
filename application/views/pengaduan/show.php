<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-3">
          <label style="padding: 8px;" class="font-weight-bold">Pemohon : </label><br>
          <select onchange="searchData(2, this.value)" class="form-control option" style="width: 100%" id="pemohon">
            <option value="">Semua Pemohon</option>
            <option value="<?= INDV ?>"><?= INDV ?></option>
            <option value="<?= HUKUM ?>"><?= HUKUM ?></option>
            <option value="<?= KELOMPOK ?>"><?= KELOMPOK ?></option>
          </select>
        </div>
        <div class="col-3">
          <label style="padding: 8px;" class="font-weight-bold">Media : </label><br>
          <select onchange="searchData(3, this.value)" class="form-control option" style="width: 100%" id="media">
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
          <select onchange="searchData(4, this.value)" class="form-control option" style="width: 100%" id="pic">
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
              <th>No</th>
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
            $i = 1;
            foreach($pengaduan as $val):
              ?>
              <tr id="aduan-<?= $val->aduan_id ?>">
                <td><?=$i ?></td>
                <td>
                  <b class="text-danger"><?= tanggalIndo($val->aduan_tanggal) ?></b><br>
                  <b><?= $val->aduan_perihal ?></b> - <?= $val->aduan_keterangan ?>                  
                </td>
                <td>
                  <?= $val->aduan_pemohon ?><br>
                  <em class="text-bold">(<?= $val->aduan_fitur; ?>)</em>    
                </td>
                <td>
                  <a href="<?php echo prep_url($val->sosmed_link, 'url')?>">
                    <span class="badge badge-default">
                      <i class="<?= $val->media_icon ?>"></i> 
                      <?= $val->media_nama ?>
                    </span>
                  </a>
                </td>
                <td><?= $val->pic_nama ?></td>
                <td>
                  <span class='badge <?= $val->aduan_status == DITANGGAPI ? "badge-success" : "badge-danger" ?>'>
                    <i class="fa fa-check"></i> <?= $val->aduan_status ?>
                  </span>
                </td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Opsi
                    </button>
                    <div class="dropdown-menu">
                      <a class='dropdown-item' target="_blank" href='<?= base_url('./uploads/'.$val->aduan_gambar) ?>'><i class='fas fa-images text-warning'></i> Lihat Gambar</a>
                      <a class='dropdown-item' href='<?= base_url('/pengaduan/edit/'.$val->aduan_id) ?>'><i class="fa fa-bars text-secondary"></i> Edit Data</a>
                      <a class='dropdown-item' href='#' onclick="confirmRemove(this)" data-id="<?= $val->aduan_id ?>" data-nama="<?= $val->aduan_perihal ?>">
                        <i class='fa fa-times text-danger'></i> Hapus Data
                      </a>
                      <?php
                        if($val->aduan_status != DITANGGAPI){
                          echo "<hr><a data-id='{$val->aduan_id}' data-nama='{$val->aduan_perihal}' class='dropdown-item' href='#' onclick=\"confirmUpdate(this)\"><i class='fa fa-check text-success'></i> Ditanggapi</a>";
                        }
                        
                      ?>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
              $i++;
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>