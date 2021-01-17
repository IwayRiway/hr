<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Role';
        $data['role'] = $this->db->query("SELECT 
                                                * 
                                            FROM 
                                                department 
                                            WHERE 
                                                EXISTS (
                                                SELECT 
                                                    1 
                                                FROM 
                                                    akses 
                                                WHERE 
                                                    akses.department_id = department.id)")->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Role';
        $data['role'] = $this->db->get('department')->result_array();
        $data['menu'] = $this->Menu_model->getMenu();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/create', $data);
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $this->Menu_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('menu');
    }

    public function edit($id)
    {   
        $data['judul'] = 'Ubah Role Akses';
        $data['akses'] = $this->Menu_model->getAksesById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/edit', $data);
        $this->load->view('templates/footer');
    }

    
    // public function update()
    // {   
    //     $data = $this->Akses_model->update($this->input->post('id'));
    //     $this->session->set_flashdata('info', 'Data Berhasil Diubah');
    //     redirect('akses');
    // }
    
    public function delete($id)
    {   
        $this->Menu_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect($_SERVER['HTTP_REFERER']);
    }

}