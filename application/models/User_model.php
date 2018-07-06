<?php
  Class User_model extends CI_Model{
  Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function tambah($data)
    {
      $this->db->insert('user',$data);
    }
    public function listing(){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->order_by('id_user','DESC');
      $query  = $this->db->get();
      return $query->result();
    }
    public function detail($id_user){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id_user', $id_user);
      $this->db->order_by('id_user','DESC');
      $query  = $this->db->get();
      return $query->row();
    }
    public function edit($data){
      $this->db->where('id_user',$data['id_user']);
      $this->db->update('user',$data);
    }
    function changeActiveState($key)
    {
     $data = array(
     'active' => 1
     );

     $this->db->where('md5(generatednum)', $key);
     $this->db->update('user', $data);

     return true;
    }
    public function login($username, $password){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where(array( 'username'  =>  $username,
                              'password'  =>  $password));
      $this->db->order_by('id_user','DESC');
      $query = $this->db->get();
      return $query->row();
    }
  }
?>
