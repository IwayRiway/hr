<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Jabatan</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Edit Jabatan</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('jabatan/update')?>" enctype="multipart/form-data">
                            <input id="id" type="hidden" class="form-control" name="id" autofocus required value="<?=$jabatan['id']?>">

                            <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="nama">Nama Jabatan</label>
                                    <input id="nama" type="text" class="form-control" name="nama" autofocus required value="<?=$jabatan['nama']?>">
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Update</button>
                                 <a href="<?=base_url('jabatan')?>" class="btn btn-danger">Batal</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
      