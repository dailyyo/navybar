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
                  'isi'     => 'manager/dashboard/dashboard');
        $this->load->view("manager/layout/wrapper", $data, false);
    }
}
