<?= $this->extend('halaman_admin/data_penjualan/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h4 mb-0 text-gray-700">Data Penjualan Produk</h1>
    </div>
    <a href="<?php echo base_url('penjualan/tambahData'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Data</a>

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <!-- Start of Table -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Daftar Data Penjualan Produk</h6>
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
                                            <th>Nama Produk</th>
                                            <th>Ukuran</th>
                                            <th>Terjual (Pcs)</th>
                                            <th>Harga (Rp.)</th>
                                            <th>Total (Rp.)</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($penjualan as $p => $value) : ?>
                                            <tr>
                                                <td><?= $p + 1; ?></td>
                                                <td><?= $value->nama_produk; ?></td>
                                                <td><?= $value->ukuran; ?></td>
                                                <td><?= $value->qty_produk; ?></td>
                                                <td><?= number_format($value->nominal, 0, ',', '.'); ?></td>
                                                <td><?= number_format(($value->qty_produk * $value->nominal), 0, ',', '.'); ?></td>
                                                <td><?= $value->tgl_transaksi; ?></td>
                                                <td>
                                                    <a href="/penjualan/editData/<?= $value->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/penjualan/hapusData/<?= $value->id; ?>" class="btn btn-danger btn-sm">Delete</a>
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