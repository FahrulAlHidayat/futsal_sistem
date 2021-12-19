<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    $level = $this->session->userdata('level');
    if ($level == 'pengelola') {
      $d = array (
        'table' => 'transaksi',
        'where' => array('id_pengelola' => $this->session->userdata('username') )
      );
      $transaksi = $this->Cms_model->getAll($d);
      $view = 'private/transaksi';
      $layout = 'private/layout/wrapper';
    } elseif($level == 'user') {
      $d = array (
        'table' => 'transaksi',
        'where' => array('id_user' => $this->session->userdata('username') )
      );
      $transaksi = $this->Cms_model->getAll($d);
      $view = 'public/transaksi';
      $layout = 'public/layout/wrapper';
    } else {
      redirect(site_url('home/'));
    }
    $data = array (
      'view' => $view,
      'transaksi' => $transaksi
    );
    $this->load->view($layout, $data);
  }

  public function detail($id_transaksi)
  {
    $level = $this->session->userdata('level');
    if ($level == 'pengelola') {
      $view = 'private/transaksidetail';
      $layout = 'private/layout/wrapper';
    } else {
      $view = 'public/transaksidetail';
      $layout = 'public/layout/wrapper';
    }
    $d = array (
      'table' => 'transaksi',
      'where' => array('id' => $id_transaksi)
    );
    $transaksi = $this->Cms_model->getDetail($d);
    $data = array (
      'view' => $view,
      'transaksi' => $transaksi
    );
    $this->load->view($layout, $data);
  }

  public function print($id)
  {
    ob_start();
    $d = array (
      'table' => 'transaksi',
      'where' => array('id' => $id)
    );
    $transaksi = $this->Cms_model->getDetail($d);
    $data = array (
      'transaksi' => $transaksi
    );
    $this->load->view('private/transaksicetak', $data);
    $html = ob_get_contents();
    ob_end_clean();
    require './vendor/autoload.php';
    // require_once('./assets/html2pdf/html2pdf.class.php');
    // $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', 0);
    $pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A7', 'en', true, 'UTF-8', 0);
    $pdf->WriteHTML($html);
    $pdf->Output('Transaksi.pdf', 'F');
    header("Content-type:application/pdf");
    echo file_get_contents("Transaksi.pdf");
  }

  public function hapus($id_transaksi)
  {
    $level = $this->session->userdata('level');
    if ($level != 'pengelola') {
      redirect(site_url('home/'));
    }
    $d = array (
      'table' => 'transaksi',
      'where' => array('id' => $id_transaksi, 'id_pengelola' => $this->session->userdata('username') )
    );
    $this->Cms_model->delete($d);
    $d = array (
      'table' => 'booking',
      'where' => array('id_transaksi' => $id_transaksi, 'id_pengelola' => $this->session->userdata('username') )
    );
    $this->Cms_model->delete($d);

    redirect(site_url('transaksi/'));
  }
}
