<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>
        <div class="section-header-button">
            <a href="<?=base_url('pengajuan/create')?>" class="btn btn-primary">Add New</a>
        </div>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#"><?=$judul?></a></div>
        </div>
    </div>

    <div class="section-body">

    <?php if($this->session->userdata('department_id')==10):?>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('pengajuan/history')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pengajuan Karyawan</h4>
                        </div>
                        <div class="card-body">
                        <?=$total?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('pengajuan/pengajuan')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Pending)</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Accept)</h4>
                        </div>
                        <div class="card-body">
                        <?=$acc?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Decline)</h4>
                        </div>
                        <div class="card-body">
                        <?=$dc?>
                        </div>
                    </div>
                </div>
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
                                <th>Nama Posisi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($pengajuan_k as $db):?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['posisi']?></td>
                                    <td><?=$db['tgl_pengajuan']?></td>
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
