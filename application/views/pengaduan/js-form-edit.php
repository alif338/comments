<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
  $( "#aduan-pic" ).autocomplete({
      source: <?= $autocomplete ?>,
      autoFocus: true,
      delay: 100
  });
  $('#form-pengaduan-edit').submit(function(e) {
    e.preventDefault();
    Swal.fire({
        title: "Mengirim...",
        text: "Mohon tunggu beberapa saat",
        showConfirmButton: false,
        allowOutsideClick: false
    });

    var form = new FormData();
    form.append("aduan_id", $("#aduan-id").val());
    form.append("aduan_perihal", $("#aduan-perihal").val());
    form.append("aduan_tanggal", $("#aduan-tanggal").val());
    form.append("aduan_pemohon", $("#aduan-pemohon").val());
    form.append("aduan_fitur", $("#aduan-fitur").val());
    form.append("aduan_keterangan", $("#aduan-keterangan").val());
    form.append("aduan_gambar", document.getElementById("aduan-gambar").files[0]);
    form.append("media_id", $("input[name='icon-input']:checked").val());
    form.append("sosmed_link", $("#sosmed-link").val());
    form.append("pic_id", $("#aduan-pic").val());

    console.log("<?= base_url('pengaduan/edit/') ?>" + aduan_id)

    $.ajax({
        type: "PUT",
        url: "<?= base_url('pengaduan/update_aduan') ?>",
        data: form,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
            var content = {};
            console.log(result);
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
            $("#form-pengaduan-edit").trigger("reset");
            window.location.href = content.url;
        },
        error: function(error) {
            if (error.status == 400) {
                Swal.fire("Gagal", error.responseJSON.message, "error");
            }
        }
    });

  });
</script>