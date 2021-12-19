<div class="col-md-3">
  <div class="card my-4">
    <?php if ($this->session->userdata('logged_in')) { ?>
      <h5 class="card-header text-center"><?php echo $this->nama; ?></h5>
      <div class="card-body">
        <img src="<?php echo base_url('assets/uploads/user/'.$this->foto); ?>" class="img-fluid rounded" alt="">
        <p align="center">@<?php echo $this->username; ?><br> <?php echo $this->level; ?></p>
        <div class="pull-center" style="display: flex;align-items:center;justify-content:center;">
        <a href="<?php echo site_url('user/edit/'); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
        <a href="<?php echo site_url('user/profil/'.$this->username); ?>" class="btn btn-info"><i class="fa fa-user"></i></a>
        <?php if ($this->level != 'user') { ?>
        <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-success"><i class="fa fa-dashboard"></i></a>
        <?php } ?>
        <a href="<?php echo site_url('home/logout'); ?>" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
        </div>
      </div>
    <?php } else { ?>
    <h5 class="card-header text-center">Login</h5>
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo site_url('home/login/'); ?>" method="post">
      <div class="input-group">
        <input type="text" class="form-control" name="username" placeholder="Username">
      </div>
      <br>
      <div class="input-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <br>
      <div class="input-group" style="display: flex;align-items:center;justify-content:center;">
        <input type="submit" class="btn btn-success" name="submit" value="Login">
        &nbsp;
        <a href="<?php echo site_url('home/daftar'); ?>" class="btn btn-info">Daftar</a>
      </div>
    </form>
    </div>
    <?php } ?>
  </div>
  <div class="card my-4" style="text-align: center;">
    <h5 class="card-header text-center">Contact Us</h5>
    <address>
      <strong>Admin</strong>
      <br>MARPOYAN
      <br>
    </address>
    <address>
      <abbr title="Phone">Phone :</abbr>
      082390945175
      <br>
      <abbr title="Email">Email:</abbr>
      <a href="mailto:#">fahrulalhidayat2001@gmail.com</a>
    </address>
  </div>
</div>
