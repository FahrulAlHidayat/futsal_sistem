<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $lapanganrow; ?></h3>
        <p>Lapangan</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-football"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $promosirow; ?></h3>
        <p>Promosi</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $transaksirow; ?></h3>
        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
    </div>
  </div>
</div>
<?php if ($this->level == 'admin') {?>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $pengelolarow; ?></h3>
        <p>Pengelola</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-person"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3><?php echo $userrow; ?></h3>
        <p>User</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-person-outline"></i>
      </div>
    </div>
  </div>
</div>
<?php } ?>
