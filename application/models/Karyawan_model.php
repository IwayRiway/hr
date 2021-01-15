<?php

class Karyawan_model extends CI_model
{

    public function getData()
    {
        return $this->db->query("SELECT 
                                    a.*, a.id as id_pk ,
                                    b.nama as department, 
                                    c.nama as jabatan, 
                                    d.* 
                                FROM 
                                    karyawan a 
                                    LEFT JOIN department b ON a.department_id = b.id 
                                    LEFT JOIN jabatan c ON a.jabatan_id = b.id 
                                    LEFT JOIN karyawan_detail d ON d.karyawan_id = a.id
                                ")->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->query("SELECT 
                                    a.*,  a.id as id_pk,
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
        ];

        $this->db->update('karyawan', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $jabatan = $this->db->get_where('karyawan', ['id'=>$id])->row_array();
        $this->db->delete('karyawan',['id'=>$id]);
    }
}