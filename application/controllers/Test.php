<?php
  class Test extends CI_Controller {
    public function index()
      {
        $this->load->view('test');
        $this->load->model('model_name');
        $this->model_name->method();
      }
        public function hello()
      {
      echo "This is hello function.";
    }
  }
?>
