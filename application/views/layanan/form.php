<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Layanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" role="form" id="form-layanan">
                    <div class="card-body">
                        <input type="hidden" id="master_layanan_guid" value="<?= $data->master_layanan_guid ?>">
                        <input type="hidden" id="action" value="<?= $action ?>">
                        <div class="form-group">
                            <label for="master_layanan_nama">Nama Layanan</label>
                            <input type="text" class="form-control" placeholder="Nama Layanan" id="master_layanan_nama" value="<?= $data->master_layanan_nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="master_layanan_deskripsi">Deskripsi</label>
                            <textarea class="form-control" placeholder="Deskripsi" rows="5" id="master_layanan_deskripsi"><?= $data->master_layanan_deskripsi ?></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->