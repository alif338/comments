<!-- Modal Dialog -->
<div class="modal fade" id="upload-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('layanan/uploadFileHasil') ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="download-modal-body">
                    <input type="hidden" name="pengajuan" id="id-pengajuan">
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <!-- Table Page-1 -->
                <div class="card-body" id="section-1">
                    <table id="data-pengajuan-layanan" style="width: 100%;" class="table table-bordered table-striped"></table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->