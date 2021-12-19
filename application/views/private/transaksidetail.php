<div class="container">
  <div class="box box-body">
    <div class="col-sm-9">
      <div class="">
        <br>
        <h3 align="center">Detail Transaksi</h3>
        <table class="table">
          <?php foreach ($transaksi as $key => $v) {
            $time = explode('|', $v['time']);
            $d = array('table' => 'lapangan', 'where' => array('id' => $v['id_lapangan'] ));
            $lapangan = $this->Cms_model->getDetail($d);
            foreach ($lapangan as $key => $l) {
              $v['id_lapangan'] = $l['nama'];
            }
            ?>
          <tr>
            <th class="col-md-3">ID Transaksi</th>
            <td><?php echo $v['id']; ?></td>
          </tr>
          <tr>
            <th>Lapangan</th>
            <td><?php echo $v['id_lapangan']; ?></td>
          </tr>
          <tr>
            <th>Pengelola</th>
            <td><?php echo $v['id_pengelola']; ?></td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td><?php echo $v['date']; ?></td>
          </tr>
          <tr>
            <th>Jam</th>
            <td><?php
            foreach ($time as $t) {
              echo '- '.$t.'<br>';
            }
            ?></td>
          </tr>
          <tr>
            <th>Biaya</th>
            <td>Rp<?php echo number_format($v['total_biaya']); ?></td>
          </tr>
          <tr>
            <th></th>
            <td><a href="<?php echo site_url('transaksi/print/'.$v['id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</a>
                <a href="<?php echo site_url('transaksi/hapus/'.$v['id']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <br>
    </div>
  </div>
</div>
