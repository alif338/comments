<!doctype html>
<html lang="en">
  <head>
  	<title><?= isset($title) ? $title : JUDUL; ?> - Aplikasi Rekap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/img/icon.ico'); ?>" type="image/x-icon"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url('assets/css/auth.css'); ?>">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(<?= base_url('assets/img/bg-1.jpg') ?>);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
							<form action="#" id="frm_login" class="signin-form">
			      		<div class="form-group mt-3">
			      			<input id="username" type="text" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/core/popper.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
	<!--  Sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		$("#frm_login").submit(function(e){
			e.preventDefault();
			Swal.fire({
          title: "Mengirim...",
          text: "Mohon tunggu beberapa saat",
          showConfirmButton: false,
          allowOutsideClick: false
      });
      var form = new FormData();
      form.append("username", $("#username").val());
      form.append("password", $("#password").val());

      $.ajax({
	        type: "POST",
	        url: "<?= base_url('auth/verify') ?>",
	        data: form,
	        dataType: "json",
	        contentType: false,
	        cache: false,
	        processData: false,
	        success: function(result) {
	            window.location.replace("<?= base_url('dashboard/') ?>");
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
	</body>
</html>

