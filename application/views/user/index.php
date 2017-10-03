
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Google Maps Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>User</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="<?php echo site_url('home') ?>">SIWARKOP</a></li>
                                            <li>User</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Google Maps Header -->

                        <!-- Datatables Block -->
                        <!-- Datatables is initialized in ../assets/js/pages/uiTables.js -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><i class="fa fa-user sidebar-nav-icon"></i> USER</h2>
                            </div>
                            <a href="#modal-fade" title="Tambah User" class="btn btn-effect-ripple btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah User</a>
                            <a href="<?php echo site_url('user/cetakPDF') ?>" target="_blank" title="Cetak PDF" class="btn btn-effect-ripple btn-warning"><i class="fa fa-file-pdf-o"></i> Cetak PDF</a>
                            <br>
                            <br>
                            <?php 
                                if($this->session->flashdata('sukses_tambah') != "") {
                                    echo '<div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Sukses</strong></h4> Data Berhasil Disimpan
                                          </div>';
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('gagal_tambah_upload') != "") {
                                    echo '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Gagal</strong></h4> Foto Gagal diupload
                                          </div>';
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('gagal_tambah_resize') != "") {
                                    echo '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Gagal</strong></h4> Foto gagal diresize
                                          </div>';
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('sukses_edit') != "") {
                                    echo '<div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Sukses</strong></h4> Data Berhasil Diedit
                                          </div>';
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('sukses_hapus') != "") {
                                    echo '<div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Sukses</strong></h4> Data Berhasil Dihapus
                                          </div>';
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('gagal_hapus') != "") {
                                    echo '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Gagal</strong></h4> Data Gagal Dihapus
                                          </div>';
                                }
                            ?>
                            <div class="table-responsive">
                                <table id="user" class="table table-striped table-bordered table-hover table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">No</th>
                                            <th>Nama User</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th class="text-center" style="width: 5px;"> Detail</th>
                                            <th class="text-center" style="width: 5px;"> Edit</th>
                                            <th class="text-center" style="width: 5px;"> Hapus</th>
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

        <!-- Regular Fade -->
        <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Tambah User</strong></h3>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('user/tambah_proses'); ?>
                        <div class="form-bordered">
                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" name="nama_user" class="form-control" placeholder="Masukkan Nama User">
                                <?php echo form_error('nama_user'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <?php echo form_error('jk'); ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                                <?php echo form_error('alamat'); ?>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan E-mail">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input type="text" name="no_telp" class="form-control" placeholder="Nomor HP User" maxlength="12" autocomplete="off">
                                <?php echo form_error('no_telp'); ?>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" id="example-file-input" class="form-control">
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" name="tambah">Tambah</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Regular Fade -->
