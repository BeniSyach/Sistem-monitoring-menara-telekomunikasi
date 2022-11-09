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
                <?php
                if (session()->getFlashData('danger')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashData('danger') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <h4 class="text-center">Data Survey Pengawasan</h4>
            </div>
            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Menara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    <?php foreach ($menara as $i) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $i['nama_menara'] ?></td>
                            <td>
                                <!-- <a href="/survey/tambah_survey/<?= $i['slug'] ?>"><button type="submit" class="btn btn-danger btn-sm mx-1 my-1" title="Tambah Survey"><i class="fa fa-plus-square"></i></button></a> -->

                                <a href="/survey/edit_survey/<?= $i['slug'] ?>"><button type="submit" class="btn btn-info btn-sm mx-1 my-1" title="Edit Menu"><i class="fa fa-pencil-square-o"></i></button></a>
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