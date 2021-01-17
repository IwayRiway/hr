<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit SOP</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Edit SOP</a></div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('sop/update')?>" enctype="multipart/form-data">
                            <input id="id" type="hidden" class="form-control" name="id" autofocus required value="<?=$sop['id']?>">

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="judul">Judul</label>
                                    <input id="judul" type="text" class="form-control" name="judul" autofocus required value="<?=$sop['judul']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file" class="col-sm-12 col-form-label">File : </label>
                                    <div class="col-sm-12">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file" name="file" accept="application/pdf">
                                          <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" required><?=$sop['keterangan']?></textarea>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Update</button>
                                 <a href="<?=base_url('sop')?>" class="btn btn-danger">Batal</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
      
<script>
  $(document).ready(function(){
    $('.custom-file-input').on('change', function(){
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
  });
</script>