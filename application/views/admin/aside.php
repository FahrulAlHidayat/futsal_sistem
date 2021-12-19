<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="<?php echo site_url(); ?>" class="site_title"><i class="fa fa-linux"></i> <span>Desa Merbau</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="<?php echo base_url(); ?>assets/uploads/user/<?php echo $ipic; ?>" alt="" class="img-circle profile_img" style="width: 60px; height: 60px;">
          </div>
          <div class="profile_info">
            <span>Selamat Datang,</span>
            <h2><?php echo $ititle; ?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">

              <li><a href="<?php echo site_url('iprofil/'); ?>">
                <i class="fa fa-linux"></i> Profil Saya </a>
              </li>

              <li><a href="<?php echo site_url('ipost/'); ?>">
                <i class="fa fa-edit"></i> Berita </a>
              </li>

              <?php if ($this->session->userdata('category') == "admin") { ?>

              <li><a href="<?php echo site_url('iuser/'); ?>">
                <i class="fa fa-user"></i> User </a>
              </li>

              <li><a href="<?php echo site_url('icategory/'); ?>">
                <i class="fa fa-edit"></i> Kategori </a>
              </li>

              <li><a href="<?php echo site_url('imenu/'); ?>">
                <i class="fa fa-windows"></i> Menu </a>
              </li>

              <li><a href="<?php echo site_url('ifoto/'); ?>">
                <i class="fa fa-photo"></i> Foto Utama </a>
              </li>

              <li><a href="<?php echo site_url('irunning_text/'); ?>">
                <i class="fa fa-text-width"></i> Teks Berjalan </a>
              </li>

              <li><a href="<?php echo site_url('ifile/'); ?>">
                <i class="fa fa-file"></i> File </a>
              </li>

              <?php } ?>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu -->
      </div>
    </div>
