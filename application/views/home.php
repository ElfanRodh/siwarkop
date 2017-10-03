                    <!-- Page content -->
                    <div id="page-content">
                        <!-- First Row -->
                        <div class="row">
                            <!-- Simple Stats Widgets -->
                            <div class="col-sm-6 col-lg-6">
                                <a href="#" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background">
                                            <i class="fa fa-coffee text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                                            <strong>
                                                <span data-toggle="counter" data-to="<?php echo $allwarkop; ?>"><?php echo $allwarkop ?></span>
                                            </strong>
                                        </h2>
                                        <span class="text-muted">WARKOP</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <a href="#" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-success">
                                            <i class="fa fa-user text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-success">
                                            <strong>
                                                <span data-toggle="counter" data-to="<?php echo $alluser; ?>"><?php echo $alluser ?></span>
                                            </strong>
                                        </h2>
                                        <span class="text-muted">USER</span>
                                    </div>
                                </a>
                            </div>
                            <!-- END Simple Stats Widgets -->
                        </div>
                        <!-- END First Row -->

                        <!-- Google Maps Content -->
                        <div class="row">
                            <div class="col-sm-8">
                                <!-- Street View Block -->
                                <div class="block">
                                    <!-- Street View Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-road"></i> Map</h2>
                                    </div>
                                    <!-- END Street View Title -->

                                    <!-- Street View Content -->
                                    <!-- Gmaps.js (initialized in <?=base_url()?>assets/js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                                    <div class="block-content-full">
                                        <div id="map" class="gmap" style="height: 360px;"></div>
                                    </div>
                                    <!-- END Street View Content -->
                                </div>
                                <!-- END Street View Block -->
                            </div>
                            <div class="col-sm-4">
                                <!-- Street View Block -->
                                <div class="block">
                                    <!-- Street View Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-road"></i> Arah</h2>
                                    </div>
                                    <!-- END Street View Title -->

                                    <!-- Street View Content -->
                                    <!-- Gmaps.js (initialized in <?=base_url()?>assets/js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                                    <div class="block-content-full">
                                        <div id="cont" style="overflow: auto; height: 360px;"></div>
                                    </div>
                                    <!-- END Street View Content -->
                                </div>
                                <!-- END Street View Block -->
                            </div>
                        </div>
                        <!-- END Google Maps Content -->
                    </div>
                    <!-- END Page Content -->
