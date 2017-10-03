<!-- Page content -->
                    <div id="page-content">
                        <!-- Google Maps Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Tambah Warung Kopi</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="<?php echo site_url('home') ?>">SIWARKOP</a></li>
                                            <li>WARKOP</li>
                                            <li>Tambah Warkop</li>
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

                        <div class="block">
                            <!-- Input States Title -->
                            <div class="block-title">
                                <h2><i class="fa fa-coffee sidebar-nav-icon"></i> TAMBAH WARKOP</h2>
                            </div>
                            <!-- END Input States Title -->

                            <!-- Input States Content -->
                            
                            <?php echo form_open_multipart('warkop/tambah_proses'); ?>
                            <div class="form-horizontal form-bordered">
                                <div class="form-group">
                                    <input type="hidden" name="id_warkop" value="">
                                    <label class="col-md-3">Nama Warkop</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_warkop" id="nama_warkop" class="form-control" placeholder="Nama warkop" value="">
                                    </div>
                                    <label class="col-md-3">Alamat</label>
                                    <div class="col-md-8">
                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="">
                                    </div>
                                    <label class="col-md-3">Sekilas</label>
                                    <div class="col-md-8">
                                        <textarea name="sekilas" class="form-control"></textarea>
                                    </div>
                                    <label class="col-md-3">Latitude</label>
                                    <div class="col-md-8">
                                        <input type="text" name="lat" id="lat" class="form-control" placeholder="Latitude" value="">
                                    </div>
                                    <label class="col-md-3">Longitude</label>
                                    <div class="col-md-8">
                                        <input type="text" name="long" id="long" class="form-control" placeholder="Longitude" value="">
                                    </div>
                                    <label class="col-md-3">Foto</label>
                                    <div class="col-md-8">
                                        <input type="file" name="foto" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-12">
                                        <button type="submit" name="edit_proses" class="btn btn-effect-ripple btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                                        <button type="reset" class="btn btn-effect-ripple btn-danger"><i class="fa fa-reset"></i> Reset</button>
                                    </div>
                                </div>
                            </div>
                            <?php form_close(); ?>
                        </div>
                            <!-- END Input States Content -->

                    </div>
                    <!-- END Page Content -->