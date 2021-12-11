<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= isset($title) ? $title : JUDUL; ?> - Aplikasi Rekap</title>
    <link rel="icon" href="<?= base_url('assets/icon.png'); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php $this->view("templates/cssload"); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-lightblue elevation-4">
            <?php $this->view("templates/sidenav"); ?>
        </aside>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <?php $this->view("templates/navbar"); ?>
        </nav>


        <div class="content-wrapper">
            <?php $this->view("templates/breadcrumbs"); ?>
            <?php $this->view($content); ?>
        </div>
    </div>

    <?php $this->view("templates/footer"); ?>
    <?php $this->view("templates/jsload"); ?>
</body>

</html>