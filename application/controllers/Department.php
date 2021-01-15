<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
      //   is_login();
        $this->load->model('Department_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Department";
        $data['department'] = $this->Department_model->getDepartment();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('department/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('department/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Department_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('department');
    }

    public function edit($id)
    { 
       $data['department'] = $this->Department_model->getDepartmentById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('department/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Department_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('department');
    }
    
    public function delete($id)
    {   
        $this->Department_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('department');
    }

}