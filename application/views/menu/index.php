<!-- Main Content -->
<div class="main-content">
<section class="section">
   <div class="section-header">
     <h1><?=$judul?></h1>
     <div class="section-header-button">
         <a href="<?=base_url('menu/create')?>" class="btn btn-primary">Add New</a>
      </div>
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
                                 <th>Nama</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $i=1; foreach($role as $db):?>
                                 <tr>
                                     <td><?=$i++?></td>
                                     <td><?=$db['nama']?></td>
                                     <td>
                                         <a href="<?=base_url('menu/edit')?>/<?=$db['id']?>" class="btn btn-icon btn-sm btn-success mr-1" title="Edit" style="min-width:30px"><i class="fas fa-edit"></i></a>
                                     </td>
                                 </tr>
                             <?php endforeach?>
                         </tbody>
                     </table>
                     </div>

                </div>
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

