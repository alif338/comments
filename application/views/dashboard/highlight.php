<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tagihan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url("home/dashboard/"); ?>">Home</a></li>
                <li class="breadcrumb-item active">Highlight</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
       <!-- USERS LIST -->
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Highlight Acara</h3>
                        
                        <div class="card-tools">
                            <span class="badge badge-danger">1 New Video</span>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card-body">
                                        <div class="card container">
                                        <h5 class="text-center mt-3 tittlewin" style="min-height:50px;"><b>Leaders Meeting & Launching Support System</b></h5>
                                        <hr>
                                            <div class="col text-center">   
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src=" https://www.youtube.com/embed/k8rI9ISfoKY" allowfullscreen></iframe>
                                                    </div>
                                                    <br>
                                                <p class="card-text " ><h6 class="text-left" style="min-height:100px;">Video highlight acara Leaders Meeting & Launching Support System
                                                12 – 13 September 2020, Hotel Intercontinental Bandung
                                                </h6></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                        </div>
                        <!-- /.card-footer -->
                    
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
  function setContent(){
    var id = $("#filter-data").val();
    $.ajax({
      url: "<?= base_url('content/ajaxGetContent')?>",
      cache: false,
      data: {id: id},
      type: "POST",
      success: function(data) {
        var result = JSON.parse(data);
        var link = "<?= base_url("promo/page/"); ?>"+ result.id_content + "/<?= $id; ?>";
        $("#title-content").html(result.title);
        $("#description-content").html(result.description);
        $("#link-content").val(link);
      },
      error: function(data) {
        
      }
    });
  }
  $("#filter-data").on('change', function(){
    setContent();
  });
  $(document).ready(function (){
    setContent();
  });
</script>

<script>
  function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("link-content");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Link copied !!");
  };
</script>
</body>
</html>