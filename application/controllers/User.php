<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    if ($this->session->userdata('level') != 'admin') {
      redirect(site_url('home/'));
    }
    $d = array (
      'table' => 'user',
      'where' => array('level !=' => 'admin' )
    );
    $user = $this->Cms_model->getAll($d);
    $data = array (
      'view' => 'private/user',
      'user' => $user
    );
    $this->load->view('private/layout/wrapper', $data);
  }

  public function profil($username)
  {
    $d = array (
      'table' => 'user',
      'where' => array('username' => $username)
    );
    $user = $this->Cms_model->getDetail($d);

    $level = $this->session->userdata('level');
    if ($level == 'pengelola' || $level == 'admin') {
      $view = 'private/userdetail';
      $layout = 'private/layout/wrapper';
    } else {
      $view = 'public/userdetail';
      $layout = 'public/layout/wrapper';
    }
    $data = array (
      'view' => $view,
      'user' => $user
    );
    $this->load->view($layout, $data);
  }

  public function tambah()
  {
    if ($this->session->userdata('level') != 'admin') {
      redirect(site_url('home/'));
    }
    $this->form_validation->set_rules('nama', 'Nama', 'required');
      if ($this->form_validation->run() === FALSE) {
      $data = array (
        'view' => 'private/usertambah'
      );
      $this->load->view('private/layout/wrapper', $data);
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
        redirect(site_url('user/tambah/'));
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
        redirect(site_url('user/tambah/'));
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
        'username' => $username,
        'password' => $this->input->post('password'),
        'nama' => $this->input->post('nama'),
        'hp' => $this->input->post('hp'),
        'foto' => $pic,
        'alamat' => $this->input->post('alamat'),
        'level' => 'pengelola'
      );
      $d = array (
        'table' => 'user',
        'data'  => $data,
      );
      $this->Cms_model->add($d);

      redirect(site_url('user/'));
    }
  }

  public function edit()
  {
    $username = $this->session->userdata('username');
    if ( !$username ) {
      redirect(site_url('home/'));
    }
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    if ($this->form_validation->run() === FALSE) {
      $d = array (
        'table' => 'user',
        'where' => array('username' => $username)
      );
      $user = $this->Cms_model->getDetail($d);
      $level = $this->session->userdata('level');
      if ($level == 'pengelola' || $level == 'admin') {
        $view = 'private/useredit';
        $layout = 'private/layout/wrapper';
      } else {
        $view = 'public/useredit';
        $layout = 'public/layout/wrapper';
      }
      $data = array (
        'view' => $view,
        'user' => $user
      );
      $this->load->view($layout, $data);
    } else {
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
        redirect(site_url('user/edit/'));
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
        'nama' => $this->input->post('nama'),
        'foto' => $pic,
        'hp' => $this->input->post('hp'),
        'alamat' => $this->input->post('alamat'),
      );
      $d = array (
        'table' => 'user',
        'data'  => $data,
        'where' => array('username' => $username)
      );
      $this->Cms_model->update($d);
      redirect(site_url('user/profil/'.$username));
    }
  }

  public function hapus($username)
  {
    if ($this->session->userdata('level') != 'admin') {
      redirect(site_url('home/'));
    }
    $d = array (
      'table' => 'user',
      'where' => array('username' => $username)
    );
    $user = $this->Cms_model->getDetail($d);
    foreach ($user as $key => $v) {
      $photo = $v['foto'];
    }
    $this->Cms_model->delete($d);
    unlink("./assets/uploads/user/".$photo);
    redirect(site_url('user/'));
  }
}
