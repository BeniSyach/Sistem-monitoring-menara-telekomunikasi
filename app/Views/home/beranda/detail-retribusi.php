<?= $this->extend('home/index'); ?>

<?= $this->section('content'); ?>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="/retribusi">Retribusi</a></li>
            <li>Detail Retribusi</li>

        </ol>
        <h2>Detail Retribusi</h2>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12 entries">
                <article class="entry entry-single">
                    <h2 class="entry-title">
                        <h2 class="text-center"><?= $retri['judul'] ?></h2>
                    </h2>
                    <?= ($retri['detail_retribusi']) ?>

                </article>
            </div>

            </article><!-- End blog entry -->
        </div><!-- End blog entries list -->

    </div>

</section><!-- End Blog Single Section -->

<?= $this->endSection(); ?>