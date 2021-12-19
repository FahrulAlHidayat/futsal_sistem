<header class="main-header">
  <a href="<?php echo site_url(); ?>" class="logo">
    <span class="logo-mini"><b>S</b>I</span>
    <span class="logo-lg"><b>SISTEM</b> INFORMASI</span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url('assets/uploads/user/'.$this->foto);?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $this->username; ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo base_url('assets/uploads/user/'.$this->foto);?>" class="img-circle" alt="User Image">
              <p>
                <?php echo $this->nama; ?>
                <small><?php echo $this->level; ?></small>
              </p>
            </li>
            
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
