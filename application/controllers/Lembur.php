<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Lembur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Lembur";
        $data['lembur'] = $this->Lembur_model->getData();

        if($this->session->userdata('jabatan_id')==3){
            $data['total'] = count($this->Lembur_model->getDataPengajuanTotal());
            $data['pengajuan'] = count($this->Lembur_model->getDataPengajuan());
            $data['acc'] = count($this->Lembur_model->getDataPengajuanAcc());
            $data['dc'] = count($this->Lembur_model->getDataPengajuanDc());
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lembur/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lembur/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Lembur_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('lembur');
    }

    public function pengajuan()
    {
        $data['judul'] = "Pengajuan Lembur (Pending)";
        $data['pengajuan'] = $this->Lembur_model->getDataPengajuan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lembur/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function acc($id,$status)
    {
        $this->Lembur_model->acc($id,$status);
        if($status == 1){
            $this->session->set_flashdata('info', 'Lembur Diterima');
        } else {
            $this->session->set_flashdata('info', 'Lembur Ditolak');
        }
        redirect('lembur/pengajuan');
    }

    public function history()
    {
        $data['judul'] = "Pengajuan Lembur";
        $data['pengajuan'] = $this->Lembur_model->getDataPengajuanTotal();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lembur/history', $data);
        $this->load->view('templates/footer');
    }

}