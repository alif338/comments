<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= isset($title) ? $title : JUDUL; ?> - Aplikasi Rekap</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url('assets/img/icon.ico'); ?>" type="image/x-icon"/>
    
    <?php $this->load->view('templates/global-css'); ?>
</head>
<body>
    <div class="wrapper sidebar_minimize">
        <!-- Header -->
        <?php $this->load->view('templates/header'); ?>
        <!-- End header -->
        <!-- Sidebar -->
        <?php $this->load->view('templates/sidenav'); ?>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <?php $this->load->view($content); ?>
                </div>
            </div>

            <?php $this->load->view('templates/footer'); ?>
        </div>
    </div>
    <!--   Core JS Files   -->
    <?php $this->load->view('templates/global-js'); ?>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="<?= base_url('assets/js/setting-demo.js'); ?>"></script>
    <script>
        $('#lineChart').sparkline([102,109,120,99,110,105,115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#177dff',
            fillColor: 'rgba(23, 125, 255, 0.14)'
        });

        $('#lineChart2').sparkline([99,125,122,105,110,124,115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#f3545d',
            fillColor: 'rgba(243, 84, 93, .14)'
        });

        $('#lineChart3').sparkline([105,103,123,100,95,105,115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });

        $('#lineChart4').sparkline([102,109,120,99,110,105,115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(255, 255, 255, .15)'
        });

        $('#lineChart5').sparkline([99,125,122,105,110,124,115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(255, 255, 255, .15)'
        });

        $('#lineChart6').sparkline([105,103,123,100,95,105,115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(255, 255, 255, .15)'
        });
    </script>
</body>
</html>