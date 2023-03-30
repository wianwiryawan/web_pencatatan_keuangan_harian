<?= $this->extend('halaman_admin/data_hutang_piutang/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-700">Edit Data Hutang & Piutang</h1>
    </div>

    <!-- Start of Form -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <h1 class="h5 mb-2 text-gray-600">Silahkan input data:</h1>
                        <form action="/hutangpiutang/updateData/<?= $data['id']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" id="inputHidden" value="<?= $data['id']; ?>">
                            <div class="form-group row">
                                <label for="inputNamaProduk" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kategori">
                                        <option value="Piutang">Piutang</option>
                                        <option value="Hutang">Hutang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="inputNama" placeholder="Nama" name="nama" value="<?= $data['keterangan']; ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNominal" class="col-sm-2 col-form-label">Nominal</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : ''; ?>" id="inputNominal" placeholder="Jumlah Nominal" name="nominal" value="<?= $data['nominal']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nominal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_transaksi')) ? 'is-invalid' : ''; ?>" id="inputTanggal" placeholder="Tanggal Transaksi" name="tgl_transaksi" value="<?= $data['tgl_transaksi']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_transaksi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="flexRadioDefault" class="col-sm-2 form-check-label">Status</label>
                                <div class="form-check">
                                    <?php if ($data['status'] == 1) { ?>
                                        <input type="radio" class="form-radio-input" id="inputRadio" value="1" name="status" checked="checked">
                                    <?php } else { ?>
                                        <input type="radio" class="form-radio-input" id="inputRadio" value="1" name="status">
                                    <?php }; ?>
                                    <label for="inputRadio" class="form-check-label">Lunas</label>
                                </div>
                                <div class="form-check">
                                    <?php if ($data['status'] == 0) { ?>
                                        <input type="radio" class="form-radio-input" id="inputRadio" value="0" name="status" checked="checked">
                                    <?php } else { ?>
                                        <input type="radio" class="form-radio-input" id="inputRadio" value="0" name="status">
                                    <?php }; ?>
                                    <label for="inputRadio" class="form-check-label">Belum Lunas</label>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="mt-2 btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                <a href="/pages/dataHutangPiutang/" class="btn btn-secondary btn-user btn-block">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Form -->

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