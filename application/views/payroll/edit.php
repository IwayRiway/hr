<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Potongan Karyawan</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Potongan Karyawan</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('payroll/update')?>" enctype="multipart/form-data">
                            <input id="id" type="hidden" class="form-control" name="id" required value="<?=$karyawan['id_pk']?>">

                            <div class="row">
                              <div class="col-sm-4">
                                  <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input id="text" type="text" class="form-control" name="nama" tabindex="1" required value="<?=$karyawan['nama']?>" readonly>
                                  </div>

                                  <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input id="text" type="date" class="form-control" name="tgl_lahir" tabindex="1" required value="<?=$karyawan['tgl_lahir']?>" readonly>
                                  </div>

                                  <div class="form-group">
                                    <label for="tgl_lahir">Department</label>
                                    <select class="form-control select2" name='department_id' id='department_id' required disabled>
                                        <option>Pilih Department</option>
                                        <?php foreach($department as $db):?>
                                          <option value="<?=$db['id']?>" <?= $db['id']===$karyawan['department_id']?'selected':''?>><?=$db['nama']?></option>
                                        <?php endforeach?>
                                    </select> 
                                  </div>
                              </div>
                              

                              <div class="col-sm-4">
                                  <div class="form-group">
                                    <label for="nik">Nomor Karyawan</label>
                                    <input id="text" type="text" class="form-control" name="nik" tabindex="1" required readonly>
                                  </div>

                                  <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows=1 readonly></textarea>
                                  </div>

                                  <div class="form-group">
                                    <label for="tgl_lahir">Jabatan</label>
                                    <select class="form-control select2" name='jabatan_id' id='jabatan_id' required readonly disabled>
                                    <option>Pilih Jabatan</option>
                                        <?php foreach($jabatan as $db):?>
                                          <option value="<?=$db['id']?>" <?= $db['id']===$karyawan['jabatan_id']?'selected':''?>><?=$db['nama']?></option>
                                        <?php endforeach?>
                                    </select> 
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                <div class="form-group">
                                        <label for="potongan_pinjaman">Potongan Pinjaman</label>
                                        <input id="potongan_pinjaman" type="number" class="form-control" name="potongan_pinjaman" tabindex="1" required>
                                  </div>
                                <div class="form-group">
                                        <label for="potongan_absen">Potongan Absen</label>
                                        <input id="potongan_absen" type="number" class="form-control" name="potongan_absen" tabindex="1" required>
                                  </div>
                                <div class="form-group">
                                        <label for="potongan_lain">Potongan Lain</label>
                                        <input id="potongan_lain" type="number" class="form-control" name="potongan_lain" tabindex="1" required>
                                  </div>
                              </div>
                              
                            </div>

                                <div class="card-footer text-center">
                                  <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                  <a href="<?=base_url('karyawan')?>" class="btn btn-danger">Batal</a>
                                </div>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
      