<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('isi'); ?>
<!-- Dropzone css -->
<link href="/assets/backend/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
<link href="/assets/backend/plugins/dropify/css/dropify.min.css" rel="stylesheet">
<!-- Dropzone js -->
<script src="/assets/backend/plugins/dropzone/dist/dropzone.js"></script>
<script src="/assets/backend/plugins/dropify/js/dropify.min.js"></script>

<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Tambah Data Menara </h4>
    </div>
</div>


<div class="col-md-12">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title">Input Data</h4>
            <form action="/lokasi/simpan_menara" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Nama Menara</label>
                    <div class="col-sm-7">
                        <input class="form-control form-control-sm <?= ($validation->hasError('nama_menara')) ? 'is-invalid' : ''; ?>" name="nama_menara" id="nama_menara" type="text" placeholder="Nama Menara" id="example-text-input-sm">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_menara') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Alamat Menara</label>
                    <div class="col-sm-7">
                        <input class="form-control form-control-sm <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" type="text" placeholder="Alamat Menara" id="alamat" name="alamat">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-7">
                        <div id="mapid" style=" height: 400px;"></div>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm <?= ($validation->hasError('latitude')) ? 'is-invalid' : ''; ?>" type="text" placeholder="Latitude" id="Latitude" name="latitude">
                        <div class="invalid-feedback">
                            <?= $validation->getError('latitude') ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm <?= ($validation->hasError('longitude')) ? 'is-invalid' : ''; ?>" type="text" placeholder="Longitude" id="Longitude" name="longitude">
                        <div class="invalid-feedback">
                            <?= $validation->getError('llongitude') ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Foto Menara</label>
                    <div class="col-sm-5">
                        <input type="file" id="input-file-now" name="foto_menara" class="dropify" />
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-info mx-1">Simpan</button>
                    <a class="btn btn-danger" href="/lokasi/index/<?= $slugprovider ?>">Kembali</a>
                </div>
            </form>


        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

<!-- Leaflet -->
<link rel="stylesheet" href="<?= base_url('assets/js/leaflet/leaflet.css'); ?>" />
<script src="<?= base_url('assets/js/leaflet/leaflet.js'); ?>" type='text/javascript'></script>

<script type='text/javascript'>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [3.4507552, 99.039601];
    }

    var L = window.L;

    var mymap = L.map('mapid').setView([3.4507552, 99.039601], 11);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: ' Design By <a href="https://diskominfo.serdangbedagaikab.go.id/">Dinas Komunikasi Dan Informatika Kabupaten Serdang Bedagai</a>',
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    mymap.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });


    document.addEventListener("DOMContentLoaded", function(event) {
        $("#Latitude, #Longitude").change(function() {
            var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });
    });
    mymap.addLayer(marker);
</script>

<?= $this->endSection(); ?>