<?= $this->extend('home/index'); ?>

<?= $this->section('content'); ?>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="/">Beranda</a></li>
            <li>Informasi Provider</li>
        </ol>

        <h2>Informasi Provider</h2>

    </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <h2 class="text-center"><?= $data_provider['judul'] ?></h2>
                    </h2>
                    <div class="entry-content">

                        <?= ($data_provider['detail']) ?>

                    </div>

                    <div class="entry-footer">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            <li><a href="#">Menara</a></li>
                        </ul>

                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                            <li><a href="#">Telekomuniskasi</a></li>
                            <li><a href="#">Data</a></li>
                        </ul>
                    </div>

                </article><!-- End blog entry -->

                <div class="blog-author d-flex align-items-center">
                    <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                    <div>
                        <h4><?= $data_provider['nama_provider']  ?></h4>
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="\#"><i class="biu bi-instagram"></i></a>
                        </div>
                        <p>
                            Menara Telekomunikasi
                        </p>
                    </div>
                </div><!-- End blog author bio -->

            </div><!-- End blog entries list -->
        </div>

    </div>
</section><!-- End Blog Single Section -->




<?= $this->endSection(); ?>