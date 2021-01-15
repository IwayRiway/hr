<?php

class Karyawan_model extends CI_model
{

    public function getData()
    {
        return $this->db->query("SELECT 
                                    a.nama, a.id as id_pk, a.tgl_lahir,
                                    b.nama as department, 
                                    c.nama as jabatan, 
                                    d.* 
                                FROM 
                                    karyawan a 
                                    LEFT JOIN department b ON a.department_id = b.id 
                                    LEFT JOIN jabatan c ON a.jabatan_id = c.id 
                                    LEFT JOIN karyawan_detail d ON d.karyawan_id = a.id
                                ")->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->query("SELECT 
                                    a.nama, a.id as id_pk, a.tgl_lahir, a.department_id, a.jabatan_id,
                                    b.nama as department, 
                                    c.nama as jabatan, 
                                    d.* 
                                FROM 
                                    karyawan a 
                                    LEFT JOIN department b ON a.department_id = b.id 
                                    LEFT JOIN jabatan c ON a.jabatan_id = b.id 
                                    LEFT JOIN karyawan_detail d ON d.karyawan_id = a.id
                                WHERE
                                    a.id = '$id'
                                ")->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'department_id' => $this->input->post('department_id'),
            'jabatan_id' => $this->input->post('jabatan_id'),
        ];

        $this->db->update('karyawan', $data, ['id'=>$this->input->post('id')]);

        $data_detail = [
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
        ];

        $cek = $this->db->get_where('karyawan_detail', ['karyawan_id'=>$this->input->post('id')])->num_rows();
        if($cek>0){
            $this->db->update('karyawan_detail', $data, ['karyawan_id'=>$this->input->post('id')]);
        } else {
            $data_detail['karyawan_id'] = $this->input->post('id');
            $this->db->insert('karyawan_detail', $data_detail);
        }
    }

    public function delete($id)
    {
        $this->db->delete('karyawan',['id'=>$id]);
        $this->db->delete('karyawan_detail',['karyawan_id'=>$id]);
    }
}