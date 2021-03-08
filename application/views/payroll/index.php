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
                                <th>Divisi</th>
                                <th>Total Gaji</th>
                                <th>Total Potongan</th>
                                <th>Take Home Pay</th>
                                <th>Periode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($payroll as $db): $gaji = $db['gaji_pokok'] + $db['tunjangan_jabatan'] + $db['tunjangan_transport'] + $db['tunjangan_lain']?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['nama']?></td>
                                    <td><?=$db['divisi']?></td>
                                    <td><?=$gaji??0?></td>
                                    <td><?=$db['potongan']??0?></td>
                                    <td><?=$gaji - ($db['potongan']??0)?></td>
                                    <td><?=date('F')?></td>
                                    <td>
                                        <a href="<?=base_url('payroll/edit/')?><?=$db['pk']?>" class="btn btn-icon btn-sm btn-success mr-2" title="Edit Potongan"><i class="fas fa-edit"></i></a>

                                        <a target="_blank" href="<?=base_url('payroll/print/')?><?=$db['pk']?>" class="btn btn-icon btn-sm btn-info mr-2" title="Slip"><i class="fas fa-file"></i></a>
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
