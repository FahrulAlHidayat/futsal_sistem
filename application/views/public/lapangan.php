<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <div class="row">
        <?php foreach ($lapangan as $key => $v) {?>
        <div class="col-sm-4 my-4">
          <div class="card fitcard">
            <img class="card-img-top" src="<?php echo base_url('assets/uploads/lapangan/'.$v['foto']); ?>" alt="">
            <div class="card-body">
              <h4 class="card-title"><?php echo $v['nama']; ?></h4>
              <p class="card-text"><?php echo $v['alamat']; ?></p>
            </div>
            <div class="card-footer">
              <a href="<?php echo site_url('lapangan/detail/'.$v['id']); ?>" class="btn btn-info pull-right">Detail</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <br>
    </div>
    <?php $this->load->view('public/side'); ?>
  </div>
</div>
