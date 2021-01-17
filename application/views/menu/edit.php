<!-- Main Content -->
<div class="main-content">
<section class="section">
   <div class="section-header">
     <h1><?=$judul?></h1>
   </div>

   <div class="section-body">

   <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-body">

                  <div class="table-responsive">
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Role</th>
                                 <th>Menu Akses</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php $i=1; foreach($akses as $db):?>
                                 <tr>
                                     <td><?=$i++?></td>
                                     <td><?=$db['role']?></td>
                                     <td><?=$db['nama']?></td>
                                     <td>
                                         <a href="<?=base_url('menu/delete')?>/<?=$db['id_akses']?>" class="btn btn-icon btn-sm btn-danger mr-1 tombol-hapus" title="Delete" style="min-width:30px"><i class="fas fa-trash"></i></a>
                                     </td>
                                 </tr>
                              <?php endforeach?>
                         </tbody>
                     </table>
                     </div>

                </div>
                <div class="card-footer text-right">
                  <a href="<?=base_url('menu')?>" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>

 </section>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

