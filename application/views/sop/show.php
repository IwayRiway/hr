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
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                          <h4><?=$sop['judul']?></h4>
                        </div>
                        <div class="card-body">
                                <embed src="<?=base_url()?><?=$sop['file']?>" width="100%" height="500px"/>
                                <hr>
                                <p> <?=$sop['keterangan']?> </p>

                                <div class="card-footer text-center">
                                 <a href="<?=base_url('sop')?>" class="btn btn-primary">Back</a>
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