<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('isi'); ?>

<script src="/assets/ckeditor/ckeditor.js"></script>

<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Tambah Retribusi </h4>
    </div>
</div>


<div class="col-12">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title">Tambah Data</h4>
            <form action="/retribusi/simpan_data" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Judul Retribusi</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm" type="text" placeholder="Judul Retribusi" name="judul" id="judul">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Tahun Retribusi</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm" type="text" placeholder="tahun Retribusi" name="tahun" id="tahun">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Data Retribusi</label>
                    <div class="col-sm-10">
                        <textarea name="detail_retribusi" id="data_provider"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-info mx-1">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('data_provider');
</script>



<?= $this->endSection(); ?>