<div class="container">
  <div class="box box-body">
    <div class="col-sm-12">
      <h3 align="center">Edit Promosi</h2>
      <div class="col-md-12">
        <?php echo $this->session->flashdata('pesan'); ?>
      </div>
      <?php foreach ($promosi as $key => $v) { ?>
      <form class="form-horizontal" action="<?php echo site_url('promosi/edit/'.$v['id']); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">Nama Promosi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" value="<?php echo $v['nama']; ?>"required>
          </div>
        </div>
        <div class="form-group">
          <label for="photo" class="col-sm-2 control-label">Foto Promosi</label>
          <div class="col-sm-9">
            <?php if ($v['foto'] != NULL | $v['foto'] != '') { ?>
              <img src="<?php echo base_url('assets/uploads/promosi/'.$v['foto']) ?>" alt="" class="img-responsive" style="max-width:200px;">
            <?php } ?>
            <br>
            <input type="file" class="form-control" name="photo">
            <input type="hidden" name="currentphoto" value="<?php echo $v['foto']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="deskripsi" required><?php echo $v['deskripsi']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2"></div>
          <div class="col-sm-9">
            <input type="reset" class="btn btn-danger pull-left" name="reset" value="Reset">
            <input type="submit" class="btn btn-success pull-right" name="submit" value="Edit">
          </div>
        </div>
      </form>
      <?php } ?>
    </div>
  </div>
</div>
