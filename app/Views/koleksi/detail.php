<?= $this->extend('layout/template') ?>

<?= $this->section('content');  ?>

<!-- header -->
<header id="detail" class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-7 d-flex align-items-center">
            <img src="/img/Logo_Museum_Nasional.png" alt="logo" width="100">
            <h3 class="text-info-emphasis ms-2">MUSEUM NASIONAL INDONESIA</h3>
        </div>
    </div>
</header>
<!-- header -->

<!-- detail -->
<section class="container">
    <div class="row">
        <div class="col-md-5 mt-5">
            <h2 class="text-primary fs-2 fw-bolder text-decoration-underline"><?= $koleksi['nama'] ?></h2>
            <p class="lh-sm"><?= $koleksi['desk'] ?></p>
            <p class="mt-2 fw-semibold">Wilayah : <?= $koleksi['wilayah'] ?></p>
            <div class="d-flex justify-content-between text-info-emphasis fw-semibold">
                <p>Di Upload oleh : <?= $koleksi['created_by'] ?></p>
                <p>Tanggal : <?= $koleksi['updated_at'] ?></p>
            </div>
            <a href="/koleksi" class="btn btn-warning">Kembali ke halaman Koleksi</a>
        </div>
        <div class="col-md-3">
            <img src="/img/koleksi/<?= $koleksi['gambar'] ?>" alt="<?= $koleksi['gambar'] ?>" class="img-fuild rounded-3">
        </div>
    </div>
</section>
<!-- detail -->



<?= $this->endSection(); ?>