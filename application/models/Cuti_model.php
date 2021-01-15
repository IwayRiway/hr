<?php

class Cuti_model extends CI_model
{

    private function _atasan(){
        if($this->session->userdata('jabatan_id')==3){
            return 0;
        } else {
            $data = $this->db->get_where('karyawan', ['jabatan_id'=>3, 'department_id'=>$this->session->userdata('department_id')])->row_array();

            if($data){
                return $data['id'];
            } else {
                return 404;
            }
        }
    }

    public function getData()
    {
        return $this->db->get_where('cuti', ['karyawan_id' => $this->session->userdata('id')])->result_array();
    }

    public function save()
    {
        $data = [
            'tgl_pengajuan' => date('Y-m-d'),
            'dari' => $this->input->post('dari'),
            'sampai' => $this->input->post('sampai'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'karyawan_id' => $this->session->userdata('id'),
            'atasan_id' => $this->_atasan(),
        ];
        $this->db->insert('cuti', $data);
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

    public function getDataById($id)
    {
        return $this->db->get_where('cuti', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->update('cuti', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $cuti = $this->db->get_where('cuti', ['id'=>$id])->row_array();
        $this->db->delete('cuti',['id'=>$id]);
    }
}