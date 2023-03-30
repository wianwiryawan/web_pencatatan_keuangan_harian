<?= $this->extend('halaman_admin/data_hutang_piutang/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h4 mb-0 text-gray-700">Data Hutang & Piutang</h1>
    </div>
    <p>Status berwarna <b>HIJAU</b> memiliki arti bahwa hutang/piutang sudah <b>LUNAS</b>, sedangkan status berwarna <b>KUNING</b> memiliki arti sebaliknya.</p>
    <a href="<?php echo base_url('hutangpiutang/tambahData'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Data
    </a>

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <!-- Start of Table -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-info shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Daftar Data Hutang & Piutang</h6>
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
                                            <th>Kategori</th>
                                            <th>Nama</th>
                                            <th>Nominal (Rp.)</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($h_p as $data) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $data['kategori']; ?></td>
                                                <td><?= $data['keterangan']; ?></td>
                                                <td><?= number_format($data['nominal'], 0, ',', '.'); ?></td>
                                                <td><?= $data['tgl_transaksi']; ?></td>
                                                <td align="center">
                                                    <?php if ($data['status'] == 1) { ?>
                                                        <a href="/hutangpiutang/editDataStatus/<?= $data['id']; ?>" class="btn btn-success btn-circle btn-sm ">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                    <?php  } else { ?>
                                                        <a href="/hutangpiutang/editDataStatus/<?= $data['id']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </a>
                                                    <?php }; ?>
                                                </td>
                                                <td align="center">
                                                    <a href=" /hutangpiutang/editData/<?= $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/hutangpiutang/hapusData/<?= $data['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
</div>

<?= $this->endSection(); ?>