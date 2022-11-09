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
        <h4 class="page-title">Menu Provider </h4>
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
                <a href="/retribusi/tambah_retribusi"><button class="btn btn-primary">Tambah Retribusi</button></a>
            </div>
            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun Retribusi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    <?php foreach ($retri as $i) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $i['tahun'] ?></td>
                            <td><a href="/retribusi/edit_retribusi/<?= $i['slug'] ?>"><button type="submit" class="btn btn-info btn-sm mx-1 my-1" title="Edit Menu"><i class="fa fa-pencil-square-o"></i></button></a>
                                <a href="/retribusi/hapus_retribusi/<?= $i['slug'] ?>"><button type="submit" class="btn btn-danger btn-sm mx-1 my-1" title="Hapus Menu" onclick="return confirm('Apa Anda Yakin Menghapus Data Ini ?')"><i class="fa fa-trash"></i></button></a>
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