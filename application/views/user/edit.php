<!-- Page content -->
                    <div id="page-content">
                        <!-- Google Maps Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Edit User</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="<?php echo site_url('home') ?>">SIWARKOP</a></li>
                                            <li>User</li>
                                            <li>Edit User</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Google Maps Header -->

                        <div class="block">
                            <!-- Input States Title -->
                            <div class="block-title">
                                <h2><i class="fa fa-coffee sidebar-nav-icon"></i> EDIT user</h2>
                            </div>
                            <!-- END Input States Title -->
                            <?php 
                                if($this->session->flashdata('gagal_edit_upload') != "") {
                                    echo '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Gagal</strong></h4> Foto Gagal di Upload
                                          </div>';
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('gagal_edit_resize') != "") {
                                    echo '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><strong>Gagal</strong></h4> Foto Gagal di Resize
                                          </div>';
                                }
                            ?>
                            <!-- Input States Content -->
                            
                            <?php echo form_open_multipart('user/edit_proses/'.$user1['id_user']); ?>
                            <div class="form-horizontal form-bordered">
                                <div class="form-group">
                                    <input type="hidden" name="id_user" value="">
                                    <label class="col-md-3">Nama user</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?php echo $user1['nama_user'] ?>">
                                        <?php echo form_error('nama_user') ?>
                                    </div>
                                    <label class="col-md-3">Jenis Kelamin</label>
                                    <div class="col-md-8">
                                        <select name="jk" class="form-control">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option <?php if($user1['jk']=='L'){echo "selected";} ?> value="L">Laki - laki</option>
                                            <option <?php if($user1['jk']=='P'){echo "selected";} ?> value="P">Perempuan</option>
                                        </select>
                                        <?php echo form_error('jk') ?>
                                    </div>
                                    <label class="col-md-3">Alamat</label>
                                    <div class="col-md-8">
                                        <textarea name="alamat" class="form-control"><?php echo $user1['alamat'] ?></textarea>
                                        <?php echo form_error('alamat') ?>
                                    </div>
                                    <label class="col-md-3">E-mail</label>
                                    <div class="col-md-8">
                                        <input type="text" name="email" class="form-control" value="<?php echo $user1['email'] ?>">
                                        <?php echo form_error('email') ?>
                                    </div>
                                    <label class="col-md-3">No. Telp</label>
                                    <div class="col-md-8">
                                        <input type="text" name="no_telp" class="form-control" maxlength="12" value="<?php echo $user1['no_telp'] ?>">
                                        <?php echo form_error('no_telp') ?>
                                    </div>
                                    <label class="col-md-3">Foto</label>
                                    <div class="col-md-8">
                                        <?php if($user1['foto'] == "") {?>
                                            <strong><i>Foto Belum Diupload</i></strong>
                                            <br>
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/user/'.$user1['foto']) ?>" style="width: 250px">
                                        <?php } ?>
                                        <input type="file" name="foto_baru" id="example-file-input" class="form-control">
                                        <input type="hidden" name="foto_lama" value="<?php echo $user1['foto'] ?>">
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <div class="col-md-12">
                                        <button type="submit" name="edit_proses" class="btn btn-effect-ripple btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                                        <button type="reset" class="btn btn-effect-ripple btn-danger"><i class="fa fa-reset"></i> Reset</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                            <!-- END Input States Content -->

                    </div>
                    <!-- END Page Content -->