<?php

class Jabatan_model extends CI_model
{

    public function getData()
    {
        return $this->db->get('jabatan')->result_array();
    }

    public function save()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->insert('jabatan', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('jabatan', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->update('jabatan', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $jabatan = $this->db->get_where('jabatan', ['id'=>$id])->row_array();
        $this->db->delete('jabatan',['id'=>$id]);
    }
}