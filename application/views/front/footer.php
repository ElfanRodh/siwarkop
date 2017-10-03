            <!-- Footer -->
            <footer class="site-footer site-section site-section-light">
                <div class="container">
                    <!-- Footer Links -->
                    <div class="row">
                        <div class="col-sm-4">
                            <h4 class="footer-heading">Developer</h4>
                            <ul class="footer-nav ul-breath list-unstyled">
                                <li><a href="">About Me</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <h4 class="footer-heading">Social Media</h4>
                            <ul class="footer-nav footer-nav-links list-inline">
                                <li><a href="https://www.facebook.com/elfanapoy" class="social-facebook" data-toggle="tooltip" title="Facebook"><i class="fa fa-fw fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/elfanrodh" class="social-twitter" data-toggle="tooltip" title="Twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/u/0/+ElpanPutraApoyWali" class="social-google-plus" data-toggle="tooltip" title="Google+"><i class="fa fa-fw fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <h4 class="footer-heading">Best Regrads</h4>
                            <em><span></span></em> &copy; 2017 - <a target="_blank" href="http://www.elfanrodhian.xyz">Elfan Rodhian</a>
                        </div>
                    </div>
                    <!-- END Footer Links -->
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, initialized in <?php echo base_url() ?>assets/front/js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-arrow-up"></i></a>
        
        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?php echo base_url() ?>assets/front/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/front/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/front/js/plugins.js"></script>
        <script src="<?php echo base_url() ?>assets/front/js/app.js"></script>

        <?php if (isset($warkop)){
            include ('gmap.php');
        } else if (isset($warkop_detail)) {
            include ('gmap_warkop.php'); 
        }

        ?>
    </body>
</html>