<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <h1 class="mt-4">Pilih Lapangan dan Tanggal</h1>
      <form class="form-horizontal" action="<?php echo site_url('jadwal/detail/') ?>" method="post">
        <div class="form-group">
          <div class="col-sm-9">
            <select class="custom-select form-control" name="lapangan">
                <option value="0" selected>Pilih Lapangan</option>
              <?php foreach ($lapangan as $key => $v) { ?>
                <option value="<?php echo $v['id'] ?>"><?php echo $v['nama']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <input type="text" class="form-control pull-right" id="datepicker" name="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="Pilih Tanggal">
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="col-sm-9">
            <input type="submit" name="submit" class="btn btn-info" value="Lihat Jadwal">
          </div>
        </div>
      </form>
    </div>
    <?php $this->load->view('public/side'); ?>
  </div>
</div>
