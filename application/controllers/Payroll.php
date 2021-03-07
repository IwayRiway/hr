<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Payroll_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Department_model');
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Payroll";
        $data['payroll'] = $this->Payroll_model->getPayroll();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('payroll/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    { 
        $data['karyawan'] = $this->Karyawan_model->getDataById($id);
        $data['department'] = $this->Department_model->getDepartment();
        $data['jabatan'] = $this->Jabatan_model->getData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('payroll/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update()
    {   
        $this->Payroll_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('payroll');
    }

    public function print($id)
    {
        $data['karyawan'] = $this->Karyawan_model->getDataById($id);
        $data['gaji'] = $this->Payroll_model->getGaji($id);
        $data['potongan'] = $this->Payroll_model->getPotongan($id);
        $this->Payroll_model->print($data['gaji'], $data['karyawan']);

        $this->load->view('payroll/print', $data);
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('payroll/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $data = $this->Payroll_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('payroll');
    }

    
    
    public function delete($id)
    {   
        $this->Payroll_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('payroll');
    }

}