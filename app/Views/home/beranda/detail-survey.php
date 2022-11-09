<?= $this->extend('home/index'); ?>

<?= $this->section('content'); ?>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="/home/survey">Survey Pengawasan</a></li>
            <li>Detail Survey Pengawasan</li>

        </ol>
        <h2>Detail Survey Pengawasan</h2>

    </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Blog Single Section ======= -->
<section class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12 entries">
                <article class="entry entry-single">
                    <h2 class="entry-title">
                        <h2 class="text-center my-4"><?= $survey['judul'] ?></h2>
                    </h2>
                    <?= ($survey['detailsurvey']) ?>

            </div>

            </article><!-- End blog entry -->
        </div><!-- End blog entries list -->

    </div>

</section><!-- End Blog Single Section -->


<?= $this->endSection(); ?>