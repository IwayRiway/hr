<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
      //   is_login();
        $this->load->model('Cuti_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Cuti";
        $data['cuti'] = $this->Cuti_model->getData();

        if($this->session->userdata('jabatan_id')==3){
            $data['pengajuan'] = count($this->Cuti_model->getDataPengajuan());
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cuti/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cuti/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Cuti_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('cuti');
    }

    public function pengajuan()
    {
        $data['judul'] = "Pengajuan Cuti";
        $data['pengajuan'] = $this->Cuti_model->getDataPengajuan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cuti/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    { 
       $data['cuti'] = $this->Cuti_model->getDataById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cuti/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Cuti_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('cuti');
    }
    
    public function delete($id)
    {   
        $this->Cuti_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('cuti');
    }

}