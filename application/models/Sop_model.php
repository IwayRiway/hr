<?php

class Sop_model extends CI_model
{

    private function _upload(){
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('file')) {
            $file = $this->upload->data('file_name');
            return $file;
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function getData()
    {
        return $this->db->get('sop')->result_array();
    }

    public function save()
    {
        $file = $_FILES['file']['name'];
        if($file){
            $file = $this->_upload();
        }

        $data = [
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'file' => 'assets/file/' . $file
        ];

        $this->db->insert('sop', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('sop', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $file = $_FILES['file']['name'];
        if($file){
            $file = $this->_upload();

            $sop = $this->db->get_where('sop', ['id'=>$this->input->post('id')])->row_array();
            unlink(FCPATH .  $sop['file']);

            $data['file'] = 'assets/file/' . $file;
        }

        $this->db->update('sop', $data, ['id'=>$this->input->post('id')]);
    }

    public function delete($id)
    {
        $sop = $this->db->get_where('sop', ['id'=>$id])->row_array();
        unlink(FCPATH .  $sop['file']);
        $this->db->delete('sop',['id'=>$id]);
    }
}