<?php

class User_model extends CI_model
{
   public function getUser()
   {
    return $this->db->get('tb_user')->result_array();
   }

   public function save()
   {
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
        ];

        $this->db->insert('tb_user', $data);
   }

   public function getUserById($id)
   {
        return $this->db->query("SELECT * FROM tb_user WHERE id='$id'")->row_array();
   }
   
   public function update($id)
   {
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
        ];

        if($this->input->post('password')!=""){
            $data['password'] = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
        }

       $this->db->update('tb_user', $data, ['id'=>$id]);
   }

   public function delete($id)
   {
       $this->db->delete('tb_user', ['id'=>$id]);
   }

}