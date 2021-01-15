<?php

class Department_model extends CI_model
{

    private function _checkName($nama){
        return $this->db->get_where('department', ['nama'=>$nama])->row_array();
    }

    public function getDepartment()
    {
        return $this->db->get('department')->result_array();
    }

    public function save()
    {
        $check = $this->_checkName($this->input->post('nama'));

        if($check){
            return 0;
        }

        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->insert('department', $data);
        return 1;
    }

    public function getDepartmentById($id)
    {
        return $this->db->get_where('department', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->update('department', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $department = $this->db->get_where('department', ['id'=>$id])->row_array();
        $this->db->delete('department',['id'=>$id]);
    }
}