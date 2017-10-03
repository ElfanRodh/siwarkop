                    <!-- Page content -->
                    <div id="page-content">
                    <!-- Google Maps Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Detail <?php echo $user['nama_user'] ?></h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="<?php echo site_url('home') ?>">SIWARKOP</a></li>
                                            <li><a href="<?php echo site_url('user') ?>">User</a></li>
                                            <li><?php echo $user['nama_user'] ?></li>
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
                                    <div class="widget-image widget-image-sm">
                                        <img src="<?php echo base_url() ?>assets/img/placeholders/photos/photo22.jpg" alt="image">
                                        <div class="widget-image-content text-center">
                                            <img src="<?php echo base_url('assets/images/user/'.$user['foto']) ?>" alt="avatar" class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-2x push">
                                            <h2 class="widget-heading text-light"><strong><?php echo $user['nama_user'] ?></strong></h2>
                                        </div>
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <h4><strong>Jenis Kelamin</strong></h4>
                                        <p><?php if($user['jk'] == 'L'){echo 'Laki-laki';}else{echo 'Perempuan';} ?></p>
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <h4><strong>Alamat</strong></h4>
                                        <p><?php echo $user['alamat'] ?></p>
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <h4><strong>E-mail</strong></h4>
                                        <p><?php echo $user['email'] ?></p>
                                    </div>
                                    <div class="widget-content border-bottom">
                                        <h4><strong>No. Telp</strong></h4>
                                        <p><?php echo $user['no_telp'] ?></p>
                                    </div>
                                    <div class="widget-content border-bottom text-center">
                                        <a href="<?php echo site_url('user/edit/'.$user['id_user']) ?>" class="btn btn-warning" data-toggle="tooltip" title="Edit <?php echo $user['nama_user'] ?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8">
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="<?php echo site_url('user/tambah_warkop') ?>" class="btn btn-sm btn-info" data-toggle="tooltip" title="Tambah"><i class="hi hi-plus"></i> Tambah Data</a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li><a href="#"><h3><strong>Warung Kopi yang ditambahkan oleh <?php echo $user['nama_user'] ?></strong></h3></a></li>
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                        <!-- Followers -->
                                        <div class="tab-pane" id="profile-followers">
                                            <div class="block-content-full">
                                                <div id="table-responsive">
                                                <table id="example-datatable" class="table table-striped table-hover table-borderless table-vcenter remove-margin-bottom">
                                                    <tbody>
                                                        <?php foreach ($warkop_user as $row): ?>
                                                        <tr class="">
                                                            <td class="text-center" style="width: 100px;"><img src="<?php echo base_url('assets/images/warkop/'.$row->foto) ?>" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                                            <td>
                                                                <h4><strong><?php echo $row->nama_warkop ?></strong></h4>
                                                                <i class="fa fa-map-marker text-danger"></i> <strong> Lokasi</strong> <br> 
                                                                    <?php echo $row->alamat ?><br><br>
                                                                <i class="fa fa-envelope text-info"></i> <strong> Sekilas</strong> <br> 
                                                                    <?php echo $row->sekilas ?>
                                                            </td>
                                                            <td class="text-right" style="width: 20%;">
                                                                <a href="<?php echo site_url('warkop/detail/'.$row->id_warkop) ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Detail"><i class="fa fa-eye"></i></a>
                                                                <a href="<?php echo site_url('warkop/edit/'.$row->id_warkop) ?>" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                                <a href="<?php echo site_url('warkop/hapus/'.$row->id_warkop) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?');" data-toggle="tooltip" title="Hapus"><i class="hi hi-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Followers -->
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                            </div>
                        </div>
                        <!-- END User Profile Row -->
                    </div>
                    <!-- END Page Content -->

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url() ?>assets/js/pages/uiTables.js"></script>
        <script>$(function () {UiTables.init();});</script>