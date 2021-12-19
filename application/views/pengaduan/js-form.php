<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
    $( "#aduan-pic" ).autocomplete({
        source: <?= $autocomplete ?>,
        autoFocus: true,
        delay: 100
    });
    $("#form-pengaduan").submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: "Mengirim...",
            text: "Mohon tunggu beberapa saat",
            showConfirmButton: false,
            allowOutsideClick: false
        });

        var form = new FormData();
        form.append("aduan_perihal", $("#aduan-perihal").val());
        form.append("aduan_tanggal", $("#aduan-tanggal").val());
        form.append("aduan_pemohon", $("#aduan-pemohon").val());
        form.append("aduan_fitur", $("#aduan-fitur").val());
        form.append("aduan_status", $("#aduan-status").val());
        form.append("aduan_keterangan", $("#aduan-keterangan").val());
        form.append("aduan_gambar", document.getElementById("aduan-gambar").files[0]);
        form.append("media_id", $("input[name='icon-input']:checked").val());
        form.append("pic_id", $("#aduan-pic").val());
        
        $.ajax({
            type: "POST",
            url: "<?= base_url('pengaduan/store') ?>",
            data: form,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                var content = {};
                content.message = result.message;
                content.title = 'Berhasil';
                content.icon = 'fa fa-check';
                content.url = '<?= base_url("pengaduan/show"); ?>';

                Swal.close();
                $.notify(content,{
                    type: "success",
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                    delay: 0,
                });
                $("#form-pengaduan").trigger("reset");
            },
            error: function(error) {
                if (error.status == 400) {
                    Swal.fire("Gagal", error.responseJSON.message, "error");
                    return;
                }
                Swal.fire("Gagal", "Maaf server sedang sibuk, silahkan coba lagi nanti.", "error");
            }
        });
    });
</script>