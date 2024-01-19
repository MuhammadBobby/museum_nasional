<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="container" style="margin-top: 100px;">
    <div class="row my-5">
        <div class="col-md-5">
            <h3 class="text-info-emphasis">MUSEUM NASIONAL INDONESIA</h3>
            <p class="fw-semibold">Edit Data Koleksis <span class="text-danger">(*Pastikan data yang di edit benar)</span></p>
        </div>
    </div>

    <!-- error data -->
    <?php if (session('validation')) : ?>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">X</a>
            <ul>
                <?php foreach (session('validation')->getErrors() as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
    <!-- error data -->

    <div class="row py-3">
        <div class="col-md-8">
            <form action="/admin/update/<?= $koleksi['id'] ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $koleksi['gambar'] ?>">\

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Koleksi</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $koleksi['nama']) ?>">
                </div>
                <div class="mb-3">
                    <label for="desk" class="form-label">Deskripsi Koleksi</label>
                    <input type="text" class="form-control" id="desk" name="desk" value="<?= old('desk', $koleksi['desk']) ?>">
                </div>
                <div class="mb-3">
                    <label for="wilayah" class="form-label">Wilayah Asal</label>
                    <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?= old('wilayah', $koleksi['wilayah']) ?>">
                </div>
                <div class="mb-3">
                    <label for="created_by" class="form-label">Diupload Oleh</label>
                    <input type="text" class="form-control" id="created_by" name="created_by" value="<?= old('created_by', $koleksi['created_by']) ?>">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Koleksi</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="gambar" name="gambar" value="<?= old('gambar', $koleksi['gambar']) ?>" accept=".jpg, .jpeg, .png" onchange="previewImg()">
                        </div>
                        <!-- priview gambar -->
                        <div class="col-sm-2">
                            <img src="/img/koleksi/<?= $koleksi['gambar'] ?>" alt="preview" class="img-thumbnail" id="preview">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
            <a href="/admin/detail/<?= $koleksi['id'] ?>" class="d-block my-2">Batal Mengubah ? Kembali ke daftar koleksi >></a>
        </div>
    </div>
</section>



<?= $this->endSection(); ?>