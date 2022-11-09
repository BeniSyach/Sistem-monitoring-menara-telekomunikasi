<?= $this->extend('home/index'); ?>

<?= $this->section('content'); ?>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="/">Beranda</a></li>
        </ol>
        <h2>Sistem Informasi Monitoring dan Pengendalian Menara Telekomunikasi Kabupaten Serdang Bedagai</h2>

    </div>
</section><!-- End Breadcrumbs -->

<section id="utama">
    <div class="container">
        <div id="mapid" class="mapid"></div>
    </div>
</section>

<div class="container">
    <hr>
</div>

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-geo-fill"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_menara ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Menara</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                    <i class="bi bi-wifi"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_provider ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Provider</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box"><i class="bi bi-people-fill"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_kunjungan ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Kunjungan</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Counts Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg ">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Provider</h2>
            <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p> -->
        </div>

        <div class="row justify-content-center">
            <?php foreach ($provider as $p) : ?>
                <div class="col-md-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-router"></i>
                        <h4><a href="/home/informasi_provider/<?= $p['slug'] ?>"><?= $p['nama_provider'] ?></a></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section><!-- End Services Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Kontak Kami</h2>
            <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p> -->
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-6">

                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Dinas Komunikasi Dan Informatika</h3>
                            <p>Jalan Negara No. 300 Sei Rampah Kode Pos 20695</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Kami</h3>
                            <p>diskominfo@serdangbedagaikab.go.id</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Telepon/Fax</h3>
                            <p>0621-442135</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                        </div>
                        <div class="col form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Judul" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                    </div>
                    <div class="text-center"><button type="submit">Kirim Pesan Anda</button></div>
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->

<!-- Leaflet -->
<link rel="stylesheet" href="<?= base_url('assets/js/leaflet/leaflet.css'); ?>" />
<script src="<?= base_url('assets/js/leaflet/leaflet.js'); ?>" type='text/javascript'></script>
<script type='text/javascript'>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        //map view
        console.log("Lokasi Saat Ini :" + location.coords.latitude, location.coords.longitude);
        // var L = window.L;
        var mymap = L.map('mapid').setView([3.4196814, 99.0448433], 11);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 19,
            attribution: ' Design By <a href="https://diskominfo.serdangbedagaikab.go.id/">Dinas Komunikasi Dan Informatika Kabupaten Serdang Bedagai</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);


        <?php foreach ($map as $i) { ?>
            L.marker([<?= $i['latitude']; ?>, <?= $i['longitude']; ?>]).bindPopup(
                "<img src='<?= base_url('assets/img') . "/" . $i['foto_menara']; ?>' class='img-fluid'>" +
                "<b><?= $i['nama_menara']; ?></b>" +
                "<p><?= $i['alamat']; ?></p>" +
                "<hr>" +
                "<a href='<?= base_url('home/map_lokasi_menara') . "/" . $i['slug']; ?>' class='btn btn-outline-primary btn-sm'>Detail</a><a href='https://www.google.com/maps/dir/?api=1&origin=" +
                location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $i['latitude']; ?>,<?= $i['longitude']; ?>' class='btn btn-outline-primary btn-sm' target='_blank'>Rute</a>").addTo(mymap);
        <?php } ?>
    });
</script>

<?= $this->endSection(); ?>