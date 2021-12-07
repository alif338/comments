<!-- jQuery -->
<script src="<?= base_url("assets/"); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets/"); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url("assets/"); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url("assets/"); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url("assets/"); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url("assets/"); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assets/"); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url("assets/"); ?>dist/js/demo.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url("assets/"); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/select2/js/select2.min.js"></script>
<!-- page script -->
<script>
    $("#form-layanan").submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Mengirim...",
            text: "Mohon tunggu beberapa saat",
            showConfirmButton: false,
            allowOutsideClick: false
        });

        var form = new FormData();
        form.append("action", $("#action").val());
        form.append("master_layanan_guid", $("#master_layanan_guid").val());
        form.append("master_layanan_nama", $("#master_layanan_nama").val());
        form.append("master_layanan_deskripsi", $("#master_layanan_deskripsi").val());


        $.ajax({
            type: "POST",
            url: "<?= base_url('layanan/ajaxSubmitForm') ?>",
            data: form,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                Swal.fire("Berhasil", result.message, "success");
                window.location.replace('<?= base_url("layanan/") ?>');
            },
            error: function(error) {
                if (error.status == 400) {
                    Swal.fire("Gagal", error.responseJSON.message, "error");
                    return;
                }
                Swal.fire("Gagal", "Data gagal diproses", "error");
            }
        });
    });
</script>