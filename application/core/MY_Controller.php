<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $i = $this->session->userdata('i');
    if ( !$i ) {
      redirect(site_url('post/'));
    }

    date_default_timezone_set('GMT');

    $this->load->library('grocery_CRUD');
    $this->load->library('image_moo');
    $this->load->model('Cms_model');
    //Codeigniter : Write Less Do More
  }

}
