<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>
        <div class="section-header-button">
            <a href="<?=base_url('cuti/create')?>" class="btn btn-primary">Add New</a>
        </div>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#"><?=$judul?></a></div>
        </div>
    </div>

    <div class="section-body">

    <?php if($this->session->userdata('jabatan_id')==3):?>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('cuti/pengajuan')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php endif?>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Dari</th>
                                <th>Sampai</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($cuti as $db):?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['tgl_pengajuan']?></td>
                                    <td><?=$db['dari']?></td>
                                    <td><?=$db['sampai']?></td>
                                    <td><?=$db['jumlah']?></td>
                                    <td><?=$db['keterangan']?></td>
                                    <td>
                                        <?php if($db['status']==NULL):?> <span class="badge badge-warning">Pending</span> 
                                        <?php elseif($db['status']==1):?>
                                        <span class="badge badge-success">Accept</span> 
                                        <?php elseif($db['status']==0):?>
                                        <span class="badge badge-danger">Decline</span> 
                                        <?php endif?>
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
