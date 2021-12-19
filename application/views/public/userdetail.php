<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <?php foreach ($user as $key => $v) {?>
      <h1 class="mt-4"><?php echo $v['nama']; ?></h1>
      <img class="img-fluid rounded" src="<?php echo base_url('assets/uploads/user/'.$v['foto']); ?>" alt="">
      <hr>
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
    <?php $this->load->view('public/side'); ?>
  </div>
</div>
