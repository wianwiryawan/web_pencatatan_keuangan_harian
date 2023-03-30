<?= $this->extend('halaman_stafdesainer/halaman_produk/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-700">Data Produk</h1>
    </div>

    <!-- Start of Form -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <h1 class="h5 mb-2 text-gray-600">Silahkan input data:</h1>
                        <form action="<?= base_url('produk/simpanData'); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="inputNamaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->getError('nama_produk')) ? 'is-invalid' : ''; ?>" id="inputNamaProduk" placeholder="Nama Produk" name="nama_produk" value="<?= old('nama_produk'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_produk'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputGarisLeher" class="col-sm-2 col-form-label">Tipe Garis Leher</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->getError('garis_leher')) ? 'is-invalid' : ''; ?>" id="inputGarisLeher" placeholder="Tipe Garis Leher" name="garis_leher" value="<?= old('garis_leher'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('garis_leher'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputMotif" class="col-sm-2 col-form-label">Motif</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->getError('motif')) ? 'is-invalid' : ''; ?>" id="inputMotif" placeholder="Motif" name="motif" value="<?= old('motif'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('motif'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputBahanKain" class="col-sm-2 col-form-label">Bahan Kain</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->getError('bahan')) ? 'is-invalid' : ''; ?>" id="inputBahanKain" placeholder="Bahan Kain" name="bahan" value="<?= old('bahan'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bahan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-2 col-form-label">Pilih Gambar</label>
                                <div class="col-sm-2 mb-2">
                                    <img src="/img/produk/default_produk.png" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="gambar" onchange="imgPreview()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                        <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="mt-2 btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                <a href="/pages/dataProdukStafDesainer/" class="btn btn-secondary btn-user btn-block">Back</a>
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