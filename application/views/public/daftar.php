<div class="container">
  <div class="col-md-12">
    <br>
    <center>
    <div class="col-md-12">
      <?php echo $this->session->flashdata('pesan'); ?>
    </div>
    <form class="form-horizontal" action="<?php echo site_url('home/daftar/'); ?>" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="username" required>
        </div>
      </div>

      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
  			<div class="col-sm-9">
          <input type="password" class="form-control" name="password" required>
        </div>
      </div>

      <div class="form-group">
        <label for="nama" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="nama" required>
        </div>
      </div>

      <div class="form-group">
        <label for="hp" class="col-sm-2 control-label">No. Handphone</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="hp" required>
        </div>
      </div>

      <div class="form-group">
        <label for="photo" class="col-sm-2 control-label">Foto</label>
        <div class="col-sm-9">
          <input type="file" class="form-control" name="photo" id="photo" required>
        </div>
      </div>

      <div class="form-group">
        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-9">
          <textarea class="form-control" name="alamat" required></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-9">
          <input type="submit" class="btn btn-success" name="daftar" value="Daftar">
          <a href="<?php echo site_url('home'); ?>" class="btn btn-info">Login</a>
        </div>
      </div>

    </form>

  </div>
</div>
