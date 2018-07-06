<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $user = $this->user_model->listing();
        $data = array('title' => 'Data User',
                  'user'      => $user,
                  'isi'       => 'manager/user/list');
        $this->load->view("manager/layout/wrapper", $data, false);
    }
    public function verification($key)
    {
        $this->load->helper('url');
        $this->user_model->changeActiveState($key);
        $this->session->set_flashdata('notifikasi','Verifikasi email berhasil');
        redirect(base_url('login'),'refresh');
    }
}
