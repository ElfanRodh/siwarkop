<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>LUPA PASSWORD? WOLES GAN</title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
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
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">

        <!-- Include a specific file here from <?php echo base_url() ?>assets/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-3.3.1.min.js"></script>
    </head>
    <body>
        <!-- Login Container -->
        <div id="login-container">
            <!-- Register Header -->
            <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                <i class="fa fa-plus"></i> <strong>Isi Form</strong>
            </h1>
            <!-- END Register Header -->

            <!-- Register Form -->
            <div class="block animation-fadeInQuickInv">
                <!-- Register Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="<?php echo site_url('login') ?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Halaman Login"><i class="fa fa-user"></i></a>
                    </div>
                    <h2>Inputkan Data</h2>
                </div>
                <!-- END Register Title -->

                <!-- Register Form -->
                <?php echo form_open('login/lupa_proses') ?>
                <div id="form-register" class="form-horizontal">
                    <?php if($this->session->flashdata('sukseslupa')!=""){
                        $link =  '<a href="">Login</a>';
                        echo '<div class="alert alert-success"><strong>Sukses!</strong> Berhasil, Silahkan Buka <a href="http://mail.google.com" target="_blank"><strong>Email Anda</strong></a> </div>';
                    }?>
                    <?php if($this->session->flashdata('errorlupa')!=""){
                        echo '<div class="alert alert-danger"><strong>Error!</strong> Data tidak Valid atau Username Sudah Ada</div>';
                    }?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="register-email" name="register-email" class="form-control" placeholder="Email">
                            <?php echo form_error('register-email') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <?php echo $image; ?>
                            <?php if($this->session->flashdata('errorcap')!=""){
                                  echo '<div class="alert alert-danger"><strong>Error!</strong> Captcha tidak Valid</div>';
                            }?>
                            <br><br>
                            <input type="text" name="captcha" class="form-control" placeholder="Masukkan Captcha" >
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-center">
                            <button type="submit" class="btn btn-effect-ripple btn-success"><i class="fa fa-plus"></i> Submit</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- END Register Form -->
            </div>
            <!-- END Register Block -->

            <!-- Footer -->
            <footer class="text-muted text-center animation-pullUp">
                <small><span> &copy; 2017 - <a href="http://www.elfanrodhian.xyz" target="_blank">Elfan Rodhian</a></span></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?php echo base_url() ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url() ?>assets/js/app.js"></script>
    </body>
</html>