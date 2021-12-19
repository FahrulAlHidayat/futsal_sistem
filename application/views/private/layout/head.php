<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>futsal</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themeadmin/plugins/datatables/dataTables.bootstrap.css">
  <link id="bsdp-css" href="<?php echo base_url(); ?>assets/theme/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
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
    // if ($this->level != 'admin' || $this->level != 'pengelola') {
    //   redirect(site_url());
    // }
  ?>
