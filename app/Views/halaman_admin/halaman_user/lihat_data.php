<?= $this->extend('halaman_admin/halaman_user/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h4 mb-0 text-gray-700">Data User</h1>
    </div>
    <a href="<?php echo base_url('user/tambahData'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Data User</a>

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>
    <!-- Start of Table -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-info shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Daftar User</h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No. telp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data as $u => $value) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td align="center">
                                                    <img src="/img/user/<?= $value->file_path; ?>" width=100 height=100></img>
                                                </td>
                                                <td><?= $value->nama; ?></td>
                                                <td><?= $value->role_name; ?></td>
                                                <td><?= $value->no_telp; ?></td>
                                                <td><?= $value->jenis_kelamin; ?></td>
                                                <td align="center">
                                                    <a href="/user/editData/<?= $value->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <?php if (session()->get('nama') == $value->nama) { ?>

                                                    <?php } else { ?>
                                                        <a href="/user/deleteData/<?= $value->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                    <?php }; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Table -->

    <!-- Content Row -->
    <div class="row">
        <!-- Start of Table -->
        <form action="">

        </form>
        <!-- End of Table -->
    </div>
    <!-- Content Row -->
</div>

<?= $this->endSection(); ?>