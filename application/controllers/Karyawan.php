<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    var $publicMethods  = array("gaji", "saveGaji");

     public function __construct()
    {
        parent::__construct();
        $method = $this->router->fetch_method();  

        if(!in_array($method,$this->publicMethods)){
            is_login();
         }

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

    public function gaji($id)
    {
        $data['karyawan'] = $this->Karyawan_model->getDataById($id);
        $data['department'] = $this->Department_model->getDepartment();
        $data['jabatan'] = $this->Jabatan_model->getData();
        $data['gaji'] = $this->Karyawan_model->getGaji($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/gaji', $data);
        $this->load->view('templates/footer');
    }

    public function saveGaji()
    {   
        $this->Karyawan_model->saveGaji();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('karyawan');
    }

}