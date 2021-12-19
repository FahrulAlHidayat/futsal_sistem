<div class="container">
  <div class="box box-body">
    <div class="col-sm-12">
      <h3 align="center">Tambah Lapangan</h2>
      <div class="col-md-12">
        <?php echo $this->session->flashdata('pesan'); ?>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('lapangan/tambah/'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">Nama Lapangan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" required>
          </div>
        </div>
        <div class="form-group">
          <label for="photo" class="col-sm-2 control-label">Foto Lapangan</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" name="photo" required>
          </div>
        </div>
        <div class="form-group">
          <label for="biaya" class="col-sm-2 control-label">Biaya / Jam</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="biaya" required>
          </div>
        </div>
        <div class="form-group">
          <label for="alamat" class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="alamat" required></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="deskripsi" required></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-6">
            <div id="canvas" style="height:300px; margin:10px;"></div>
            <p class="message">- Klik Pada Peta Untuk Mendapatkan Koordinat</p>
          </div>
        </div>
        <div class="form-group">
          <label for="lat" class="col-sm-2 control-label"> Lat </label>
          <div class="col-sm-6">
            <input type="text" name="lat" id="lat" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="lng" class="col-sm-2 control-label"> Lng </label>
          <div class="col-sm-6">
            <input type="text" name="lng" id="lng" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2"></div>
          <div class="col-sm-9">
            <input type="reset" class="btn btn-danger pull-left" name="reset" value="Reset">
            <input type="submit" class="btn btn-success pull-right" name="submit" value="Tambah">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
function initMap() {
  var myLatLng = new google.maps.LatLng(0.4662126, 101.353083);
  var myOptions = {
    zoom: 15,
    center:myLatLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map( document.getElementById("canvas"),myOptions);

  google.maps.event.addListener(map, 'click', function( event ){
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcmIWL26u4CFFp_ghiyHyADRoCJvG6U4&language=id&callback=initMap"async defer></script>
