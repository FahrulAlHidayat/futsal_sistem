<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if ($this->session->userdata('level') == 'pengelola') {
      $d = array('table' => 'lapangan', 'where' => array('id_pengelola' => $this->session->userdata('username')));
      $lapanganrow = $this->Cms_model->getRow($d);
      $d = array('table' => 'promosi', 'where' => array('id_pengelola' => $this->session->userdata('username')));
      $promosirow = $this->Cms_model->getRow($d);
      $d = array('table' => 'transaksi', 'where' => array('id_pengelola' => $this->session->userdata('username')) );
      $transaksirow = $this->Cms_model->getRow($d);
      $data = array (
        'view' => 'private/dashboard',
        'lapanganrow' => $lapanganrow,
        'promosirow' => $promosirow,
        'transaksirow' => $transaksirow
      );
    } elseif($this->session->userdata('level') == 'admin') {
      $d = array('table' => 'lapangan');
      $lapanganrow = $this->Cms_model->getRow($d);
      $d = array('table' => 'promosi');
      $promosirow = $this->Cms_model->getRow($d);
      $d = array('table' => 'transaksi');
      $transaksirow = $this->Cms_model->getRow($d);
      $d = array('table' => 'user', 'where' => array('level' => 'pengelola'));
      $pengelolarow = $this->Cms_model->getRow($d);
      $d = array('table' => 'user', 'where' => array('level' => 'user'));
      $userrow = $this->Cms_model->getRow($d);

      $data = array (
        'view' => 'private/dashboard',
        'lapanganrow' => $lapanganrow,
        'promosirow' => $promosirow,
        'transaksirow' => $transaksirow,
        'pengelolarow' => $pengelolarow,
        'userrow' => $userrow
      );
    }
    $this->load->view('private/layout/wrapper', $data);
  }

}
