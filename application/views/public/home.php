<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <br>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php
          $i = 0;
          foreach ($lapangan as $key => $v) {?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo "active"; } ?>"></li>
          <?php $i++; } ?>
        </ol>
        <div class="carousel-inner">
          <?php $i = 0; foreach ($lapangan as $key => $v) {?>
          <div class="carousel-item <?php if($i == 0){ echo "active"; } ?>">
            <img class="d-block w-100" src="<?php echo base_url('assets/uploads/lapangan/'.$v['foto']); ?>" alt="">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php echo $v['nama']; ?></h5>
              <p><?php echo $v['alamat']; ?></p>
            </div>
          </div>
          <?php $i++; } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <br>
    </div>
    <?php $this->load->view('public/side'); ?>
  </div>
  <hr>
    <h3 align="center">Promo</h3>
    <div class="row">
    <?php foreach ($promosi as $key => $v) { ?>
    <div class="col-sm-4 my-4">
      <div class="card fitcard">
        <img class="card-img-top" src="<?php echo base_url('assets/uploads/promosi/'.$v['foto']); ?>" alt="First slide">
        <div class="card-body">
          <h4 class="card-title"><?php echo $v['nama']; ?></h4>
          <p class="card-text">@<?php echo $v['id_pengelola'] ?></p>
        </div>
        <div class="card-footer">
          <a href="<?php echo site_url('promosi/detail/'.$v['id']); ?>" class="btn btn-primary pull-right">More</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
