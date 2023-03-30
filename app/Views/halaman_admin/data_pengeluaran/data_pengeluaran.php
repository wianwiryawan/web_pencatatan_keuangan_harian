<?= $this->extend('halaman_admin/data_pengeluaran/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h4 mb-0 text-gray-700">Data Pengeluaran</h1>
    </div>

    <!-- Data Input Button -->
    <a href="<?php echo base_url('pengeluaran/tambahData'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Data Pengeluaran</a>
    <a href="<?php echo base_url('pengeluaran/tambahDataKategori'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Data Kategori</a>

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <!-- Start of Table -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-info shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Daftar Data Pengeluaran</h6>
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
                                            <th>Keterangan</th>
                                            <th>Nominal (Rp.)</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengeluaran as $p => $value) : ?>
                                            <tr>
                                                <td><?= $p + 1; ?></td>
                                                <td><?= $value->nama_kategori; ?></td>
                                                <td><?= $value->keterangan; ?></td>
                                                <td><?= number_format($value->nominal, 0, ',', '.'); ?></td>
                                                <td><?= $value->tgl_transaksi; ?></td>
                                                <td align="center">
                                                    <a href="/pengeluaran/editData/<?= $value->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/pengeluaran/deleteData/<?= $value->id; ?>" class="btn btn-danger btn-sm">Delete</a>
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