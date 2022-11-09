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
                <button type="button" class="btn btn-primary btn-sm tomboltambah">
                    Tambah Menu Provider
                </button>
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
                            <td><button type="submit" class="btn btn-info btn-sm mx-1 my-1" onclick="edit('<?= $i['slug'] ?>')" title="Edit Menu"><i class="fa fa-pencil-square-o"></i></button>
                                <button type="submit" class="btn btn-danger btn-sm mx-1 my-1" onclick="hapus('<?= $i['slug'] ?>')" title="Hapus Menu"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    $('.tomboltambah').click(function(e) {
        e.preventDefault();

        $.ajax({
            url: "<?= site_url('menu/tambah_menu') ?>",
            dataType: "json",
            success: function(response) {

                $('.viewmodal').html(response.data).show();

                $('#modaltambah').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });

    function edit(slug) {
        $.ajax({
            type: "post",
            url: "<?= site_url('menu/ubah_menu') ?>",
            data: {
                slug: slug
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(slug) {
        Swal.fire({
            title: 'Hapus Data',
            text: "Apakah Anda Yakin Menghapus Data Ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('menu/hapus_menu') ?>",
                    data: {
                        slug: slug
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                            });
                            location.reload();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        })
    }
</script>

<?= $this->endSection(); ?>