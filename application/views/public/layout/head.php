<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Futsal</title>
  <script src="<?php echo base_url(); ?>assets/theme/jquery-3.2.1.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/theme/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link id="bsdp-css" href="<?php echo base_url(); ?>assets/theme/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">
</head>
<body>
  <?php
    $d = array (
      'table' => 'user',
      'where' => array('username' => $this->session->userdata('username'))
    );
    $user_login = $this->Cms_model->getDetail($d);
    foreach ($user_login as $key => $v) {
      $this->username = $v['username'];
      $this->nama = $v['nama'];
      $this->foto = $v['foto'];
      $this->hp = $v['hp'];
      $this->alamat = $v['alamat'];
      $this->level = $this->session->userdata('level');
    }
  ?>
