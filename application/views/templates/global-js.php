<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/core/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
<!-- jQuery UI -->
<script src="<?= base_url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js'); ?>"></script>

<!-- Bootstrap notification -->
<script src="<?= base_url('assets/'); ?>js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!--  Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js'); ?>"></script>
<!-- jQuery Sparkline -->
<script src="<?= base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js'); ?>"></script>
<!-- Atlantis JS -->
<script src="<?= base_url('assets/js/atlantis.min.js'); ?>"></script>
<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    function changeProfile(element) {
        Swal.fire({
            title: 'Ubah Profil',
            html: `<div id="img-show">
                <img src="<?= base_url('./uploads/profil/profil.jpg')?>" alt="profil" class="img-fluid" style="width: 500px;">    
            </div>`,
            showCancelButton: true,
            showDenyButton: true,
            allowOutsideClick: true,
            input: 'file',
            inputAttributes: {
                'accept': 'image/*',
                'aria-label': 'Upload your profile picture'
            },
            inputValidator: (result) => {
                return !result && 'Gambar diperlukan'
            },
            confirmButtonColor: '#31ce36',
            confirmButtonText: 'Simpan',
            denyButtonText: 'Hapus',       
        }).then((result) => {
            if (result.isConfirmed) {
                updateProfile(result.value)
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'error')
            }
        });

        const profilGambar = document.getElementsByClassName("swal2-file")[0];
        const imgShow = document.getElementById("img-show");
        profilGambar.onchange = function() {
            const [file] = profilGambar.files;
            if (file) {
                imgShow.innerHTML = `<img src="${URL.createObjectURL(file)}" alt="${file.name}" class="img-fluid" style="width: 500px;">`;
            }
        };
    }

    function updateProfile(image) {
        Swal.fire({
            title: 'Mengirim...',
            text: 'Mohon tunggu beberapa saat',
            showConfirmButton: false,
            allowOutsideClick: false
        });

        var form = new FormData()
        form.append("profil_gambar", image)

        $.ajax({
            type: "POST",
            url: "<?=base_url ('dashboard/update_profile')?>",
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
                content.url = '#';

                Swal.close();
                $.notify(content,{
                    type: "info",
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                    delay: 0,
                });
                window.location.reload();
            },
            error: function(error) {
                if (error.status == 400) {
                    Swal.fire("Gagal", error.responseJSON.message, "error");
                    return;
                }
                Swal.fire("Gagal", "Maaf server sedang sibuk, silahkan coba lagi nanti.", "error");
            }
        })
    }

    function testHello() {
        console.log("HELLO")
    }

    testHello()
</script>
<?php
if (isset($js)) {
    $this->view($js);
}
?>