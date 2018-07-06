<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data = array(' title'  => 'Halaman Dashboard',
                  'isi'     => 'admin/dashboard/dashboard');
        $this->load->view("admin/layout/wrapper", $data, false);
    }
}

  // function user_management()
  // {
  //   $user = $this->user_model->listing();
  //   $data = array(' title'  => 'Halaman Dashboard',
  //                 'user'    =>  $user,
  //                 'isi'     => 'admin/dashboard/list');
  //                 $this->load->view("admin/layout/wrapper_user_management", $data, FALSE);
  // }
  //
