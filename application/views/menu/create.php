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
               <form action="<?=base_url('menu/save')?>" method="post" enctype="multipart/form-data">
                 <div class="card-body">

                     <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Pilih Role <code>*</code> : </label>
                        <div class="col-sm-6">
                           <select name="role" id="role" class="form-control select2" required>
                             <?php foreach($role as $db):?>
                              <option value="<?=$db['id']?>"><?=$db['nama']?></option>
                             <?php endforeach?>
                           </select>
                        </div>
                     </div>
                     <hr style="border: 1px solid black">

                     <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                          <thead>
                            <tr>
                              <th>
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                  <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                              </th>
                              <th>Menu Akses</th>
                              <th>URL</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($menu as $db):?>
                            <tr>
                              <td>
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-all<?=$db['id']?>" name="menu_id[]" value="<?=$db['id']?>">
                                  <label for="checkbox-all<?=$db['id']?>" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td><?=$db['nama']?></td>
                              <td><?=$db['url']?></td>
                            </tr>
                            <?php endforeach?>
                          </tbody>
                        </table>
                       </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Submit</button>
                     <a href="<?=base_url('akses')?>" class="btn btn-secondary">Cancel</a>
                  </div>
               </form>

             </div>
         </div>
      </div>

   </div>
 </section>
</div>

<script>
    $(document).ready(function() {
      $('#table-2').DataTable();

      $("#checkbox-all").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
      });
    });
</script>

