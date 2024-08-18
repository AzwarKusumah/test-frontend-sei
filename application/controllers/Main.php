<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('components/header.php');
        $this->load->view('components/sidebar.php');
        $this->load->view('components/navbar.php');
        $this->load->view('main/main.php');
        $this->load->view('components/footer.php');
    }

}