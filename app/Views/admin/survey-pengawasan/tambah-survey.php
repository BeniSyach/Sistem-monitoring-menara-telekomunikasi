<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('isi'); ?>

<script src="/assets/ckeditor/ckeditor.js"></script>

<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Tambah Survey Menara </h4>
    </div>
</div>


<div class="col-12">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title">Edit Data</h4>
            <form action="/survey/simpan_data" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_menara" id="id" value="<?= $id_menara ?>">
                <input type="hidden" name="id_provider" id="id" value="<?= $id_provider ?>">
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-5">
                        <input class="form-control form-control-sm" type="text" placeholder="Judul" name="judul" id="judul">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Data Menara</label>
                    <div class="col-sm-10">
                        <textarea name="data_provider" name="detailsurvey" id="data_provider"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-info mx-1">Simpan</button>
                    <a class="btn btn-danger" href="/provider">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('data_provider');
</script>



<?= $this->endSection(); ?>