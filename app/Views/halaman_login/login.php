<?= $this->extend('halaman_login/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                </div>
                                <form action="<?= base_url('login/login'); ?>" method="POST">
                                    <?php if (session()->getFlashdata('error')) { ?>
                                        <div class="alert alert-danger">
                                            <?php echo session()->getFlashdata('error') ?>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-user" id="Username" value="<?php echo session()->getFlashdata('username') ?>" placeholder="Masukkan Username" name="username" autofocus>
                                    </div>
                                    <small id="username_error" class="form-text text-danger mb-3"></small>
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Masukkan Password" name="password">
                                    </div>
                                    <small id="password_error" class="form-text text-danger mb-3"></small>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>