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
               <form action="<?=base_url('user/update')?>" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" id="id" value="<?=$user['id']?>">
                 <div class="card-body">

                     <div id="ket" class="">
                        <div class="form-group row">
                           <label for="nama" class="col-sm-3 col-form-label text-right">Nama User <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="text" name="nama" id="nama" value="<?=$user['nama']?>" class="form-control" required>
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="username" class="col-sm-3 col-form-label text-right">Username <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="text" name="username" id="username" value="<?=$user['username']?>" class="form-control" required>
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="email" class="col-sm-3 col-form-label text-right">Email <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="email" name="email" id="email" value="<?=$user['email']?>" class="form-control" required>
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="password" class="col-sm-3 col-form-label text-right">Password <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="password" name="password" id="password" value="" class="form-control">
                           </div>
                        </div>
                     </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Submit</button>
                     <a href="<?=base_url('user')?>" class="btn btn-secondary">Cancel</a>
                  </div>
               </form>

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

