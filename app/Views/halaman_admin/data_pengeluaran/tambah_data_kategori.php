<?= $this->extend('halaman_admin/data_pengeluaran/templates/index'); ?>

<?= $this->Section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-700">Data Kategori Pengeluaran</h1>
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
                        <form action="<?= base_url('pengeluaran/simpanKategori'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="inputKategori" class="col-sm-2 col-form-label">Kategori Baru</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('kategori_baru')) ? 'is-invalid' : ''; ?>" id="inputKategori" placeholder="Kategori Baru" name="kategori_baru" value="<?= old('kategori_baru'); ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kategori_baru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div>
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

    <!-- Start of Table -->
    <div class="col-xl col-md mb-4">
        <div class="card border-bottom-info shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Daftar Data Kategori Pengeluaran</h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kategori as $data) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['nama_kategori']; ?></td>
                                                <td>
                                                    <a href="/pengeluaran/editDataKat/<?= $data['id_kategori']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/pengeluaran/deleteDataKat/<?= $data['id_kategori']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
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