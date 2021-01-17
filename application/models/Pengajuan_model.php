<?php

class Pengajuan_model extends CI_model
{

    // private function _atasan(){
    //     if($this->session->userdata('jabatan_id')==3){
    //         return 0;
    //     } else {
    //         $data = $this->db->get_where('karyawan', ['jabatan_id'=>3, 'department_id'=>$this->session->userdata('department_id')])->row_array();

    //         if($data){
    //             return $data['id'];
    //         } else {
    //             return 404;
    //         }
    //     }
    // }

    private function email()
    {
        $email = [];
        $data = $this->db->get_where('karyawan', ['department_id'=>10])->result_array();

        foreach ($data as $key => $db) {
            array_push($email, $db['email']);
        }

        return $email;
    }

    public function getData()
    {
        return $this->db->get_where('pengajuan', ['department_id' => $this->session->userdata('department_id')])->result_array();
    }

    public function save()
    {
        $data = [
            'tgl_pengajuan' => date('Y-m-d'),
            'posisi' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'department_id' => $this->session->userdata('department_id'),
            'karyawan_id' => $this->session->userdata('id'),
        ];
        $this->db->insert('pengajuan', $data);

        $department = $this->db->get_where("department", ['id'=>$this->session->userdata('department_id')])->row_array();
        
        $email = $this->db->get_where("pengajuan", $data)->row_array();
        $email['nama'] = $this->session->userdata('nama');
        $email['department'] = $department['nama'];
        $email['email'] = $this->email();
        send_mailKaryawan($email);
    }

    public function getDataPengajuanTotal()
    {
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama,
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                ")->result_array();
    }

    public function getDataPengajuan()
    {
        return $this->db->query("SELECT 
                                    a.*,
                                    b.nama, 
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                WHERE 
                                    a.status IS NULL 
                                ")->result_array();
    }

    public function getDataPengajuanAcc()
    {
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama,
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                WHERE 
                                    a.status = 1 
                                ")->result_array();
    }

    public function getDataPengajuanDc()
    {
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama,
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                WHERE 
                                    a.status = 0 
                                ")->result_array();
    }

    public function acc($id,$status)
    {
        $data = [
            'status' => $status
        ];

        $this->db->update('pengajuan', $data, ['id'=>$id]);
    }

    public function getDataPengajuanTotalManager()
    {
        $id = $this->session->userdata('id');

        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama,
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                WHERE 
                                    a.karyawan_id = '$id'
                                ")->num_rows();
    }

    public function getDataPengajuanManager()
    {
        $id = $this->session->userdata('id');
        
        return $this->db->query("SELECT 
                                    a.*,
                                    b.nama, 
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                WHERE 
                                    a.status IS NULL 
                                    AND a.karyawan_id = '$id'
                                ")->num_rows();
    }

    public function getDataPengajuanAccManager()
    {
        $id = $this->session->userdata('id');

        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama,
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                WHERE 
                                    a.status = 1
                                    AND a.karyawan_id = '$id' 
                                ")->num_rows();
    }

    public function getDataPengajuanDcManager()
    {
        $id = $this->session->userdata('id');

        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama,
                                    c.nama as department 
                                FROM 
                                    pengajuan a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                    JOIN department c ON a.department_id = c.id
                                WHERE 
                                    a.status = 0 
                                    AND a.karyawan_id = '$id'
                                ")->num_rows();
    }
}