<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sop extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
      //   is_login();
        $this->load->model('Sop_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data SOP";
        $data['sop'] = $this->Sop_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sop/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sop/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Sop_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('sop');
    }

    public function edit($id)
    { 
       $data['sop'] = $this->Sop_model->getDataById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sop/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Sop_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('sop');
    }
    
    public function delete($id)
    {   
        $this->Sop_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('sop');
    }

    public function show($id)
    {
        $data['sop'] = $this->Sop_model->getDataById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sop/show', $data);
        $this->load->view('templates/footer');
    }

}