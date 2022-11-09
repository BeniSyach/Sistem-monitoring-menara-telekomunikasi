<!DOCTYPE html>
<html lang="id">

<head>
    <?= $this->include('home/template/header'); ?>
</head>

<body>

    <!-- ======= Header ======= -->
    <?= $this->include('home/template/navbar'); ?>
    <!-- End Header -->

    <main id="main">

        <?= $this->renderSection('content'); ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?= $this->include('home/template/footer'); ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/purecounter/purecounter.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>