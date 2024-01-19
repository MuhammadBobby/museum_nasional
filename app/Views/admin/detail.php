<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col">
            <h5 class="mt-2">Detail Koleksi <?= $koleksi['nama'] ?></h5>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/koleksi/<?= $koleksi['gambar'] ?>" class="img-fluid rounded-3" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $koleksi['nama'] ?></h5>
                            <p class="card-text"><?= $koleksi['desk'] ?></p>
                            <p class="card-text">wilayah : <?= $koleksi['wilayah'] ?></p>
                            <div class="d-flex justify-content-between text-info-emphasis fw-semibold">
                                <p>Di Upload oleh : <?= $koleksi['created_by'] ?></p>
                                <p>Tanggal : <?= $koleksi['updated_at'] ?></p>
                            </div>



                            <a href="/admin/edit/<?= $koleksi['id'] ?>" class="btn btn-warning">Edit</a>

                            <!-- menggunakan spoofing agar delete melalui method delete -->
                            <form action="/admin/delete/<?= $koleksi['id'] ?>" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE"> <!--SPOOFING-->
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Delete</button>
                            </form>

                            <br><br>
                            <a href="/admin">kembali ke daftar >></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>