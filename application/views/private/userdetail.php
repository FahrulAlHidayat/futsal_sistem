<div class="container">
  <div class="box box-body">
    <div class="col-sm-9">
      <?php foreach ($user as $key => $v) {?>
      <h1 class="mt-4"><?php echo $v['nama']; ?></h1>
      <img class="img-fluid rounded" src="<?php echo base_url('assets/uploads/user/'.$v['foto']); ?>" alt="">
      <hr>
      <?php if ($this->level == 'admin') {?>
      <a href="<?php echo site_url('user/hapus/'.$v['username']); ?>" class="btn btn-danger" onclick="return(confirm('Yakin Akan Menghapus Data Ini ?'))"><i class="fa fa-trash"></i></a>
      <hr>
      <?php } ?>
      <?php if ($this->username == $v['username']) {?>
      <a href="<?php echo site_url('user/edit/'); ?>" class="btn btn-success" ><i class="fa fa-pencil"></i></a>
      <hr>
      <?php } ?>
      <p class="lead">@<?php echo $v['username']; ?></p>
      <p class="lead"><?php echo $v['level']; ?></p>
      <p class="lead"><?php echo $v['hp']; ?></p>
      <blockquote class="blockquote">
        <footer class="blockquote-footer"><?php echo $v['alamat']; ?></footer>
        <br>
      </blockquote>
      <hr>
      <?php } ?>
    </div>
  </div>
</div>
