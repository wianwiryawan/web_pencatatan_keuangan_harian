<?= $this->extend('halaman_admin/data_penjualan/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-700">Data Penjualan Produk</h1>
    </div>
    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <!-- Start of Form -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <h1 class="h5 mb-2 text-gray-600">Silahkan input data:</h1>
                        <form action="<?= base_url('penjualan/simpanData'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="inputNamaProduk" class="col-sm-2 col-form-label">Nama Produk Terjual</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_produk">
                                        <?php foreach ($produk as $data) : ?>
                                            <option value="<?= $data['id']; ?>"><?= $data['nama_produk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNamaProduk" class="col-sm-2 col-form-label">Ukuran</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_ukuran">
                                        <?php foreach ($ukuran as $ukuran) : ?>
                                            <option value="<?= $ukuran['id_ukuran']; ?>"><?= $ukuran['ukuran']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputJumlahTerjual" class="col-sm-2 col-form-label">Jumlah Terjual</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('jumlah_terjual')) ? 'is-invalid' : ''; ?>" id="inputJumlahTerjual" placeholder="Jumlah Terjual" name="jumlah_terjual" value="<?= old('jumlah_terjual'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jumlah_terjual'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNominalTransaksi" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= ($validation->hasError('nominal_transaksi')) ? 'is-invalid' : ''; ?>" id="inputNominalTransaksi" placeholder="Harga/pcs" name="nominal_transaksi" value="<?= old('nominal_transaksi'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nominal_transaksi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTanggalTransaksi" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_transaksi')) ? 'is-invalid' : ''; ?>" id="inputTanggalTransaksi" placeholder="Tanggal Transaksi" name="tgl_transaksi" value="<?= old('tgl_transaksi'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_transaksi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="mt-2 btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                <a href="/pages/dataPenjualan/" class="btn btn-secondary btn-user btn-block">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- Start of Table -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Daftar Data Produk</h6>
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
                                            <th>Gambar Produk</th>
                                            <th>Nama Produk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($produk as $p) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td align="center">
                                                    <img src="/img/produk/<?= $p['file_path']; ?>" width=100 height=100></img>
                                                </td>
                                                <td><?= $p['nama_produk']; ?></td>
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