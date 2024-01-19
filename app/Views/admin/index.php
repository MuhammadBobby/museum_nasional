<?= $this->extend('layout/template') ?>

<?= $this->section('content');  ?>
<?php
$session = \Config\Services::session();

?>

<div class="container" style="margin-top: 100px;">
    <a href="/logout" class=" btn btn-danger">KELUAR ➡</a>
</div>

<!-- header -->
<header id="daftar" class="container">
    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-5 text-center">
            <h1 class="fw-bolder">DAFTAR KOLEKSI</h1>
            <h3 class="text-info-emphasis">MUSEUM NASIONAL INDONESIA</h3>
            <p class="text-danger text-decoration-underline fw-semibold">ADMIN MODE</p>
        </div>
    </div>
</header>
<!-- header -->


<!-- notif flSH DATA -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success text-center fw-bolder fs-4" role="alert">
        <?= session()->getFlashdata('pesan') ?>
    </div>
<?php endif; ?>


<!-- daftar -->
<section class="daftar py-3">
    <div class="container">
        <a href="/admin/create" class="btn btn-primary">Upload Data Baru ⬆</a>
        <table class="table  table-striped rounded-3 mt-2">
            <thead>
                <tr class="table-primary text-center">
                    <th scope="col">#</th>
                    <th scope="col">GAMBAR</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">WILAYAH</th>
                    <th scope="col">DIBUAT OLEH</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($koleksi as $k) : ?>
                    <tr class="align-middle  text-center">
                        <th scope="row"><?= $i++ ?></th>
                        <td><img src="/img/koleksi/<?= $k['gambar'] ?>" alt="" width="100" class="img-fluid rounded-2"></td>
                        <td><?= $k['nama'] ?></td>
                        <td><?= $k['wilayah'] ?></td>
                        <td><?= $k['created_by'] ?></td>
                        <td>
                            <a href="/admin/detail/<?= $k['id'] ?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<!-- daftar -->

<?php $session->close(); ?>
<?= $this->endSection(); ?>