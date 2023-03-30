<?= $this->extend('halaman_stafdesainer/halaman_user/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h4 mb-0 text-gray-700">Biodata</h1>
    </div>
    <a href="/user/editData/<?= session()->get('id'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm mb-4">
        <i class="fas fa-pen fa-sm text-white-50 mr-2"></i>Edit Data / Ganti Password</a>

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Akun</h6>
        </div>
        <div class="card-body">
            <div class="text-center">
                <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
                <img class="img-profile px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?= base_url(); ?>/img/user/<?= $foto['file_path'] ?>">
                <hr>
            </div>
            <div class="text-left">
                <br>
                <p>Nama : <?= session()->get('nama'); ?></p>
                <p>No. Telp. : <?= session()->get('no_telp'); ?></p>
                <p>Username : <?= session()->get('username'); ?></p>
                <p>Jabatan : <?= (session()->get('role') == '2') ? 'Staf Desainer' : ''; ?></p>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>