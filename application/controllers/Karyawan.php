<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Karyawan_model');
        $this->load->model('Department_model');
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Karyawan";
        $data['karyawan'] = $this->Karyawan_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    { 
       $data['karyawan'] = $this->Karyawan_model->getDataById($id);
       $data['department'] = $this->Department_model->getDepartment();
       $data['jabatan'] = $this->Jabatan_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Karyawan_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('karyawan');
    }
    
    public function delete($id)
    {   
        $this->Karyawan_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('karyawan');
    }

}