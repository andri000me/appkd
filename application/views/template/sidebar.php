 <?php 
    $CI =& get_instance();
    $setting =  $CI->db->get_where('setting', ['id'=>1])->row();
  ?>

 <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="<?= site_url('home') ?>"><img src="http://www.ascaps.com/demo/hexabit/html/images/icon-dark.svg" alt="HexaBit Logo" class="img-fluid logo"><span><?= $setting->short_name ?></span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="<?= base_url() ?>uploads/<?= $setting->logo ?>" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?= $this->session->userdata('email'); ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        
                        <li><a href="<?= site_url('login/logout') ?>"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="<?= set_active_admin('home') ?>"><a href="<?= site_url('home') ?>"><i class="icon-home"></i><span>Beranda</span></a></li>
                    <li class="<?= set_active_admin('peminjam') ?>"><a href="<?= site_url('peminjam') ?>"><i class="fa fa-address-card" aria-hidden="true"></i><span>Peminjam</span></a></li>
                    <li class="<?= set_active_admin('penanggung_jawab') ?>" ><a href="<?= site_url('penanggung_jawab') ?>"><i class="fa fa-lock"></i><span>Penanggung Jawab</span></a></li>
                    <li class="<?= set_active_admin('ruang') ?>" ><a href="<?= site_url('ruang') ?>"><i class="fa fa-key" aria-hidden="true"></i></i><span>Ruang</span></a></li>
                    <li class="<?= set_active_admin('perlengkapan') ?>">
                        <a href="#uiElements" class="has-arrow"><i class="fa fa-cubes"></i><span>Perlengkapan</span></a>
                        <ul>
                            <li><a href="<?= site_url('perlengkapan') ?>">Perlengkapan</a></li>
                            <li><a href="<?= site_url('mobil') ?>">Mobil</a></li>
                        </ul>
                    </li>
                   
                    <li class="<?= set_active_admin('sopir') ?>"><a href="<?= site_url('sopir') ?>"><i class="fa fa-car" aria-hidden="true"></i><span>Sopir</span></a></li>

                    <li class="<?= set_active_admin('peminjaman') ?>">
                        <a href="#uiElements" class="has-arrow"><i class="fa fa-exchange" aria-hidden="true"></i></i><span>Peminjaman</span></a>
                        <ul>
                            <li><a href="<?= site_url('peminjaman?jenis=ruang') ?>">Ruang</a></li>
                            <li><a href="<?= site_url('peminjaman?jenis=mobil') ?>">Mobil</a></li>
                            <li><a href="<?= site_url('perlengkapan/daftar_peminjaman') ?>">Perlengkapan</a></li>
                        </ul>
                    </li>
                    <li class="<?= set_active_admin('user') ?>"><a href="<?= site_url('user') ?>"><i class="icon-users"></i><span>User</span></a></li>
                    <li class="<?= set_active_admin('setting') ?>"><a href="<?= site_url('setting') ?>"><i class="fa fa-wrench" aria-hidden="true"></i></i><span>Setting</span></a></li>

                  
                  
                </ul>
            </nav>     
        </div>
    </div>