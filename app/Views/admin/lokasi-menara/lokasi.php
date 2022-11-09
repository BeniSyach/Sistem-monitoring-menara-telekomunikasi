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
        <h4 class="page-title">Lokasi Menara <?= $namaprovider ?> </h4>
    </div>
</div>

<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-body">
            <?php
            if (session()->getFlashData('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashData('danger')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('danger') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card-title">
                <a href="/lokasi/tambah_menara/<?= $slugprovider ?>">
                    <button type="button" class="btn btn-primary btn-sm">
                        Tambah Data Lokasi
                    </button></a>
            </div>
            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Menara</th>
                        <th>Alamat Menara</th>
                        <th>Foto Menara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menara as $m) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $m['nama_menara'] ?></td>
                            <td><?= $m['alamat'] ?></td>
                            <td><img src="/assets/img/<?= $m['foto_menara'] ?>" width="30%" alt=""></td>
                            <td><a href="/lokasi/ubah_menara/<?= $m['slug'] ?>"><button type="submit" class="btn btn-info btn-sm mx-1 my-1" title="Edit Menara"><i class="fa fa-pencil-square-o"></i></button></a>
                                <a href="/lokasi/hapus_data/<?= $m['slug'] ?>"><button type="submit" class="btn btn-danger btn-sm mx-1 my-1" title="Hapus Menara" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ?')"><i class="fa fa-trash"></i></button></a>
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