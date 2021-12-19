<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Futsal</title>
  <script src="<?php echo base_url(); ?>assets/theme/jquery-3.2.1.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/theme/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <script src="<?php echo base_url(); ?>assets/theme/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
  <div class="container">
    <div class="col-md-11">
      <div class="">
        <br>
        <h3 align="center" style="color:green;">SISTEM INFORMASI</h3>
        <h4 align="center" style="color:green;">PENYEWAAN LAPANGAN FUTSAL</h4>
        <table class="table col-md-12" cellspacing="10">
          <?php foreach ($transaksi as $key => $v) {
            $time = explode('|', $v['time']);
            $d = array('table' => 'lapangan', 'where' => array('id' => $v['id_lapangan'] ));
            $lapangan = $this->Cms_model->getDetail($d);
            foreach ($lapangan as $key => $l) {
              $v['id_lapangan'] = $l['nama'];
            }
            ?>
          <tr>
            <th></th>
            <td>--------------------------</td>
            <td>--------------------------</td>
          </tr>
          <tr>
            <th class="col-md-6" align="right" colspan="2">ID Transaksi</th>
            <td><?php echo $v['id']; ?></td>
          </tr>
          <tr>
            <th align="right" colspan="2">Lapangan</th>
            <td><?php echo $v['id_lapangan']; ?></td>
          </tr>
          <tr>
            <th align="right" colspan="2">Pengelola</th>
            <td><?php echo $v['id_pengelola']; ?></td>
          </tr>
          <tr>
            <th align="right" colspan="2">Pelanggan</th>
            <td><?php echo $v['id_user']; ?></td>
          </tr>
          <tr>
            <th align="right" colspan="2">Tanggal</th>
            <td><?php echo $v['date']; ?></td>
          </tr>
          <tr>
            <th align="right" colspan="2">Jam</th>
            <td><?php
            foreach ($time as $t) {
              echo '- '.$t.'<br>';
            }
            ?></td>
          </tr>
          <tr>
            <th align="right" colspan="2">Biaya</th>
            <td>Rp<?php echo number_format($v['total_biaya']); ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <br>
    </div>
  </div>
</div>

</body>
</html>
