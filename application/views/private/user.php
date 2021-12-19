<div class="row col-md-12">
<h3>&nbsp;&nbsp;Pengelola</h3>
<?php foreach ($user as $key => $v) {
if ($v['level'] == 'pengelola') {?>

<div class="col-md-4">
  <div class="box box-widget widget-user">
    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('assets/uploads/user/'.$v['foto']) ?>') center center;">
    </div>
    <div class="widget-user-image">
      <img class="img-circle" src="<?php echo base_url('assets/uploads/user/'.$v['foto']) ?>" alt="">
    </div>
    <div class="box-footer">
      <h3 class="widget-user-username"><?php echo $v['nama']; ?></h3>
      <h5 class=""><?php echo $v['alamat'] ?></h3>
      <a href="<?php echo site_url('user/hapus/'.$v['username']); ?>" class="btn btn-danger" onclick="return(confirm('Yakin Akan Menghapus Data Ini ?'))"><i class="fa fa-trash"></i></a>
      <a href="<?php echo site_url('user/profil/'.$v['username']); ?>" class="btn btn-info pull-right"><i class="fa fa-eye"></i></a>
    </div>
  </div>
</div>
<?php }
    } ?>

<div class="col-md-4">
  <div class="box box-widget widget-user">
    <div class="widget-user-header bg-black" style="background: url('https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/256x256/plain/navigate_plus.png') center center;">
    </div>
    <div class="box-footer">
      <h3 class="widget-user-username">Tambah Pengelola</h3>
      <h5 class="">&nbsp;</h3>
      <a href="<?php echo site_url('user/tambah/'); ?>" class="btn btn-primary form-control"><i class="fa fa-plus"></i> Tambah</a>
    </div>
  </div>
</div>
</div>
<div class="row col-md-12">
<hr>
<h3>&nbsp;&nbsp;User</h3>
<?php foreach ($user as $key => $v) {
if ($v['level'] == 'user') {?>

<div class="col-md-4">
  <div class="box box-widget widget-user">
    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('assets/uploads/user/'.$v['foto']) ?>') center center;">
    </div>
    <div class="widget-user-image">
      <img class="img-circle" src="<?php echo base_url('assets/uploads/user/'.$v['foto']) ?>" alt="">
    </div>
    <div class="box-footer">
      <h3 class="widget-user-username"><?php echo $v['nama']; ?></h3>
      <h5 class=""><?php echo $v['alamat'] ?></h3>
      <a href="<?php echo site_url('user/hapus/'.$v['username']); ?>" class="btn btn-danger" onclick="return(confirm('Yakin Akan Menghapus Data Ini ?'))"><i class="fa fa-trash"></i></a>
      <a href="<?php echo site_url('user/profil/'.$v['username']); ?>" class="btn btn-info pull-right"><i class="fa fa-eye"></i></a>
    </div>
  </div>
</div>
<?php }
    } ?>
</div>
