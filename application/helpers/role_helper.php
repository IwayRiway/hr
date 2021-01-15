<?php

function is_login()
{
   $ci = get_instance();
   if(!($ci->session->userdata('id'))){
      $ci->session->set_flashdata('info', 'Session Anda Telah Berakhir. Silahkan Login Kembali');
      redirect('auth');
   }
}

?>