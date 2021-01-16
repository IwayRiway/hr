<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#"><?=$judul?></a></div>
        </div>
    </div>

    <div class="section-body">

        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tanggal Lembur</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($pengajuan as $db):?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['nama']?></td>
                                    <td><?=$db['tgl_pengajuan']?></td>
                                    <td><?=$db['tgl_lembur']?></td>
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
