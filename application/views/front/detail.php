<?php $this->load->view('front/header'); ?>            
            <!-- Intro -->
            <section class="site-section site-section-top site-section-light themed-background-dark">
                <div class="container text-center">
                    <h1 class="animation-fadeInQuickInv"><strong><?php echo $warkop_detail['nama_warkop'] ?></strong></h1>
                </div>
            </section>
            <!-- END Intro -->

            <!-- Project Info -->
            <section class="site-content site-section border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 site-block">
                            <!-- Carousel & Info -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="project-carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                                        <!-- Wrapper for slides -->
                                            <div class="text-center">
                                                <img src="<?php echo base_url('assets/images/warkop/'.$warkop_detail['foto']) ?>" >
                                            </div>
                                        <!-- END Wrapper for slides -->

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#project-carousel" data-slide="prev">
                                            <span>
                                                <i class="fa fa-chevron-left"></i>
                                            </span>
                                        </a>
                                        <a class="right carousel-control" href="#project-carousel" data-slide="next">
                                            <span>
                                                <i class="fa fa-chevron-right"></i>
                                            </span>
                                        </a>
                                        <!-- END Controls -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Carousel & Info -->

                            <!-- Project Details -->
                            <h3><strong>Alamat</strong></h3>
                            <p><?php echo $warkop_detail['alamat'] ?></p>

                            <h3><strong>Sekilas</strong></h3>
                            <p><?php echo $warkop_detail['sekilas'] ?></p>
                            <!-- END Project Details -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Project Info -->

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
                        <div class="col-md-7">
                                <!-- Street View Block -->
                                <div class="block">
                                    <!-- Street View Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-road"></i> Map</h2>
                                    </div>
                                    <!-- END Street View Title -->
                                    <div class="block-content-full">
                                        <div id="map_detail" class="gmap" style="height: 360px;"></div>
                                    </div>
                                    <!-- END Street View Content -->
                                </div>
                                <!-- END Street View Block -->
                            </div>
                            <div class="col-md-5">
                                <!-- Street View Block -->
                                <div class="block">
                                    <!-- Street View Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-road"></i> Arah</h2>
                                    </div>
                                    <!-- END Street View Title -->
                                    <div class="block-content-full">
                                        <div id="cont" style="overflow: auto; height: 360px;"></div>
                                    </div>
                                    <!-- END Street View Content -->
                                </div>
                                <!-- END Street View Block -->
                            </div>
                    </div>
                    <!-- END Alerts Row -->
                </div>
            </section>
            <!-- END Alerts Content -->


<?php $this->load->view('front/footer'); ?>