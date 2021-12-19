<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    $level = $this->session->userdata('level');
    if ($level == 'pengelola') {
      redirect(site_url('lapangan/'));
    } else {
      $d = array (
        'table' => 'lapangan'
      );
      $lapangan = $this->Cms_model->getAll($d);
      $view = 'public/jadwal';
      $layout = 'public/layout/wrapper';
    }
    $data = array (
      'view' => $view,
      'lapangan' => $lapangan
    );
    $this->load->view($layout, $data);
  }

  public function detail()
  {
    $idlapangan = $this->input->post('lapangan');
    $date = $this->input->post('date');
    if ( !$idlapangan || !$date || $idlapangan == 0) {
      redirect(site_url('jadwal/'));
    }
    $this->form_validation->set_rules('time', 'Time', 'required');

    if ($this->form_validation->run() === FALSE) {
      $d = array (
        'table' => 'lapangan',
        'where' => array('id' => $idlapangan )
      );
      $lapangan = $this->Cms_model->getDetail($d);
      $d = array (
        'table' => 'booking',
        'where' => array('id_lapangan' => $idlapangan, 'date' => $date)
      );
      $book = $this->Cms_model->getAll($d);
      $data = array (
        'view' => 'public/jadwaldetail',
        'book' => $book,
        'lapangan' => $lapangan,
        'date' => $date
      );
      $this->load->view('public/layout/wrapper', $data);
    } else {
      $alltime = $this->input->post('time');
      $time = explode('|', $alltime);
      $time = array_filter($time);
      $time = array_unique($time);
      $freq = count($time);
      $biaya = $this->input->post('biaya') * $freq;

      $data = array (
        'id_lapangan' => $this->input->post('lapangan'),
        'id_pengelola' => $this->input->post('id_pengelola'),
        'id_user' => $this->session->userdata('username'),
        'date' => $this->input->post('date'),
        'time' => $alltime,
        'total_biaya'=> $biaya
      );
      $this->db->insert('transaksi', $data);
      $id_transaksi = $this->db->insert_id();

      foreach ($time as $v) {
        $data = array (
          'id_user' => $this->session->userdata('username'),
          'id_transaksi' => $id_transaksi,
          'id_lapangan' => $this->input->post('lapangan'),
          'id_pengelola' => $this->input->post('id_pengelola'),
          'date' => $this->input->post('date'),
          'time' => $v,
          'biaya'=> $this->input->post('biaya')
        );
        $d = array (
          'table' => 'booking',
          'data'  => $data
        );
        $this->Cms_model->add($d);
      }

      redirect(site_url('transaksi/detail/'.$id_transaksi));
    }
  }

  public function kelola($id)
  {
    $level = $this->session->userdata('level');
    if ($level != 'pengelola') {
      redirect(site_url('home/'));
    }
    $date = $this->input->post('date');
    if ( !$date ) {
      $date = Date('Y-m-d');
    }

    $d = array (
      'table' => 'transaksi',
      'where' => array('id_lapangan' => $id, 'date' => $date)
    );
    $book = $this->Cms_model->getAll($d);
    $d = array (
      'table' => 'lapangan',
      'where' => array('id' => $id, 'id_pengelola' => $this->session->userdata('username'))
    );
    $lapangan = $this->Cms_model->getAll($d);
    $data = array (
      'view' => 'private/jadwaldetail',
      'book' => $book,
      'date' => $date,
      'lapangan' => $lapangan
    );
    $this->load->view('private/layout/wrapper', $data);
  }

}
