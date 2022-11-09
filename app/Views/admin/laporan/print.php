<link href="/assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title text-center">Daftar Menara Di Kabupaten Serdang Bedagai </h4>
    </div>
</div>
<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-body">

            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Provider</th>
                        <th>Nama Menara</th>
                        <th>Alamat Menara</th>
                        <th>Foto Menara</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menara as $m) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $m['nama_provider'] ?></td>
                            <td><?= $m['nama_menara'] ?></td>
                            <td><?= $m['alamat'] ?></td>
                            <td><img src="/assets/img/<?= $m['foto_menara'] ?>" width="20%" alt=""></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    window.print();
</script>