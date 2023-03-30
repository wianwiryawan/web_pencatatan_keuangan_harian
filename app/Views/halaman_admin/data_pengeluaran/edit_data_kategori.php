<?= $this->extend('halaman_admin/data_pengeluaran/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-700">Edit Data Kategori Pengeluaran</h1>
    </div>

    <!-- Start of Form -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <h1 class="h5 mb-2 text-gray-600">Silahkan input data:</h1>
                        <form action="/pengeluaran/updateDataKat/<?= $data['id_kategori']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_kategori" id="inputHidden" value="<?= $data['id_kategori']; ?>">
                            <div class="form-group row">
                                <label for="inputNamaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_kategori')) ? 'is-invalid' : ''; ?>" id="inputNamaKategori" placeholder="Nama Kategori" name="nama_kategori" value="<?= $data['nama_kategori']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kategori'); ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="mt-2 btn btn-primary btn-user btn-block" name="submit" value="Submit">
                                <a href="/pengeluaran/tambahDataKategori/" class="btn btn-secondary btn-user btn-block">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Form -->

    <!-- Content Row -->
    <div class=" row">
        <!-- Start of Table -->
        <form action="">

        </form>
        <!-- End of Table -->
    </div>
    <!-- Content Row -->
</div>

<?= $this->endSection(); ?>