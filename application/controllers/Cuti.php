<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Cuti_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Cuti";
        $data['cuti'] = $this->Cuti_model->getData();

        if($this->session->userdata('jabatan_id')==3){
            $data['total'] = count($this->Cuti_model->getDataPengajuanTotal());
            $data['pengajuan'] = count($this->Cuti_model->getDataPengajuan());
            $data['acc'] = count($this->Cuti_model->getDataPengajuanAcc());
            $data['dc'] = count($this->Cuti_model->getDataPengajuanDc());
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
        $data['judul'] = "Pengajuan Cuti (Pending)";
        $data['pengajuan'] = $this->Cuti_model->getDataPengajuan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cuti/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function acc($id,$status)
    {
        $this->Cuti_model->acc($id,$status);
        if($status == 1){
            $this->session->set_flashdata('info', 'Cuti Diterima');
        } else {
            $this->session->set_flashdata('info', 'Cuti Ditolak');
        }
        redirect('cuti/pengajuan');
    }

    public function history()
    {
        $data['judul'] = "Pengajuan Cuti";
        $data['pengajuan'] = $this->Cuti_model->getDataPengajuanTotal();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cuti/history', $data);
        $this->load->view('templates/footer');
    }

}