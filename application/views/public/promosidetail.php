<?php foreach ($promosi as $key => $v) {?>
<div class="container">
  <div class="box box-body">
    <div class="col-sm-12">
      <h1 class="mt-4"><?php echo $v['nama']; ?></h1>
      <p class="lead">by <a href="#"><?php echo $v['id_pengelola']; ?></a></p>
      <img class="img-fluid rounded" src="<?php echo base_url('assets/uploads/promosi/'.$v['foto']); ?>" alt="">
      <hr>
      <blockquote class="blockquote">
        <p class="mb-0"><?php echo $v['deskripsi']; ?></p>
      </blockquote>
      <hr>
    </div>
  </div>
</div>
<?php } ?>
