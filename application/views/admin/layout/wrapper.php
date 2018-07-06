<?php
if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
    $this->session->set_flashdata('notifikasi', 'Silahkan login terlebih dahulu');
    redirect(base_url('login'), 'refresh');
} elseif ($this->session->userdata('akses_level') == "Administrator") {
    require_once('head.php');
    require_once('left_panel.php');
    require_once('header.php');
    require_once('content.php');
} else {
    $this->session->set_flashdata('notifikasi', 'Silahkan login sebagai admin terlebih dahulu');
    redirect(base_url('login'), 'refresh');
}
?>
