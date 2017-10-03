                <?php 
                    $id = $this->session->userdata('id_user');
                    $d = $this->db->query("SELECT * FROM user WHERE id_user = '$id'")->row_array();
                 ?>
                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="<?php echo site_url('home') ?>" class="sidebar-title">
                            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide"><strong>SIWARKOP</strong></span>
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="<?php echo site_url('home') ?>" class="<?php if($aktif == 'home'){echo 'active';} ?>"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Home</span></a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/profil/'.$d['id_user']) ?>" class="<?php if($aktif == 'user_profil'){echo 'active';} ?>"><span class="sidebar-nav-mini-hide"><?php echo $d['nama_user'] ?></span></a>
                                </li>
                            </ul>
                            <!-- END Sidebar Navigation -->

                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                        <div class="text-center">
                            <small>&copy; 2017 <a href="http://www.elfanrodhian.xyz" target="_blank">Elfan Rodhian</a></small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->
