<?= $this->extend('home/index'); ?>

<?= $this->section('content'); ?>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="/lokasi">Lokasi Menara</a></li>
            <li>Map Lokasi Menara</li>

        </ol>
        <h2>Map Lokasi Menara</h2>

    </div>
</section><!-- End Breadcrumbs -->


<h2 class="text-center mt-4"><?= $map['nama_menara'] ?></h2>


<section>
    <div class="container">
        <div id="mapid" class="mapid"></div>
    </div>
</section>


<!-- Leaflet -->
<link rel="stylesheet" href="<?= base_url('assets/js/leaflet/leaflet.css'); ?>" />
<script src="<?= base_url('assets/js/leaflet/leaflet.js'); ?>" type='text/javascript'></script>
<script type='text/javascript'>
    navigator.geolocation.getCurrentPosition(function(location) {

        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
        var mymap = L.map('mapid').setView([<?= $map['latitude']; ?>, <?= $map['longitude']; ?>], 14);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
                '<a href="https://diskominfo.serdangbedagaikab.go.id/">Dinas Komunikasi Dan Informatika Kabupaten Serdang Bedagai</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.marker([<?= $map['latitude']; ?>, <?= $map['longitude']; ?>]).bindPopup(
            "<img src='<?= base_url('assets/img') . "/" . $map['foto_menara']; ?>' class='img-fluid'>" +
            "<b><?= $map['nama_menara']; ?></b>").addTo(mymap);

        var btn = document.getElementById('btn');
        btn.innerHTML = "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
            location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $map['latitude']; ?>,<?= $map['longitude']; ?>' class='btn btn-outline-primary mt-2' target='_blank'>Rute</a>";


    });
</script>

<?= $this->endSection(); ?>