<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('v_about');
        $this->load->view('templates/footer');
    }
}
