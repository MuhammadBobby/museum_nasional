 <!-- navbar -->
 <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
     <div class="container-fluid px-5">
         <a href="/admin"><img src="/img/admin.png" width="30" class="me-2"></a>
         <a class="navbar-brand" href="<?= base_url('/') ?>">
             <img src="/img/Logo_Museum_Nasional.png" alt="logo" width="30" />
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav d-flex align-items-center">
                 <a class="nav-link active" href="<?= base_url('/#beranda') ?>">
                     <h4 class="fw-semibold">Beranda</h4>
                 </a>
                 <a class="nav-link" href="<?= base_url('/#sejarah') ?>">Sejarah</a>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Koleksi
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="<?= base_url('/#koleksi') ?>">Koleksi Unggulan</a></li>
                         <li><a class="dropdown-item" href="<?= base_url('/koleksi') ?>">Daftar Koleksi</a></li>
                     </ul>
                 </li>
                 <a class="nav-link" href="<?= base_url('/#ulasan') ?>">Ulasan Tokoh</a>
             </div>
         </div>
         <?php if (isset($search)) : ?>
             <form action="/search/<?= $title ?>" method="post" class="d-flex">
                 <input class="form-control me-2" type="text" placeholder="Search" name="search" autofocus>
                 <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
             </form>
         <?php endif; ?>
     </div>
 </nav>
 <!-- akhir navbar -->