<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
<script>
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
                Swal.fire("Berhasil", result.message, "success");
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