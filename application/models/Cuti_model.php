<?php

class Cuti_model extends CI_model
{

    private function _atasan(){
        if($this->session->userdata('jabatan_id')==3){
            return 0;
        } else {
            $data = $this->db->get_where('karyawan', ['jabatan_id'=>3, 'department_id'=>$this->session->userdata('department_id')])->row_array();

            if($data){
                return $data;
            } else {
                $data['id'] = 404;
                return $data;
            }
        }
    }

    public function getData()
    {
        return $this->db->get_where('cuti', ['karyawan_id' => $this->session->userdata('id')])->result_array();
    }

    public function save()
    {
        $atasan = $this->_atasan();

        $data = [
            'tgl_pengajuan' => date('Y-m-d'),
            'dari' => $this->input->post('dari'),
            'sampai' => $this->input->post('sampai'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'karyawan_id' => $this->session->userdata('id'),
            'atasan_id' => $atasan['id'],
        ];
        $this->db->insert('cuti', $data);
        
        $email = $this->db->get_where("cuti", $data)->row_array();
        $email['tipe'] = 'Cuti';
        $email['nama'] = $this->session->userdata('nama');
        $email['email'] = $atasan['email'];
        $email['yth'] = $atasan['nama'];
        send_mail($email);
    }

    public function getDataPengajuanTotal()
    {
        $department_id = $this->session->userdata('department_id');
        $jabatan_id = $this->session->userdata('jabatan_id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    b.department_id = '$department_id' 
                                    AND b.jabatan_id != '$jabatan_id'
                                ")->result_array();
    }

    public function getDataPengajuan()
    {
        $department_id = $this->session->userdata('department_id');
        $jabatan_id = $this->session->userdata('jabatan_id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    a.status IS NULL 
                                    AND b.department_id = '$department_id' 
                                    AND b.jabatan_id != '$jabatan_id'
                                ")->result_array();
    }

    public function getDataPengajuanAcc()
    {
        $department_id = $this->session->userdata('department_id');
        $jabatan_id = $this->session->userdata('jabatan_id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    a.status = 1 
                                    AND b.department_id = '$department_id' 
                                    AND b.jabatan_id != '$jabatan_id'
                                ")->result_array();
    }

    public function getDataPengajuanDc()
    {
        $department_id = $this->session->userdata('department_id');
        $jabatan_id = $this->session->userdata('jabatan_id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    a.status = 0 
                                    AND b.department_id = '$department_id' 
                                    AND b.jabatan_id != '$jabatan_id'
                                ")->result_array();
    }

    public function acc($id,$status)
    {
        $data = [
            'status' => $status
        ];

        $this->db->update('cuti', $data, ['id'=>$id]);
    }

    public function getDataPengajuanTotalBySession()
    {
        $department_id = $this->session->userdata('department_id');
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    b.department_id = '$department_id' 
                                    AND a.karyawan_id = '$id'
                                ")->num_rows();
    }

    public function getDataPengajuanBySession()
    {
        $department_id = $this->session->userdata('department_id');
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    a.status IS NULL 
                                    AND b.department_id = '$department_id' 
                                    AND a.karyawan_id = '$id'
                                ")->num_rows();
    }

    public function getDataPengajuanAccBySession()
    {
        $department_id = $this->session->userdata('department_id');
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    a.status = 1 
                                    AND b.department_id = '$department_id' 
                                    AND a.karyawan_id = '$id'
                                ")->num_rows();
    }

    public function getDataPengajuanDcBySession()
    {
        $department_id = $this->session->userdata('department_id');
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    cuti a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    a.status = 0 
                                    AND b.department_id = '$department_id' 
                                    AND a.karyawan_id = '$id'
                                ")->num_rows();
    }
}