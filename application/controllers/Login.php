<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
        'username',
        'Username',
        'required',
      array('required'  =>  'Username harus diisi')
    );

        $valid->set_rules(
        'password',
        'Password',
        'required|min_length[6]',
      array('required'  =>  'Password harus diisi',
            'min_length' =>  'Password minimal 6 karakter')
    );

        if ($valid->run() == false) {
            $data = array('title' => 'Login' );
            $this->load->view('login', $data, false);
        } else {
            $i            = $this->input;
            $username     = $i->post('username');
            $password     = md5($i->post('password'));
            $check_login  = $this->user_model->login($username, $password);

            if (count($check_login) > 0) {
                if ($check_login->active == 1) {
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('akses_level', $check_login->akses_level);
                    $this->session->set_userdata('id_user', $check_login->id_user);
                    $this->session->set_userdata('nama', $check_login->nama);
                    if($this->session->userdata('akses_level') == 'Administrator'){
                      redirect(base_url('admin/dashboard'), 'refresh');
                    }else if($this->session->userdata('akses_level') == 'Manager'){
                      redirect(base_url('manager/dashboard'), 'refresh');
                    }else{
                      redirect(base_url('karyawan/dashboard'), 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('notifikasi', '<center>Akun belum aktif.<br> Silahkan verifikasi email terlebih dahulu</center>');
                    redirect(base_url('login'), 'refresh');
                }
            } else {
                $this->session->set_flashdata('notifikasi', '<center>Username dan password tidak cocok</center>');
                redirect(base_url('login'), 'refresh');
            }
        }
    }
    public function logout(){
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('akses_level');
      $this->session->unset_userdata('id_user');
      $this->session->unset_userdata('nama');
      $this->session->set_flashdata('notifikasi', '<center>Anda berhasil logout</center>');
      redirect(base_url('login'),'refresh');
    }
}
