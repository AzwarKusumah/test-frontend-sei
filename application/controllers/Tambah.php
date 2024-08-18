<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function proyek()
    {
        $this->load->view('components/header.php');
        $this->load->view('components/sidebar.php');
        $this->load->view('components/navbar.php');
        $this->load->view('tambah/proyek.php');
        $this->load->view('components/footer.php');
    }
    public function lokasi()
    {
        $this->load->view('components/header.php');
        $this->load->view('components/sidebar.php');
        $this->load->view('components/navbar.php');
        $this->load->view('tambah/lokasi.php');
        $this->load->view('components/footer.php');
    }
}