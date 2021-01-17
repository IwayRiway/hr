<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('Cuti_model');
        $this->load->model('Pengajuan_model');
        $this->load->model('Lembur_model');
    }

    public function acc($id,$status,$tipe)
    {
       if($tipe == 'cuti'){
          $this->Cuti_model->acc($id,$status);
       } else {
          $this->Lembur_model->acc($id,$status);
       }
      $this->load->view('templates/thank');
    }

    public function karyawan($id,$status)
    {
      $this->Pengajuan_model->acc($id,$status);
      $this->load->view('templates/thank');
    }

}