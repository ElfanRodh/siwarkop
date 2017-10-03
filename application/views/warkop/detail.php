                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Google Maps Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Detail <?php echo $warkop1['nama_warkop'] ?></h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="<?php echo site_url('home') ?>">SIWARKOP</a></li>
                                            <li>Warung Kopi</li>
                                            <li><?php echo $warkop1['nama_warkop'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Google Maps Header -->
                        <!-- User Profile Row -->
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="widget">
                                    <div class="text-center">
                                    <br>
                                        <img src="<?php echo base_url('assets/images/warkop/'.$warkop1['foto']) ?>" style="width: 240px;">
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <strong><h2><?php echo ($warkop1['nama_warkop']) ?></h2></strong>
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <strong><h4>Alamat</h4></strong>
                                        <p><?php echo ($warkop1['alamat']) ?></p>
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <strong><h4>Sekilas</h4></strong>
                                        <p><?php echo nl2br($warkop1['sekilas']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8">
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
                            <div class="col-md-7 col-lg-8">
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
                        <!-- END User Profile Row -->
                    </div>
                    <!-- END Page Content -->