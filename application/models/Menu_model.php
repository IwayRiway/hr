<?php

class Menu_model extends CI_model
{
   public function getMenu()
   {
       return $this->db->get_where('menu')->result_array();
   }

   public function save()
   {
        $menu_id = $this->input->post('menu_id');
        $role_access_id = $this->input->post('role');
        $insert = [];

        for ($i=0; $i < count($menu_id); $i++) {
            $data = [
                'department_id' => $role_access_id,
                'menu_id' => $menu_id[$i]
            ];

            $cek = $this->db->get_where('akses', $data)->num_rows();
            if($cek==0){
                array_push($insert, $data);
            }
        }

        if(count($insert)>0){
            $this->db->insert_batch('akses', $insert);
        }

   }

   public function getAksesById($id)
   {
    return $this->db->query("SELECT a.*, b.*, c.nama AS role, a.id as id_akses FROM akses a JOIN menu b ON a.menu_id = b.id JOIN department c ON a.department_id = c.id WHERE a.department_id='$id'")->result_array();
   }
   
//    public function update($id)
//    {
//        $data = [
//            'nama' => $this->input->post('nama'),
//        ];

//        $this->db->update('role_accesses', $data, ['id'=>$id]);
//    }

   public function delete($id)
   {
       $this->db->delete('akses', ['id'=>$id]);
   }

}