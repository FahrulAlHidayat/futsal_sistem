<?php
$url = $this->uri->segment(1);
if ($url == '') {
  $url = 'home';
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('home/'); ?>">Sistem Informasi Penyewaan Lapangan Futsal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if ($url == 'home') {echo "active";} ?>">
          <a class="nav-link" href="<?php echo site_url('home/'); ?>">Beranda
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <?php if ($this->level == 'user') { ?>
          <li class="nav-item <?php if ($url == 'transaksi') {echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url('transaksi/'); ?>">Transaksi</a>
          </li>
        <?php } elseif ($this->level == 'admin' || $this->level == 'pengelola') { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('dashboard/'); ?>">Dashboard</a>
          </li>
        <?php } ?>
        <li class="nav-item <?php if ($url == 'lapangan') {echo "active";} ?>">
          <a class="nav-link" href="<?php echo site_url('lapangan/'); ?>">Lapangan</a>
        </li>
        <li class="nav-item <?php if ($url == 'jadwal') {echo "active";} ?>">
          <a class="nav-link" href="<?php echo site_url('jadwal/'); ?>">Jadwal</a>
        </li>
        <li class="nav-item <?php if ($url == 'pesan') {echo "active";} ?>">
          <a class="nav-link" href="#">Cara Pemesanan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
