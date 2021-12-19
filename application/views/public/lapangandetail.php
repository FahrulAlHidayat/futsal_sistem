<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <?php foreach ($lapangan as $key => $v) {?>
      <h1 class="mt-4"><?php echo $v['nama']; ?></h1>
      <p class="lead">by <a href="#">@<?php echo $v['id_pengelola']; ?></a></p>
      <img class="img-fluid rounded" src="<?php echo base_url('assets/uploads/lapangan/'.$v['foto']); ?>" alt="">
      <hr>
      <div id="canvas" style="height:300px; margin:10px;"></div>
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
      <?php } ?>
    </div>
    <?php $this->load->view('public/side'); ?>
  </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcmIWL26u4CFFp_ghiyHyADRoCJvG6U4&language=id&callback=initMap"async defer></script>
