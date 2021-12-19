<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    $d = array('table' => 'lapangan', 'order' => 'id DESC', 'limit' => '5');
    $lapangan = $this->Cms_model->getAll($d);
    $d = array('table' => 'promosi', 'order' => 'id DESC', 'limit' => '3');
    $promosi = $this->Cms_model->getAll($d);
    $data = array (
      'view' => 'public/home',
      'lapangan' => $lapangan,
      'promosi' => $promosi
    );
    $this->load->view('public/layout/wrapper', $data);
  }

  public function daftar()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');

    if ($this->form_validation->run() === FALSE) {
      $data = array (
        'view' => 'public/daftar',
      );
      $this->load->view('public/layout/wrapper', $data);
    } else {
      $username = $this->input->post('username');
      $this->load->library('upload');
      $photo = $this->input->post('photo');
      $namafile = url_title($this->input->post('photo'));
      $config = array
      (
        'upload_path' => './assets/uploads/user',
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
        redirect(site_url('home/daftar/'));
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
        redirect(site_url('home/daftar/'));
      } else {
        chmod('./assets/uploads/user/'.$photo, 0777);
        $this->load->library('image_moo');
        $this->image_moo->load("./assets/uploads/user/".$photo)
                        ->stretch(240, 240, TRUE)
                        ->save("./assets/uploads/user/".$username.".jpg", $overwrite="TRUE");
        $pic = ''.$username.'.jpg';
        if ($pic != $photo) {
          unlink("./assets/uploads/user/".$photo);
        }
      }

      $data = array (
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'nama' => $this->input->post('nama'),
        'hp' => $this->input->post('hp'),
        'foto' => $pic,
        'alamat' => $this->input->post('alamat'),
        'level' => 'user'
      );
      $d = array (
        'table' => 'user',
        'data'  => $data
      );
      $this->Cms_model->add($d);
      $data = array (
        'username' => $username,
        'level' => 'user',
        'logged_in'=> true
      );
      $this->session->set_userdata($data);
      redirect(site_url('home/'));
    }
  }

  public function login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
      $data = array (
        'view' => 'public/home',
      );
      $this->load->view('public/layout/wrapper', $data);
    } else {
      $data = array (
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
      );
      $d = array (
        'table' => 'user',
        'where'  => $data
      );
      $log = $this->Cms_model->getRow($d);
      if ( $log == 1 ) {
        $detail = $this->Cms_model->getDetail($d);
        foreach ($detail as $key => $d) {
          $level = $d['level'];
        }
        $data = array (
          'username' => $this->input->post('username'),
          'level' => $level,
          'logged_in'=> true
        );
        $this->session->set_userdata($data);
        if ($level == 'user') {
          redirect(site_url('home/'));
        } elseif ($level == 'pengelola') {
          redirect(site_url('dashboard/'));
        } elseif ($level == 'admin') {
          redirect(site_url('dashboard/'));
        } else {
          redirect(site_url('home/'));
        }
      } else {
        $data = array (
          'view' => 'public/home',
        );
        $this->load->view('public/layout/wrapper', $data);
      }
    }
  }

  public function logout()
	{
		session_destroy();
		redirect(site_url());
	}

}
