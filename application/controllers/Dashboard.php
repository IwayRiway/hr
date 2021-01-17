<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['judul'] = "Dashboard";

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}

