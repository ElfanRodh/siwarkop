<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo $judul; ?></title>

        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css">
        <link href="<?php echo base_url() ?>assets/datatables.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>media/css/jquery.dataTables.css" rel="stylesheet">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">


        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/themes/social.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-3.3.1.min.js"></script>

    </head>
    <body>
        <div id="page-wrapper" class="page-loading">
            <div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
            <?php include ('profil.php'); ?>
            <?php 
                if ($this->session->userdata('akses') == 'ADMIN') {
                    include ('menu.php'); 
                } else if($this->session->userdata('akses') == 'USER'){
                    include ('menu_user.php'); 
                }
            ?>

                <!-- Main Container -->
                <div id="main-container">
                    <?php include ('header.php'); ?>
                    <?php include ($konten); ?>
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

       <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url() ?>assets/datatables.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url() ?>assets/js/app.js"></script>
        <script>
        <?php
            if (isset($modal_show)) {
                echo $modal_show;
            }
        ?>
        </script>

        <?php if (isset($warkop_edit)){
            include ('warkop/gmap_edit.php'); 
        } else if (isset($user)) {
            include 'user/datatables.php';
        } else if (isset($warkop)){
            include ('gmap.php');
            include 'warkop/datatables.php';
        } else {
            include ('warkop/gmap_warkop.php'); 
        }

        ?>

        
    </body>
</html>