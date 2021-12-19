<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <div class="">
        <br>
        <h3 align="center">Transaksi Saya</h3>
        <table class="table">
          <tr>
            <th>ID Transaksi</th>
            <th>Lapangan</th>
            <th>Pengelola</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Biaya</th>
            <th></th>
          </tr>
          <?php foreach ($transaksi as $key => $v) {
            $time = explode('|', $v['time']);
            $d = array('table' => 'lapangan', 'where' => array('id' => $v['id_lapangan'] ));
            $lapangan = $this->Cms_model->getDetail($d);
            foreach ($lapangan as $key => $l) {
              $v['id_lapangan'] = $l['nama'];
            }
            ?>
          <tr>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['id_lapangan']; ?></td>
            <td><?php echo $v['id_pengelola']; ?></td>
            <td><?php echo $v['date']; ?></td>
            <td><?php
              foreach ($time as $t) {
                echo '- '.$t.'<br>';
              }
            ?></td>
            <td>Rp<?php echo number_format($v['total_biaya']); ?></td>
            <td><a href="<?php echo site_url('transaksi/detail/'.$v['id']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detail</a>
                <a href="<?php echo site_url('transaksi/print/'.$v['id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</a></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <br>
    </div>
    <?php $this->load->view('public/side'); ?>
  </div>
</div>
