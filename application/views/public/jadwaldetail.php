<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <?php foreach ($lapangan as $key => $l) { ?>
      <h1 class="mt-4"><?php echo $l['nama']; ?> - <?php echo $date; ?></h1>
      <a href="<?php echo site_url('jadwal/'); ?>" class="btn btn-danger"> Pilih Kembali Lapangan dan Tanggal </a>
      <br>
      <br>
      <div class="table-responsive">
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
              <td> <button type="button" class="btn btn-success" id="btn_<?php echo $no; ?>" time="<?php echo date("H:i:s",$i); ?>" onclick="addtime('<?php echo date("H:i:s",$i); ?>', '<?php echo $no; ?>')"> + </button> </td>
            <?php } else { ?>
              <td> <button type="button" class="btn btn-danger" id="btn_<?php echo $no; ?>"> - </button> </td>
            <?php } ?>
            <?php $no++; } ?>
          </tr>
        </table>
      </div>
      <br>
      <div class="row">
      <form class="form-horizontal" action="<?php echo site_url('jadwal/detail/'); ?>" method="post">
        <input type="hidden" name="lapangan" value="<?php echo $l['id']; ?>">
        <input type="hidden" name="id_pengelola" value="<?php echo $l['id_pengelola']; ?>">
        <input type="hidden" name="biaya" value="<?php echo $l['biaya']; ?>">
        <input type="hidden" name="date" value="<?php echo $date; ?>">
        <input type="hidden" name="time" id="time" value="">
        <?php if ($this->level != 'user') {?>
          <input type="button" name="button" class="btn btn-info" value="Pesan" onclick="alert('Silahkan Login Sebagai User')">
        <?php } else { ?>
          <input type="submit" name="submit" id="pesan" class="btn btn-info" value="Pesan">
        <?php } ?>
      </form>
      &nbsp; <button type="button" class="btn btn-danger" onclick="reset()">Reset</button>
      </div>
      <?php } ?>
    </div>
    <?php $this->load->view('public/side'); ?>
  </div>
</div>
<script type="text/javascript">
  function addtime(newtime, id) {
    var value = document.getElementById('time').getAttribute('value');
    value = value+''+newtime+'|';
    document.getElementById('time').value = value;
    document.getElementById('btn_'+id).className = "btn btn-warning";
  }
  function reset() {
    document.getElementById('time').value = '';
    for (var i = 1; i < <?php echo $no; ?>; i++) {
      var tombol = document.getElementById('btn_'+i).getAttribute('class');
      if (tombol == 'btn btn-warning') {
        document.getElementById('btn_'+i).className = "btn btn-success";
      }

    }
  }
</script>
