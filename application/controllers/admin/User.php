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
                  'isi'       => 'admin/user/list');
        $this->load->view("admin/layout/wrapper", $data, false);
    }

    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
        'nama',
        'Nama',
        'required',
      array(  'required'  =>  'Anda belum mengisikan nama.')
    );

        $valid->set_rules(
        'email',
        'Email',
        'required|valid_email|is_unique[user.email]',
      array(  'required'    =>  'Anda belum mengisikan email.',
              'valid_email' =>  'Email tidak valid, silahkan gunakan email lain.',
              'is_unique'   =>  'Email sudah terdaftar, silahkan gunakan email lain.')
    );

        $valid->set_rules(
        'username',
        'Username',
        'required|is_unique[user.username]',
      array(  'required'  =>  'Anda belum mengisikan username.',
              'is_unique'  =>'Username sudah terdaftar, silahkan gunakan username lain.')
    );

        $valid->set_rules(
        'password',
        'Password',
        'required|min_length[6]',
      array(  'required'  =>  'Anda belum mengisikan password.',
              'min_length'  =>'Password minimal 6 karakter')
    );

        $valid->set_rules(
        'akses_level',
        'Akses_level',
        'required',
      array(  'required'  =>  'Anda belum memilih akses level.')
    );

        if ($valid->run()===false) {
            $data = array('title'  => 'Tambah User',
                  'isi'     => 'admin/user/tambah');
            $this->session->set_flashdata('error', 'ada error');
            $this->load->view("admin/layout/wrapper", $data, false);
        } else {
            $i  = $this->input;
            $rand = bin2hex(random_bytes(12));
            $data = array('nama'        =>  $i->post('nama'),
                  'email'       =>  $i->post('email'),
                  'username'    =>  $i->post('username'),
                  'password'    =>  md5($i->post('password')),
                  'akses_level' =>  $i->post('akses_level'),
                  'active'      =>  0,
                  'generatednum'=>  $rand
                );
            $this->user_model->tambah($data);
            $al = $i->post('akses_level');
            $encrypted_id = md5($rand);
            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "agung.wcksn12@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "ugivemeizr17"; // isi dengan password kamu
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = true;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($i->post('email'));
            $this->email->subject("Verifikasi Akun");
            $this->email->message("terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".base_url("$al/user/verification/$encrypted_id"));

            if ($this->email->send()) {
                $this->session->set_flashdata('notifikasi','Berhasil mendaftarkan user. Silahkan cek email untuk verifikasi user');
                redirect(base_url('admin/user'),'refresh');
            } else {
              $this->session->set_flashdata('notifikasi','Berhasil mendaftarkan user tapi gagal mengirim email verifikasi');
              redirect(base_url('admin/user'),'refresh');
            }

            echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
        }

    }

    public function edit($id_user)
    {
       $user    = $this->user_model->detail($id_user);

        $valid  = $this->form_validation;

        $valid->set_rules(
        'nama',
        'Nama',
        'required',
      array(  'required'  =>  'Anda belum mengisikan nama.')
    );

        $valid->set_rules(
        'email',
        'Email',
        'required|valid_email|is_unique[user.email]',
      array(  'required'    =>  'Anda belum mengisikan email.',
              'valid_email' =>  'Email tidak valid, silahkan gunakan email lain.',
              'is_unique'   =>  'Email sudah terdaftar, silahkan gunakan email lain.')
    );

        $valid->set_rules(
        'username',
        'Username',
        'required|is_unique[user.username]',
      array(  'required'  =>  'Anda belum mengisikan username.',
              'is_unique'  =>'Username sudah terdaftar, silahkan gunakan username lain.')
    );

        $valid->set_rules(
        'password',
        'Password',
        'required|min_length[6]',
      array(  'required'  =>  'Anda belum mengisikan password.',
              'min_length'  =>'Password minimal 6 karakter')
    );

        $valid->set_rules(
        'akses_level',
        'Akses_level',
        'required',
      array(  'required'  =>  'Anda belum memilih akses level.')
    );

        if ($valid->run()===false) {
            $data = array('title'  => 'Edit User',
                  'user'    =>  $user,
                  'isi'     => 'admin/user/edit');
            $this->session->set_flashdata('error', 'ada error');
            $this->load->view("admin/layout/wrapper", $data, false);
        } else {
            $i  = $this->input;
            $rand = bin2hex(random_bytes(12));
            $data = array('nama'        =>  $i->post('nama'),
                  'email'       =>  $i->post('email'),
                  'username'    =>  $i->post('username'),
                  'password'    =>  md5($i->post('password')),
                  'akses_level' =>  $i->post('akses_level'),
                  'keterangan'  =>  $i->post('keterangan'),
                  'foto'        =>  $i->post('foto'),
                  'active'      =>  0,
                  'generatednum'=>  $rand
                );
            $this->user_model->edit($data);
            $encrypted_id = md5($rand);
            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "agung.wcksn12@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "ugivemeizr17"; // isi dengan password kamu
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = true;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($i->post('email'));
            $this->email->subject("Verifikasi Akun");
            $this->email->message("terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".base_url("admin/user/verification/$encrypted_id"));

            if ($this->email->send()) {
                echo "Berhasil melakukan registrasi, silahkan cek email kamu";
            } else {
                echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email";
            }

            echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
        }
        // $this->session->set_flashdata('sukses','Data telah telah ditambah!');
    // redirect(base_url('admin/user'),'refresh');
    }

    public function verification($key)
    {
        $this->load->helper('url');
        $this->user_model->changeActiveState($key);
        echo "Selamat kamu telah memverifikasi akun kamu";
        echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
    }
}
