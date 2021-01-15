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
                                <th>Dari</th>
                                <th>Sampai</th>
                                <th>Jumlah Hari</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($pengajuan as $db):?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['nama']?></td>
                                    <td><?=$db['tgl_pengajuan']?></td>
                                    <td><?=$db['dari']?></td>
                                    <td><?=$db['sampai']?></td>
                                    <td><?=$db['jumlah']?></td>
                                    <td><?=$db['keterangan']?></td>
                                    <td>
                                        <a href="<?=base_url('cuti/acc/')?><?=$db['id']?>/1" class="btn btn-icon btn-sm btn-success mr-2 acc" title="Accept"><i class="fas fa-check"></i></a>
                                        <a href="<?=base_url('cuti/acc/')?><?=$db['id']?>/0" class="btn btn-icon btn-sm btn-danger mr-2 dc" title="Decline"><i class="fas fa-times"></i></a>
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

        $('.acc').on('click', function (e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Yakin?',
                text: "Terima Pengajuan Cuti Ini..?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                document.location.href = href;
                }
            })
        });

        $('.dc').on('click', function (e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Yakin?',
                text: "Tolak Pengajuan Cuti Ini..?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                document.location.href = href;
                }
            })
        });
    });
</script>
