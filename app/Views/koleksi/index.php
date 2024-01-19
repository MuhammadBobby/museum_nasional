<?= $this->extend('layout/template') ?>

<?= $this->section('content');  ?>

<!-- header -->
<header id="daftar" class="container" style="margin-top: 100px;">
    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-5 text-center">
            <h1 class="fw-bolder">DAFTAR KOLEKSI</h1>
            <h3 class="text-info-emphasis">MUSEUM NASIONAL INDONESIA</h3>
            <p class="fw-light">Museum Indonesia Memiliki lebih dari 100.000 koleksi peninggalan sejarah yang berasal dari berbagai wilayah.</p>
        </div>
    </div>
</header>
<!-- header -->

<!-- daftar -->
<section class="daftar bg-primary-subtle py-5">
    <div class="container">
        <div class="row d-flex justify-content-center">


            <?php foreach ($koleksi as $k) : ?>
                <div class="col-md-6">
                    <div class="card shadow mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/img/koleksi/<?= $k['gambar'] ?>" class="img-fluid rounded-3 m-2" alt="<?= $k['gambar'] ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder fs-4"><?= $k['nama'] ?></h5>
                                    <p class="card-text"><?= $k['desk'] ?></p>
                                    <p class="card-text"><small class="text-body-secondary">Wilayah : <?= $k['wilayah'] ?> </small></p>
                                    <a href="/koleksi/detail/<?= $k['id'] ?>" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>
<!-- daftar -->


<?= $this->endSection(); ?>