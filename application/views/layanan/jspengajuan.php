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
        table1 = $("#data-pengajuan-layanan").DataTable({
            responsive: true,
            autoWidth: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: '<?= base_url("layanan/ajaxDataTablePengajuan") ?>',
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
                    data: 'created_at',
                    title: 'Tanggal Pengajuan',
                    render: function(data, type, item) {
                        var options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        var result = new Date(data.replace(/-/g, "/")).toLocaleDateString('id', options);
                        return result;
                    },
                    className: 'text-center',
                },
                {
                    data: 'master_layanan_nama',
                    title: 'Layanan',
                    render: function(data, type, item) {
                        return data;
                    },
                    className: 'text-center',
                },
                {
                    data: 'master_penduduk_nik',
                    title: 'NIK',
                    render: function(data, type, item) {
                        return data;
                    },
                    className: 'text-center',
                },
                {
                    data: 'master_penduduk_nama',
                    title: 'Nama Lengkap',
                    render: function(data, type, item) {
                        return data;
                    },
                    className: 'text-center',
                },
                {
                    data: 'trans_pengajuan_selesai',
                    title: 'Status',
                    render: function(data, type, item) {
                        return data == "Selesai" ? "<span class='badge badge-success xtra-padding'>Selesai</span>" : "<span class='badge badge-danger xtra-padding'>" + data + "</span>";
                    },
                    className: 'text-center',
                },
                {
                    data: 'trans_pengajuan_file',
                    title: 'Aksi',
                    render: function(data, type, item) {
                        var button = "";
                        if (item.trans_pengajuan_selesai == "Selesai") {
                            button += "<button data-toggle='modal' data-pengajuan='"+item.trans_pengajuan_layanan+"' data-target='#upload-modal' data-toggle='tooltip' data-placement='top' title='Upload file hasil' class='btn btn-danger text-light'><em class='fa fa-upload'></em></button>";
                            if(data != null){
                                button += "<a target='_blank' href='<?= base_url('/uploads/') ?>"+data+"' data-toggle='tooltip' data-placement='top' title='Download file' class='btn btn-primary text-light'><em class='fa fa-download'></em></a>";
                            }
                            
                        } else {
                            button += "<button data-toggle='tooltip' data-placement='top' title='Perbaharui status' class='btn btn-info text-light' onClick='updateStatus(" + item.trans_pengajuan_layanan + ")'><em class='fa fa-check'></em></button>";
                        }
                        return '<div class="btn-group" role="group" aria-label="Basic example">' +
                            button + '</div>';
                    },
                    className: 'text-center',
                },
            ],
        });
    }

    function updateStatus(id) {
        Swal.fire({
            title: 'Perubahan status',
            text: "Apakah anda yakin ingin mengubah pengajuan menjadi \"selesai\" ?",
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
            url: "<?= base_url("layanan/ajaxRubahStatus"); ?>",
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

    $('#upload-modal').on('show.bs.modal', function(event) {
        $("#upload-modal-body").html("Loading data...");
        var trigger = $(event.relatedTarget);
        var pengajuan = trigger.data('pengajuan');
        $("#id-pengajuan").val(pengajuan);
    })
;</script>