<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="bg-info-subtle position-absolute" style="width: 100%; height: 100%; overflow: hidden;">

    <section class="container" style="margin-top: 100px;">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-md-5 text-center">
                <h3 class="text-info-emphasis">MUSEUM NASIONAL INDONESIA</h3>
                <p class="fw-semibold">LOGIN</p>
            </div>
        </div>

        <?php if (isset($gagal)) : ?>
            <div class="alert alert-danger alert-dismissible">
                <p class="text-danger"><?= $gagal ?></p>
            </div>
        <?php endif; ?>


        <div class="row d-flex justify-content-center py-3">
            <div class="col-md-5">
                <form action="/admin/check" method="post" class="mx-auto shadow bg-warning p-5 rounded-4">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= old('password') ?>" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" checked>
                        <label class="form-check-label" for="remember_me">Remember Me</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>