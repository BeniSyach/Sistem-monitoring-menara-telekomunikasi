<?= $this->extend('home/index'); ?>

<?= $this->section('content') ?>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="/retribusi">Retribusi</a></li>

        </ol>
        <h2>Retribusi</h2>

    </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Blog Single Section ======= -->
<section id="retribusi" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">



            <div class="col-lg-8 entries">
                <?php foreach ($retri as $r) : ?>
                    <article class="entry">
                        <h2 class="entry-title">
                            <a href="/home/detail_retribusi/<?= $r['slug'] ?>"><?= $r['judul'] ?></a>
                        </h2>
                    </article>
                <?php endforeach; ?>
            </div>



            <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Tahun Retribusi</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            <?php foreach ($retri as $r) : ?>
                                <li><a href="#"><?= $r['tahun'] ?> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div><!-- End sidebar categories-->

                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->
        </div><!-- End blog entries list -->
    </div>

</section><!-- End Blog Single Section -->

<?= $this->endSection(); ?>