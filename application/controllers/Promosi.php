<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promosi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    $level = $this->session->userdata('level');
    if ($level != 'pengelola') {
      redirect(site_url('home/'));
    }
    $d = array (
      'table' => 'promosi',
      'where' => array('id_pengelola' => $this->session->userdata('username') )
    );
    $promosi = $this->Cms_model->getAll($d);
    $data = array (
      'view' => 'private/promosi',
      'promosi' => $promosi
    );
    $this->load->view('private/layout/wrapper', $data);
  }

  public function detail($id)
  {
    $level = $this->session->userdata('level');
    if ($level == 'pengelola') {
      $view = 'private/promosidetail';
      $layout = 'private/layout/wrapper';
    } else {
      $view = 'public/promosidetail';
      $layout = 'public/layout/wrapper';
    }
    $d = array (
      'table' => 'promosi',
      'where' => array('id' => $id )
    );
    $promosi = $this->Cms_model->getDetail($d);
    $data = array (
      'view' => $view,
      'promosi' => $promosi
    );
    $this->load->view($layout, $data);
  }

  public function tambah()
  {
    $level = $this->session->userdata('level');
    if ($level != 'pengelola') {
      redirect(site_url('home/'));
    }
    $this->form_validation->set_rules('nama', 'Nama', 'required');
      if ($this->form_validation->run() === FALSE) {
      $data = array (
        'view' => 'private/promositambah'
      );
      $this->load->view('private/layout/wrapper', $data);
    } else {
      $this->load->library('upload');
      $photo = $this->input->post('photo');
      $namafile = url_title($this->input->post('photo'));
      $config = array
      (
        'upload_path' => './assets/uploads/promosi',
        'file_name' => $namafile,
        'allowed_types' => 'jpg|jpeg|png|gif|bmp'
      );
      $this->upload->initialize($config);
      $success = $this->upload->do_upload('photo');
      $dataphoto = $this->upload->data();
      $namafile = $dataphoto['file_name'];
      if ( ! $success) {
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable" role="alert">
                                           <button type="button" class="close" data-dismiss="alert">
                                           <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           <center>Failed to upload picture1, please try again</center>
                                           </div>');
        redirect(site_url('promosi/tambah/'));
      }
      if ($namafile == '') {
        $photo = NULL;
      } else {
        $photo = $namafile;
      }
      if ($photo == NULL) {
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable" role="alert">
                                           <button type="button" class="close" data-dismiss="alert">
                                           <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           <center>Failed to upload picture, please try again</center>
                                           </div>');
        redirect(site_url('promosi/tambah/'));
      } else {
        chmod('./assets/uploads/promosi/'.$photo, 0777);
        $this->load->library('image_moo');
        $this->image_moo->load("./assets/uploads/promosi/".$photo)
                        ->stretch(480, 240, TRUE)
                        ->save("./assets/uploads/promosi/".$photo, $overwrite="TRUE");
      }

      $data = array (
        'nama' => $this->input->post('nama'),
        'foto' => $photo,
        'deskripsi' => $this->input->post('deskripsi'),
        'id_pengelola' => $this->session->userdata('username')
      );
      $d = array (
        'table' => 'promosi',
        'data'  => $data
      );
      $this->Cms_model->add($d);

      redirect(site_url('promosi/'));
    }
  }

  public function edit($id)
  {
    $level = $this->session->userdata('level');
    if ($level != 'pengelola') {
      redirect(site_url('home/'));
    }
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    if ($this->form_validation->run() === FALSE) {
      $d = array (
        'table' => 'promosi',
        'where' => array('id' => $id, 'id_pengelola' => $this->session->userdata('username') )
      );
      $promosi = $this->Cms_model->getDetail($d);
      $data = array (
        'view' => 'private/promosiedit',
        'promosi' => $promosi
      );
      $this->load->view('private/layout/wrapper', $data);
    } else {
      $this->load->library('upload');
      $photo = $this->input->post('photo');
      $namafile = url_title($this->input->post('photo'));
      $config = array
      (
        'upload_path' => './assets/uploads/promosi',
        'file_name' => $namafile,
        'allowed_types' => 'jpg|jpeg|png|gif|bmp'
      );
      $this->upload->initialize($config);
      $success = $this->upload->do_upload('photo');
      $dataphoto = $this->upload->data();
      $namafile = $dataphoto['file_name'];
      if ($namafile == '') {
        $photo = $this->input->post('currentphoto');
      } else {
        $photo = $namafile;
      }
      if ($photo == NULL) {
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable" role="alert">
                                           <button type="button" class="close" data-dismiss="alert">
                                           <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           <center>Failed to upload picture, please try again</center>
                                           </div>');
        redirect(site_url('promosi/edit/'));
      } else {
        chmod('./assets/uploads/promosi/'.$photo, 0777);
        $this->load->library('image_moo');
        $this->image_moo->load("./assets/uploads/promosi/".$photo)
                        ->stretch(480, 240, TRUE)
                        ->save("./assets/uploads/promosi/".$photo, $overwrite="TRUE");
      }
      $data = array (
        'nama' => $this->input->post('nama'),
        'foto' => $photo,
        'deskripsi' => $this->input->post('deskripsi'),
      );
      $d = array (
        'table' => 'promosi',
        'data'  => $data,
        'where' => array('id' => $id, 'id_pengelola' => $this->session->userdata('username') )
      );
      $this->Cms_model->update($d);

      redirect(site_url('promosi/'));
    }
  }

  public function hapus($id)
  {
    $level = $this->session->userdata('level');
    if ($level != 'pengelola') {
      redirect(site_url('home/'));
    }
    $d = array (
      'table' => 'promosi',
      'where' => array('id' => $id, 'id_pengelola' => $this->session->userdata('username'))
    );
    $promosi = $this->Cms_model->getDetail($d);
    foreach ($promosi as $key => $v) {
      $photo = $v['foto'];
    }
    $this->Cms_model->delete($d);
    unlink("./assets/uploads/promosi/".$photo);
    redirect(site_url('promosi/'));
  }
}
