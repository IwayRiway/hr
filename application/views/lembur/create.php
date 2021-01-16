<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pengajuan Lembur</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Pengajuan Lembur</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('lembur/save')?>" enctype="multipart/form-data">
                            
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label>Tanggal</label>
                                    <input type="text" class="form-control datepicker" name="dari" id="dari" required>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" required></textarea>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                 <a href="<?=base_url('lembur')?>" class="btn btn-danger">Batal</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>