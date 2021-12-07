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
<!-- page script -->
<script>
    var table1;

    function initTable() {
        table1 = $("#data-layanan").DataTable({
            responsive: true,
            autoWidth: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: '<?= base_url("layanan/ajaxDataTableLayanan") ?>',
                type: 'POST',
                contentType: 'application/json',
                data: function(d) {
                    return JSON.stringify(d);
                }
            },
            fnDrawCallback: function(oSettings, json) {
                $('[data-toggle="tooltip"]').tooltip();
            },
            order: [
                [1, "asc"]
            ],
            columns: [{
                    data: 'master_layanan_guid',
                    title: '<em class="fa fa-paste"></em> Kode Layanan',
                    render: function(data, type, item) {
                        return "LN-" + data;
                    },
                    className: 'text-center',
                },
                {
                    data: 'master_layanan_nama',
                    title: 'Nama Layanan',
                    render: function(data, type, item) {
                        return data;
                    },
                    className: 'text-center',
                },
                {
                    data: 'master_layanan_deskripsi',
                    title: 'Deskripsi',
                    render: function(data, type, item) {
                        return data;
                    },
                    className: 'text-center',
                },
                {
                    data: 'created_at',
                    title: 'Aksi',
                    render: function(data, type, item) {
                        var button = "<a class='btn btn-warning text-light' href='<?= base_url('layanan/edit/') ?>"+item.master_layanan_guid+"'><i class='fa fa-edit'></i></a> ";
                        button += "<button data-toggle='tooltip' data-placement='top' title='Hapus data' class='btn btn-danger text-light' onClick='removeData(" + item.master_layanan_guid + ", \"" + item.master_layanan_nama + "\")'><em class='fa fa-trash'></em></button>";

                        return '<div class="btn-group" role="group" aria-label="Basic example">' +
                            button + '</div>';
                    },
                    className: 'text-center',
                },
            ],
        });
    }

    function removeData(id, nama) {
        Swal.fire({
            title: 'Perubahan status',
            text: "Apakah anda yakin ingin menghapus layanan \"" + nama + "\"?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                requestAjax(id);
            }
        })
    }

    function requestAjax(id) {
        /* Munculkan screen loading */
        Swal.fire({
            title: "Mengirim...",
            text: "Mohon tunggu beberapa saat",
            showConfirmButton: false,
            allowOutsideClick: false
        });

        var form = new FormData();
        form.append("id", id);

        $.ajax({
            type: "POST",
            url: "<?= base_url("layanan/removeData"); ?>",
            data: form,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                Swal.fire("Berhasil", result.message, "success");
                table1.ajax.reload();
            },
            error: function(error) {
                if (error.status == 400) {
                    Swal.fire("Gagal", error.responseJSON.message, "error");
                    return;
                }
                Swal.fire("Gagal", "Data gagal diproses", "error");
            }
        });
    }

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        initTable();
    });
</script>