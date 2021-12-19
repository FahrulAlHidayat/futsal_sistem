<div class="container">
  <div class="box box-body">
    <div class="col-md-11">
      <?php foreach ($lapangan as $key => $l) { ?>
      <h1 class="mt-4"><?php echo $l['nama']; ?> - <?php echo $date; ?></h1>
      <form class="form-horizontal" action="<?php echo site_url('jadwal/kelola/'.$l['id']); ?>" method="post">
        <div class="form-group col-md-11">
          <input type="text" class="pull-left" id="datepicker" name="date" placeholder="Pilih Tanggal" value="<?php echo $date; ?>">
          <input type="submit" name="submit" class="btn btn-sm btn-info" value="Lihat Jadwal">
        </div>
      </form>
      <br>
      <br>
      <div class="table-responsive col-md-12">
        <table class="table">
          <tr>
          <?php
          $open_time = strtotime("07:00");
          $close_time = strtotime("23:00");
          $no = 1;
          for( $i=$open_time; $i<=$close_time; $i+=3600) {?>
            <th><?php echo date("H:i",$i); ?></th>
          <?php } ?>
          </tr>
          <tr>
            <?php for( $i=$open_time; $i<=$close_time; $i+=3600) {
            $jam = date("H:i:s",$i);
            $d = array (
              'table' => 'booking',
              'where' => array('id_lapangan' => $l['id'], 'date' => $date, 'time' => $jam)
            );
            $row = $this->Cms_model->getRow($d);
            if ($row == 0) {?>
              <td> <button type="button" class="btn btn-success"> + </button> </td>
            <?php } else { ?>
              <td> <button type="button" class="btn btn-danger"> - </button> </td>
            <?php } ?>
            <?php $no++; } ?>
          </tr>
        </table>
      </div>
      <div class="col-md-12">
        <table class="table">
          <tr>
            <th>ID Transaksi</th>
            <th>User</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Biaya</th>
            <th></th>
          </tr>
          <?php
          $id_transaksi = 0;
          foreach ($book as $key => $v) {
            $time = explode('|', $v['time']);
          ?>
          <tr>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['id_user']; ?></td>
            <td><?php echo $v['date']; ?></td>
            <td><?php
            foreach ($time as $t) {
              echo $t.'<br>';
            }
            ?></td>
            <td>Rp<?php echo number_format($v['total_biaya']); ?></td>
            <td><a href="<?php echo site_url('transaksi/detail/'.$v['id']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detail</a></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <br>
      <?php } ?>
    </div>
  </div>
</div>
