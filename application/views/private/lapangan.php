<?php foreach ($lapangan as $key => $v) { ?>
<div class="col-md-4">
  <div class="box box-widget widget-user">
    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('assets/uploads/lapangan/'.$v['foto']) ?>') center center;">
    </div>
    <div class="box-footer">
      <h3 class="widget-user-username"><?php echo $v['nama']; ?></h3>
      <h5 class=""><?php echo $v['alamat'] ?></h3>
      <a href="<?php echo site_url('lapangan/edit/'.$v['id']); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
      <a href="<?php echo site_url('lapangan/hapus/'.$v['id']); ?>" class="btn btn-danger" onclick="return(confirm('Yakin Akan Menghapus Data Ini ?'))"><i class="fa fa-trash"></i></a>
      <a href="<?php echo site_url('jadwal/kelola/'.$v['id']); ?>" class="btn btn-warning"><i class="fa fa-clock-o"></i></a>
      <a href="<?php echo site_url('lapangan/detail/'.$v['id']); ?>" class="btn btn-info pull-right"><i class="fa fa-eye"></i></a>
    </div>
  </div>
</div>
<?php } ?>

<div class="col-md-4">
  <div class="box box-widget widget-user">
    <div class="widget-user-header bg-black" style="background: url('https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/256x256/plain/navigate_plus.png') center center;">
    </div>
    <div class="box-footer">
      <h3 class="widget-user-username">Tambah Lapangan</h3>
      <h5 class="">&nbsp;</h3>
      <a href="<?php echo site_url('lapangan/tambah/'); ?>" class="btn btn-primary form-control"><i class="fa fa-plus"></i> Tambah</a>
    </div>
  </div>
</div>
