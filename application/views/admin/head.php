<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--    
	<meta name="viewport" content="width=device-width, initial-scale=1">
-->
    <title> <?php echo $title; ?> </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <?php /*
    */?>
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/stylesadmin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">

  <?php
    $i = $this->session->userdata('i');
    $d = array (
      'table' => 'user',
      'where' => array('username' => $i)
    );
    $user = $this->Cms_model->getDetail($d);
    foreach ($user as $key => $v) {
      $iusername = $v['username'];
      $ititle = $v['title'];
      $iemail = $v['email'];
      if ($v['pic'] == NULL) {
        $ipic = 'ksl.jpg';
      } else {
        $ipic = $v['pic'];
      }
      $icategory = $v['category'];
      $ibio = $v['bio'];
      $iquote = $v['quote'];
    }

  ?>
