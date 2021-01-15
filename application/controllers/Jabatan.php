<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
      //   is_login();
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Jabatan";
        $data['jabatan'] = $this->Jabatan_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jabatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jabatan/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Jabatan_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('jabatan');
    }

    public function edit($id)
    { 
       $data['jabatan'] = $this->Jabatan_model->getDataById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jabatan/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Jabatan_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('jabatan');
    }
    
    public function delete($id)
    {   
        $this->Jabatan_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('jabatan');
    }

}