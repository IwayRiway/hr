<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data User';
        $data['user'] = $this->User_model->getUser();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah User';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/create', $data);
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $this->User_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('user');
    }

    public function edit($id)
    {   
        $data['judul'] = 'Ubah User';
        $data['user'] = $this->User_model->getUserById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $data = $this->User_model->update($this->input->post('id'));
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('user');
    }
    
    public function delete($id)
    {   
        $this->User_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('user');
    }

}