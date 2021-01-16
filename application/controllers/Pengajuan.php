<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
      //   is_login();
        $this->load->model('Pengajuan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Pengajuan Karyawan Baru";
        $data['pengajuan_k'] = $this->Pengajuan_model->getData();

        if($this->session->userdata('department_id')==10){
            $data['total'] = count($this->Pengajuan_model->getDataPengajuanTotal());
            $data['pengajuan'] = count($this->Pengajuan_model->getDataPengajuan());
            $data['acc'] = count($this->Pengajuan_model->getDataPengajuanAcc());
            $data['dc'] = count($this->Pengajuan_model->getDataPengajuanDc());
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengajuan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengajuan/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Pengajuan_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('pengajuan');
    }

    public function pengajuan()
    {
        $data['judul'] = "Pengajuan Karyawan Baru (Pending)";
        $data['pengajuan'] = $this->Pengajuan_model->getDataPengajuan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengajuan/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function acc($id,$status)
    {
        $this->Pengajuan_model->acc($id,$status);
        if($status == 1){
            $this->session->set_flashdata('info', 'Pengajuan Diterima');
        } else {
            $this->session->set_flashdata('info', 'Pengajuan Ditolak');
        }
        redirect('pengajuan/pengajuan');
    }

    public function history()
    {
        $data['judul'] = "Pengajuan Pengajuan";
        $data['pengajuan'] = $this->Pengajuan_model->getDataPengajuanTotal();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengajuan/history', $data);
        $this->load->view('templates/footer');
    }

}