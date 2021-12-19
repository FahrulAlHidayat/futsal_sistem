<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/uploads/user/'.$this->foto); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->nama ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="<?php echo site_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <?php if ($this->level == 'pengelola') { ?>
      <li><a href="<?php echo site_url('user/profil/'.$this->username); ?>"><i class="fa fa-user"></i> Profil</a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-soccer-ball-o "></i> <span>Lapangan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('lapangan/tambah/'); ?>"><i class="fa fa-plus"></i> Tambah </a></li>
          <li><a href="<?php echo site_url('lapangan/'); ?>"><i class="fa fa-user"></i> Lapangan Saya </a></li>
          <?php $d = array (
            'table' => 'lapangan',
            'where' => array('id_pengelola' => $this->username )
          );
          $lapangan = $this->Cms_model->getAll($d);
          foreach ($lapangan as $key => $v) { ?>
            <li><a href="<?php echo site_url('lapangan/detail/'.$v['id']); ?>"><i class="fa fa-soccer-ball-o"></i> <?php echo $v['nama'] ?> </a></li>
          <?php } ?>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-clock-o"></i> <span>Jadwal</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php
          foreach ($lapangan as $key => $v) { ?>
            <li><a href="<?php echo site_url('jadwal/kelola/'.$v['id']); ?>"><i class="fa fa-soccer-ball-o"></i> <?php echo $v['nama'] ?> </a></li>
          <?php } ?>
        </ul>
      </li>
      <li><a href="<?php echo site_url('promosi/'); ?>"><i class="fa fa-file-text-o"></i> Promosi</a></li>
      <li><a href="<?php echo site_url('transaksi/'); ?>"><i class="fa fa-file-text-o"></i> Transaksi</a></li>
      <?php } ?>
      <?php if ($this->level == 'admin') { ?>
        <li><a href="<?php echo site_url('user/'); ?>"><i class="fa fa-user"></i> User</a></li>
      <?php } ?>
      <li><a href="<?php echo base_url('home/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
  </section>
</aside>
