<?= $this->extend('halaman_cetakLaporan/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h4 mb-0 text-gray-700">Cetak Laporan</h1>
    </div>
    <p class="mb-4">Memilih tanggal 01 dan tanggal 31 dalam bulan dan tahun yang sama, akan mencetak laporan keuangan harian dalam 1 bulan</a>.</p>

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
                        <h1 class="h5 mb-2 text-gray-600">Silahkan pilih tanggal:</h1>
                        <form action="<?= base_url('laporan/cetakLaporan'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="inputTanggalAwal" class="col-sm-2 col-form-label inline">Tanggal Awal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_awal')) ? 'is-invalid' : ''; ?>" id="inputTanggalAwal" placeholder="Tanggal Awal" name="tgl_awal" value="<?= old('tgl_awal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_awal'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTanggalAkhir" class="col-sm-2 col-form-label inline">Tanggal Akhir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_akhir')) ? 'is-invalid' : ''; ?>" id="inputTanggalAkhir" placeholder="Tanggal Akhir" name="tgl_akhir" value="<?= old('tgl_akhir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_akhir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="mt-2 btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                <a href="/pages/Admin/" class="btn btn-secondary btn-user btn-block">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>