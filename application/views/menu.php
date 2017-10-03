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
                                <li class="<?php if($aktif == 'warkop' || $aktif == 'user'){echo 'active';} ?>">
                                    <a href="#" class="sidebar-nav-menu <?php if($aktif == 'warkop' || $aktif == 'user'){echo 'open';} ?>"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Master Data</span></a>
                                    <ul>
                                        <li>
                                            <a class="<?php if($aktif == 'warkop'){echo 'active';} ?>" href="<?php echo site_url('warkop'); ?>"><i class="fa fa-coffee sidebar-nav-icon"></i> Warung Kopi</a>
                                        </li>
                                        <li>
                                            <a class="<?php if($aktif == 'user'){echo 'active';} ?>" href="<?php echo site_url('user'); ?>"><i class="fa fa-user sidebar-nav-icon"></i> User</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
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
