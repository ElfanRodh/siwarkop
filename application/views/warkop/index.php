
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Google Maps Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Warung Kopi</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="<?php echo site_url('home') ?>">SIWARKOP</a></li>
                                            <li>Warung Kopi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Google Maps Header -->

                        <!-- Google Maps Content -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Street View Block -->
                                <div class="block">
                                    <!-- Street View Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <h2><i class="fa fa-road"></i> Map</h2>
                                    </div>
                                    <!-- END Street View Title -->
                                    <div class="block-content-full">
                                        <input type="text" id="pac-input" placeholder="Cari ..." class="form-control">
                                        <div id="map" class="gmap" style="height: 360px;"></div>
                                    </div>
                                    <!-- END Street View Content -->
                                </div>
                                <!-- END Street View Block -->
                            </div>
                        </div>
                        <!-- END Google Maps Content -->

                        <!-- Datatables Block -->
                        <!-- Datatables is initialized in ../assets/js/pages/uiTables.js -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><i class="fa fa-coffee sidebar-nav-icon"></i>  WARKOP</h2>
                            </div>
                            <a href="<?php echo site_url('warkop/tambah') ?>" title="Tambah warkop" class="btn btn-effect-ripple btn-info"><i class="fa fa-plus"></i> Tambah Warkop</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table id="warkop" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">No</th>
                                            <th>Nama Warkop</th>
                                            <th>Alamat</th>
                                            <th class="text-center" style="width: 5px;"></i> Detail</th>
                                            <th class="text-center" style="width: 5px;"></i> Edit</th>
                                            <th class="text-center" style="width: 5px;"></i> Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Block -->
                    </div>
                    <!-- END Page Content -->