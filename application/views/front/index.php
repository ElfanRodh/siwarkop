<?php $this->load->view('front/header'); ?>

            <!-- Intro -->
            <section class="site-section site-section-top site-section-light themed-background-dark">
                <div class="container">
                    <h1 class="text-center animation-fadeInQuickInv"><strong>SISTEM INFORMASI WARUNG KOPI</strong></h1>
                </div>
            </section>
            <!-- END Intro -->

           <!-- Alerts Title -->
            <section class="site-content site-section-mini themed-background-muted border-bottom">
                <div class="container">
                    <h2 class="site-heading h3 site-block">
                        <i class="fa fa-fw fa-road"></i> <strong>MAP</strong>
                    </h2>
                </div>
            </section>
            <!-- END Alerts Title -->

            <!-- Alerts Content -->
            <section class="site-content site-section">
                <div class="container">
                    <!-- Alerts Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Success Alert -->
                            <input type="text" id="pac-input" placeholder="Cari ..." class="form-control">
                            <div id="map" class="gmap" style="height: 360px;"></div>
                            <!-- END Success Alert -->
                        </div>
                    </div>
                    <!-- END Alerts Row -->
                </div>
            </section>
            <!-- END Alerts Content -->

            <!-- Portfolio -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row push-bit">
                    <?php foreach ($warkop as $row): ?>
                        <div class="col-md-6">
                        <?php
                            if($row->id_warkop % 2){
                                $c = "themed-background-social";
                            } else {
                                $c = "themed-background-passion";
                            }
                        ?>
                            <a href="<?php echo site_url('front/detail/'.$row->id_warkop) ?>" class="portfolio-item <?php echo $c; ?>">
                                <h3 class="site-heading h3">
                                    <strong class="text-uppercase"><?php echo $row->nama_warkop ?></strong>
                                </h3>
                                <div class="row">
                                    <div class="col-sm-6 visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-20">
                                        <p><img src="<?php echo base_url('assets/images/warkop/'.$row->foto) ?>" style="height: 200px;" class="img-responsive portfolio-item-img-left"></p>
                                    </div>
                                    <div class="col-sm-6 visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-20">

                                        <p>
                                            <?php echo $row->alamat ?>
                                        </p>
                                        
                                        <p>
                                            <?php echo $row->sekilas ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- END Portfolio -->

<?php $this->load->view('front/footer'); ?>
