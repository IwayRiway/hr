<?php $side=$this->uri->segment(1);?>
<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html">QR Code</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="index.html">QR-C</a>
     </div>
     <ul class="sidebar-menu">
       <li class="menu-header">Navigation</li>

       <li class="<?=$side=='department'?'active':''?>"><a class="nav-link" href="<?=base_url('department')?>"><i class="fas fa-user-tie"></i><span>Data Department</span></a></li> 

       <li class="<?=$side=='jabatan'?'active':''?>"><a class="nav-link" href="<?=base_url('jabatan')?>"><i class="fab fa-product-hunt"></i><span>Data Jabatan</span></a></li> 

       <li class="<?=$side=='karyawan'?'active':''?>"><a class="nav-link" href="<?=base_url('karyawan')?>"><i class="fas fa-keyboard"></i><span>Data Karyawan</span></a></li> 

       <li class="<?=$side=='cuti'?'active':''?>"><a class="nav-link" href="<?=base_url('cuti')?>"><i class="fas fa-keyboard"></i><span>Data Cuti</span></a></li> 

       <li class="<?=$side=='user'?'active':''?>"><a class="nav-link" href="<?=base_url('user')?>"><i class="fas fa-users-cog"></i><span>Manajemen User</span></a></li> 

      
   </aside>
 </div>

 <div class="info" data-flashdata="<?= $this->session->flashdata('info')?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal')?>"></div>
<div class="sukses" data-flashdata="<?= $this->session->flashdata('sukses')?>"></div>
<div class="warning" data-flashdata="<?= $this->session->flashdata('warning')?>"></div>