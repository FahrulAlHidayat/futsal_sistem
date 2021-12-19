<?php foreach ($lapangan as $key => $v) {?>
<div class="container">
  <div class="box box-body">
    <div class="col-sm-12">
      <h1 class="mt-4"><?php echo $v['nama']; ?></h1>
      <p class="lead">by <a href="#"><?php echo $v['id_pengelola']; ?></a></p>
      <img class="img-fluid rounded" src="<?php echo base_url('assets/uploads/lapangan/'.$v['foto']); ?>" alt="">
      <hr>
      <?php if ($this->username == $v['id_pengelola']) {?>
      <a href="<?php echo site_url('lapangan/edit/'.$v['id']); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
      <a href="<?php echo site_url('lapangan/hapus/'.$v['id']); ?>" class="btn btn-danger" onclick="return(confirm('Yakin Akan Menghapus Data Ini ?'))"><i class="fa fa-trash"></i></a>
      <a href="<?php echo site_url('jadwal/kelola/'.$v['id']); ?>" class="btn btn-warning"><i class="fa fa-clock-o"></i></a>
      <hr>
      <?php } ?>
      <div id="canvas" style="height:300px; max-width:600px; margin:10px;"></div>
      <script type="text/javascript">
      function initMap() {
        var myLatLng = new google.maps.LatLng(<?php echo $v['lat']; ?>, <?php echo $v['lng'] ?>);
        var myOptions = {
          zoom: 15,
          center:myLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map( document.getElementById("canvas"),myOptions);

        var marker = new google.maps.Marker({
          position: myLatLng,
          zoom: 13,
          map: map
        });
      }
      </script>
      <hr>
      <p class="lead">Rp<?php echo number_format($v['biaya']); ?>/jam</p>
      <blockquote class="blockquote">
        <footer class="blockquote-footer"><?php echo $v['alamat']; ?></footer>
        <br>
        <p class="mb-0"><?php echo $v['deskripsi']; ?></p>
      </blockquote>
      <hr>
    </div>
  </div>
</div>
<?php } ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcmIWL26u4CFFp_ghiyHyADRoCJvG6U4&language=id&callback=initMap"async defer></script>
