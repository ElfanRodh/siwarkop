                    <?php 
                        if ($this->session->userdata('akses') == 'USER') {
                            $id = $this->session->userdata('id_user');
                            $foto = $this->db->query("select foto from user where id_user=$id")->row_array();
                        } else if ($this->session->userdata('akses') == 'ADMIN') {
                            $id = $this->session->userdata('id_admin');
                            $foto = $this->db->query("select foto from admin where id_admin=$id")->row_array();
                        }
                     ?>
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Header Link -->
                            <li class="hidden-xs animation-fadeInQuick">
                                <a href=""><strong>SISTEM INFORMASI WARUNG KOPI</strong></a>
                            </li>
                            <!-- END Header Link -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- Alternative Sidebar Toggle Button -->
                            <li>
                            <?php 
                                if ($this->session->userdata('akses') == 'USER') {
                                    $nama = 'nama_user';
                                    $link = 'user/';
                                    $a = '';
                                    $b = '';
                                } else if ($this->session->userdata('akses') == 'ADMIN') {
                                    $nama = 'nama_admin';
                                    $link = 'admin/';
                                    $a = '<!--';
                                    $b = '-->';
                                }
                             ?>
                                <a href="#">
                                    <strong> SELAMAT DATANG <?php echo $this->session->userdata('akses').'</strong> A.N <strong>'.$this->session->userdata($nama).'</strong>'; ?>
                                </a>
                            </li>
                            <!-- END Alternative Sidebar Toggle Button -->

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url('assets/images/'.$link.$foto['foto']) ?>">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        <strong>ADMINISTRATOR</strong>
                                    </li>
                                    <li>
                                    <?php echo $a; ?>
                                        <a href="<?php echo site_url($link.'detail/'.$id) ?>">
                                            <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <?php echo $b; ?>
                                    <li>
                                        <a href="<?php echo site_url('login/logout') ?>" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?');">
                                            <i class="fa fa-power-off fa-fw pull-right"></i>
                                            Log out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->