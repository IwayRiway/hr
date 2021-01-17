<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Department_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('auth/index');
    }

    public function login(){

        $username = $this->input->post('username');

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = $this->db->get_where('karyawan', ['email'=>$this->input->post('username')])->row_array();
        } else {
            $user = $this->db->get_where('karyawan', ['username'=>$this->input->post('username')])->row_array();
        }

        if($user){
            if(password_verify($this->input->post('password'), $user['password'])){
                $data =  [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'jabatan_id' => $user['jabatan_id'],
                    'department_id' => $user['department_id'],
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('gagal', 'Password Anda Salah');
                redirect('auth');
            }
            
        } else {
            $this->session->set_flashdata('warning', 'Username Tidak Ditemukan');
            redirect('auth');
        }

        
    }

        public function logout(){
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('nama');
        
            redirect('auth');
        }

        public function signup()
        {
            $data['department'] = $this->Department_model->getDepartment();

            $this->load->view('auth/signup', $data);
        }

        public function save()
        {
            $this->Auth_model->save();
            $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
            redirect('auth');
        }

        public function mail()
        {
            $data = [
                'nama' => 'sagjsagj',
                'dari' => '20 Januari 2019',
                'sampai' => '20 Januari 2019',
            ];
            
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'ggalmair@gmail.com',
                'smtp_pass' => 'g1i2a3n4',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];

            $this->email->initialize($config);
            $this->load->library('email', $config);

            $this->email->from('ggalmair@gmail.com', 'My Way Out');
            $this->email->to('riway.restu@gmail.com');
            $subject = 'Pengajuan Cuti';
            $this->email->subject($subject);

            $body = $this->load->view('templates/email',$data,TRUE);
            $this->email->message($body);
            $this->email->send();
        }
    }

