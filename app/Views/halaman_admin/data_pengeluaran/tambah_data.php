<?= $this->extend('halaman_admin/data_pengeluaran/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-700">Data Pengeluaran</h1>
    </div>
    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <!-- Start of Form -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <h1 class="h5 mb-2 text-gray-600">Silahkan input data:</h1>
                        <form action="<?= base_url('pengeluaran/simpanPengeluaran'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="inputPengeluaran" class="col-sm-2 col-form-label">Pilih kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_kategori">
                                        <?php foreach ($kategori as $data) : ?>
                                            <option value="<?= $data['id_kategori']; ?>"><?= $data['nama_kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPengeluaran" class="col-sm-2 col-form-label">Nama Pengeluaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_pengeluaran')) ? 'is-invalid' : ''; ?>" id="inputPengeluaran" placeholder="Nama Pengeluaran" name="nama_pengeluaran" value="<?= old('nama_pengeluaran'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pengeluaran'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNominal" class="col-sm-2 col-form-label">Nominal</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= ($validation->hasError('nominal_pengeluaran')) ? 'is-invalid' : ''; ?>" id="inputNominal" placeholder="Nominal Pengeluaran" name="nominal_pengeluaran" value="<?= old('nominal_pengeluaran'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nominal_pengeluaran'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_transaksi')) ? 'is-invalid' : ''; ?>" id="inputTanggal" placeholder="Tanggal Transaksi" name="tgl_transaksi" value="<?= old('tgl_transaksi'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_transaksi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline">
                                <input type="submit" class="mt-2 btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                <a href="/pages/dataPengeluaran/" class="btn btn-secondary btn-user btn-block">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Form -->
</div>

<?= $this->endSection(); ?>