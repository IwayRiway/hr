<?php

class Lembur_model extends CI_model
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
        return $this->db->get_where('lembur', ['karyawan_id' => $this->session->userdata('id')])->result_array();
    }

    public function save()
    {
        $data = [
            'tgl_pengajuan' => date('Y-m-d'),
            'tgl_lembur' => $this->input->post('dari'),
            'keterangan' => $this->input->post('keterangan'),
            'karyawan_id' => $this->session->userdata('id'),
            'atasan_id' => $this->_atasan(),
        ];
        $this->db->insert('lembur', $data);

        $email = $this->db->get_where("lembur", $data)->row_array();
        $email['tipe'] = 'Lembur';
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
                                    lembur a 
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
                                    lembur a 
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
                                    lembur a 
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
                                    lembur a 
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

        $this->db->update('lembur', $data, ['id'=>$id]);
    }

    public function getDataPengajuanTotalBySession()
    {
        $department_id = $this->session->userdata('department_id');
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT 
                                    a.*, 
                                    b.nama 
                                FROM 
                                    lembur a 
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
                                    lembur a 
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
                                    lembur a 
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
                                    lembur a 
                                    JOIN karyawan b ON a.karyawan_id = b.id 
                                WHERE 
                                    a.status = 0 
                                    AND b.department_id = '$department_id' 
                                    AND a.karyawan_id = '$id'
                                ")->num_rows();
    }
}