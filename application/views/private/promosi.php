<?php foreach ($promosi as $key => $v) { ?>
<div class="col-md-4">
  <div class="box box-widget widget-user">
    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('assets/uploads/promosi/'.$v['foto']) ?>') center center;">
    </div>
    <div class="box-footer">
      <h3 class="widget-user-username"><?php echo $v['nama']; ?></h3>
      <h5 class="">&nbsp;</h3>
      <a href="<?php echo site_url('promosi/edit/'.$v['id']); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
      <a href="<?php echo site_url('promosi/hapus/'.$v['id']); ?>" class="btn btn-danger" onclick="return(confirm('Yakin Akan Menghapus Data Ini ?'))"><i class="fa fa-trash"></i></a>
      <a href="<?php echo site_url('promosi/detail/'.$v['id']); ?>" class="btn btn-info pull-right"><i class="fa fa-eye"></i></a>
    </div>
  </div>
</div>
<?php } ?>

<div class="col-md-4">
  <div class="box box-widget widget-user">
    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('assets/uploads/lapangan/tambah.jpg') ?>') center center;">
    </div>
    <div class="box-footer">
      <h3 class="widget-user-username">Tambah Promosi</h3>
      <h5 class="">&nbsp;</h3>
      <a href="<?php echo site_url('promosi/tambah/'); ?>" class="btn btn-primary form-control"><i class="fa fa-plus"></i> Tambah</a>
    </div>
  </div>
</div>
