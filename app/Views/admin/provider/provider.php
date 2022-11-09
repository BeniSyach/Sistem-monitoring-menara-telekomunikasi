<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('isi'); ?>

<!-- DataTables -->
<link href="/assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/backend/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Required datatable js -->
<script src="/assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Detail Provider </h4>
    </div>
</div>

<div class="col-lg-8">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="card-title">
                <?php
                if (session()->getFlashData('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashData('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <h4 class="text-center">Data Provider</h4>
            </div>
            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Menu Provider</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    <?php foreach ($isp as $i) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $i['nama_provider'] ?></td>
                            <td><a href="/provider/edit_provider/<?= $i['slug'] ?>"><button type="submit" class="btn btn-info btn-sm mx-1 my-1" title="Edit Menu"><i class="fa fa-pencil-square-o"></i></button></a>
                                <!-- <a href="/provider/hapus_provider/<?= $i['slug'] ?>"><button type="submit" class="btn btn-danger btn-sm mx-1 my-1" title="Hapus Menu" onclick="return confirm('Apa Anda Yakin Menghapus Data Ini ?')"><i class="fa fa-trash"></i></button></a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<?= $this->endSection(); ?>