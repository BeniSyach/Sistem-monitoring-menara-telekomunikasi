<?= $this->extend('home/index'); ?>

<?= $this->section('content'); ?>
<script src="/assets/backend/js/jquery.min.js"></script>
<!-- DataTables -->
<link href="/assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/backend/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Required datatable js -->
<script src="/assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="/">Beranda</a></li>
            <li>Lokasi Menara</li>
        </ol>

        <h2>Lokasi Menara</h2>

    </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Testimonials Section ======= -->
<section id="lokasi-menara" class="testimonials">
    <div class="container" data-aos="fade-up">
        <?php foreach ($menu as $p) : ?>
            <div class="section-title">
                <h2><?= $p['nama_provider'] ?></h2>
            </div>

            <div class="testimonials-slider mb-5" data-aos="fade-up" data-aos-delay="100">
                <table id="datatable<?= $p['id'] ?>" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Menara</th>
                            <th scope="col">Alamat Menara</th>
                            <th scope="col">Foto Menara</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($provider as $t) : ?>
                            <?php if ($t['provider_id'] == $p['id']) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $t['nama_menara'] ?></td>
                                    <td> <?= $t['alamat'] ?></td>
                                    <td> <img src="/assets/img/<?= $t['foto_menara'] ?>" alt="" width="10%"></td>
                                    <td><a href="/home/map_lokasi_menara/<?= $t['slug'] ?>"><button class="btn btn-info btn-sm mx-1 my-1" title="Edit Menu">Lokasi</button></a></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</section><!-- End Testimonials Section -->

<script>
    <?php foreach ($menu as $p) : ?>
        $(document).ready(function() {
            $('#datatable<?= $p['id'] ?>').DataTable();
        });
    <?php endforeach; ?>
</script>

<?= $this->endSection(); ?>